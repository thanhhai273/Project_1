<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LINK.ET</title>
    <link rel="icon" type="image/x-icon" src="assets/linkicon.svg" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color:black;height: 30px">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{ url('/') }}"><img src="assets/linkicon.svg" style="height: 25px;">LINK.ET</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/#about">Diễn đàn</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="{{url('/links')}}">Link</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="{{url('/design')}}">Design</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#signup">Liên hệ</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @if (Auth::guest())

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Đăng kí</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                           
                            @if(Auth::user()->role == 'user')
                            <a class="dropdown-item" href="{{ url('/links') }}" >
                                {{ __('link') }}
                            </a>
                            @elseif(Auth::user()->role == 'admin')
                            <a class="dropdown-item" href="{{ url('/admins/index') }}" >
                                {{ __('link') }}
                            </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('change.password') }}" >
                                {{ __('Đổi mật khẩu') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Đăng xuất') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>                    
            </div>
            </li>
            @endif
            </ul>
        </div>
        </div>
    </nav>
    @yield('content')
</body>

</html>