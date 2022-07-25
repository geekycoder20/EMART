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
                            <span>Login</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

<div class="container mt-2 mb-4" id="login_and_reg">
  <div class="col-sm-6 ml-auto mr-auto">
    <ul class="nav nav-pills nav-fill mb-1" id="pills-tab" role="tablist" style="background: #7FAD39; color: white;">
      <li class="nav-item" > <a class="nav-link active" id="pills-signin-tab" data-toggle="pill" href="#pills-signin" role="tab" aria-controls="pills-signin" aria-selected="true" style="color:white;">Sign In</a> </li>
      <li class="nav-item"> <a class="nav-link" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false" style="color:white;">Sign Up</a> </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-signin" role="tabpanel" aria-labelledby="pills-signin-tab">
        <div class="col-sm-12 border shadow rounded pt-2" style="border: 1px solid #7FAD39;">
          <form method="post" id="singninFrom" action="{{route('user.check')}}">
            @csrf
            <div class="form-group">
              <label class="font-weight-bold">Email <span class="text-danger">*</span></label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Enter valid email" required>
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Password <span class="text-danger">*</span></label>
              <input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col">
                  <label><input type="checkbox" name="condition" id="condition"> Remember me.</label>
                </div>
                <div class="col text-right"> <a href="javascript:;" data-toggle="modal" data-target="#forgotPass">Forgot Password?</a> </div>
              </div>

              @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
              @endif

              

            </div>
            <div class="form-group">
              <input type="submit" name="submit" value="Sign In" class="btn btn-block" style="background: #7FAD39; color: white;">
            </div>

            @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

          </form>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
        <div class="col-sm-12 border shadow rounded pt-2" style="border: 1px solid #7FAD39;">
          <form method="post" id="reg_form">
            @csrf
            <div class="form-group">
              <label class="font-weight-bold">Name <span class="text-danger">*</span></label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Enter Full Name" >
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Email <span class="text-danger">*</span></label>
              <input type="email" name="reg_email" id="reg_email" class="form-control" placeholder="Enter Valid Email" >
<!--               <div class="text-danger"><em>This will be your login name!</em></div>
 -->            </div>
            <div class="form-group">
              <label class="font-weight-bold">Phone #</label>
              <input type="text" name="mobile" id="mobile" class="form-control" placeholder="03451234567">
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Password <span class="text-danger">*</span></label>
              <input type="password" name="reg_pwd" id="reg_pwd" class="form-control" placeholder="***********" 
                >
            </div>
            <div class="form-group">
              <label class="font-weight-bold">Confirm Password <span class="text-danger">*</span></label>
              <input type="password" name="con_pwd" id="con_pwd" class="form-control" placeholder="***********" >
            </div>
            <span>{!! captcha_img() !!}</span>
            <div class="form-group">
              <label class="font-weight-bold">Captcha <span class="text-danger">*</span></label>
              <input type="text" name="captcha">
            </div>
            <!-- <div class="form-group">
              <label><input type="checkbox" name="signupcondition" id="signupcondition" required> I agree with the <a href="javascript:;">Terms &amp; Conditions</a> for Registration.</label>
            </div> -->
            <div class="form-group">
              <input type="submit" name="reg_btn" id="reg_btn" value="Sign Up" class="btn btn-block" style="background: #7FAD39; color: white;">
            </div>

          </form>
          <div id="user_result">
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="forgotPass" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form method="post" id="forgotpassForm" action="{{ route('password.email') }}">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Forgot Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Email <span class="text-danger">*</span></label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Enter your valid email..." required>
            </div>
            <div class="form-group">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="forgotPass" class="btn" style="background: #7FAD39; color: white;"><i class="fa fa-envelope"></i> Send Request</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
    
<style type="text/css">
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #000;
}
#login_and_reg > a {
    color: #fff;
    text-decoration: none;
    background-color: transparent;
}
</style>

@endsection