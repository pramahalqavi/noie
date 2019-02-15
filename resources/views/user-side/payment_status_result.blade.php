@extends('layouts.navbar')

@section('content')
<h2 id="payment-search-heading"> PAYMENT STATUS SEARCH </h2>
<div class="search-container">
  <form action="">
    <input type="text" placeholder="Enter Invoice ID.." name="invoice-search" maxlength="30">
    <button type="submit">SEARCH</button>
  </form>
</div>
<div class="result-container">
  <table class="table table-bordered" style="margin-top: 1%">
    <tr> 
      <td> Invoice ID </td>
      <td> </td>
    </tr>
    <tr>
      <td> Customer Name </td>
      <td> </td>
    </tr>
    <tr>
      <td> Product Name </td>  
      <td> </td>
    </tr>
    <tr>
      <td> Price </td>
      <td> </td>
    </tr>
    <tr>
      <td> Status </td>  
      <td> </td>
    </tr>
  </table>
</div>
@endsection