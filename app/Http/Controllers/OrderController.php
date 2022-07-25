<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Food;
use App\Models\OrderDetails;
use App\Models\Cart;
use App\Models\DeliveryBoy;
use App\Models\OrderStatus;
use App\Models\CoupenCode;
use Auth;
use PDF;
use Redirect;

class OrderController extends Controller
{

    public function index(){
        $orders = Order::paginate(15);
        return view("admin.orders")->with(compact('orders'));
    }

    public function store(Request $request){
    	$request->validate(['name'=>'required','email'=>'required|email','mobile'=>'required|numeric','address'=>'required','zipcode'=>'required']);
    	$userid = Auth::guard('web')->user()->id;
    	$total_price = null;
    	$cart = Cart::where('user_id',$userid)->get();
    	foreach ($cart as $c) {
    		$total_price += ($c->qty*$c->food_details->price);

            //check if any food is out of stock
            foreach ($c->foods as $myfood) {
                if ($myfood->instock<$c->qty) {
                    return Redirect::back()->withErrors(['Only '.$myfood->instock.' qty are available of '.$myfood->name.' in the stock. Please update your cart and try again.']);
                }
            }
    	}

        //apply coupen price
        if (!empty($request->coupen)) {
            $coupen = CoupenCode::where('status',1)->where('coupen_code',$request->coupen)->first();
            if ($coupen) {
                //check if coupen code is not expired
                $today_date = date("Y-m-d");
                if ($coupen->expired_on>$today_date) {
                    //check if coupen min value is less than total cart price
                    if ($coupen->cart_min_value<=$total_price) {
                        //subtract price according to coupen type
                        if ($coupen->coupen_type=="P") {
                            $total_price = $total_price - round(($coupen->coupen_value / 100) * $total_price);
                        }
                        else{
                            $total_price = $total_price - round($coupen->coupen_value);
                        }
                    }
                }    
            }
        }


    	//add order
    	$order = new Order;
    	$order->userid = $userid;
    	$order->name = $request->name;
    	$order->email = $request->email;
    	$order->mobile = $request->mobile;
    	$order->address = $request->address.", ".$request->address_optional;
    	$order->total_price = $total_price;
    	$order->zip_code = $request->zipcode;
    	$order->order_status = 1;
    	$order->save();
    	$last_order_id = $order->id;


        //subract stock of food items after order
        foreach ($cart as $cartitem) {
            foreach ($cartitem->foods as $fooditem) {
                $food = Food::find($fooditem->id);
                $food->instock = $food->instock - $cartitem->qty;
                $food->save();
            }
        }

    	//add order details 
    	foreach ($cart as $cart) {
    		$order_detail = new OrderDetails;
    		$order_detail->order_id = $last_order_id;
    		foreach ($cart->foods as $f) {
    			$foodid = $f->id;
    		}
    		$order_detail->food_id = $foodid;
    		$order_detail->qty = $cart->qty;
    		$order_detail->food_details_id = $cart->food_details_id;
    		$order_detail->price = $cart->food_details->price*$cart->qty;
    		$order_detail->save();
    	}

    	//empty cart
    	$cartitems = Cart::where('user_id',$userid)->get();
    	foreach ($cartitems as $item) {
    		$item->delete();
    	}


    	return redirect('/');
    }


    public function order_details(Request $request){
        $order = Order::find($request->id);
        $order_statuses = OrderStatus::all();
        $dboys = DeliveryBoy::where('status',1)->get();
        if ($order->delivery_boy) {
            $dboy = $order->delivery_boy->name;
        }else{
            $dboy = 'not assigned';
        }
        
        $foodarray = [];
        $order_details = OrderDetails::where("order_id",$request->id)->get();
        foreach ($order_details as $orderdetail) {
            array_push($foodarray, $orderdetail->orderfood);
        }
        // array_push($foodarray, $order_details);
        return response()->json(['order_details'=>$order_details,'order_food'=>$foodarray,'order'=>$order,'dboys'=>$dboys,'dboy'=>$dboy,'order_statuses'=>$order_statuses]);
    }


    public function assign_dboy(Request $request){
        $dboy_id =  $request->id;
        $order_id =  $request->orderid;
        $order = Order::find($order_id);
        $order->delivery_boy_id = $dboy_id;
        $order->save();
        return response()->json(['success'=>'Assigned Successfully.']);
    }

    public function update_status(Request $request){
        $status_id =  $request->statusid;
        $order_id =  $request->orderid;
        $order = Order::find($order_id);
        $order->order_status = $status_id;
        $order->save();
        return response()->json(['success'=>'Status Updated Successfully.']);
    }


    public function cancel(Request $request){
        $orderid = $request->orderid;
        $userid = Auth::guard('web')->user()->id;
        $order = Order::where("id",$orderid)->where("userid",$userid)->first();
        if ($order->order_status==1) {
            $order->order_status = 5;
            $order->save();
            return response()->json(['success'=>'Order Cancelled Successfully']);
        }else{
            return "Order could not be cancel because order is ".$order->orderstatus->order_status;
        }
        
    }


    public function create_invoice(Request $request){
        $order = Order::where('id',$request->orderid)->first();
        $pdf = PDF::loadView('admin.invoice',compact('order'));
        // download pdf file
        return $pdf->download('invoice.pdf');
    }

// 
}
