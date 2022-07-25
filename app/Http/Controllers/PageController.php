<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index(){
    	$pages = Page::all();
    	return view("admin.pages",compact('pages'));
    }

    public function store(Request $request){
    	$request->validate(['page_title'=>'required','page_desc'=>'required']);
    	$page = new Page;
    	$page->title = $request->page_title;
    	$page->description = $request->page_desc;
    	$page->save();
    	return response()->json(['success' => 'Added Successfully','last_id' => $page->id]);
    }

    public function edit(Request $request){
    	$page = Page::find($request->id);
    	return response()->json(['found_page'=>$page]);
    }

    public function update(Request $request){
    	$request->validate(['page_title'=>'required','page_desc'=>'required',]);
    	$page = Page::find($request->page_id);
        $page->title = $request->page_title;
    	$page->description = $request->page_desc;
    	$page->save();
    	return response()->json(['success' => 'Updated Successfully']);
    }

    public function delete(Request $request){
    	$page = Page::find($request->id);
    	$page->delete();
    	return response()->json(['Deleted Successfully']);
    }

    public function show($slug){
    	$page = Page::where('slug',$slug)->first();
    	return view('page',compact('page'));
    }
}
