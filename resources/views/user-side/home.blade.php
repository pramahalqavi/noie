@extends('layouts.navbar')

@section('content')
    @if(Session::has('message'))
        <!-- <p class="alert alert-info">{{ Session::get('message') }}</p> -->
    @endif
    <h1 style="font-size: 50px; color: white;">  </h1>
@endsection