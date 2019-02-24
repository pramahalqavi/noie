@extends('layouts.navbar')

@section('content')
@if ($row == null)
    <script> window.location = "{{route('home')}}"; </script>
@endif
<div class="container order-details">
    <h2 > Order Details </h2>
    <table class="table table-bordered" style="margin-top: 1%">
        <tr> 
            <td class="label-detail" align="right" width="30%">Product Name: </td>
            <td align="left" width="70%"> {{$row["product"]}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Collection: </td>
            <td align="left"> {{$row["collection"]}} - {{$row["year"]}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Price: </td>
            <td align="left"> Rp {{number_format($row["price"])}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Size: </td>
            <td align="left"> {{$row["size"]}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Name: </td>
            <td align="left"> {{$row["name"]}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Email: </td>
            <td align="left"> {{$row["email"]}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Phone Number: </td>
            <td align="left"> {{$row["phone"]}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Address: </td>
            <td align="left"> {{$row["address"]}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">City: </td>
            <td align="left"> {{$row["city"]}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">State: </td>
            <td align="left"> {{$row["state"]}} </td>
        </tr>
        <tr> 
            <td class="label-detail" align="right">Zipcode: </td>
            <td align="left"> {{$row["zipcode"]}} </td>
        </tr>
    </table>
    <form method="post" action="{{route('order-confirmation.submit')}}">
        <div class="btn-wrapper">
            <a class="noie-button" href="{{route('collections', $row['collection-id'])}}" >CANCEL</a>
            <button class="noie-button" type="submit"> ORDER </a>
            <input type="hidden" name="product-id" value="{{ $row['product-id'] }}"/>
            <input type="hidden" name="product" value="{{ $row['product'] }}"/>
            <input type="hidden" name="collection" value="{{ $row['collection'] }}"/>
            <input type="hidden" name="year" value="{{ $row['year'] }}"/>
            <input type="hidden" name="price" value="{{ $row['price'] }}"/>
            <input type="hidden" name="size" value="{{ $row['size'] }}"/>
            <input type="hidden" name="name" value="{{ $row['name'] }}"/>
            <input type="hidden" name="email" value="{{ $row['email'] }}"/>
            <input type="hidden" name="phone" value="{{ $row['phone'] }}"/>
            <input type="hidden" name="address" value="{{ $row['address'] }}"/>
            <input type="hidden" name="city" value="{{ $row['city'] }}"/>
            <input type="hidden" name="state" value="{{ $row['state'] }}"/>
            <input type="hidden" name="zipcode" value="{{ $row['zipcode'] }}"/>
            {{ csrf_field() }}
        </div>
    </form>
</div>
@endsection