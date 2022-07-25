@extends('layouts.admin_layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Foods</h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".AddFoodModal">Add New Food</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="food_body">
                                    @foreach($foods as $food)
                                    <tr>
                                        <td><a href=".FoodDetailModel" data-toggle="modal" data-target=".FoodDetailModel" class="food-name" fid="{{$food->id}}">{{$food->name}}</a>
                                        </td>
                                        
                                        <td>{{$food->category->title}}</td>
                                        <td><img style="height: 50px;" src="/images/foods/{{$food->image}}"></td>
                                        @if ($food->status==1)
                                        <td class="food-switch" edit-id="{{$food->id}}"><input type="checkbox" data-toggle="switchbutton" checked data-onlabel="Active" data-offlabel="InActive" data-width="100" data-size="xs">
                                        </td>
                                        @else
                                        <td class="food-switch" edit-id="{{$food->id}}"><input type="checkbox" data-toggle="switchbutton" data-onlabel="Active" data-offlabel="InActive" data-width="100" data-size="xs">
                                        </td>
                                        @endif
                                        
                                        <td><button class="btn btn-warning btn-sm edit_food_btn" edit-id="{{$food->id}}">Edit</button> <button del-id="{{$food->id}}"  class="btn btn-danger btn-sm delete_food_btn">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$foods->links()}}
                </div>
            </div>
            
        </div>
    </div>
</div>



<!-- Add Food Modal -->
<div class="modal fade AddFoodModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="AddFoodModalLabel">Add Food</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" id="add_food_form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="food_name">Name</label>
                    <input type="text" class="form-control" id="food_name" name="food_name" aria-describedby="emailHelp" placeholder="Food Name">
                </div>
                <div class="form-group">
                    <label for="food_cat">Category</label>
                    <select class="form-control" id="food_cat" name="food_cat">
                        @foreach($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="food_type">Type</label>
                    <select class="form-control" id="food_type" name="food_type">
                        <option value="veg">Veg</option>
                        <option value="nonveg">Non-Veg</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="food_desc">Description</label>
                    <textarea class="form-control" id="food_desc" name="food_desc" placeholder="Short Description..."></textarea>
                </div>
                <div class="form-group">
                    <label for="long_desc">Long Description</label>
                    <textarea class="form-control mytextarea" id="long_desc" name="long_desc" placeholder="Long Description..." rows="10"></textarea>
                </div>
                <!-- <div class="form-group">
                    <label for="weight">Weight (kg)</label>
                    <input type="number" step="0.01" class="form-control" name="weight" id="weight" placeholder="0.5">
                </div> -->
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number"  class="form-control" name="stock" id="stock" placeholder="5">
                </div>
                <div class="form-group">
                    <label for="food_img">Thumbnail Image</label>
                    <input type="file" name="food_img" id="food_img" class="form-control">
                </div>
                <button type="submit" name="add_food_btn" id="add_food_btn" class="btn btn-primary">Add</button>
            </form>
            <div id="food_result"></div>
        </div>
    </div>
  </div>
</div>



<!-- Edit Food Modal -->
<div class="modal fade EditFoodModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="AddFoodModalLabel">Edit Food</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" id="edit_food_form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="food_name">Name</label>
                    <input type="hidden" name="food_id" id="e_food_id">
                    <input type="text" class="form-control" id="e_food_name" name="food_name" aria-describedby="emailHelp" placeholder="Food Name">
                </div>
                <div class="form-group">
                    <label for="food_cat">Category</label>
                    <select class="form-control" id="e_food_cat" name="food_cat">

                    </select>
                </div>
                <div class="form-group">
                    <label for="food_type">Type</label>
                    <select class="form-control" id="e_food_type" name="food_type">
                        <option value="veg">Veg</option>
                        <option value="nonveg">Non-Veg</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="food_desc">Description</label>
                    <textarea class="form-control" id="e_food_desc" name="food_desc" placeholder="Description..."></textarea>
                </div>
                <div class="form-group">
                    <label for="e_long_desc">Long Description</label>
                    <textarea class="form-control mytextarea" id="e_long_desc" name="long_desc" placeholder="Long Description..." rows="10"></textarea>
                </div>
                <!-- <div class="form-group">
                    <label for="e_weight">Weight (kg)</label>
                    <input type="number" step="0.01" class="form-control" name="weight" id="e_weight" placeholder="0.5">
                </div> -->
                <div class="form-group">
                    <label for="e_stock">Stock</label>
                    <input type="number" class="form-control" name="stock" id="e_stock" placeholder="5">
                </div>
                <div class="form-group">
                    <label for="food_img">Thumbnail Image</label>
                    <input type="file" name="food_img" id="e_food_img" class="form-control">
                </div>
                <div class="form-group">
                    <label for="food_imgs">Multiple Images</label>
                    <input type="file" name="food_imgs[]" id="e_food_imgs" class="form-control" multiple>
                </div>
                <div class="form-group">
                    <label for="featured">Make Featured</label>
                    <input type="checkbox" name="featured" id="featured">
                </div>
                <button type="submit" name="update_food_btn" id="update_food_btn" class="btn btn-primary">Update</button>
            </form>
            <div id="e_food_result"></div>
        </div>
    </div>
  </div>
</div>





<!-- Food Details Modal -->
<div class="modal fade FoodDetailModel" tabindex="-1" role="dialog" aria-labelledby="FoodDetailModelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="FoodDetailModelLabel">Food Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" id="food_detail_form" action="{{route('admin.add-food-details')}}">
                @csrf
            <div class="attrib_body">
                
            </div>
            <input type="hidden" name="f_id" id="f_id">
            <button type="submit" class="btn btn-primary mt-2 add_attr_btn" food-id="">Add</button>
            <button class="btn btn-dark mt-2 append_attr_btn">+</button>
            </form>
        </div>
    </div>
  </div>
</div>

@endsection