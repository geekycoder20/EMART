@extends('layouts.admin_layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">My Profile</h4>
                        
                    </div>
                    <div class="card-body">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <form method="post" action="{{route('admin.update_profile')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="f_name">First Name</label>
                                    <input type="text" class="form-control" name="f_name" id="f_name" value="{{$user->fname}}">
                                </div>
                                <div class="form-group">
                                    <label for="l_name">Last Name</label>
                                    <input type="text" class="form-control" name="l_name" id="l_name" value="{{$user->lname}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}" disabled>
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
            </div>
            
        </div>
    </div>
</div>





@endsection