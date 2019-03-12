@extends('layouts.layout_admin')

@section('content')
<div class="container"><br>
	<h3>Customers List</h3>

	@if(count($users)==0)
	<!-- button export -->
	<a href="{{ route('customers.insert') }}">Export Data From API</a>
	<!-- button export -->
	@endif

	<table class="table table-striped table-bordered">
		<thead align="center">
			<tr>
				<th width="20">No</th>
				<th>Name</th>
				<th>City</th>
				<th>Country</th>
				<th>Username</th>
			</tr>
		</thead>
		<tbody>
			{{!$n=1}}
			@foreach($users as $user)
				<tr>
					<td>{{$n++}}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->city }}</td>
					<td>{{ $user->country }}</td>
					<td>{{ $user->username }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection