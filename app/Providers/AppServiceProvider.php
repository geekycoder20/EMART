<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) 
        {
            $usercartprice = 0;
            if (Auth::guard('web')->user()) {
                $cartcount=\App\Models\Cart::where('user_id', Auth::guard('web')->user()->id)->get()->count();
                $view->with('cartcount', $cartcount );

                $wishlistcount=\App\Models\WishList::where('user_id', Auth::guard('web')->user()->id)->get()->count();
                $view->with('wishlistcount', $wishlistcount );

                
                
                $food_details=\App\Models\FoodDetail::all();
                $cartitems=\App\Models\Cart::where('user_id', Auth::guard('web')->user()->id)->get();
                foreach ($food_details as $f_detail) {
                    foreach ($cartitems as $cartitem) {
                        if ($cartitem->food_details_id==$f_detail->id) {
                            $usercartprice += ($f_detail->price * $cartitem->qty);
                        }
                    }
                }

                $view->with('usercartprice', $usercartprice );


            }else{
                $view->with('cartcount', 0 ); 
                $view->with('wishlistcount', 0 ); 
                $view->with('usercartprice', $usercartprice );
            }

            $universal_categories = \App\Models\Category::where('status',1)->get();
            $view->with('universal_categories', $universal_categories ); 

            $universal_pages = \App\Models\Page::all();
            $view->with('universal_pages', $universal_pages ); 

            $universal_links = \App\Models\QuickLink::all();
            $view->with('universal_links', $universal_links ); 

            // Paginator::useBootstrap();
            Paginator::useBootstrap();

            
        });  
    }




}
