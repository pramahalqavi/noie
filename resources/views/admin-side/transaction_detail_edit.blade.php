@extends('layouts.admin-navbar')

@section('content')
<h2 > Transaction Details </h2>
    <form action="{{route('transaction.detail', [$row->transaction_id])}}" method="post">
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
                <td align="left"> Rp {{number_format($row->product_price)}} </td>
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
                <td class="label-detail" align="right">Status: </td>
                <td align="left">
        
                <select name="status" class="status-dropdown">
                    @foreach (array("Unpaid", "Packaging", "Sending", "Completed") as $status)
                        <option value="{{$status}}"
                        @if ($status == $row->status)
                            selected="selected"
                        @endif
                        >{{$status}}</option>
                    @endforeach
                </select>

            </td>
            </tr>
        </table>
        <input type="submit" class="btn btn-primary transaction-detail-button" value="Save" width="20%"/>
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put"/>
    </form>
@endsection