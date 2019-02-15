@extends('layouts.navbar')

@section('content')

<div class="search-container" align="center">
  <h2 id="payment-search-heading"> STATUS SEARCH </h2>
  <div class="button-group">
    <form action="{{route('payment-status.search')}}" method="post" role="search">
      {{ csrf_field() }}
      <input class="form-control search-input" type="text" placeholder="Enter invoice id" aria-label="Search" maxlength="50" name="query" value="{{old('query')}}">
      <button type="submit" class="search-button">SEARCH</button>
    </form>
  </div>
</div>

@if (session('result'))
<div class="result-container">
  <h4 class="payment-result-heading"> Search result: </h4>
  <table class="table table-bordered" align="center" width="50%">
    <tr> 
      <td class="search-label-detail" align="right" width="30%"> Invoice ID: </td>
      <td align="left" width="70%"> {{session('result')->transaction_id}} </td>
    </tr>
    <tr>
      <td class="search-label-detail" align="right"> Customer Name: </td>
      <td align="left"> {{session('result')->cust_name}} </td>
    </tr>
    <tr>
      <td class="search-label-detail" align="right"> Product Name: </td>  
      <td align="left"> {{session('result')->product_name}} </td>
    </tr>
    <tr>
      <td class="search-label-detail" align="right"> Price: </td>
      <td align="left"> Rp {{number_format(session('result')->price)}} </td>
    </tr>
    <tr>
      <td class="search-label-detail" align="right"class="search-label-detail" align="right"> Status: </td>  
      <td align="left"> {{session('result')->status}} </td>
    </tr>
  </table>
</div>
@elseif (session('not_found'))
<div class="result-container">
  <h4 class="payment-result-heading"> Search result: </h4>
  <h3 id="payment-result-not-found" align="center"> Invoice id not found </h3>
  <hr class="not-found-line">
</div>
@endif
@endsection