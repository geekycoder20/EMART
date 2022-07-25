`@extends('layouts.front_layout')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{url('/')}}/front_assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">User</a>
                            <a href="javascript:void">{{Auth::guard('web')->user()->name}}</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            
            @if($errors->any())
            <p class="text-danger">{{$errors->first()}}</p>
            @endif
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{route('user.place_order')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            
                            <div class="checkout__input">
                                <p>Full Name<span>*</span></p>
                                <input type="text" name="name" value="{{old('name')}}">
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            </div>
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="text" name="email" value="{{old('email')}}">
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                            <div class="checkout__input">
                                <p>Mobile<span>*</span></p>
                                <input type="number" name="mobile" value="{{old('mobile')}}">
                                <span class="text-danger">{{$errors->first('mobile')}}</span>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="address" value="{{old('address')}}">
                                <span class="text-danger">{{$errors->first('address')}}</span>
                                <input type="text" name="address_optional" value="{{old('address_optional')}}" placeholder="Apartment, suite, unite ect (optinal)">
                            </div>
                            <div class="checkout__input">
                                <p>Zip Code<span>*</span></p>
                                <input type="number" placeholder="Zip Code" value="{{old('zipcode')}}" name="zipcode">
                                <span class="text-danger">{{$errors->first('zipcode')}}</span>
                            </div>
                            <input type="hidden" id="coup_val" name="coupen">
                            
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @php($subtotal = null)
                                    @foreach($cart as $cart)
                                    @php ($subtotal += $cart->food_details->price*$cart->qty)
                                    <li>@foreach($cart->foods as $f) {{$f->name}} @endforeach <span>RS: {{$cart->food_details->price*$cart->qty}}</span></li>
                                    @endforeach
                                    
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>RS: {{$subtotal}}</span></div>
                                <div class="checkout__order__subtotal">Coupen <span id="coupen_val">$0</span></div>
                                <div class="checkout__order__total">Total <span total="{{$subtotal}}" id="total">RS: {{$subtotal}}</span></div>
                                
                                <div class="checkout__input__checkbox">
                                    <label for="cod">
                                        Cash on Delivery
                                        <input type="checkbox" checked id="">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>

                            <div class="form-group mt-2">
                                <label for="coupen_code">Coupen Code</label>
                                <input type="text" class="form-control" name="" id="coupen_code" placeholder="Enter Coupen Code">
                                <input type="button" class="btn btn-primary btn-sm" value="Apply" name="" id="apply_coupen_btn">
                            </div>
                            <div id="coupen_res"></div>
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    
@endsection