@extends('layouts.admin-navbar')

@section('title', 'Transaction')

@section('content')
  <h1 style="text-align: center">LIST OF TRANSACTIONS</h1>
  <a class="btn btn-success top-table-btn" href="{{route('transaction.download.excel')}}">Export Excel</a>
  <table class="table table-striped">
    <thead style="background-color: #DDDDDD">
      <tr>
        <th scope="col" width="15%">Transaction ID</th>
        <th scope="col" width="25%">Name</th>
        <th scope="col" width="30%">Product</th>
        <th scope="col" width="15%">Status</th>
        <th scope="col" width="15%">Order Date</th>
      </tr>
    </thead>
    <tbody>
    @if($transactions->count())
      @foreach($transactions as $transaction)
      <tr class="clickable-row" onclick="detailPage('{{ $transaction->transaction_id }}')">
        <td scope="row">{{ $transaction->transaction_id }}</td>
        <td>{{ $transaction->cust_name }}</td>
        <td>{{ $transaction->product_name }}</td>
        <td> {{ $transaction->status }} </td>
        <td> {{ date('d/m/Y H:i', strtotime($transaction->created_at)) }} </td>
      </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  <div class="text-center"> 
    {!! $transactions->links() !!}
  </div>

  <script> 
  function detailPage(trans_id) {
    var url = '{{url("admin/transaction/detail")}}' + '/' + trans_id;
    window.location.href = url;
  }
  </script>

@endsection