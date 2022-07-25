<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoupenCode;
use App\Models\Cart;
use Auth;

class CoupenCodeController extends Controller
{
    public function index(){
    	$coupen_codes = CoupenCode::paginate(15);
    	return view('admin.coupen_codes')->with(compact('coupen_codes'));
    }

    public function store(Request $request){
    	$request->validate(['coupen_code'=>'required|min:3|max:20','coupen_type'=>'required|in:P,F','coupen_value'=>'required|numeric','cart_min_value'=>'required|numeric','expired_on'=>'required|date']);
    	$coupen_code = new CoupenCode;
    	$data = $request->input();
    	$coupen_code->coupen_code = $data['coupen_code'];
    	$coupen_code->coupen_type = $data['coupen_type'];
    	$coupen_code->coupen_value = $data['coupen_value'];
    	$coupen_code->cart_min_value = $data['cart_min_value'];
    	$coupen_code->expired_on = $data['expired_on'];
    	$coupen_code->save();
    	return response()->json(['success' => 'Added Successfully','last_id' => $coupen_code->id]);
    }

    public function edit(Request $request){
    	$coupen_code = CoupenCode::find($request->id);
    	return response()->json(['found_coupen'=>$coupen_code]);
    }

    public function update(Request $request){
    	$request->validate(['coupen_code'=>'required|min:3|max:20','coupen_type'=>'required|in:P,F','coupen_value'=>'required|numeric','cart_min_value'=>'required|numeric','expired_on'=>'required|date']);

    	$coupen_code = CoupenCode::find($request->id);
    	$data = $request->input();
    	$coupen_code->coupen_code = $data['coupen_code'];
    	$coupen_code->coupen_type = $data['coupen_type'];
    	$coupen_code->coupen_value = $data['coupen_value'];
    	$coupen_code->cart_min_value = $data['cart_min_value'];
    	$coupen_code->expired_on = $data['expired_on'];
    	$coupen_code->save();
    	return response()->json(['success' => 'Updated Successfully']);
    }

    public function delete(Request $request){
    	$coupen_code = CoupenCode::find($request->id);
    	$coupen_code->delete();
    	return response()->json(['Deleted Successfully']);
    }

    public function switch(Request $request){
        $coupen_code = CoupenCode::find($request->id);
        if ($coupen_code->status==0) {
            $coupen_code->status = 1;
        }else{
            $coupen_code->status = 0;
        }
        $coupen_code->save();
        return response()->json(['Status Switched Successfully']);
    }


    public function apply_coupen(Request $request){
        $coupen = CoupenCode::where('status',1)->where('coupen_code',$request->coupen_code)->first();
        if ($coupen) {
            $userid = Auth::guard('web')->user()->id;
            $total_price = null;
            $cart = Cart::where('user_id',$userid)->get();
            foreach ($cart as $c) {
                $total_price += ($c->qty*$c->food_details->price);
            }

            //check if coupen code is expired
            $today_date = date("Y-m-d");
            if ($coupen->expired_on<$today_date) {
                return "Coupen Code is expired";
            }

            //check if coupen min value is less than total cart price
            if ($coupen->cart_min_value<=$total_price) {
                if ($coupen->coupen_type=="P") {
                    return round(($coupen->coupen_value / 100) * $total_price);
                }
                else{
                    return round($coupen->coupen_value);
                }
            }
            else{
                return "Coupen can be applied on minimum $".$coupen->cart_min_value." cart";
            }
        }
        else{
            return "Coupen Not Found!";
        }
    }


}
