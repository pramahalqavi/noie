<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>NOIE</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Thasadith" rel="stylesheet">
        <link href="{{asset('css/default.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

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
                    N O I E
                </div>
                <div class="noie-navbar">
                    <a class="noie-navbutton" href="{{ route('home') }}">HOME</a>
                    <div class="noie-dropdown">
                        <a class="noie-navbutton">COLLECTIONS</a>
                        <div class="noie-dropdown-content">
                            <div class="noie-row">
                            @php($years = App\Models\Collection::distinct()->orderBY('year', 'desc')->get(['year']))
                            @foreach($years as $y)
                                <div class="noie-column navbar-slide fade2">
                                @php($collections = App\Models\Collection::where('year', $y->year)->orderBy('id')->get(['id', 'name']))
                                    <h2>{{ $y->year }}</h2>
                                    @foreach($collections as $c)
                                    <div class="collection-column">
                                        <a class="nav-collection-button" href="{{route('collections', $c->id)}}">{{ $c->name }}</a>
                                    </div>
                                    @endforeach
                                </div>
                            @endforeach
                                <a class="prev1 fadeout">&#10094;</a>
                                <!-- onclick="plusDivs(-1)" -->
                                <a class="next1 fadeout">&#10095;</a>
                                <!-- onclick="plusDivs(1)" -->
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
        <script src="{{ asset('js/user.js') }}"></script>
    </body>
</html>