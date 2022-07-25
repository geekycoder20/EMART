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
                            <span>Dashboard</span>
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
                <h2>Dashboard</h2>
                <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Orders </div>
                            <div class="stat-digit"> <i class="fa"></i>{{$total_orders}}</div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Completed Orders </div>
                            <div class="stat-digit"> <i class="fa"></i>{{$received_orders}}</div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Total Paid </div>
                            <div class="stat-digit"> <i class="fa fa-usd"></i>{{$total_paid}}</div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="stat-widget-two card-body">
                        <div class="stat-content">
                            <div class="stat-text">Pending Payments </div>
                            <div class="stat-digit"> <i class="fa fa-usd"></i>{{$pending_payments}}</div>
                        </div>    
                    </div>
                </div>
            </div>
            
            
            
            <!-- /# column -->
        </div>
            </div>
        </div>
        
        <form method="post" action="{{route('user.logout')}}" id="logout_form">
          @csrf
      </form>
    </div>

@endsection