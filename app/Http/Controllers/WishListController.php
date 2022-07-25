<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishList;
use Auth;
use Redirect;

class WishListController extends Controller
{
    public function index(){
        $wishlists = WishList::where('user_id',Auth::guard('web')->user()->id)->get();
        return view("user.wishlists",compact('wishlists'));
    }


    public function store(Request $request){
    	$userid = Auth::guard('web')->user()->id;
    	$foodid = $request->f_id;
    	$wishlist = new WishList;

    	if (WishList::where('user_id',$userid)->where('food_id',$foodid)->count()>0) {
   			return Redirect::back()->withErrors(['error' => 'Food already added to wishlist']);
    	}

    	$wishlist->food_id = $foodid;
    	$wishlist->user_id = $userid;
    	$wishlist->save();
    	return Redirect::back();
    }

    public function delete(Request $request){
        $userid = Auth::guard('web')->user()->id;
        $wishlistid = $request->wishlist_id;
        $wishlist = WishList::where('user_id',$userid)->where('id',$wishlistid)->first();
        $wishlist->delete();
        return Redirect::back();
    }
}
