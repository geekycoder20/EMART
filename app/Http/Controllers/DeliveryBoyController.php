<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryBoy;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Hash;
use Auth;

class DeliveryBoyController extends Controller
{
    public function index(){
    	$delivery_boys = DeliveryBoy::paginate(15);
    	return view('admin.delivery_boys')->with(compact('delivery_boys'));
    }

    public function store(Request $request){
    	$request->validate(['dboy_name'=>'required|min:3|max:20','dboy_mobile'=>'required|numeric','dboy_password'=>'required|min:3|max:20']);
    	$delivery_boy = new DeliveryBoy;
    	$data = $request->input();
    	$delivery_boy->name = $data['dboy_name'];
    	$delivery_boy->mobile = $data['dboy_mobile'];
    	$delivery_boy->password = Hash::make($data['dboy_password']);
    	$delivery_boy->save();
    	return response()->json(['success' => 'Added Successfully','last_id' => $delivery_boy->id]);
    }

    public function edit(Request $request){
    	$delivery_boy = DeliveryBoy::find($request->id);
    	return response()->json(['found_dboy'=>$delivery_boy]);
    }

    public function update(Request $request){
    	$request->validate(['dboyname'=>'required|min:3|max:20','dboymobile'=>'required|numeric','dboypassword'=>'required|min:3|max:20']);
    	$delivery_boy = DeliveryBoy::find($request->id);
    	$data = $request->input();
    	$delivery_boy->name = $data['dboyname'];
    	$delivery_boy->mobile = $data['dboymobile'];
    	$delivery_boy->password = Hash::make($data['dboypassword']);
    	$delivery_boy->save();
    	return response()->json(['success' => 'Updated Successfully']);
    }

    public function switch(Request $request){
    	$dboy = DeliveryBoy::find($request->id);
        if ($dboy->status==0) {
            $dboy->status = 1;
        }else{
            $dboy->status = 0;
        }
    	$dboy->save();
    	return response()->json(['Status Switched Successfully']);
    }

    public function showloginform(){
        return view("dboy.login");
    }

    public function login(Request $request){
        $creds = $request->only('mobile','password');
        if (Auth::guard('dboy')->Attempt($creds)) {
            return redirect()->route('dboy.dashboard');
        }else{
            return redirect()->route('dboy.login');
        }
    }

    public function logout(Request $request){
        Auth::guard('dboy')->logout();
        return redirect()->route('dboy.login');
    }


    public function orders(){
        $userid = Auth::guard('dboy')->user()->id;
        $orders = Order::where("delivery_boy_id",$userid)->paginate(15);
        return view("dboy.orders")->with(compact('orders'));
    }

    public function deliver_order(Request $request){
        $orderid = $request->orderid;
        $userid = Auth::guard('dboy')->user()->id;
        $order = Order::where('delivery_boy_id',$userid)->where('id',$orderid)->first();
        if ($order->order_status==3) {
            $order->order_status = 4;
            $order->payment_status = 'paid';
            $order->save();
            return "Success";
        }
    }

    
    public function order_details(Request $request){
        $order = Order::find($request->id);        
        $foodarray = [];
        $order_details = OrderDetails::where("order_id",$request->id)->get();
        foreach ($order_details as $orderdetail) {
            array_push($foodarray, $orderdetail->orderfood);
        }
        return response()->json(['order_details'=>$order_details,'order'=>$order]);
    }


    public function dashboard(){
        $userid = Auth::guard('dboy')->user()->id;
        $total_orders = Order::where('delivery_boy_id',$userid)->count();
        $pending_orders = Order::where('delivery_boy_id',$userid)->
                                 where('order_status','!=',4)->count();
        $total_payments = Order::where('delivery_boy_id',$userid)->sum('total_price');
        $pending_payments = Order::where('delivery_boy_id',$userid)->
                                 where('payment_status','pending')->sum('total_price');
        return view("dboy.dashboard",compact('total_orders','pending_orders','total_payments','pending_payments'));
    }


    public function profile(){
        $userid = Auth::guard('dboy')->user()->id;
        $user = DeliveryBoy::find($userid);
        return view("dboy.profile",compact('user'));
    }

}
