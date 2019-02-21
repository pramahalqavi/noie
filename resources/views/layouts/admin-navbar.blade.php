<!doctype html>
<html>
<head>

    <title>@yield('title')</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src = "https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/pattern-fill.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<link href="/css/admin.css" rel="stylesheet" type="text/css">

</head>
<body>

    <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="{{route('home')}}">
                       NOIE
                    </a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">{{ Session::get('auth-email') }}</li>
                    <li><a href="{{route('change-password')}}">Change Password</a></li>
                    <li><a href="{{route('logout')}}">Logout</a></li>
                  </ul>
                </li>

                <li>
                    <a href="{{route('stat')}}">Statistic</a>
                </li>
                <li>
                    <a href="/admin/product">Product</a>
                </li>
                <li>
                    <a href="{{route('transaction')}}">Transaction</a>
                </li>
                <li>
                    <a href="{{route('admin-role')}}">Admin Role</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
            <div class="container">
                <div class="row">
                    <div class="col-lg">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

<script src="/js/admin.js"></script>

</body>
</html>