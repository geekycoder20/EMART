<div class="col-md-3">
	<div class="list-group db_body">
		<a href="{{route('dboy.dashboard')}}" class="list-group-item"><i class="fa fa-key"></i> <span>Dashboard</span></a>
		<a href="{{route('dboy.orders')}}" class="list-group-item"><i class="fa fa-compass"></i> <span>My Orders</span></a>
		<a href="{{route('dboy.profile')}}" class="list-group-item"><i class="fa fa-compass"></i> <span>Profile</span></a>
		<a href="#" onclick="event.preventDefault();document.getElementById('logout_form').submit();" class="list-group-item" style="color:red;"><i class="fa fa-compass"></i> <span>Logout</span></a>
	</div>
</div>