@extends('layouts.dboy_layout')
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
            @include('dboy.includes.dboynav')
            <div class="col-md-9">
                <h3>My Orders</h3>
                <table class="table table-bordered table-sm">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Total Price</th>
                        <th>Status</th>
                    </tr>
                    @foreach($orders as $order)
                    <tr class="dboy_orders_body">
                        <td><a href="" oid="{{$order->id}}" onclick="event.preventDefault();" class="order-link">{{$order->id}}</a></td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->mobile}}</td>
                        <td>{{$order->address}}</td>
                        <td>RS: {{$order->total_price}}</td>
                        @if($order->orderstatus->order_status=='Shipped')
                        <td><button class="btn btn-primary btn-sm deliver_btn" order-id="{{$order->id}}">Deliver</button></td>
                        @elseif($order->orderstatus->order_status=='Delivered')
                        <td class="badge badge-success">Delivered</td>
                        @else
                        <td>{{$order->orderstatus->order_status}}</td>
                        @endif
                        
                    </tr>
                    @endforeach
                </table>
                {{$orders->links()}}
            </div>
            
        </div>
        
        <form method="post" action="{{route('dboy.logout')}}" id="logout_form">
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
                <table class="table table-bordered order_detail_body">
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