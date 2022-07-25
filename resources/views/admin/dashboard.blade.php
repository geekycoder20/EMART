@extends('layouts.admin_layout')
@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Today Earnings </div>
                            <div class="stat-digit"> <i class="">Rs</i>{{$today_earnings}}</div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">{{date('F')}} Earnings</div>
                            <div class="stat-digit"> <i class="">Rs</i>{{$this_month_earnings}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Earnings</div>
                            <div class="stat-digit"> <i class="">Rs</i> {{$total_earnings}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Pending Payments</div>
                            <div class="stat-digit"> <i class="">Rs</i>{{$pending_payments}}</div>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Categories </div>
                            <div class="stat-digit">{{$total_cats}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Foods</div>
                            <div class="stat-digit">{{$total_foods}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Coupen Codes</div>
                            <div class="stat-digit">{{$total_coupen}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Delivery Boys</div>
                            <div class="stat-digit">{{$total_dboys}}</div>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>
            <!-- /# column -->
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Orders</h4>
                    </div>
                    <div class="card-body">
                        <div class="current-progress">
                            <div class="progress-content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="progress-text">Total</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="current-progressbar">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-primary w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                    {{$total_orders}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="progress-text">Pending</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="current-progressbar">
                                            <div class="progress">
                                                @if($total_orders>0)
                                                <div class="progress-bar progress-bar-danger" style="width:{{$pending_orders/$total_orders*100}}%;" role="progressbar" aria-valuenow="{{$pending_orders/$total_orders*100}}" aria-valuemin="0" aria-valuemax="100">
                                                    {{$pending_orders}}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="progress-text">Packed</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="current-progressbar">
                                            <div class="progress">
                                                @if($total_orders>0)
                                                <div class="progress-bar progress-bar-info" style="width:{{$packed_orders/$total_orders*100}}%;" role="progressbar" aria-valuenow="{{$packed_orders/$total_orders*100}}" aria-valuemin="0" aria-valuemax="100">
                                                    {{$packed_orders}}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="progress-text">Shipped</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="current-progressbar">
                                            <div class="progress">
                                                @if($total_orders>0)
                                                <div class="progress-bar progress-bar-warning" style="width:{{$shipped_orders/$total_orders*100}}%;" role="progressbar" aria-valuenow="{{$shipped_orders/$total_orders*100}}" aria-valuemin="0" aria-valuemax="100">
                                                    {{$shipped_orders}}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="progress-text">Delivered</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="current-progressbar">
                                            <div class="progress">
                                                @if($total_orders>0)
                                                <div class="progress-bar progress-bar-success" style="width:{{$delivered_orders/$total_orders*100}}%;" role="progressbar" aria-valuenow="{{$delivered_orders/$total_orders*100}}" aria-valuemin="0" aria-valuemax="100">
                                                    {{$delivered_orders}}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-content py-2">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="progress-text">Cancelled</div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="current-progressbar">
                                            <div class="progress">
                                                @if($total_orders>0)
                                                <div class="progress-bar progress-bar-danger" style="width:{{$cancelled_orders/$total_orders*100}}%;" role="progressbar" aria-valuenow="{{$cancelled_orders/$total_orders*100}}" aria-valuemin="0" aria-valuemax="100">
                                                    {{$cancelled_orders}}
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Users </div>
                            <div class="stat-digit">{{$total_users}}</div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Active Users</div>
                            <div class="stat-digit">{{$active_users}}</div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>

        

    </div>
</div>
@endsection