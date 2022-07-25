<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuickLink;

class QuickLinkController extends Controller
{
    public function index(){
    	$quick_links = QuickLink::all();
    	return view('admin.quick_links')->with(compact('quick_links'));
    }

    public function store(Request $request){
    	$request->validate(['link_title'=>'required|min:3|max:20','link'=>'required|url']);

    	$total_links = QuickLink::all()->count();
    	if ($total_links>=6) {
    		return response()->json(['fail' => 'Maximum 6 links can be added']);
    	}


    	$quick_link = new QuickLink;
        $quick_link->title = $request->link_title;
        $quick_link->link = $request->link;
    	$quick_link->save();
    	return response()->json(['success' => 'Added Successfully','last_id' => $quick_link->id]);
    }

    public function edit(Request $request){
    	$quick_link = QuickLink::find($request->id);
    	return response()->json(['found_link'=>$quick_link]);
    }

    public function update(Request $request){
    	$request->validate(['link_title'=>'required|min:3|max:20','link'=>'required|url']);
    	$quick_link = QuickLink::find($request->link_id);
        $quick_link->title = $request->link_title;
    	$quick_link->link = $request->link;
    	$quick_link->save();
    	return response()->json(['success' => 'Updated Successfully']);
    }

    public function delete(Request $request){
    	$quick_link = QuickLink::find($request->id);
    	$quick_link->delete();
    	return response()->json(['Deleted Successfully']);
    }
}
