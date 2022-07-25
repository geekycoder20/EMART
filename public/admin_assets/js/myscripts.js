$(document).ready(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	function convertToSlug(Text) {
		return Text.toLowerCase()
		.replace(/ /g, '-')
		.replace(/[^\w-]+/g, '');
	}

	$(".slug_parent_box").keyup(function() {

		$('.slug_textbox').val(convertToSlug($(this).val()));
		
		// $('.slug_textbox').text($(this).val());
	});
	

	

////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////Categories////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

//Add Categories
	$("#add_cat_form").submit(function(e){
		e.preventDefault();
       	let formData = new FormData(this);
		$.ajax({
			url:'add-cat',
			type:'POST',
			data:formData,
			contentType: false,
           	processData: false,
			success:function(data){
				$("#add_cat_form")[0].reset();
				$("#cat_result").html("<div class='alert alert-success'>"+data.success+"</div>");
				$("#cat_body").append("<tr><td><a href='javascript:void(0)'>"+cattitle+"</a></td><td>"+catorderno+"</td><td class='cat-switch' edit-id='"+data.last_id+"'><input type='checkbox' data-toggle='switchbutton' data-onlabel='Active' data-offlabel='InActive' data-width='100' data-size='xs'></td><td><button class='btn btn-warning btn-sm edit_cat_btn' edit-id='"+data.last_id+"'>Edit</button> <button del-id='"+data.last_id+"'  class='btn btn-danger btn-sm delete_cat_btn'>Delete</button></td></tr>");
				console.log(data.last_id);
			},
			error:function(data){
				$("#cat_result").html("<ul></ul>");
				$.each(data.responseJSON.errors, function(key,value) {
					$('#cat_result').append('<li class="text-danger">'+value+'</li');
				}); 
			}
		});
	});

//Delete Categories
	$("#cat_body").on("click",".delete_cat_btn",function(e){
		let id = $(this).attr("del-id");
		var tbrow = $(this);
		$.ajax({
			url:'delete-cat',
			type:'post',
			data:{id:id},
			success:function(data){
				$(tbrow).closest("tr").remove();
			}
		});
	});


//Edit Categories
	$("#cat_body").on("click",".edit_cat_btn",function(e){
		let id = $(this).attr("edit-id");
		var tbrow = $(this);
		$.ajax({
			url:'edit-cat',
			type:'post',
			data:{id:id},
			success:function(data){
				$("#EditCatModal").modal("show");
				$("#cat_id").val(data.found_cat.id);
				$("#edit_cat_title").val(data.found_cat.title);
				$("#edit_cat_slug").val(data.found_cat.slug);
				$("#edit_cat_orderno").val(data.found_cat.order_no);
			}
		});
	});


//Update Categories
	$("#edit_cat_form").submit(function(e){
		e.preventDefault();
       	let formData = new FormData(this);
		$.ajax({
			url:'update-cat',
			type:'POST',
			data:formData,
			contentType: false,
           	processData: false,
			success:function(data){
				$("#edit_cat_result").html("<div class='alert alert-success'>"+data.success+"</div>");
			},
			error:function(data){
				$("#edit_cat_result").html("<ul></ul>");
				$.each(data.responseJSON.errors, function(key,value) {
					$('#edit_cat_result').append('<li class="text-danger">'+value+'</li');
				});
			}
		});
	});


//Switch Status
	$("#cat_body").on("click",".cat-switch",function(e){
		let id = $(this).attr("edit-id");
		$.ajax({
			url:'switch-cat-status',
			type:'post',
			data:{id:id},
			success:function(data){
				
			}
		});
	});



////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////Users/////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

//Switch Status
	$("#user_body").on("click",".user-switch",function(e){
		let id = $(this).attr("edit-id");
		$.ajax({
			url:'switch-user-status',
			type:'post',
			data:{id:id},
			success:function(data){
				
			}
		});
	});



////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////Delivery Boys////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

//Add Delivery Boys
	$("#add_dboy_btn").click(function(e){
		e.preventDefault();
		let dboy_name = $("#dboy_name").val();
		let dboy_mobile = $("#dboy_mobile").val();
		let dboy_password = $("#dboy_password").val();
		$.ajax({
			url:'add-delivery_boy',
			type:'POST',
			data:{dboy_name:dboy_name,dboy_mobile:dboy_mobile,dboy_password:dboy_password},
			dataType:'json',
			success:function(data){
				$("#add_dboy_form")[0].reset();
				$("#dboy_result").html("<div class='alert alert-success'>"+data.success+"</div>");
				$("#dboy_body").append("<tr><td><a href='javascript:void(0)'>"+dboy_name+"</a></td><td>"+dboy_mobile+"</td><td class='dboy-switch' edit-id='"+data.last_id+"'><input type='checkbox' data-toggle='switchbutton' data-onlabel='Active' data-offlabel='InActive' data-width='100' data-size='xs'></td><td><button class='btn btn-warning btn-sm edit_dboy_btn' edit-id='"+data.last_id+"'>Edit</button></td></tr>");
			},
			error:function(data){
				$("#dboy_result").html("<ul></ul>");
				$.each(data.responseJSON.errors, function(key,value) {
					$('#dboy_result').append('<li class="text-danger">'+value+'</li');
				}); 
			}
		});
	});


//Edit Delivery Boys
	$("#dboy_body").on("click",".edit_dboy_btn",function(e){
		let id = $(this).attr("edit-id");
		var tbrow = $(this);
		$.ajax({
			url:'edit-delivery_boy',
			type:'post',
			data:{id:id},
			success:function(data){
				$("#EditDBoyModal").modal("show");
				$("#dboy_id").val(data.found_dboy.id);
				$("#edit_dboy_name").val(data.found_dboy.name);
				$("#edit_dboy_mobile").val(data.found_dboy.mobile);
			}
		});
	});


//Update Delivery Boys
	$("#update_dboy_btn").click(function(e){
		e.preventDefault();
		let dboyname = $("#edit_dboy_name").val();
		let dboymobile = $("#edit_dboy_mobile").val();
		let dboypassword = $("#edit_dboy_password").val();
		let id = $("#dboy_id").val();
		$.ajax({
			url:'update-delivery_boy',
			type:'POST',
			data:{id:id,dboyname:dboyname,dboymobile:dboymobile,dboypassword:dboypassword},
			dataType:'json',
			success:function(data){
				$("#edit_dboy_result").html("<div class='alert alert-success'>"+data.success+"</div>");
			},
			error:function(data){
				$("#edit_dboy_result").html("<ul></ul>");
				$.each(data.responseJSON.errors, function(key,value) {
					$('#edit_dboy_result').append('<li class="text-danger">'+value+'</li');
				});
			}
		});
	});


//Switch Status
	$("#dboy_body").on("click",".dboy-switch",function(e){
		let id = $(this).attr("edit-id");
		$.ajax({
			url:'switch-dboy-status',
			type:'post',
			data:{id:id},
			success:function(data){
				
			}
		});
	});



////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////Coupen Codes//////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

//Add Coupen Codes
	$("#add_coupen_btn").click(function(e){
		e.preventDefault();
		let coupen_code = $("#coupen_code").val();
		let coupen_type = $("#coupen_type").val();
		let coupen_value = $("#coupen_value").val();
		let cart_min_value = $("#cart_min_value").val();
		let expired_on = $("#expired_on").val();
		$.ajax({
			url:'add-coupen_code',
			type:'POST',
			data:{coupen_code:coupen_code,coupen_type:coupen_type,coupen_value:coupen_value,cart_min_value:cart_min_value,expired_on:expired_on},
			dataType:'json',
			success:function(data){
				$("#add_coupen_form")[0].reset();
				$("#coupen_result").html("<div class='alert alert-success'>"+data.success+"</div>");
				$("#coupen_body").append("<tr> <td><a href='javascript:void(0)'>"+coupen_code+"</a> </td> <td>"+coupen_type+"</td> <td>"+coupen_value+"</td> <td>"+cart_min_value+"</td> <td>"+expired_on+"</td> <td class='coupen-switch' edit-id='"+data.last_id+"'><input type='checkbox' data-toggle='switchbutton' data-onlabel='Active' data-offlabel='InActive' data-width='100' data-size='xs'> </td> <td><button class='btn btn-warning btn-sm edit_coupen_btn' edit-id='"+data.last_id+"'>Edit</button> <button del-id='"+data.last_id+"' class='btn btn-danger btn-sm delete_coupen_btn'>Delete</button> </td> </tr>");
			},
			error:function(data){
				$("#coupen_result").html("<ul></ul>");
				$.each(data.responseJSON.errors, function(key,value) {
					$('#coupen_result').append('<li class="text-danger">'+value+'</li');
				}); 
			}
		});
	});

//Delete Coupen Code
	$("#coupen_body").on("click",".delete_coupen_btn",function(e){
		let id = $(this).attr("del-id");
		var tbrow = $(this);
		$.ajax({
			url:'delete-coupen_code',
			type:'post',
			data:{id:id},
			success:function(data){
				$(tbrow).closest("tr").remove();
			}
		});
	});


//Edit Coupen Code
	$("#coupen_body").on("click",".edit_coupen_btn",function(e){
		let id = $(this).attr("edit-id");
		var tbrow = $(this);
		$.ajax({
			url:'edit-coupen_code',
			type:'post',
			data:{id:id},
			success:function(data){
				$("#EditCoupenModal").modal("show");
				$("#coupen_id").val(data.found_coupen.id);
				$("#edit_coupen_code").val(data.found_coupen.coupen_code);
				$("#edit_coupen_type").val(data.found_coupen.coupen_type);
				$("#edit_coupen_value").val(data.found_coupen.coupen_value);
				$("#edit_cart_min_value").val(data.found_coupen.cart_min_value);
				$("#edit_expired_on").val(data.found_coupen.expired_on);
			}
		});
	});


//Update Coupen Code
	$("#update_coupen_btn").click(function(e){
		e.preventDefault();
		let id = $("#coupen_id").val();
		let coupen_code = $("#edit_coupen_code").val();
		let coupen_type = $("#edit_coupen_type").val();
		let coupen_value = $("#edit_coupen_value").val();
		let cart_min_value = $("#edit_cart_min_value").val();
		let expired_on = $("#edit_expired_on").val();
		$.ajax({
			url:'update-coupen_code',
			type:'POST',
			data:{id:id,coupen_code:coupen_code,coupen_type:coupen_type,coupen_value:coupen_value,cart_min_value:cart_min_value,expired_on:expired_on},
			dataType:'json',
			success:function(data){
				$("#edit_coupen_result").html("<div class='alert alert-success'>"+data.success+"</div>");
			},
			error:function(data){
				$("#edit_coupen_result").html("<ul></ul>");
				$.each(data.responseJSON.errors, function(key,value) {
					$('#edit_coupen_result').append('<li class="text-danger">'+value+'</li');
				}); 
			}
		});
	});


//Switch Status
	$("#coupen_body").on("click",".coupen-switch",function(e){
		let id = $(this).attr("edit-id");
		$.ajax({
			url:'switch-coupen-status',
			type:'post',
			data:{id:id},
			success:function(data){
				
			}
		});
	});


////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////Foods//////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

//Add Foods
	$("#add_food_form").submit(function(e){
		e.preventDefault();
       let formData = new FormData(this);
       $.ajax({
          type:'POST',
          url: 'add-food',
           data: formData,
           contentType: false,
           processData: false,
           success:function(data){
           		$("#add_food_form")[0].reset();
           		$("#food_result").html("<div class='alert alert-success'>"+data.success+"</div>");
           },
           error:function(data){
				$("#food_result").html("<ul></ul>");
				$.each(data.responseJSON.errors, function(key,value) {
					$('#food_result').append('<li class="text-danger">'+value+'</li');
				});
			}
       });
	});

//Delete Food
	$("#food_body").on("click",".delete_food_btn",function(e){
		let id = $(this).attr("del-id");
		var tbrow = $(this);
		$.ajax({
			url:'delete-food',
			type:'post',
			data:{id:id},
			success:function(data){
				$(tbrow).closest("tr").remove();
			}
		});
	});


//Edit Food
	$("#food_body").on("click",".edit_food_btn",function(e){
		let id = $(this).attr("edit-id");
		var tbrow = $(this);
		$.ajax({
			url:'edit-food',
			type:'post',
			data:{id:id},
			success:function(data){
				$(".EditFoodModal").modal("show");
				$("#e_food_id").val(data.found_food.id);
				$("#e_food_name").val(data.found_food.name);
				$("#e_food_cat").html("");
				$("#e_food_type").html("");
				if(data.found_food.featured==1){
					$("#featured").prop("checked",true);
				}else{
					$("#featured").prop("checked",false);
				}
				$.each(data.all_cats, function(key,value) {
					if (data.food_cat_id==value.id) {
						$("#e_food_cat").append("<option value='"+value.id+"' selected>"+value.title+"</option>")
					}else{
						$("#e_food_cat").append("<option value='"+value.id+"'>"+value.title+"</option>");
					}	
				});
				if (data.found_food.type=='veg') {
					$("#e_food_type").html("<option value='veg'>Veg</option><option value='nonveg'>Non-Veg</option>");
				}else{
					$("#e_food_type").html("<option value='nonveg'>Non-Veg</option><option value='veg'>Veg</option>");
				}

				$("#e_food_desc").val(data.found_food.desecription);
				$("#e_long_desc").val(data.found_food.long_desc);
				tinyMCE.activeEditor.setContent(data.found_food.long_desc);
				// $("#e_weight").val(data.found_food.weight);
				$("#e_stock").val(data.found_food.instock);
			}
		});
	});


//Update Foods
	$("#edit_food_form").submit(function(e){
		e.preventDefault();
       let formData = new FormData(this);
       let id = $("#e_food_id").val();
       formData.append('id',id);
       $.ajax({
          type:'POST',
          url: 'update-food',
           data: formData,
           contentType: false,
           processData: false,
           success:function(data){
           		$("#e_food_result").html("<div class='alert alert-success'>"+data.success+"</div>");
           		if (data.fail) {
           			$("#e_food_result").html("<div class='alert alert-danger'>"+data.fail+"</div>");
           		}
           		console.log(data)
           },
           error:function(data){
				$("#e_food_result").html("<ul></ul>");
				$.each(data.responseJSON.errors, function(key,value) {
					$('#e_food_result').append('<li class="text-danger">'+value+'</li');
				});
				console.log(data)
			}
       });
	});


//Switch Food Status
	$("#food_body").on("click",".food-switch",function(e){
		let id = $(this).attr("edit-id");
		$.ajax({
			url:'switch-food-status',
			type:'post',
			data:{id:id},
			success:function(data){
				
			}
		});
	});



//Append Food Details
	$(".append_attr_btn").click(function(e){
		e.preventDefault();
       	$(".attrib_body").append("<div class='row mb-1'> <div class='col-md-7'> <input type='text' class='form-control' name='attribute[]' id='attribute' placeholder='Attribute'> </div> <div class='col-md-3'> <input type='number' class='form-control' name='attr_price[]' id='attr_price' placeholder='Price'> </div> <div class='col-md-2'><button class='btn btn-danger remove_attr_btn' style='font-size: 10px;'>&#10006;</button></div> </div>");
	});

//Show Food Details
	$("#food_body").on("click",".food-name",function(e){
		let foodid = $(this).attr("fid");
		$("#f_id").val(foodid);
		$(".attrib_body").html("");
		$.ajax({
			url:'food-details',
			type:'post',
			data:{foodid:foodid},
			dataType:'json',
			success:function(data){
				$.each(data.food_details, function(key,value) {
					$(".attrib_body").append("<div class='row mb-1'> <div class='col-md-7'> <input type='text' value='"+value.attribute+"' class='form-control' name='attribute[]' id='attribute' placeholder='Attribute'> </div> <div class='col-md-3'> <input type='number' value='"+value.price+"' class='form-control' name='attr_price[]' id='attr_price' placeholder='Price'> </div> <div class='col-md-2'><button class='btn btn-danger remove_attr_btn' style='font-size: 10px;'>&#10006;</button></div> </div>");
				});
			}
		});
	});


//Remove Food Details attribute
	$(".attrib_body").on("click",".remove_attr_btn",function(e){
		e.preventDefault();
		$(this).closest('.row').remove()
	});


////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////Orders//////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
//Show Order Details
	$("#order_body").on("click",".order-name",function(e){
		let id = $(this).attr("oid");
		var tbrow = $(this);
		$.ajax({
			url:'order-details',
			type:'post',
			data:{id:id},
			success:function(data){
				console.log(data);
				$("#ord_id").val(data.order.id);
				$("#dboy_body").html("");
				$.each(data.dboys, function(key,value) {
					$("#dboy_body").append("<option value='"+value.id+"'>"+value.name+" ("+value.mobile+")"+"</option>");
				});

				$("#orderstatus_body").html("");
				$.each(data.order_statuses, function(key,value) {
					$("#orderstatus_body").append("<option value='"+value.id+"'>"+value.order_status+"</option>");
				});

				$(".order_body").html("");
				$(".order_body").append("<div class='row'><div class='col-md-6'><b>Name:</b></div><div class='col-md-6'>"+data.order.name+"</div></div><div class='row'><div class='col-md-6'><b>Email:</b></div><div class='col-md-6'>"+data.order.email+"</div></div><div class='row'><div class='col-md-6'><b>Mobile:</b></div><div class='col-md-6'>"+data.order.mobile+"</div></div><div class='row'><div class='col-md-6'><b>Address:</b></div><div class='col-md-6'>"+data.order.address+"</div></div><div class='row'><div class='col-md-6'><b>Total Price:</b></div><div class='col-md-6'>Rs "+data.order.total_price+"</div></div><div class='row'><div class='col-md-6'><b>Zip Code:</b></div><div class='col-md-6'>"+data.order.zip_code+"</div></div><div class='row'><div class='col-md-6'><b>Payment Status:</b></div><div class='col-md-6'>"+data.order.payment_status+"</div></div><div class='row'><div class='col-md-6'><b>Delivery Boy:</b></div><div class='col-md-6'>"+data.dboy+"</div></div>");
				var i = 0;
				$(".order_detail_body").html("<tr><th>Food</th><th>Qty</th><th>Total Price</th></tr>");
				$.each(data.order_food, function(key,value) {
					$(".order_detail_body").append("<tr class='order_detail_row'><td>"+value.name+"</td><td>"+data.order_details[i].qty+"</td><td>Rs "+data.order_details[i].price+"</td></tr>");	
					i++;
				});
				$(".OrderDetailModel").modal("show");
			}
		});
	});


//Assign Delivery Boy to order
	$("#assign_dboy_form").submit(function(e){
		e.preventDefault();
		let id = $("#dboy_body").val();
		let orderid = $("#ord_id").val();
		$.ajax({
			url:'assign-dboy',
			type:'post',
			data:{id:id,orderid:orderid},
			success:function(data){
				$("#dboy_res").html("<div class='alert alert-success'>"+data.success+"</div>");
			}
		});
	});


//Update Status of Order
	$("#update_order_status_form").submit(function(e){
		e.preventDefault();
		let statusid = $("#orderstatus_body").val();
		let orderid = $("#ord_id").val();
		$.ajax({
			url:'update-status',
			type:'post',
			data:{statusid:statusid,orderid:orderid},
			success:function(data){
				$("#ostatus_res").html("<div class='alert alert-success'>"+data.success+"</div>");
				console.log(data);
			}
		});
	});



////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////Pages//////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
//Add Pages
	$("#add_page_form").submit(function(e){
		e.preventDefault();
       	let formData = new FormData(this);
		$.ajax({
			url:'add-page',
			type:'POST',
			data:formData,
			contentType: false,
           	processData: false,
			success:function(data){
				console.log(data)
				$("#add_page_form")[0].reset();
				$("#page_result").html("<div class='alert alert-success'>"+data.success+"</div>");
				
			},
			error:function(data){
				$("#page_result").html("<ul></ul>");
				$.each(data.responseJSON.errors, function(key,value) {
					$('#page_result').append('<li class="text-danger">'+value+'</li');
				}); 
			}
		});
	});


//Edit Pages
	$("#page_body").on("click",".edit_page_btn",function(e){
		let id = $(this).attr("edit-id");
		var tbrow = $(this);
		$.ajax({
			url:'edit-page',
			type:'post',
			data:{id:id},
			success:function(data){
				$("#EditPageModal").modal("show");
				$("#page_id").val(data.found_page.id);
				$("#edit_page_title").val(data.found_page.title);
				$("#edit_page_desc").val(data.found_page.description);
				tinyMCE.activeEditor.setContent(data.found_page.description);
			}
		});
	});


//Update Pages
	$("#edit_page_form").submit(function(e){
		e.preventDefault();
       	let formData = new FormData(this);
		$.ajax({
			url:'update-page',
			type:'POST',
			data:formData,
			contentType: false,
           	processData: false,
			success:function(data){
				$("#e_page_result").html("<div class='alert alert-success'>"+data.success+"</div>");
			},
			error:function(data){
				$("#e_page_result").html("<ul></ul>");
				$.each(data.responseJSON.errors, function(key,value) {
					$('#e_page_result').append('<li class="text-danger">'+value+'</li');
				});
			}
		});
	});



//Delete Pages
	$("#page_body").on("click",".delete_page_btn",function(e){
		let id = $(this).attr("del-id");
		var tbrow = $(this);
		$.ajax({
			url:'delete-page',
			type:'post',
			data:{id:id},
			success:function(data){
				$(tbrow).closest("tr").remove();
			}
		});
	});



////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////Quick Links//////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
//Add Links
	$("#add_link_form").submit(function(e){
		e.preventDefault();
       	let formData = new FormData(this);
		$.ajax({
			url:'add-link',
			type:'POST',
			data:formData,
			contentType: false,
           	processData: false,
			success:function(data){
				console.log(data)
				if (data.fail) {
					$("#link_result").html("<div class='alert alert-danger'>"+data.fail+"</div>");
				}else{
					$("#add_link_form")[0].reset();
					$("#link_result").html("<div class='alert alert-success'>"+data.success+"</div>");
				}
				
				
			},
			error:function(data){
				$("#link_result").html("<ul></ul>");
				$.each(data.responseJSON.errors, function(key,value) {
					$('#link_result').append('<li class="text-danger">'+value+'</li');
				}); 
			}
		});
	});


//Edit Links
	$("#link_body").on("click",".edit_link_btn",function(e){
		let id = $(this).attr("edit-id");
		var tbrow = $(this);
		$.ajax({
			url:'edit-link',
			type:'post',
			data:{id:id},
			success:function(data){
				$("#EditLinkModal").modal("show");
				$("#link_id").val(data.found_link.id);
				$("#e_link_title").val(data.found_link.title);
				$("#e_link").val(data.found_link.link);
			}
		});
	});


//Update Links
	$("#edit_link_form").submit(function(e){
		e.preventDefault();
       	let formData = new FormData(this);
		$.ajax({
			url:'update-link',
			type:'POST',
			data:formData,
			contentType: false,
           	processData: false,
			success:function(data){
				$("#e_link_result").html("<div class='alert alert-success'>"+data.success+"</div>");
			},
			error:function(data){
				$("#e_link_result").html("<ul></ul>");
				$.each(data.responseJSON.errors, function(key,value) {
					$('#e_link_result').append('<li class="text-danger">'+value+'</li');
				});
			}
		});
	});


//Delete Links
	$("#link_body").on("click",".delete_link_btn",function(e){
		let id = $(this).attr("del-id");
		var tbrow = $(this);
		$.ajax({
			url:'delete-link',
			type:'post',
			data:{id:id},
			success:function(data){
				$(tbrow).closest("tr").remove();
			}
		});
	});




////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////Contacts//////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
//Switch Contact Status
	$("#contact_body").on("click",".contact-switch",function(e){
		let id = $(this).attr("edit-id");
		$.ajax({
			url:'switch-contact-status',
			type:'post',
			data:{id:id},
			success:function(data){
				
			}
		});
	});


//Delete Contact
	$("#contact_body").on("click",".delete_contact_btn",function(e){
		let id = $(this).attr("del-id");
		var tbrow = $(this);
		$.ajax({
			url:'delete-contact',
			type:'post',
			data:{id:id},
			success:function(data){
				$(tbrow).closest("tr").remove();
			}
		});
	});



});