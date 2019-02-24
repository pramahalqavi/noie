@extends('layouts.navbar')

@section('content')
    @if(Session::has('message'))
    <div id="note">
        Order successfully submitted. Check your email for details.
    </div>
    @endif
    <h1 style="font-size: 50px; color: white;">  </h1>
@endsection