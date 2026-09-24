<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Mosaddek">
<meta name="keyword" content="Khulna University">
<link rel="shortcut icon" href="img/favicon.html">
<title>Dashboard | Khulna University</title>

@include('admin.inc.head')
@yield('css')
<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->
</head>

<body>
<section id="container">
  <!--header start-->
  <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <i class="fa fa-bars"></i>
          </div>
        <!--logo start-->
        <a href="#" class="logo">Khulna<span> University</span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">

        </div>
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="Search">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{ asset('frontend/images/android-icon-48x48.png')}}">
                        <span class="username">{{Auth::user()->name}}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                       <div class="log-arrow-up"></div>
                       {{-- <li><a href="/admin/profile"><i class=" fa fa-suitcase"></i>Profile</a></li> --}}
                       <!-- <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li> -->
                       <li>
                          <form class="" action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm" name="Logout">Logout</button>
                          </form>
                      </li>
                    </ul>
                </li>
                <li class="sb-toggle-right">
                    <i class="fa  fa-align-right"></i>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
  <!--header end-->
  <!--sidebar start-->
  <aside>
      <div id="sidebar"  class="nav-collapse ">
          <!-- sidebar menu start-->
          @include('admin.inc.sidebar')
          <!-- sidebar menu end-->
      </div>
  </aside>
  <!--sidebar end-->
  <!--main content start-->
    <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
              <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header"><h1>Dashboard</h1></div>

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <h3>You are logged in as a Research Cell Admin!</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              <!-- page end-->
          </section>
      </section>
  <!--main content end-->


  <!--footer start-->
  <footer class="site-footer">
      <div class="text-center">
          Copyright &copy; {{ date('Y') }} Khulna University. All Rights Reserved By ICT CELL
          <a href="#" class="go-top">
              <i class="fa fa-angle-up"></i>
          </a>
      </div>
  </footer>
  <!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
@include('admin.inc.footer')
@yield('js')
</body>
</html>
