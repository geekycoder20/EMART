$(document).ready(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////Users//////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////

//Register Users
	$("#reg_form").submit(function(e){
		e.preventDefault();
       let formData = new FormData(this);
       $.ajax({
          type:'POST',
          url: 'register-user',
          data: formData,
          contentType: false,
          processData: false,
          success:function(data){
           		$("#reg_form")[0].reset();
           		$("#user_result").html("<div class='alert alert-success'>"+data.success+"</div>");
           },
          error:function(data){
          	console.log(data)
				$("#user_result").html("<ul></ul>");
				$.each(data.responseJSON.errors, function(key,value) {
					$('#user_result').append('<li class="text-danger">'+value+'</li');
				});
			}
       });
	});


//Show order details
	$(".user_order_body").on("click",".order-link",function(e){
		let id = $(this).attr("oid");		
		var tbrow = $(this);
		$.ajax({
			url:'user-order-details',
			type:'post',
			data:{id:id},
			success:function(data){
				$("#cancel_btn").attr("oid",data.order.id);
				$(".order_body").html("");
				$(".order_body").append("<div class='row'><div class='col-md-6'><b>Name:</b></div><div class='col-md-6'>"+data.order.name+"</div></div><div class='row'><div class='col-md-6'><b>Email:</b></div><div class='col-md-6'>"+data.order.email+"</div></div><div class='row'><div class='col-md-6'><b>Mobile:</b></div><div class='col-md-6'>"+data.order.mobile+"</div></div><div class='row'><div class='col-md-6'><b>Address:</b></div><div class='col-md-6'>"+data.order.address+"</div></div><div class='row'><div class='col-md-6'><b>Total Price:</b></div><div class='col-md-6'>Rs "+data.order.total_price+"</div></div><div class='row'><div class='col-md-6'><b>Zip Code:</b></div><div class='col-md-6'>"+data.order.zip_code+"</div></div><div class='row'><div class='col-md-6'><b>Payment Status:</b></div><div class='col-md-6'>"+data.order.payment_status+"</div></div></div>");

				var i = 0;
				$(".order_detail_body").html("<tr><th>Food</th><th>Qty</th><th>Total Price</th></tr>");
				$.each(data.order_details, function(key,value) {
					$(".order_detail_body").append("<tr class='order_detail_row'><td>"+value.orderfood.name+"</td><td>"+data.order_details[i].qty+"</td><td>Rs "+data.order_details[i].price+"</td></tr>");	
					i++;
				});

				$(".OrderDetailModel").modal("show");
			}
		});
		
	});



//Cancel Order
	$("#cancel_btn").click(function(){
		let orderid = $(this).attr("oid");
		$.ajax({
			url:'cancel-order',
			type:'post',
			data:{orderid:orderid},
			success:function(data){
				if (data.success) {
					$(".cancel_result").html("<div class='alert alert-success'>Cancelled Successfully.</div>");
				}else{
					$(".cancel_result").html("<div class='alert alert-danger'>"+data+"</div>");
				}
				
			}
		});
	});




////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////Shop//////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
//Apply Filter
	$("#apply_filter").click(function(e){
		e.preventDefault();
		var fdata = new FormData(document.getElementById("filter_form"));
		var rootpath = document.location.hostname;
		var price = 0;
		$.ajax({
			type:'POST',
			url: 'filter-foods',
			data: fdata,
			dataType:'json',
			contentType: false,
			processData: false,
			success:function(data){
				$(".food_body").html("");
				$.each(data.found_foods, function(key,value) {

					$.each(data.found_f_details, function(key2,value2) {
						if (value.id==value2.food_id) {
							price = value2.price;
						}
					});

					$(".food_body").append("<div class='col-lg-4 col-md-6 col-sm-6'><div class='product__item'><div class='product__item__pic set-bg' data-setbg='"+APP_URL+"/images/foods/"+value.image+"'><ul class='product__item__pic__hover'><li><a href='#'><i class='fa fa-heart'/></a></li><li><a href='#'><i class='fa fa-retweet'/></a></li></ul></div><div class='product__item__text'><h6><a href='"+APP_URL+"/food/"+value.slug+"'>"+value.name+"</a></h6><h5>"+'Rs '+price+"</h5></div></div></div>");
					$(".set-bg").last().css("background-image", "url('"+APP_URL+"/images/foods/"+value.image+"')");
				});
			},
			error:function(data){
				console.log(data)
			}
		});
	});



////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////Product Details////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
//
	$(".price_radio").on("click",".price",function(e){
		$(".product__details__price").text("RS "+$(this).attr("price"))
		$(".product__details__price").attr("p-price",$(this).attr("price-id"))
	});

//Add to cart
	$(".add_cart_btn").click(function(e){
		e.preventDefault();
		let price = $(".product__details__price").attr("p-price");
		let qty = $("#cart-qty").val();
		let food_id = $("#food_id").val();
		$.ajax({
			url:'/food-user/add_cart',
			type:'POST',
			data:{price_id:price,qty:qty,food_id:food_id},
			dataType:'json',
			success:function(data){
				console.log(data)
				if (data.success) {
					$(".cart-result").html("<div class='alert alert-success'>"+data.success+"</div>");
					$(".cart-icon-qty").text(parseInt($(".cart-icon-qty").text())+1);
				}else{
					$(".cart-result").html("<div class='alert alert-danger'>"+data.fail+"</div>");
				}
				
				console.log(data)
			},
			error:function(data){
				if (data.responseJSON.message=='Unauthenticated.') {
					window.location.replace("/food-user/login");
				}
				$.each(data.responseJSON.errors, function(key,value) {
					console.log(value)
					$('.cart-result').append('<li class="text-danger">'+value+'</li');
				});
				
			}
		});
	});


//Delete From Cart
	$(".cart_row").on("click",".del_cart",function(e){
		let id = $(this).attr("cart-id");
		var tbrow = $(this);
		$.ajax({
			url:'delete-cart',
			type:'post',
			data:{id:id},
			success:function(data){
				$(tbrow).closest("tr").remove();
			}
		});

	});




////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////Coupen Codes////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
//Apply Coupen Code
	$("#apply_coupen_btn").click(function(){
		let coupen_code = $("#coupen_code").val();
		$.ajax({
			url:'apply_coupen',
			type:'post',
			data:{coupen_code:coupen_code},
			success:function(data){
				if (data>0) {
					$("#coupen_val").text("RS "+data);
					$("#total").text("RS "+($("#total").attr("total")-data));
					$("#coupen_res").html("<div class='alert alert-success'>Applied Successfully.</div>");
					$("#coup_val").val(coupen_code);
				}else{
					$("#coupen_res").html("<div class='alert alert-danger'>"+data+"</div>");
				}
				
			}
		});
	});



////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////Delivery Boys////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
//Change order status to deliver
	$(".dboy_orders_body").on("click",".deliver_btn",function(e){
		let orderid = $(this).attr("order-id");
		var tbrow = $(this);
		$.ajax({
			url:'deliver-order',
			type:'post',
			data:{orderid:orderid},
			success:function(data){
				$(tbrow).parent().html("Delivered");
				
			}
		});
	});


//Show order details
	$(".dboy_orders_body").on("click",".order-link",function(e){
		let id = $(this).attr("oid");
		var tbrow = $(this);
		$.ajax({
			url:'dboy-order-details',
			type:'post',
			data:{id:id},
			success:function(data){
				$(".order_body").html("");
				$(".order_body").append("<div class='row'><div class='col-md-6'><b>Name:</b></div><div class='col-md-6'>"+data.order.name+"</div></div><div class='row'><div class='col-md-6'><b>Email:</b></div><div class='col-md-6'>"+data.order.email+"</div></div><div class='row'><div class='col-md-6'><b>Mobile:</b></div><div class='col-md-6'>"+data.order.mobile+"</div></div><div class='row'><div class='col-md-6'><b>Address:</b></div><div class='col-md-6'>"+data.order.address+"</div></div><div class='row'><div class='col-md-6'><b>Total Price:</b></div><div class='col-md-6'>Rs "+data.order.total_price+"</div></div><div class='row'><div class='col-md-6'><b>Zip Code:</b></div><div class='col-md-6'>"+data.order.zip_code+"</div></div><div class='row'><div class='col-md-6'><b>Payment Status:</b></div><div class='col-md-6'>"+data.order.payment_status+"</div></div></div>");

				var i = 0;
				$(".order_detail_body").html("<tr><th>Food</th><th>Qty</th><th>Total Price</th></tr>");
				$.each(data.order_details, function(key,value) {
					$(".order_detail_body").append("<tr class='order_detail_row'><td>"+value.orderfood.name+"</td><td>"+data.order_details[i].qty+"</td><td>Rs "+data.order_details[i].price+"</td></tr>");	
					i++;
				});

				$(".OrderDetailModel").modal("show");
			}
		});
		
	});



//user review system
var rating_data = 0;
    $(document).on('mouseenter', '.submit_star', function(){
        var rating = $(this).data('rating');
        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_review = $('#user_review').val();

        if(user_review == '')
        {
            alert("Please Fill Review Field");
            return false;
        }
        else if(rating_data==0){
        	alert("Please select at least 1 star");
            return false;
        }
        else
        {
        	let food_id = $("#food_id").val();
        	$.ajax({
			url:'/submit_rating',
			type:'post',
			data:{food_id:food_id,rating_data:rating_data, user_review:user_review},
			success:function(data){
				if (data.fail) {
					$("#reveiew_result").html("<div class='alert alert-danger'>"+data.fail+"</div>");
				}else{
					$("#reveiew_result").html("<div class='alert alert-success'>"+data.success+"</div>");
				}
				
				}
			});

        }

    });




    



});