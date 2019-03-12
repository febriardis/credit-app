@extends('layouts.layout')

@section('nav-right')
<li class="nav-item">
	<a href="{{route('login')}}" class="nav-link">Login</a>
</li>
@endsection

@section('content')
<div class="container">
	<br>	
	<h3>Welcome 
		@guest
		@else
		<a href="#">{{Auth::user()->name}}</a>
		@endguest
	</h3>
	
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
@endsection