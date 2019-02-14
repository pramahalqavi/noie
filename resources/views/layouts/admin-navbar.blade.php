<!doctype html>
<html>
<head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->

<link href="{{asset('css/admin.css')}}" rel="stylesheet" type="text/css">

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
                    <a href="#">Statistics</a>
                </li>
                <li>
                    <a href="#">Products</a>
                </li>
                <li>
                    <a href="{{route('transaction')}}">Transactions</a>
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
            <div class="container produk">
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

<script>
    $(document).ready(function () {
        var trigger = $('.hamburger'),
            overlay = $('.overlay'),
            isClosed = false;

        trigger.click(function () {
          hamburger_cross();      
        });

        function hamburger_cross() {

          if (isClosed == true) {          
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
          } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
          }
        }
      
        $('[data-toggle="offcanvas"]').click(function () {
            $('#wrapper').toggleClass('toggled');
        }); 

    });

    function detailPage(trans_id) {
        var url = '{{url("admin/transaction/detail")}}' + '/' + trans_id;
        window.location.href = url;
    }

    function checkEmail() {
        var email = document.getElementById("email-id").value;
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if( re.test(String(email).toLowerCase()) ) {
            document.getElementById("email-warning").style.display = 'none';
            document.getElementById("email-id").style.border = 'none';
        } else {
            document.getElementById("email-warning").style.display = 'block';
            document.getElementById("email-warning").innerHTML = "You have entered an invalid email address";
            document.getElementById("email-id").style.border = '1px solid #d50027';
            return false;
        }
    }
    function checkPassword() {
        var psw = document.getElementById("psw-id").value;
        if (psw.length < 8) {
            document.getElementById("pass-warning").style.display = 'block';
            document.getElementById("pass-warning").innerHTML = "Password must contain at least 8 characters";
            document.getElementById("psw-id").style.border = '1px solid #d50027';
            return false;
        } else {
            document.getElementById("psw-id").style.border = 'none';
            document.getElementById("pass-warning").style.display = 'none';
            return true;
        }
    }

    function checkConfPassword() {
        var psw = document.getElementById("psw-id").value;
        var psw_repeat = document.getElementById("psw-repeat-id").value;
         if (psw != psw_repeat) {
            document.getElementById("confpass-warning").style.display = 'block';
            document.getElementById("confpass-warning").innerHTML = "Password and Confirm password doesn't match";
            document.getElementById("psw-repeat-id").style.border = '1px solid #d50027';
            return false;
        } else {
            document.getElementById("psw-repeat-id").style.border = 'none';
            document.getElementById("confpass-warning").style.display = 'none';
            return true;
        }
    }

    function deleteAdminOnPress(adminCount) {
        var button = document.getElementById("delete-admin-btn");
        var email = "{{Session::get('auth-email')}}";
        if (button.innerHTML == "Delete Admin") {
            button.innerHTML = "Cancel Delete";
            let tbl = document.getElementById("admin-table").getElementsByTagName('tbody')[0];
            for (var i = 0; i < adminCount; ++i) {
                if (tbl.rows[i].cells[0].innerHTML == email) {
                    document.getElementById("delete-btn-no-" + i).style.visibility = 'hidden';
                } else {
                    document.getElementById("delete-btn-no-" + i).style.visibility = 'visible';
                }
            }
        } else if (button.innerHTML == "Cancel Delete") {
            button.innerHTML = "Delete Admin";
            for (var i = 0; i < adminCount; ++i) {
                document.getElementById("delete-btn-no-" + i).style.visibility = 'hidden';
            }
        }
    }

    function checkChangePassword() {
        var curpass = document.getElementById("cur-psw-id").value;
        var newpass = document.getElementById("psw-id").value;
        if (curpass == newpass) {
            document.getElementById("pass-warning").style.display = 'block';
            document.getElementById("pass-warning").innerHTML = "New password must different from current password";
            document.getElementById("psw-id").style.border = '1px solid #d50027';
            return false;
        } else {
            document.getElementById("psw-id").style.border = 'none';
            document.getElementById("pass-warning").style.display = 'none';
            return checkConfPassword();
        }
    }

</script>

</body>
</html>