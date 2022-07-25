@extends('layouts.admin_layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Categories</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddCatModal">Add New Category</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Order Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="cat_body">
                                    @foreach($categories as $cat)
                                    <tr>
                                        <td><a href="javascript:void(0)">{{$cat->title}}</a>
                                        </td>
                                        <td>{{$cat->order_no}}</td>
                                        @if ($cat->status==1)
                                        <td class="cat-switch" edit-id="{{$cat->id}}"><input type="checkbox" data-toggle="switchbutton" checked data-onlabel="Active" data-offlabel="InActive" data-width="100" data-size="xs">
                                        </td>
                                        @else
                                        <td class="cat-switch" edit-id="{{$cat->id}}"><input type="checkbox" data-toggle="switchbutton" data-onlabel="Active" data-offlabel="InActive" data-width="100" data-size="xs">
                                        </td>
                                        @endif
                                        
                                        <td><button class="btn btn-warning btn-sm edit_cat_btn" edit-id="{{$cat->id}}">Edit</button> <button del-id="{{$cat->id}}"  class="btn btn-danger btn-sm delete_cat_btn">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{$categories->links()}}
                </div>
            </div>
            
        </div>
    </div>
</div>



<!-- Add Category Modal -->
<div class="modal fade" id="AddCatModal" tabindex="-1" role="dialog" aria-labelledby="AddCatModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddCatModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form method="post" id="add_cat_form">
        @csrf
        <div class="form-group">
            <label for="cat_title">Title</label>
            <input type="text" class="form-control slug_parent_box" id="cat_title" name="cat_title" aria-describedby="emailHelp" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="cat_order_no">Order Number</label>
            <input type="number" name="cat_order_no" class="form-control" id="cat_order_no" placeholder="Order No">
        </div>
        <div class="form-group">
            <label for="cat_image">Image</label>
            <input type="file" name="cat_image" class="form-control" id="cat_image">
        </div>
        <button type="sbumit" name="add_cat_btn" id="add_cat_btn" class="btn btn-primary">Add</button>
    </form>
    <div id="cat_result"></div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>



<!-- Edit Category Modal -->
<div class="modal fade" id="EditCatModal" tabindex="-1" role="dialog" aria-labelledby="AddCatModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditCatModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form method="post" id="edit_cat_form">
        @csrf
        <div class="form-group">
            <label for="cat_title">Title</label>
            <input type="hidden" name="cat_id" id="cat_id" name="cat_id">
            <input type="text" class="form-control slug_parent_box" id="edit_cat_title" name="edit_cat_title" aria-describedby="emailHelp" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="cat_order_no">Order Number</label>
            <input type="number" name="edit_cat_orderno" class="form-control" id="edit_cat_orderno" placeholder="Order No">
        </div>
        <div class="form-group">
            <label for="cat_order_no">Image</label>
            <input type="file" name="edit_cat_img" class="form-control" id="edit_cat_img">
        </div>
        <button type="submit" name="update_cat_btn" id="update_cat_btn" class="btn btn-primary">Update</button>
    </form>
    <div id="edit_cat_result"></div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>


@endsection