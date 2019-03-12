@extends('layouts.layout_admin')

@section('content')
<div class="container"><br>
	<h3>Credits List</h3>

	<table class="table table-striped table-bordered">
		<thead align="center">
			<tr>
				<th width="20">No</th>
				<th>Name</th>
				<th>City</th>
				<th>Country</th>
				<th>Email</th>
				<th>Status</th>
				<th>Date</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			{{!$n=1}}
			@foreach($kredits as $kredit)
				<tr>
					<td>{{$n++}}</td>
					<td>{{ \App\User::find($kredit->user_id)->name }}</td>
					<td>{{ \App\User::find($kredit->user_id)->city }}</td>
					<td>{{ \App\User::find($kredit->user_id)->country }}</td>
					<td>{{ $kredit->email }}</td>
					<td align="center">
						<!-- unprocessed -->
						@if($kredit->status==0)
						<label class="badge badge-primary">unprocessed</label>
						<!-- approve1 -->
						@elseif($kredit->status==1)
						<label class="badge badge-warning">processed</label>
						<!-- approve2 -->
						@elseif($kredit->status==2)
						<label class="badge badge-warning">processed</label>
						<!-- approve3 -->
						@elseif($kredit->status==3)
						<label class="badge badge-success">approved</label>
						<!-- rejected -->
						@else
						<label class="badge badge-danger">rejected</label>
						@endif

					</td>
					<td>{{ date('d M Y', strtotime($kredit->status)) }}</td>
					<td>
						<form action="{{route('credit.approve')}}" method="POST">
							@csrf
							<button type="submit" class="btn btn-primary btn-sm" style="float: left;">Approved</button>
						</form>

						<form action="{{route('credit.delete', $kredit->id)}}" method="POST" onclick="return confirmDelete()">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger btn-sm" style="float: left;">Cancel</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection