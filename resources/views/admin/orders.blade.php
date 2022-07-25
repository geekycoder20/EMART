@extends('layouts.admin_layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Total Price</th>
                                        <th>Payment Stauts</th>
                                        <th>Order Status</th>
                                        <th>Invoice</th>
                                    </tr>
                                </thead>
                                <tbody id="order_body">
                                    @foreach($orders as $order)
                                    <tr>
                                        <td><a href="javascript:void" class="order-name" oid="{{$order->id}}">{{$order->id}}</a></td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->mobile}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>RS: {{$order->total_price}}</td>

                                        @if($order->payment_status=='pending')
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        @else
                                        <td><span class="badge badge-success">Paid</span></td>
                                        @endif

                                        @if($order->orderstatus->order_status=='Pending')
                                        <td><span class="badge badge-warning">{{$order->orderstatus->order_status}}</span></td>
                                        @elseif($order->orderstatus->order_status=='Delivered')
                                        <td><span class="badge badge-success">{{$order->orderstatus->order_status}}</span></td>
                                        @elseif($order->orderstatus->order_status=='Cancelled')
                                        <td><span class="badge badge-danger">{{$order->orderstatus->order_status}}</span></td>
                                        @else
                                        <td>{{$order->orderstatus->order_status}}</td>
                                        @endif
                                        <td>
                                            <form method="post" action="{{route('admin.create-invoice')}}">
                                                @csrf
                                                <input type="hidden" name="orderid" value="{{$order->id}}">
                                                <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-download"></i></button>
                                            </form>
                                        </td>
                                        
                                        
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$orders->links()}}
                </div>
            </div>
            
        </div>
    </div>
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
            <input type="hidden" id="ord_id" name="">
            <div class="container">
                <h6>Assign Delivery Boy</h6>
                <form method="post" id="assign_dboy_form">
                <div class="row">
                    <div class="col-md-9">
                        <select class="form-control" id="dboy_body" name="dboy"></select>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" value="Assign" class="btn btn-primary btn-sm" name="">
                    </div> 
                </div>
                </form>
            </div>
            <div id="dboy_res"></div>

            <div class="container mt-2">
                <h6>Update Order Status</h6>
                <form method="post" id="update_order_status_form">
                    @csrf
                <div class="row">
                    <div class="col-md-9">
                        <select class="form-control" id="orderstatus_body" name="orderstatus"></select>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" value="Update" class="btn btn-primary btn-sm" name="">
                    </div> 
                </div>
                </form>
            </div>
            <div id="ostatus_res"></div>

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