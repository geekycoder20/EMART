@extends('layouts.admin_layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Coupen Codes</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddCoupenModal">Add New Coupen Code</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Coupen Code</th>
                                        <th>Type</th>
                                        <th>Value</th>
                                        <th>Cart Min</th>
                                        <th>Expiry</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="coupen_body">
                                    @foreach($coupen_codes as $coupen_code)
                                    <tr>
                                        <td><a href="javascript:void(0)">{{$coupen_code->coupen_code}}</a>
                                        </td>
                                        <td>{{$coupen_code->coupen_type}}</td>
                                        <td>{{$coupen_code->coupen_value}}</td>
                                        <td>{{$coupen_code->cart_min_value}}</td>
                                        <td>{{$coupen_code->expired_on}}</td>
                                        @if ($coupen_code->status==1)
                                        <td class="coupen-switch" edit-id="{{$coupen_code->id}}"><input type="checkbox" data-toggle="switchbutton" checked data-onlabel="Active" data-offlabel="InActive" data-width="100" data-size="xs">
                                        </td>
                                        @else
                                        <td class="coupen-switch" edit-id="{{$coupen_code->id}}"><input type="checkbox" data-toggle="switchbutton" data-onlabel="Active" data-offlabel="InActive" data-width="100" data-size="xs">
                                        </td>
                                        @endif
                                        
                                        <td><button class="btn btn-warning btn-sm edit_coupen_btn" edit-id="{{$coupen_code->id}}">Edit</button> <button del-id="{{$coupen_code->id}}"  class="btn btn-danger btn-sm delete_coupen_btn">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$coupen_codes->links()}}
                </div>
            </div>
            
        </div>
    </div>
</div>



<!-- Add coupen Modal -->
<div class="modal fade" id="AddCoupenModal" tabindex="-1" role="dialog" aria-labelledby="AddCoupenModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddCoupenModalLabel">Add Coupen Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form method="post" id="add_coupen_form">
        @csrf
        <div class="form-group">
            <label for="coupen_code">Code</label>
            <input type="text" class="form-control" id="coupen_code" name="coupen_code" aria-describedby="emailHelp" placeholder="Code">
        </div>
        <div class="form-group">
            <label for="coupen_type">Type</label>
            <select class="form-control" id="coupen_type" name="coupen_type">
                <option>F</option>
                <option>P</option>
            </select>
        </div>
        <div class="form-group">
            <label for="coupen_value">Value</label>
            <input type="number" class="form-control" id="coupen_value" name="coupen_value" aria-describedby="emailHelp" placeholder="Value">
        </div>
        <div class="form-group">
            <label for="cart_min_value">Cart Min Value</label>
            <input type="number" class="form-control" id="cart_min_value" name="cart_min_value" aria-describedby="emailHelp" placeholder="Cart min">
        </div>
        <div class="form-group">
            <label for="expired_on">Expiry</label>
            <input type="date" class="form-control" id="expired_on" name="expired_on" aria-describedby="emailHelp" placeholder="Cart min">
        </div>
        <button type="button" name="add_coupen_btn" id="add_coupen_btn" class="btn btn-primary">Add</button>
    </form>
    <div id="coupen_result"></div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>



<!-- Edit coupen Modal -->
<div class="modal fade" id="EditCoupenModal" tabindex="-1" role="dialog" aria-labelledby="EditCoupenModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditCoupenModalLabel">Edit Coupen Code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form method="post" id="edit_coupen_form">
        @csrf
        <div class="form-group">
            <label for="edit_coupen_code">Code</label>
            <input type="hidden" name="coupen_id" id="coupen_id">
            <input type="text" class="form-control" id="edit_coupen_code" name="edit_coupen_code" aria-describedby="emailHelp" placeholder="Code">
        </div>
        <div class="form-group">
            <label for="edit_coupen_type">Type</label>
            <select class="form-control" id="edit_coupen_type" name="edit_coupen_type">
                <option>F</option>
                <option>P</option>
            </select>
        </div>
        <div class="form-group">
            <label for="edit_coupen_value">Value</label>
            <input type="number" class="form-control" id="edit_coupen_value" name="edit_coupen_value" aria-describedby="emailHelp" placeholder="Value">
        </div>
        <div class="form-group">
            <label for="edit_cart_min_value">Cart Min Value</label>
            <input type="number" class="form-control" id="edit_cart_min_value" name="edit_cart_min_value" aria-describedby="emailHelp" placeholder="Cart min">
        </div>
        <div class="form-group">
            <label for="edit_expired_on">Expiry</label>
            <input type="date" class="form-control" id="edit_expired_on" name="edit_expired_on" aria-describedby="emailHelp" placeholder="Cart min">
        </div>
        <button type="button" name="update_coupen_btn" id="update_coupen_btn" class="btn btn-primary">Update</button>
    </form>
    <div id="edit_coupen_result"></div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>


@endsection