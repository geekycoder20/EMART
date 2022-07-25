@extends('layouts.front_layout')
@section('content')

    @include('includes.hero_normal')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{url('/')}}/front_assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$food->name}}</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Category</a>
                            <a href="./index.html">{{$food->category->title}}</a>
                            <span>{{$food->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img style="max-height: 500px;" class="product__details__pic__item--large"
                                src="{{url('/')}}/images/foods/{{$food->image}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach($food->food_images as $f_img)
                            <img style="height: 100px;" data-imgbigurl="{{url('/')}}/images/foods/gallery/{{$f_img->image}}"
                                src="{{url('/')}}/images/foods/gallery/{{$f_img->image}}" alt="">
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$food->name}}</h3>
                        <div class="product__details__rating">
                            <?php 
                            $counter = 0;
                            for($stars=1; $stars<=round($avg / 5 * 5); $stars++){
                                echo "<i class='fa fa-star mystar'></i>";
                                $counter++;
                            }
                            for($counter; 5-$counter; $counter++){
                                echo "<i class='fa fa-star'></i>";
                            }
                            ?>
                            
                            <i style="color: red;">{{round($avg,1)}}/5</i>
                            <span>({{$total_reviews}} reviews)</span>
                        </div>
                        <div>
                            @php($i=0)
                            @foreach($food->food_details as $f_detail)
                            <div class="form-check-inline price_radio">
                                <label class="form-check-label">
                                    <?php 
                                    if ($i==0) {
                                        $check = 'checked';
                                    }else{
                                        $check = '';
                                    }
                                    $i++;

                                     ?>
                                    <input type="radio" <?php echo $check;?> class="form-check-input price" name="optradio" price="{{$f_detail->price}}" price-id="{{$f_detail->id}}">{{$f_detail->attribute}}
                                </label>
                            </div>
                            @endforeach
                            

                        </div>
                        <form method="post" id="add_cart_form">
                            @csrf
                        <div class="product__details__price" p-price="{{$food->food_details[0]->id}}">RS: {{$food->food_details[0]->price}}</div>
                        <p>{{$food->desecription}}</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" id="cart-qty" value="1">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="{{$food->id}}" id="food_id" name="food_id">
                        <a href="#" class="primary-btn add_cart_btn">ADD TO CART</a>
                        </form>
                        <div class="cart-result"></div>
                        <form method="post" action="{{route('user.add_wishlist')}}">
                            @csrf
                            <input type="hidden" name="f_id" value="{{$food->id}}">
                            <button class="heart-icon" type="submit" style="border: none;"><span class="icon_heart_alt"></span></button>
                            <!-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> -->
                        </form>
                        @if($errors->any())
                        <p class="text-danger">{{$errors->first()}}</p>
                        @endif
                        <ul>
                            @if($food->instock>0)
                            <li><b>Availability</b> <span>In Stock</span></li>
                            @else
                            <li><b>Availability</b> <span class="text-danger">Out of Stock</span></li>
                            @endif
                            <!-- <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li> -->
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>({{$total_reviews}})</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{!! $food->long_desc !!}</p>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>

                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            @foreach($all_reviews as $review)
                                            <?php 
                                            $counter = 0;
                                            for($i=1; $i<=$review->rating; $i++){
                                                echo "<i class='fa fa-star mystar'></i>";
                                                $counter++;
                                            }
                                            for($counter; 5-$counter; $counter++){
                                                echo "<i class='fa fa-star'></i>";
                                            }

                                             ?>
                                            <!-- <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> -->
                                            @foreach($review->users as $user)
                                            <p><span>by: </span>{{$user->name}}</p>
                                            @endforeach
                                            
                                            <p>{{$review->review}}</p>
                                            <hr>
                                            @endforeach
                                            
                                        </div>
                                    </div>

                                    @if(Auth::guard('web')->user())
                                    <div class="row">

                                        <div class="col-md-6 offset-md-3">
                                            <h4 class="text-center mt-2 mb-4">Write Review</h4>
                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                                        </h4>
                                        <div class="form-group">
                                            <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                                        </div>
                                        <div class="form-group text-center mt-4">
                                            <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                                        </div>
                                        </div>
                                    </div>
                                    <div id="reveiew_result"></div>
                                    @endif
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($related_products as $product)


                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{url('/')}}/images/foods/{{$product->image}}">
                            
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{route('food-details',$product->slug)}}">{{$product->name}}</a></h6>
                            <h5>RS: {{$product->food_details[0]->price}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection