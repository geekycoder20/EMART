<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodDetail;
use Redirect;

class FoodDetailController extends Controller
{
    public function add_details(Request $request){
        $request->validate(['attribute.*'=>'required','attr_price.*'=>'required|numeric']);
        $i = 0;

        //delete old food details
        $FoodDetail = FoodDetail::where("food_id",$request->f_id);
        $FoodDetail->delete();
        //add new add detials
        foreach ($request->attribute as $attr) {
            $food_detail = new FoodDetail;
            $food_detail->food_id = $request->f_id;
            $food_detail->attribute = $attr;
            $food_detail->price = $request->attr_price[$i];
            $food_detail->save();
            $i++;
        }
        return Redirect::back();
    }

    public function food_details(Request $request){
        $food_detail = FoodDetail::where("food_id",$request->foodid)->get();
        return response()->json(['food_details'=>$food_detail]);
    }
}
