<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewRating;
use Auth;

class ReviewRatingController extends Controller
{
    public function store(Request $request){
        $request->validate(['food_id'=>'required','rating_data'=>'required','user_review'=>'required']);
        $data = $request->all();
        $ReviewRating = new ReviewRating;

        $reviews = $ReviewRating::where('userid',Auth::guard('web')->user()->id)->where('foodid',$data['food_id'])->get();
    	if ($reviews->count()>0) {
   			return response()->json(['fail' => 'You have already reviewed this product']);
        }

        $ReviewRating->userid = Auth::guard('web')->user()->id;
        $ReviewRating->foodid = $data['food_id'];
        if ($data['rating_data']==0) {
        	$ReviewRating->rating = 1;
        }else{
        	$ReviewRating->rating = $data['rating_data'];
        }
        
        $ReviewRating->review = $data['user_review'];
        $ReviewRating->save();
        return response()->json(['success' => 'Reviewed Successfully']);
    }
}
