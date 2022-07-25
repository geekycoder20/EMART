<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Hash;
use Redirect;

class AdminController extends Controller
{
    public function login(Request $request){
    	$creds = $request->only('email','password');
    	if (Auth::guard('admin')->Attempt($creds)) {
    		return redirect()->route('admin.dashboard');
    	}else{
    		return redirect()->route('admin.login');
    	}
    }

    public function logout(Request $request){
    	Auth::guard('admin')->logout();
    	return redirect()->route('admin.login');
    }

    public function profile(){
        $adminid = Auth::guard('admin')->user()->id;
        $user = Admin::where('id',$adminid)->first();
        return view('admin.profile',compact('user'));
    }

    public function update_profile(Request $request){
        $admin = Auth::guard('admin')->user();
        if (!Hash::check($request->pass,$admin->password)) {
            return Redirect::back()->withErrors(['wrong_pwd'=>'Current password is wrong']);
        }
        $request->validate(['f_name'=>'required','l_name'=>'required','pass'=>'required','newpass'=>'required|min:6','connewpass'=>'required|same:newpass']);
        
        $admin = Admin::find($admin->id);
        $newpass = Hash::make($request->newpass);
        $admin->fname = $request->f_name;
        $admin->lname = $request->l_name;
        $admin->password = $newpass;
        $admin->save();
        return Redirect::back()->with(['success'=>'Updated Successfully']);

    }

}
