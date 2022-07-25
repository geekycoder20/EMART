<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Category;
use App\Models\Food;
use App\Models\CoupenCode;
use App\Models\DeliveryBoy;
use App\Models\User;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index(){
    	$today_earnings =  Order::whereDate('updated_at',Carbon::today())->where('payment_status','paid')->sum('total_price');
    	$this_month_earnings = Order::whereMonth('updated_at',Carbon::now()->month)->where('payment_status','paid')->sum('total_price');
    	$total_earnings = Order::where('payment_status','paid')->sum('total_price');
    	$pending_payments = Order::where('payment_status','pending')->sum('total_price');

    	$total_cats = Category::all()->count();
    	$total_foods = Food::all()->count();
    	$total_coupen = CoupenCode::all()->count();
    	$total_dboys = DeliveryBoy::all()->count();

    	$total_orders = Order::all()->count();
    	$pending_orders = Order::where('order_status',1)->count();
    	$packed_orders = Order::where('order_status',2)->count();
    	$shipped_orders = Order::where('order_status',3)->count();
    	$delivered_orders = Order::where('order_status',4)->count();
    	$cancelled_orders = Order::where('order_status',5)->count();

    	$total_users = User::all()->count();
    	$active_users = User::where('status',1)->count();
        return view("admin.dashboard")->with(compact('today_earnings','this_month_earnings','total_earnings','pending_payments','total_cats','total_foods','total_coupen','total_dboys','total_orders','pending_orders','packed_orders','shipped_orders','delivered_orders','cancelled_orders','total_users','active_users'));
    }
}
