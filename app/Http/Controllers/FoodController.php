<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;
use App\Models\ReviewRating;
use App\Models\FoodGallery;
use Str;



class FoodController extends Controller
{
    public function index(){
    	$categories = Category::where('status',1)->get();
    	$foods = Food::orderBy('id','desc')->paginate(15);
    	return view('admin.foods')->with(compact('foods','categories'));
    }

    public function details($slug){
        $food = Food::where('slug',$slug)->where('status',1)->first();
        //increase food view
        $food->view_count = $food->view_count + 1;
        $food->save();

        $related_products = Food::where('cat_id',$food->cat_id)->where('id','!=',$food->id)->inRandomOrder()->limit(4)->get();
        $all_reviews = ReviewRating::where('foodid',$food->id)->get();
        $total_reviews = $all_reviews->count();
        if ($total_reviews!=0) {
            $avg = $all_reviews->sum('rating') / ($total_reviews * 5) * 5;
        }else{
            $avg = 0;
        }
        return view("details")->with(compact('food','related_products','total_reviews','avg','all_reviews'));
    }

    public function store(Request $request){
    	$request->validate(['food_name'=>'required','food_cat'=>'required|numeric','food_desc'=>'required','long_desc'=>'required|min:40','stock'=>'required','food_img'=>'required|image']);
    	$food = new Food;
    	$data = $request->all();
    	$food->name = $data['food_name'];
    	$food->cat_id = $data['food_cat'];
        $food->type = $data['food_type'];
        $food->desecription = $data['food_desc'];
        $food->long_desc = $data['long_desc'];
        // $food->weight = $data['weight'];
    	$food->instock = $data['stock'];
    	//upload image
    	$imageName = time().'.'.$request->food_img->extension();  
        $request->food_img->move(public_path('images/foods'), $imageName);

    	$food->image = $imageName;
    	$food->save();
    	return response()->json(['success' => 'Added Successfully']);
    }

    public function edit(Request $request){
    	$food = Food::find($request->id);
        $food_cat_id = $food->category->id;
        $all_cats = Category::all();
    	return response()->json(['found_food'=>$food,'all_cats'=>$all_cats,'food_cat_id'=>$food_cat_id]);
    }

    public function update(Request $request){
    	$request->validate(['food_name'=>'required','food_cat'=>'required|numeric','food_desc'=>'required','long_desc'=>'required|min:40','stock'=>'required','food_img'=>'image']);
        
        $food = Food::find($request->id);
        $data = $request->all();
        $food->name = $data['food_name'];
        $food->cat_id = $data['food_cat'];
        $food->type = $data['food_type'];
        $food->desecription = $data['food_desc'];
        $food->long_desc = $data['long_desc'];
        // $food->weight = $data['weight'];
        $food->instock = $data['stock'];
        //upload image
        if ($request->food_img) {
            $imageName = time().'.'.$request->food_img->extension();  
            $request->food_img->move(public_path('images/foods'), $imageName);
            $food->image = $imageName;
        }
        
        if (isset($data['featured']) AND $data['featured']=='on') {
            $food->featured = 1;
        }else{
            $food->featured = 0;
        }
        $food->save();


        //upload multiple images for food
        if ($request->hasfile('food_imgs')) {
            //delete old images and data
            $food_galleries = FoodGallery::where('foodid',$request->id)->get();
            foreach ($food_galleries as $fgallery) {
                $fgallery->delete();
                unlink(public_path('images/foods/gallery/'.$fgallery->image));
            }
            //upload new images and data
            $allowedfileExtension=['jpg','png','jpeg','JPG','PNG'];
            foreach ($request->file('food_imgs') as $myfile) {
                $extension = $myfile->getClientOriginalExtension();
                $name = Str::random().'.'.$extension;
                $check=in_array($extension,$allowedfileExtension);
                if ($check) {
                    $myfile->move(public_path('images/foods/gallery'), $name);
                    $food_gallery = new FoodGallery;
                    $food_gallery->foodid = $request->id;
                    $food_gallery->image = $name;
                    $food_gallery->save();
                }else{
                    return response()->json(['fail' => 'Only jpg and png extensions are allowed']);
                }            
            }
        }
        return response()->json(['success' => 'Updated Successfully']);
    }


    public function delete(Request $request){
    	$food = Food::find($request->id);
    	$food->delete();
    	unlink(public_path()."/images/foods/".$food->image); //delete image of food
    	return response()->json(['Deleted Successfully']);
    }

    public function switch(Request $request){
        $food = Food::find($request->id);
        if ($food->status==0) {
            $food->status = 1;
        }else{
            $food->status = 0;
        }
        $food->save();
        return response()->json(['Status Switched Successfully']);
    }

    public function search(Request $request){
        $keyword = $request->keyword;
        $foods = Food::where("name","LIKE","%$keyword%")->get();
        return view("search")->with(compact('foods'));
    }

}
