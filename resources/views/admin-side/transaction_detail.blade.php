@extends('layouts.admin-navbar')

@section('title', 'Transaction detail')

@section('content')
<h2 > Transaction Details </h2>
    <table class="table table-bordered" style="margin-top: 1%">
        <tr> 
            <td class="label-detail" align="right" width="30%">Transaction ID: </td>
            <td align="left" width="70%"> {{$row->transaction_id}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Product Name: </td>
            <td align="left"> {{$row->product_name}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Price: </td>
            <td align="left"> Rp {{number_format($row->unique_price)}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Name: </td>
            <td align="left"> {{$row->cust_name}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Email: </td>
            <td align="left"> {{$row->cust_email}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Phone Number: </td>
            <td align="left"> {{$row->cust_phone}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Address: </td>
            <td align="left"> {{$row->cust_address}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">City: </td>
            <td align="left"> {{$row->cust_city}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">State: </td>
            <td align="left"> {{$row->cust_state}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Zipcode: </td>
            <td align="left"> {{$row->cust_zipcode}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Order Date: </td>
            <td align="left"> {{ date('d/m/Y H:i', strtotime($row->created_at)) }} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Status: </td>
            <td align="left"> {{$row->status}} </td>
        </tr>
    </table>
    <a class="btn btn-primary transaction-detail-button" href="{{ route('transaction.detail.edit', [$row->transaction_id]) }}"> Edit Status </a>
@endsection