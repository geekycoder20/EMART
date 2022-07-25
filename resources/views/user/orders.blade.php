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
                            <span>Orders</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            @include('user.includes.usernav')
            <div class="col-md-9">
                <h3>My Orders</h3>
                @foreach($orders as $order)
                <div class="container mt-2 p-3 user_order_body" style="background-color: #F5F5F5;">
                    <h6><a href="#" class="order-link" oid="{{$order->id}}" onclick="event.preventDefault();">Order ID: {{$order->id}}</a></h6>
                    <div class="text-right">
                        @if($order->payment_status=='paid')
                    <span class="text-success">{{$order->payment_status}}</span>
                    @else
                    <span class="text-danger">{{$order->payment_status}}</span>
                    @endif
                    </div>
                    <div class="text-right">
                        <form method="post" action="{{route('user.create-invoice')}}">
                            @csrf
                            <input type="hidden" name="orderid" value="{{$order->id}}">
                            <button class="btn btn-sm btn-secondary" type="submit"><i class="fa fa-download"></i></button>
                        </form>
                        
                    </div>
                    
                    <table class="table table-bordered table-sm">
                        <tr>
                            <th>Food</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>
                        @foreach($order->order_details as $order_details)
                        <tr>
                            
                            <td>{{$order_details->orderfood->name}}</td>
                            <td>{{$order_details->qty}}</td>
                            <td>RS: {{$order_details->price}}</td>
                            
                        </tr>
                        @endforeach
                    </table>
                </div>
                @endforeach

                {{$orders->links()}}
            </div>
        </div>
        
        <form method="post" action="{{route('user.logout')}}" id="logout_form">
          @csrf
      </form>
    </div>

<!-- Order Details Modal -->
<div class="modal fade OrderDetailModel" tabindex="-1" role="dialog" aria-labelledby="OrderDetailModelLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="OrderDetailModelLabel">Order Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">            
          </div>
            <div class="container" style="margin-bottom: 10px;">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-danger btn-sm" id="cancel_btn" oid="">Cancel</button>
                    </div>
                    <div class="cancel_result"></div>
                </div>
                <h4>Order</h4>
                <div class="order_body">
                    <div class="row">
                        <div class="col-md-6"><b>Name</b></div>
                        <div class="col-md-6">Ali</div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h4>Details</h4>
                <table class="table table-bordered order_detail_body table-sm">
                    <tr>
                        <th>Food</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>



@endsection