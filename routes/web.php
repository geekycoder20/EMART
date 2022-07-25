<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeliveryBoyController;
use App\Http\Controllers\CoupenCodeController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodDetailController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewRatingController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuickLinkController;
use App\Http\Controllers\WishListController;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Visitor Routes
Route::get("/",[HomePageController::class,'index'])->name('main');
Route::get("/shop",[ShopController::class,'index'])->name('shop');
Route::get("/category/{slug}",[ShopController::class,'shop_by_category'])->name("shop_by_cat");
Route::get("/contact",[ContactController::class,'index'])->name("contact");
Route::post("/add-contact",[ContactController::class,'store'])->name("add-contact");
Route::post("/filter-foods",[ShopController::class,'filter'])->name("filter-foods");
Route::get("/food/{slug}",[FoodController::class,'details'])->name("food-details");
Route::get("/page/{slug}",[PageController::class,'show'])->name("page-show");
Route::get("/search",[FoodController::class,'search'])->name("search-food");
Route::post('/submit_rating',[ReviewRatingController::class,'store'])->name('submit_rating');



//Admin Routes
Route::prefix('food-admin')->name('admin.')->group(function(){
	Route::middleware(['guest:admin'])->group(function(){
		Route::view('login','admin.login')->name('login');
		Route::post('login',[AdminController::class,'login'])->name('check');
	});

	Route::middleware(['auth:admin'])->group(function(){
		//dashboard
		Route::get('dashboard',[AdminDashboardController::class,'index'])->name('dashboard');
		//categories
		Route::get('categories',[CategoryController::class,'index'])->name('categories');
		Route::post('add-cat',[CategoryController::class,'store'])->name('add-cat');
		Route::post('edit-cat',[CategoryController::class,'edit'])->name('edit-cat');
		Route::post('update-cat',[CategoryController::class,'update'])->name('update-cat');
		Route::post('delete-cat',[CategoryController::class,'delete'])->name('delete-cat');
		Route::post('switch-cat-status',[CategoryController::class,'switch'])->name('switch-cat-status');

		//users
		Route::get('users',[UserController::class,'index'])->name('users');
		Route::post('switch-user-status',[UserController::class,'switch'])->name('switch-user-status');

		//delivery boys
		Route::get('delivery_boys',[DeliveryBoyController::class,'index'])->name('delivery_boys');
		Route::post('add-delivery_boy',[DeliveryBoyController::class,'store'])->name('add-delivery_boy');
		Route::post('edit-delivery_boy',[DeliveryBoyController::class,'edit'])->name('edit-delivery_boy');
		Route::post('update-delivery_boy',[DeliveryBoyController::class,'update'])->name('update-delivery_boy');
		Route::post('switch-dboy-status',[DeliveryBoyController::class,'switch'])->name('switch-dboy-status');

		//coupen codes
		Route::get('coupen_codes',[CoupenCodeController::class,'index'])->name('coupen_codes');
		Route::post('add-coupen_code',[CoupenCodeController::class,'store'])->name('add-coupen_code');
		Route::post('edit-coupen_code',[CoupenCodeController::class,'edit'])->name('edit-coupen_code');
		Route::post('update-coupen_code',[CoupenCodeController::class,'update'])->name('update-coupen_code');
		Route::post('delete-coupen_code',[CoupenCodeController::class,'delete'])->name('delete-coupen_code');
		Route::post('switch-coupen-status',[CoupenCodeController::class,'switch'])->name('switch-coupen-status');

		//foods
		Route::get('foods',[FoodController::class,'index'])->name('foods');
		Route::post('add-food',[FoodController::class,'store'])->name('add-food');
		Route::post('edit-food',[FoodController::class,'edit'])->name('edit-food');
		Route::post('update-food',[FoodController::class,'update'])->name('update-food');
		Route::post('delete-food',[FoodController::class,'delete'])->name('delete-food');
		Route::post('switch-food-status',[FoodController::class,'switch'])->name('switch-food-status');
		//food details
		Route::post('add-food-details',[FoodDetailController::class,'add_details'])->name('add-food-details');
		Route::post('food-details',[FoodDetailController::class,'food_details'])->name('food-details');

		//orders
		Route::get('orders',[OrderController::class,'index'])->name('orders');
		Route::post('order-details',[OrderController::class,'order_details'])->name('order-details');
		Route::post('assign-dboy',[OrderController::class,'assign_dboy'])->name('assign-dboy');
		Route::post('update-status',[OrderController::class,'update_status'])->name('update-status');
		Route::post('create-invoice',[OrderController::class,'create_invoice'])->name('create-invoice');

		//pages
		Route::get('pages',[PageController::class,'index'])->name('pages');
		Route::post('add-page',[PageController::class,'store'])->name('add-page');
		Route::post('edit-page',[PageController::class,'edit'])->name('edit-page');
		Route::post('update-page',[PageController::class,'update'])->name('update-page');
		Route::post('delete-page',[PageController::class,'delete'])->name('delete-page');

		//Qucik Links
		Route::get('quick_links',[QuickLinkController::class,'index'])->name('quick_links');
		Route::post('add-link',[QuickLinkController::class,'store'])->name('add-link');
		Route::post('edit-link',[QuickLinkController::class,'edit'])->name('edit-link');
		Route::post('update-link',[QuickLinkController::class,'update'])->name('update-link');
		Route::post('delete-link',[QuickLinkController::class,'delete'])->name('delete-link');
		// Route::post('switch-cat-status',[CategoryController::class,'switch'])->name('switch-cat-status');


		//contact messages
		Route::get('contacts',[ContactController::class,'showcontacts'])->name('contacts');
		Route::post('switch-contact-status',[ContactController::class,'switch'])->name('switch-contact-status');
		Route::post('delete-contact',[ContactController::class,'delete'])->name('delete-contact');

		//Profile
		Route::get('profile',[AdminController::class,'profile'])->name('profile');
		Route::post('update_profile',[AdminController::class,'update_profile'])->name('update_profile');


		Route::post('logout',[AdminController::class,'logout'])->name('logout');

	});
});



//Delivery Boy Routes
Route::prefix('food-dboy')->name('dboy.')->group(function(){
	Route::middleware(['guest:dboy'])->group(function(){
		Route::get('login',[DeliveryBoyController::class,'showloginform'])->name('login');
		Route::post('login',[DeliveryBoyController::class,'login'])->name('check');
	});

	Route::middleware(['auth:dboy'])->group(function(){
		Route::get('dashboard',[DeliveryBoyController::class,'dashboard'])->name('dashboard');
		Route::get('orders',[DeliveryBoyController::class,'orders'])->name('orders');
		Route::get('profile',[DeliveryBoyController::class,'profile'])->name('profile');
		Route::post('deliver-order',[DeliveryBoyController::class,'deliver_order'])->name('deliver-order');
		Route::post('dboy-order-details',[DeliveryBoyController::class,'order_details'])->name('dboy-order-details');

		Route::post('logout',[DeliveryBoyController::class,'logout'])->name('logout');
	});
});




//User Routes
Route::prefix('food-user')->name('user.')->group(function(){
	Route::middleware(['guest:web'])->group(function(){
		Route::get('login',[UserController::class,'showloginform'])->name('login');
		Route::post('register-user',[UserController::class,'register'])->name('register');
		Route::post('login',[UserController::class,'login'])->name('check');
	});


	Route::middleware(['auth:web'])->group(function(){
		Route::get('dashboard',[UserController::class,'dashboard'])->name('dashboard');
		Route::get('orders',[UserController::class,'orders'])->name('orders');
		Route::post('user-order-details',[UserController::class,'order_details'])->name('user-order-details');
		Route::post('cancel-order',[OrderController::class,'cancel'])->name('cancel-order');
		Route::get('profile',[UserController::class,'profile'])->name('profile');
		Route::post('update_profile',[UserController::class,'update_profile'])->name('update_profile');

		Route::get('cart',[CartController::class,'index'])->name('cart');
		Route::post('add_cart',[CartController::class,'store'])->name('add_cart');
		Route::post('delete-cart',[CartController::class,'delete'])->name('delete-cart');
		Route::post('update-cart',[CartController::class,'update'])->name('update-cart');
		Route::get('checkout',[CheckoutController::class,'index'])->name('checkout');
		Route::post('place_order',[OrderController::class,'store'])->name('place_order');
		Route::post('create-invoice',[OrderController::class,'create_invoice'])->name('create-invoice');
		Route::post('apply_coupen',[CoupenCodeController::class,'apply_coupen'])->name('apply_coupen');

		Route::post('add_wishlist',[WishListController::class,'store'])->name('add_wishlist');		
		Route::get('wishlists',[WishListController::class,'index'])->name('wishlists');		
		Route::post('delete_wishlist',[WishListController::class,'delete'])->name('delete_wishlist');		
		


		Route::post('logout',[UserController::class,'logout'])->name('logout');
	});
});