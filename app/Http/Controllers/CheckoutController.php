<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;
use Redirect;

class CheckoutController extends Controller
{
    public function index(){
    	$userid = Auth::guard('web')->user()->id;
		$cart = Cart::where("user_id",$userid)->get();
		if ($cart->count()<1) {
			return redirect::back();
		}
    	return view("checkout")->with(compact('cart'));
    }
}
