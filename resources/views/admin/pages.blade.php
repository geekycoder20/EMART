@extends('layouts.admin_layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pages</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddPageModal">Add New Page</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="page_body">
                                    @foreach($pages as $page)
                                    <tr>
                                        <td><a href="javascript:void(0)">{{$page->title}}</a>
                                        </td>
                                        <td>{{$page->slug}}</td>
                                        <td><button class="btn btn-warning btn-sm edit_page_btn" edit-id="{{$page->id}}">Edit</button> <button del-id="{{$page->id}}"  class="btn btn-danger btn-sm delete_page_btn">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                   
                </div>
            </div>
            
        </div>
    </div>
</div>



<!-- Add Page Modal -->
<div class="modal fade" id="AddPageModal" tabindex="-1" role="dialog" aria-labelledby="AddPageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddPageModalLabel">Add Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form method="post" id="add_page_form">
        @csrf
        <div class="form-group">
            <label for="page_title">Title</label>
            <input type="text" class="form-control slug_parent_box" id="page_title" name="page_title" aria-describedby="emailHelp" placeholder="Title">
        </div>
        <!-- <div class="form-group">
            <label for="page_slug">Slug</label>
            <input type="text" name="page_slug" class="form-control" id="page_slug" placeholder="slug">
        </div> -->
        <div class="form-group">
            <label for="page_desc">Description</label>
            <textarea name="page_desc" class="form-control mytextarea" id="page_desc"></textarea>
        </div>
        
        <button type="submit" name="add_page_btn" id="add_page_btn" class="btn btn-primary">Add</button>
    </form>
    <div id="page_result"></div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>




<!-- Edit Page Modal -->
<div class="modal fade" id="EditPageModal" tabindex="-1" role="dialog" aria-labelledby="EditPageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditPageModalLabel">Edit Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form method="post" id="edit_page_form">
        @csrf
        <div class="form-group">
            <label for="page_title">Title</label>
            <input type="hidden" id="page_id" name="page_id">
            <input type="text" class="form-control slug_parent_box" id="edit_page_title" name="page_title" aria-describedby="emailHelp" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="page_desc">Description</label>
            <textarea name="page_desc" class="form-control mytextarea" id="edit_page_desc"></textarea>
        </div>
        
        <button type="submit" name="edit_page_btn" id="edit_page_btn" class="btn btn-primary">Update</button>
    </form>
    <div id="e_page_result"></div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>




@endsection