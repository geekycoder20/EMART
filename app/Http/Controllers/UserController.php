<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetails;
use Hash;
use Auth;
use Redirect;

class UserController extends Controller
{
    public function index(){
    	$users = User::paginate(15);
    	return view('admin.users')->with(compact('users'));
    }

    public function switch(Request $request){
    	$user = User::find($request->id);
        if ($user->status==0) {
            $user->status = 1;
        }else{
            $user->status = 0;
        }
    	$user->save();
    	return response()->json(['Status Switched Successfully']);
    }

    public function showloginform(){
        return view("user.login");
    }

    public function register(Request $request){
        $request->validate(['name'=>'required','reg_email'=>'required|email','mobile'=>'required','reg_pwd'=>'required','con_pwd'=>'required|same:reg_pwd','captcha'=>'required|captcha']);
        $data = $request->input();
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['reg_email'];
        $user->mobile = $data['mobile'];
        $user->password = Hash::make($data['reg_pwd']);
        $user->save();
        return response()->json(['success' => 'Registered Successfully']);
    }

    public function login(Request $request){
        $creds = $request->only('email','password');
        if (Auth::guard('web')->Attempt($creds)) {
            return redirect()->route('user.dashboard');
        }else{
            return redirect()->route('user.login');
        }
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }
    

    public function orders(){
        $userid = Auth::guard('web')->user()->id;
        $orders = Order::where("userid",$userid)->paginate(15);
        return view("user.orders")->with(compact('orders'));
    }

    public function profile(){
        $userid = Auth::guard('web')->user()->id;
        $user = User::find($userid);
        return view("user.profile")->with(compact('user'));
    }

    public function update_profile(Request $request){
        $user = Auth::guard('web')->user();
        if (!Hash::check($request->pass,$user->password)) {
            return Redirect::back()->withErrors(['wrong_pwd'=>'Current password is wrong']);
        }
        $request->validate(['pass'=>'required','newpass'=>'required|min:6','connewpass'=>'required|same:newpass']);
        
        $user = User::find($user->id);
        $newpass = Hash::make($request->newpass);
        $user->password = $newpass;
        $user->save();
        return Redirect::back()->with(['success'=>'Updated Successfully']);

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
        $userid = Auth::guard('web')->user()->id;
        $total_orders = Order::where('userid',$userid)->count();
        $received_orders = Order::where('userid',$userid)->
                                 where('order_status',4)->count();
        $total_paid = Order::where('userid',$userid)->
                             where('payment_status','paid')->sum('total_price');
        $pending_payments = Order::where('userid',$userid)->
                                 where('payment_status','pending')->sum('total_price');
        return view("user.dashboard",compact('total_orders','received_orders','total_paid','pending_payments'));
    }


}
