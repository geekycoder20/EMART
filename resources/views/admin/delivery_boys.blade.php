@extends('layouts.admin_layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Delivery Boys</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddDBoyModal">Add New Delivery Boy</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dboy_body">
                                    @foreach($delivery_boys as $dboy)
                                    <tr>
                                        <td><a href="javascript:void(0)">{{$dboy->name}}</a>
                                        </td>
                                        <td>{{$dboy->mobile}}</td>
                                        @if ($dboy->status==1)
                                        <td class="dboy-switch" edit-id="{{$dboy->id}}"><input type="checkbox" data-toggle="switchbutton" checked data-onlabel="Active" data-offlabel="InActive" data-width="100" data-size="xs">
                                        </td>
                                        @else
                                        <td class="dboy-switch" edit-id="{{$dboy->id}}"><input type="checkbox" data-toggle="switchbutton" data-onlabel="Active" data-offlabel="InActive" data-width="100" data-size="xs">
                                        </td>
                                        @endif
                                        
                                        <td><button class="btn btn-warning btn-sm edit_dboy_btn" edit-id="{{$dboy->id}}">Edit</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$delivery_boys->links()}}

                </div>
            </div>
            
        </div>
    </div>
</div>



<!-- Add Delivery Boy Modal -->
<div class="modal fade" id="AddDBoyModal" tabindex="-1" role="dialog" aria-labelledby="AddDBoyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddDBoyModalLabel">Add Delivery Boy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form method="post" id="add_dboy_form">
        @csrf
        <div class="form-group">
            <label for="dboy_name">Name</label>
            <input type="text" class="form-control" id="dboy_name" name="dboy_title" aria-describedby="emailHelp" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="dboy_mobile">Mobile</label>
            <input type="text" name="dboy_mobile" class="form-control" id="dboy_mobile" placeholder="Mobile Number">
        </div>
        <div class="form-group">
            <label for="dboy_password">Password</label>
            <input type="password" name="dboy_password" class="form-control" id="dboy_password" placeholder="***********">
        </div>
        <button type="button" name="add_dboy_btn" id="add_dboy_btn" class="btn btn-primary">Add</button>
    </form>
    <div id="dboy_result"></div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>



<!-- Edit Delivery Boy Modal -->
<div class="modal fade" id="EditDBoyModal" tabindex="-1" role="dialog" aria-labelledby="EditBoyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditDBoyModalLabel">Edit Delivery Boy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form method="post" id="edit_dboy_form">
        @csrf
        <div class="form-group">
            <label for="dboy_name">Name</label>
            <input type="hidden" id="dboy_id" name="dboy_id">
            <input type="text" class="form-control" id="edit_dboy_name" name="dboy_title" aria-describedby="emailHelp" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="dboy_mobile">Mobile</label>
            <input type="text" name="dboy_mobile" class="form-control" id="edit_dboy_mobile" placeholder="Mobile Number">
        </div>
        <div class="form-group">
            <label for="dboy_password">Password</label>
            <input type="password" name="dboy_password" class="form-control" id="edit_dboy_password" placeholder="***********">
        </div>
        <button type="button" name="update_dboy_btn" id="update_dboy_btn" class="btn btn-primary">Update</button>
    </form>
    <div id="edit_dboy_result"></div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>


@endsection