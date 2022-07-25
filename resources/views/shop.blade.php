@extends('layouts.front_layout')
@section('content')

    @include('includes.hero_normal')
    
    
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{url('/')}}/front_assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                <form id="filter_form">
                                @foreach($categories as $cat)
                                <li>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cats[]" id="cat_link" value="{{$cat->id}}"> {{$cat->title}}
                                    </label>
                                </li>
                                @endforeach
                                
                                
                            </ul>
                        </div>

                        <div class="sidebar__item">
                            <h4>Type</h4>
                            <ul>
                                <li>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="type[]" class="type" value="veg"> Veg
                                    </label>
                                </li>
                                <li>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="type[]" class="type" value="nonveg"> Non Veg
                                    </label>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <button type="submit" class="btn btn-primary" id="apply_filter">Apply</button>
                        </div>
                        </form>
                        
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    
                   
                    <div class="row food_body">
                        @foreach($foods as $food)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{url('/')}}/images/foods/{{$food->image}}" >
                                    
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{route('food-details',$food->slug)}}">{{$food->name}}</a></h6>
                                    <h5>
                                        @if(count($food->food_details)>0)
                                        Rs: {{$food->food_details[0]->price}}
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    {{$foods->links()}}
                    <!-- <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection