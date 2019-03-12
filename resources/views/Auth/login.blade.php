@extends('layouts.layout')
  
@section('content')
  <div class="container">
    <div style="width: 50%; margin-top: 20px">
      <h2>Login</h2>
      <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
        </div>
        <div class="form-group form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
          </label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
  <!--       <a class="btn btn-link" href="">
          {{ __('Forgot Your Password?') }}
        </a> -->
      </form>
    </div>
  </div>
@endsection