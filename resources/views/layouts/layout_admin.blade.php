<!DOCTYPE html>
<html lang="en">
<head>
  <title>Test-CBN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="#">Test-CBN | 
      @guest
        Admin
      @else
        Dashboard
      @endguest
    </a>
    <!-- Brand/logo -->

    <!-- link right -->
    @guest
    @else
    <ul class="navbar-nav mr-auto"></ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          {{Auth::user()->name}}
        </a>
        <div class="dropdown-menu">
          <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">{{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
    </ul>
    <!-- /link right -->
    @endguest
  </nav>

  <!-- content -->
  <div class="content">
    @guest
      @yield('content')
    @else
    <div style="float: left; margin: 20px; width: 20%">
      <div class="list-group">
        <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action">Dashboard</a>
        <a href="{{route('customers.index')}}" class="list-group-item list-group-item-action">Customers</a>
        <a href="{{route('credit.index')}}" class="list-group-item list-group-item-action">Credit</a>
      </div>
    </div>
    <div style="float: left; width: 75%;">
      @yield('content')
    </div>
    @endguest
  </div>
  <!-- /content -->

</body>
</html>
