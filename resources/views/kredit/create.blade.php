@extends('layouts.layout')

@section('content')
	<div class="container"><br>
		<h3>Submission Form</h3>
		<form action="{{route('kredit.insert')}}" method="POST">
			@csrf
			<div class="form-group">
				<label for="income">Income:</label>
				<label class="text-danger">{{$errors->first('income')}}</label>
				<input type="number" name="income" id="income" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<label class="text-danger">{{$errors->first('email')}}</label>
				<input type="email" name="email" id="email" class="form-control">
			</div>
			<button type="submit" class="btn btn-info">Submit</button>
		</form>
	</div>
@endsection