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
                            <span>Profile</span>
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
                <h3>My Profile</h3>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <form method="post" action="{{route('user.update_profile')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" name="fullname" id="name" value="{{$user->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" disabled>
                                </div> 
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control" name="mobile" id="mobile" value="{{$user->mobile}}" disabled>
                                </div> 
                                <div class="form-group">
                                    <label for="pwd">Current Password</label>
                                    <input type="password" class="form-control" name="pass" id="pwd">
                                </div> 
                                <div class="form-group">
                                    <label for="newpwd">New Password</label>
                                    <input type="password" class="form-control" name="newpass" id="newpwd">
                                </div> 
                                <div class="form-group">
                                    <label for="connewpwd">Confirm New Password</label>
                                    <input type="password" class="form-control" name="connewpass" id="connewpwd">
                                </div> 
                                <input type="submit" class="btn btn-primary" value="Update" name="">    
                            </form>
                            @if($errors->any())
                            @foreach($errors->all() as $error)
                            <li class="alert-danger">{{$error}}</li>
                            @endforeach
                            @endif

                            @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{session()->get('success')}}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <form method="post" action="{{route('user.logout')}}" id="logout_form">
          @csrf
      </form>
    </div>

@endsection