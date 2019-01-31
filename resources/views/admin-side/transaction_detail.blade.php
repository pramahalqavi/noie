@extends('layouts.admin-navbar')

@section('content')
<h2 style=""> Transaction Detail </h2>
    <table style="width:100%" cellpadding="1%">
        <tr> 
            <td class="input-label">Name</td>
            <td align="left"> {{$row->cust_name}} </td>
        </tr>
        <tr> 
            <td class="input-label">Email</td>
            <td align="left"> {{$row->cust_email}} </td>
        </tr>
        <tr> 
            <td class="input-label">Phone Number</td>
            <td align="left"> {{$row->cust_phone}} </td>
        </tr>
        <tr> 
            <td class="input-label">Address</td>
            <td align="left"> {{$row->cust_address}} </td>
        </tr>
        <tr> 
            <td class="input-label">City</td>
            <td align="left"> {{$row->cust_city}} </td>
        </tr>
        <tr> 
            <td class="input-label">State</td>
            <td align="left"> {{$row->cust_state}} </td>
        </tr>
        <tr> 
            <td class="input-label">Zipcode</td>
            <td align="left"> {{$row->cust_zipcode}} </td>
        </tr>
    </table>
@endsection