<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>NOIE</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Thasadith" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
        <link href="{{asset('css/default.css')}}" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="background">
            <div class="row">
                <div class="logo">
                    NOIE
                </div>
                <div class="navbar">
                    <a class="navbutton" href="">HOME</a>
                    <!-- <a class="navbutton" href="">COLLECTIONS</a> -->
                    <div class="dropdown">
                        <a class="navbutton">COLLECTIONS </a>
                        <div class="dropdown-content">  
                            <div class="row">
                                <div class="column">
                                    <h3>Category 1</h3>
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div>
                                <div class="column">
                                    <h3>Category 2</h3>
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div>
                                <div class="column">
                                    <h3>Category 3</h3>
                                    <a href="#">Link 1</a>
                                    <a href="#">Link 2</a>
                                    <a href="#">Link 3</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a class="navbutton" href="">ABOUT</a>
                    <a class="navbutton" href="">PAYMENT STATUS</a>
                </ul>
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>

        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->
    </body>
</html>