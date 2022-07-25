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
                            <span>Login</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <div class="row">
      <div class="col-md-4 mx-auto">
        <div class="tab-pane fade show active" id="pills-signin" role="tabpanel" aria-labelledby="pills-signin-tab">
        <div class="col-sm-12 border shadow rounded pt-2" style="border: 1px solid #7FAD39;">
          <form method="post" id="singninFrom" action="{{route('dboy.check')}}">
            @csrf
            <div class="form-group">
              <label class="font-weight-bold">Mobile <span class="text-danger">*</span></label>
              <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter your mobile number" required>
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
              </div>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" value="Sign In" class="btn btn-block" style="background: #7FAD39; color: white;">
            </div>
          </form>
        </div>
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