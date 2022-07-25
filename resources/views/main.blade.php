@extends('layouts.front_layout')
@section('content')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        @foreach($categories as $cat)
                        <li><a href="{{url('/')}}/category/{{$cat->slug}}">{{$cat->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{route('search-food')}}">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?" name="keyword">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+92 3096021606</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="{{url('/')}}/front_assets/img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="{{route('shop')}}" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach($categories as $cat)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{url('/')}}/images/cats/{{$cat->image}}">
                        <h5><a href="{{url('/')}}/category/{{$cat->slug}}">{{$cat->title}}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Products</h2>
                </div>
                
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($featured_products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{url('/')}}/images/foods/{{$product->image}}">
                        
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{route('food-details',$product->slug)}}">{{$product->name}}</a></h6>
                        <h5>RS: {{$product->food_details[0]->price}}</h5>
                    </div>
                </div>
            </div>
            @endforeach


            
        </div>
         {{$featured_products->links()}}
    </div>
</section>
<!-- Featured Section End -->



<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        
                        <div class="latest-prdouct__slider__item">
                            @foreach($latest_products as $product)
                            <a href="{{route('food-details',$product->slug)}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{url('/')}}/images/foods/{{$product->image}}" style="width: 100px; height: auto;" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$product->name}}</h6>
                                    <span>RS: {{$product->food_details[0]->price}}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="latest-product__text">
                    <h4>Most Viewed Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            @foreach($most_viewed_products as $product)
                            <a href="{{route('food-details',$product->slug)}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{url('/')}}/images/foods/{{$product->image}}" style="width: 100px; height: auto;" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$product->name}}</h6>
                                    <span>RS: {{$product->food_details[0]->price}}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- Latest Product Section End -->


@endsection