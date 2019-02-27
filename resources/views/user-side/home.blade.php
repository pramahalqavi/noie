@extends('layouts.navbar')

@section('content')
    @if (Session::has('message'))
    <div id="note">
        {{Session('message')}}
    </div>
    @elseif (Session::has('error'))
    <div id="error-note">
        {{Session('error')}}
    </div>
    @endif
    <h1 style="font-size: 50px; color: white;">  </h1>
@endsection