@extends('layouts.front_layout')
@section('content')
    
    @include('includes.hero_normal')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{url('/')}}/front_assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="/">User</a>
                            <a href="javascript:void">{{Auth::guard('web')->user()->name}}</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    @if($cart->count()>0)
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form method="post" action="{{route('user.update-cart')}}" id="update-cart-form">
                                    @csrf
                                    @php
                                    $total_price = 0
                                    @endphp
                                @foreach($cart as $cart)
                                <tr class="cart_row">
                                    <td class="shoping__cart__item">
                                        @foreach($cart->foods as $f)
                                        <img src="{{url('/')}}/images/foods/{{$f->image}}" alt="" style="width:100px;">
                                        
                                        <h5>{{$f->name}}</h5>
                                        @endforeach
                                    </td>
                                    <td class="shoping__cart__price">
                                        RS: {{$cart->food_details->price}}
                                        
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="cart_qty[]" value="{{$cart->qty}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        RS: {{$cart->qty*$cart->food_details->price}}
                                    </td>
                                    <td class="shoping__cart__item__close del_cart" cart-id="{{$cart->id}}">
                                        <span class="icon_close"></span>
                                        <input type="hidden" name="cart_id[]" value="{{$cart->id}}">
                                    </td>
                                </tr>
                                @php
                                    $total_price += $cart->qty*$cart->food_details->price
                                @endphp
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{route('shop')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="" onclick="event.preventDefault();document.getElementById('update-cart-form').submit();" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                </form>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>RS: {{$total_price}}</span></li>
                            <li>Total <span>RS: {{$total_price}}</span></li>
                        </ul>
                        <a href="{{route('user.checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <p class="text-center text-danger">Cart is empty!!!!</p>
    @endif
    <!-- Shoping Cart Section End -->
    
@endsection