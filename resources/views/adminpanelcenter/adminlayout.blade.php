
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Ready Bootstrap Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<link rel="stylesheet" href="{{asset('/dashoardassets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{asset('/dashoardassets/css/ready.css')}}">
    <link rel="stylesheet" href="{{asset('/dashoardassets/css/demo.css')}}">
    <script src="https://kit.fontawesome.com/c507c86091.js" crossorigin="anonymous"></script>
</head>
<body>

    <div class="wrapper">
    <div class="main-header">
        <div class="logo-header">
            <a href="index.html" class="logo">
                Travel
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
        </div>
        <nav class="navbar navbar-header navbar-expand-lg">
            <div class="container-fluid">
                

                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="http://lorempixel.com/400/400/city/" alt="user-img" width="36" class="img-circle"><span >{{Auth::user()->name}}</span></span> </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <div class="user-box">
                                    <div class="u-img"><img src="http://lorempixel.com/400/400/city/" alt="user"></div>
                                    <div class="u-text">
                                    <h4>{{Auth::user()->name}}</h4>
                                    <p class="text-muted">{{Auth::user()->email}}</p>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                  </a>
                                    </div>
                                    </div>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                
                     </ul>
                            <!-- /.dropdown-user -->
                     </li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="sidebar">
        <div class="scrollbar-inner sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="http://lorempixel.com/400/400/city/">
                </div>
                <div class="info">
                    <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{Auth::user()->name}}
                            <span class="user-level">Administrator</span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <a href="#">
                        <i class="fas fa-city"></i>
                        <p>cities</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="#">
                        <i class="fas fa-skating"></i>
                        <p>Activities</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="#">
                        <i class="fas fa-hotel"></i>
                        <p>Hotels</p>
                    </a>
                </li>
            </ul>
        </div>
      </div>
      
    <main class="main-panel">
        @yield('content')
    </main>
</div>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="http://www.themekita.com">
                            ThemeKita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Help
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                2020, made with <i class="la la-heart heart text-danger"></i> by <a href="https://www.facebook.com/bilelmersenittm">Merseni Bilel | stay safe COVID_19</a>
            </div>				
        </div>
    </footer>
</body>
<script src="{{asset('/dashoardassets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('/dashoardassets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('/dashoardassets/js/core/popper.min.js')}}"></script>
<script src="{{asset('/dashoardassets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('/dashoardassets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
<script src="{{asset('/dashoardassets/js/plugin/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('/dashoardassets/js/plugin/jquery-mapael/maps/world_countries.min.js')}}"></script>
<script src="{{asset('/dashoardassets/js/plugin/chart-circle/circles.min.js')}}"></script>
<script src="{{asset('/dashoardassets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('/dashoardassets/js/ready.min.js')}}"></script>
<script src="{{asset('/dashoardassets/js/demo.js')}}"></script>
</html>