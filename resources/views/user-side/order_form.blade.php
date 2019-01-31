@extends('layouts.navbar')

@section('content')
<div class="form-style">
    <h2 style=""> Order Form </h2>
    <form>
        <table style="width:100%" cellpadding="1%">
            <tr> 
                <td class="input-label">Name</td>
                <td align="left"><input class="input-order-form" type="text" name="name" maxlength="30"/></td>
            </tr>
            <tr> 
                <td class="input-label">Email</td>
                <td align="left"><input class="input-order-form" type="text" name="email" maxlength="30"/></td>
            </tr>
            <tr> 
                <td class="input-label">Phone Number</td>
                <td align="left"><input class="input-order-form" type="text" name="phone" pattern="[0-9]*" maxlength="15"/></td>
            </tr>
            <tr> 
                <td class="input-label">Address</td>
                <td align="left"><input class="input-order-form" type="text" name="address" maxlength="200"/></td>
            </tr>
            <tr> 
                <td class="input-label">City</td>
                <td align="left"><input class="input-order-form" type="text" name="city" maxlength="50"/></td>
            </tr>
            <tr> 
                <td class="input-label">State</td>
                <td align="left"><input class="input-order-form" type="text" name="state" maxlength="50"/></td>
            </tr>
            <tr> 
                <td class="input-label">Zipcode</td>
                <td align="left"><input class="input-order-form" type="text" inputmode="numeric" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$" name="zipcode" maxlength="6"/></td>
            </tr>
        </table>
        <button id="order-button"> ORDER </button>
    </form>
</div>
@endsection