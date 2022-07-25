<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Food;

class HomePageController extends Controller
{
    public function index(){
    	$categories = Category::where('status',1)->get();
    	$featured_products = Food::inRandomOrder()->where('featured',1)->paginate(8);
    	$most_viewed_products = Food::where('status',1)->orderby('view_count','desc')->limit(6)->get();
    	$latest_products = Food::where('status',1)->orderby('created_at','desc')->limit(6)->get();
    	return view("main")->with(compact('categories','featured_products','latest_products','most_viewed_products'));
    }
}
