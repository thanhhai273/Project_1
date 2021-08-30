<!doctype html>
<html lang="en">
  <head>
  	<title>Studio ⚙️ {{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
		<link rel="stylesheet" href="{{ asset('/studio/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/studio/css/style-dashboard.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('l+ittlelink/images/avatar.png') }}">
  </head>
  <body>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
        @if(Auth::user()->role == 'user')
        <a href="{{ url('/links') }}">
        @elseif(Auth::user()->role == 'admin')
        <a href="{{ url('/admins/index') }}">
        @endif
          <img class="img logo rounded-circle" src="{{ asset('assets/linkicon.svg') }}" style="height: 60px;background-color:deepskyblue">
          </a>
          <ul class="list-unstyled components mb-5"> 
          <li class="active">
              <a href="{{ url('/') }}">Home page</a>
	        </li>
          @if(auth()->user()->role == 'admin')
            <ul class="list-unstyled components mb-5">
            <li class="">
	            <a href="#adminSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Admin</a>
	            <ul class="collapse list-unstyled" id="adminSubmenu">
                <li>
                    <a href="{{ url('admins/users/all') }}">Users</a>
                </li>
                <li>
	            </ul>
              <a href="{{ url('/users/profile') }}">Profile</a>
	            </li>              
              <form action="{{ route('logout') }}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="buttonLogout">Logout</button>
              </form>
	          </li>           
             @else           
	          <li>
            
            <li>
              <a href="{{ url('/links/link') }}">Links</a>
	          </li>
            <li >
              <a href="{{ url('/links/add-link') }}">Add Link</a>
	          </li>
            <li>
              <a href="{{ url('/design') }}">Design</a>
	          </li>
            <li>
              <a href="{{ url('/users/profile') }}">Profile</a>
	          </li>
            <li>
              <a href="{{ url('/users/page') }}">Page</a>
	          </li>
            
            <form action="{{ route('logout') }}" method="post">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <button type="submit" class="buttonLogout">Logout</button>
            </form>
            @endif
	        </ul>
	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/{{ Auth::user()->name }}" target="_blank">Watch Page</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

              @yield('content')

             </div>
	    	</div>

    <script src="{{ asset('/studio/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/studio/js/popper.js') }}"></script>
    <script src="{{ asset('/studio/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/studio/js/main-dashboard.js') }}"></script>
  </body>
</html>
