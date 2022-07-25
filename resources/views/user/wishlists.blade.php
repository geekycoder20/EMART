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
                            <span>WishLists</span>
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
                <h3>My WishLists</h3>
                <table class="table table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Food</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($wishlists as $wishlist)
                        <tr>
                            <td>{{$wishlist->id}}</td>
                            <td><a href="{{route('food-details',$wishlist->food->slug)}}">{{$wishlist->food->name}}</a></td>
                            <td>
                                <form method="post" action="{{route('user.delete_wishlist')}}">
                                    @csrf
                                    <input type="hidden" name="wishlist_id" value="{{$wishlist->id}}">
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>                

               
            </div>
        </div>
        
        <form method="post" action="{{route('user.logout')}}" id="logout_form">
          @csrf
      </form>
    </div>




@endsection