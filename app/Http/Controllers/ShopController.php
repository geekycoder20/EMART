<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;
use App\Models\FoodDetail;

class ShopController extends Controller
{
    public function index(){
    	$categories = Category::all();
    	$foods = Food::where('status',1)->orderBy('id','desc')->paginate(15);
    	return view("shop")->with(compact('categories','foods'));
    }

    public function shop_by_category($slug){
    	$category = Category::where("slug",$slug)->first();
        $foods = Category::where('slug', $slug)->first()->foods;        
    	return view("shop_by_cat")->with(compact('foods','category'));
    }

    public function filter(Request $request){
        $request->validate(['cats.*'=>'required']);
        $cats = $request->cats;
        $types = $request->type;
        if (is_array($types)) {
            $foods = Food::select("*")
                    ->whereIn('cat_id', array_values($cats))
                    ->whereIn('type',array_values($types))
                    ->where('status',1)
                    ->get();
        }
        else{
            $foods = Food::select("*")
                    ->whereIn('cat_id', array_values($cats))
                    ->where('status',1)
                    ->get();    
        }

        $f = [];
        foreach ($foods as $food) {
            array_push($f, $food->food_details[0]);
        }
        
        return response()->json(['found_foods'=>$foods,'found_f_details'=>$f]);
    }
}
