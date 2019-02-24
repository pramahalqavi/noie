@extends('layouts.navbar')

@section('content')
    @if(Session::has('message'))
    <!-- <div id="note">
        You smell good. <a id="close">[close]</a>
    </div> -->
    @endif
    <h1 style="font-size: 50px; color: white;">  </h1>
@endsection