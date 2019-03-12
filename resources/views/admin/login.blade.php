@extends('layouts.layout_admin')

@section('content')
<div style="width: 25%; margin: 150px auto;">
	<div align="center">
		<h3>Admin</h3>
		<p>Please Enter username and password</p>
	</div>
	<form action="{{route('admin.login.submit')}}" method="POST">
		@csrf
		<div class="form-group">
			<input type="text" name="username" class="form-control" placeholder="Enter username">
			<input type="password" name="password" class="form-control" placeholder="Enter password">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-info btn-block">Login</button>
		</div>

	</form>
</div>
@endsection