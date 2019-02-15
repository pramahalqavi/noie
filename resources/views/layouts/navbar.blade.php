<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>NOIE</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Thasadith" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="{{asset('css/default.css')}}" rel="stylesheet" type="text/css">

        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    </head>
    <body>
        @if(\Request::is('/'))
        <div class="background" style="background-image: url('/images/img1.jpg')">
        @elseif(\Request::is('about'))
        <div class="background" style="background-image: url('/images/img2.jpg')">
        @else
        <!-- <div class="background" style="background-color: #eee"> -->
        @endif
            <div class="noie-nav">
                <div class="noie-logo">
                    NOIE
                </div>
                <div class="noie-navbar">
                    <a class="noie-navbutton" href="{{ route('home') }}">HOME</a>
                    <div class="noie-dropdown">
                        <a class="noie-navbutton">COLLECTIONS </a>
                        <div class="noie-dropdown-content">
                            <div class="noie-row">
                                <div class="noie-column">
                                    <h4>Category 1</h4>
                                    <a href="{{route('collections')}}">Link 1</a>
                                    <a href="">Link 2</a>
                                    <a href="">Link 3</a>
                                </div>
                                <div class="noie-column">
                                    <h4>Category 2</h4>
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div>
                                <div class="noie-column">
                                    <h4>Category 3</h4>
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a class="noie-navbutton" href="{{route('about')}}">ABOUT</a>
                    <a class="noie-navbutton" href="{{route('payment-status')}}">PAYMENT STATUS</a>
                </ul>
            </div>
        </div>
        <div class="content">
            @yield('content')
        </div>
        @yield('javascript')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>