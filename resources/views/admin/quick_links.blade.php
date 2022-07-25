@extends('layouts.admin_layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Quick Links</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddLinkModal">Add New Link</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="link_body">
                                    @foreach($quick_links as $quick_link)
                                    <tr>
                                        <td><a href="javascript:void(0)">{{$quick_link->title}}</a>
                                        </td>
                                        <td>{{$quick_link->link}}</td>
                                        <td><button class="btn btn-warning btn-sm edit_link_btn" edit-id="{{$quick_link->id}}">Edit</button> <button del-id="{{$quick_link->id}}"  class="btn btn-danger btn-sm delete_link_btn">Delete</button>
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



<!-- Add Link Modal -->
<div class="modal fade" id="AddLinkModal" tabindex="-1" role="dialog" aria-labelledby="AddLinkModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddLinkModalLabel">Add Quick Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form method="post" id="add_link_form">
        @csrf
        <div class="form-group">
            <label for="link_title">Title</label>
            <input type="text" class="form-control" id="link_title" name="link_title" aria-describedby="emailHelp" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" name="link" class="form-control" id="link" placeholder="https://www.google.com">
        </div>
        
        <button type="submit" name="add_link_btn" id="add_link_btn" class="btn btn-primary">Add</button>
    </form>
    <div id="link_result"></div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>



<!-- Edit Link Modal -->
<div class="modal fade" id="EditLinkModal" tabindex="-1" role="dialog" aria-labelledby="EditLinkModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditLinkModalLabel">Edit Quick Link</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form method="post" id="edit_link_form">
        @csrf
        <div class="form-group">
            <label for="e_link_title">Title</label>
            <input type="hidden" name="link_id" id="link_id">
            <input type="text" class="form-control" id="e_link_title" name="link_title" aria-describedby="emailHelp" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="e_link">Link</label>
            <input type="text" name="link" class="form-control" id="e_link" placeholder="https://www.google.com">
        </div>
        
        <button type="submit" name="update_link_btn" id="update_link_btn" class="btn btn-primary">Update</button>
    </form>
    <div id="e_link_result"></div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>


@endsection