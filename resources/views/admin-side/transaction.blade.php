@extends('layouts.admin-navbar')

@section('content')
  <h1 style="text-align: center">LIST OF TRANSACTIONS</h1>
  <br><br>
  <table class="table table-striped">
    <thead style="background-color: #314190; color: white">
      <tr>
        <th scope="col" width="10%">Transaction ID</th>
        <th scope="col" width="30%">Name</th>
        <th scope="col" width="30%">Product</th>
        <th scope="col" width="15%">Price</th>
        <th scope="col" width="15%">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($transactions as $transaction)
      <tr class="clickable-row" href="">
        <th scope="row">{{ $transaction->transaction_id }}</th>
        <td>{{ $transaction->cust_name }}</td>
        <td>{{ $transaction->product_name }}</td>
        <td> Rp {{ number_format($transaction->product_price + $transaction->unique_code) }} </td>
        <td> {{ $transaction->status }} </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection