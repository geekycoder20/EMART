@extends('layouts.admin_layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="user_body">
                                    @foreach($users as $user)
                                    <tr>
                                        <td><a href="javascript:void(0)">{{$user->name}}</a>
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->mobile}}</td>
                                        @if ($user->status==1)
                                        <td class="user-switch" edit-id="{{$user->id}}"><input type="checkbox" data-toggle="switchbutton" checked data-onlabel="Active" data-offlabel="InActive" data-width="100" data-size="xs">
                                        </td>
                                        @else
                                        <td class="user-switch" edit-id="{{$user->id}}"><input type="checkbox" data-toggle="switchbutton" data-onlabel="Active" data-offlabel="InActive" data-width="100" data-size="xs">
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$users->links()}}

                </div>
            </div>
            
        </div>
    </div>
</div>


@endsection