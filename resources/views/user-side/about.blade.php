@extends('layouts.navbar')

@section('content')
<div class="rowblock-2">
  <div class="columnblock-2" style="background-color: rgba(55,55,55,0.4);">
    <h2>ABOUT</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p><img src="{{asset('images/fb-icon.png')}}" class="socmed-icon"/> Facebook </p>
    <p><img src="{{asset('images/twitter-icon.png')}}" class="socmed-icon" /> Twitter </p>
    <p><img src="{{asset('images/ig-icon.png')}}" class="socmed-icon" /> Instagram</p>
  </div>
</div>
@endsection