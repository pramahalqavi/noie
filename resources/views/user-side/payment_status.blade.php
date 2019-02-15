@extends('layouts.navbar')

@section('content')
<h2 id="payment-search-heading"> PAYMENT STATUS SEARCH </h2>
<div class="search-container">
  <form action="">
    <input type="text" placeholder="Enter Invoice ID.." name="invoice-search" maxlength="30">
    <button type="submit">SEARCH</button>
  </form>
</div>
@endsection