<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>NOIE</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Thasadith" rel="stylesheet">
        <link href="{{asset('css/default.css')}}" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="background">
        <div class="row">
            <div class="logo">
                NOIE
            </div>
            <ul class="navbar">
                <li><a href="">HOME</a></li>
                <div class="dropdown-coll">
                    <button class="dropbtn">COLLECTIONS</button>
                    <div class="dropdown-content">
                        <a href="">abc</a>
                        <a href="">def</a>
                        <a href="">ghi</a>
                    </div>
                </div>
                
                <li><a href="">COLLECTIONS</a></li>
                <li><a href="">ABOUT</a></li>
                <li><a href="">PAYMENT STATUS</a></li>
            </ul>
        </div>
        <div class="content">
            @yield('content')
        </div>
        </div>
        
    </body>
</html>