<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Paginate;

class CategoryController extends Controller
{
    public function index(){
    	$categories = Category::paginate(15);
    	return view('admin.categories')->with(compact('categories'));
    }

    public function store(Request $request){
    	$request->validate(['cat_title'=>'required|min:3|max:20|unique:categories,title','cat_order_no'=>'required|numeric','cat_image'=>'required|image']);
    	$category = new Category;
    	$data = $request->input();
        $category->title = $data['cat_title'];
    	$category->order_no = $data['cat_order_no'];
        //upload image
        $imageName = time().'.'.$request->cat_image->extension();  
        $request->cat_image->move(public_path('images/cats'), $imageName);

        $category->image = $imageName;

    	$category->save();
    	return response()->json(['success' => 'Added Successfully','last_id' => $category->id]);
    }

    public function edit(Request $request){
    	$category = Category::find($request->id);
    	return response()->json(['found_cat'=>$category]);
    }

    public function update(Request $request){
    	$request->validate(['edit_cat_title'=>'required|min:3|max:20|unique:categories,title,'.$request->cat_id,'edit_cat_orderno'=>'required|numeric',]);
    	$category = Category::find($request->cat_id);
    	$data = $request->input();
        $category->title = $data['edit_cat_title'];
    	$category->order_no = $data['edit_cat_orderno'];

        if ($request->edit_cat_img) {
            //upload image
            $imageName = time().'.'.$request->edit_cat_img->extension();  
            $request->edit_cat_img->move(public_path('images/cats'), $imageName);
            $category->image = $imageName;
        }
        

    	$category->save();
    	return response()->json(['success' => 'Updated Successfully']);
    }

    public function delete(Request $request){
    	$category = Category::find($request->id);
    	$category->delete();
    	return response()->json(['Deleted Successfully']);
    }

    public function switch(Request $request){
        $category = Category::find($request->id);
        if ($category->status==0) {
            $category->status = 1;
        }else{
            $category->status = 0;
        }
        $category->save();
        return response()->json(['Status Switched Successfully']);
    }
}
