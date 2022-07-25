@extends('layouts.front_layout')
@section('content')

    @include('includes.hero_normal')
    

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
                    
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{count($foods)}}</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(count($foods)>0)
                        @foreach($foods as $food)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{url('/')}}/images/foods/{{$food->image}}" >
                                    
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{route('food-details',$food->slug)}}">{{$food->name}}</a></h6>
                                    <h5>
                                        @if(count($food->food_details)>0)
                                        RS: {{$food->food_details[0]->price}}
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p style="color:red;">No Product Found in this category</p>
                        @endif
                        
                        
                    </div>
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