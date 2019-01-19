@extends('layouts.navbar')

@section('content')
<div class="form-style">
    <h1 style=""> Order Form </h1>
    <form>
        <table style="width:100%">
            <tr> 
                <td class="input-label">Name</td>
                <td><input class="input-order-form" type="text" name="name"/></td>
            </tr>
            <tr> 
                <td class="input-label">Email</td>
                <td><input class="input-order-form" type="text" name="email"/></td>
            </tr>
            <tr> 
                <td class="input-label">Phone Number</td>
                <td><input class="input-order-form" type="tel" name="phone"/></td>
            </tr>
            <tr> 
                <td class="input-label">Address</td>
                <td><input class="input-order-form" type="text" name="address"/></td>
            </tr>
            <tr> 
                <td class="input-label">City</td>
                <td><input class="input-order-form" type="text" name="city"/></td>
            </tr>
            <tr> 
                <td class="input-label">State</td>
                <td><input class="input-order-form" type="text" name="state"/></td>
            </tr>
            <tr> 
                <td class="input-label">Zipcode</td>
                <td><input class="input-order-form" type="text" name="zipcode"/></td>
            </tr>
        </table>
        <button id="order-button"> ORDER </button>
    </form>
</div>
@endsection