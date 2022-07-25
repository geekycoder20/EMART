<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Food;
use App\Models\FoodDetail;
use Redirect;
use Auth;

class CartController extends Controller
{
	public function index(){
		$userid = Auth::guard('web')->user()->id;
		$cart = Cart::where("user_id",$userid)->get();
		return view("cart")->with(compact('cart'));
	}

    public function store(Request $request){
    	$request->validate(['price_id'=>'required|numeric|min:1','qty'=>'required|numeric|min:1','food_id'=>'required|numeric|min:1']);

        //check if food is inactive
        $food = Food::find($request->food_id);
        if ($food->status!=1) {
            return response()->json(['fail' => 'Unable to add']);
        }

        //check if food is in stock or not
        if ($food->instock<$request->qty) {
            return response()->json(['fail' => 'Selected qty is not available in the stock']);
        }

        //check if selected price is invalid for this food
        $fooddetail = FoodDetail::find($request->price_id);
        if ($fooddetail->food_id!=$request->food_id) {
            return response()->json(['fail' => 'Invalid Price']);
        }

        //check if food is already added into cart
        $crt = Cart::where('food_id',$request->food_id)
                   ->where('user_id',Auth::guard('web')->user()->id)->first();
        if ($crt) {
            return response()->json(['fail' => 'Product is already added into cart']);
        }

    	$cart = new Cart;
    	$cart->food_id = $request->food_id;
    	$cart->food_details_id = $request->price_id;
    	$cart->user_id = Auth::guard('web')->user()->id;
    	$cart->qty = $request->qty;
    	$cart->save();
    	return response()->json(['success' => 'Added Successfully']);
    }

    public function delete(Request $request){
    	$userid = Auth::guard('web')->user()->id;
    	$cart_id = $request->id;
    	$cart = Cart::where('id',$cart_id)->
    				  where('user_id',$userid)->first();
    	$cart->delete();
    	return response()->json(['success' => 'Deleted Successfully']);
    }

    public function update(Request $request){
    	$userid = Auth::guard('web')->user()->id;
    	$cartrows = count($request->cart_qty);
    	for ($i=0; $i < $cartrows ; $i++) {
    		$cart_id = $request->cart_id[$i];
    		$cart_qty = $request->cart_qty[$i];
    		$cart = Cart::where("id",$cart_id)->
    					  where("user_id",$userid)->first();
    		$cart->qty = $cart_qty;
    		$cart->save();
    	}
    	return Redirect::back();
    }

}
