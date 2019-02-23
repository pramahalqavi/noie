@extends('layouts.navbar')

@section('content')
<div class="container-fluid products">
    @if(count($products) == 0)
    <div class="row">
        <div class="col-md" style="margin-top: 100px">
            <h1>{{ $collection->name }} collection is empty.</h1>
        </div>
    </div>
    @else
    @foreach($products as $product)
    <div class="row product-slide fade1">
        <div class="col-md">
            <img src="{{ asset($product->image1) }}" alt="{{ $product->name }} image1">
            <!-- <a class="prev3">&#10094;</a> -->
        </div>
        <div class="col-md">
            <h1>{{ $collection->name }} - {{ $collection->year }}</h1>
            <h2>{{ $product->name }}</h2>
            <br>
            <hr class="style-three">
            <h2>Rp {{ number_format($product->price) }}</h2>
            <br>
            <div class="row">
                <div class="col-sm-4">
                    <h3>Material:</h3>
                </div>
                <div class="col-sm-8">
                    <h3>{{ $product->material }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <h3>Size:</h3>
                </div>
                <div class="col-sm-8">
                    <h3>{{ $product->size }}</h3>
                </div>
            </div>
                <!-- <h3>Size: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>{{ $product->size }}</h3> -->
            <br>
            <button type="button" style="color: white" onclick="buyNowClick()">Buy Now</button>
        </div>
        <div class="col-md">
            <img src="{{ asset($product->image2) }}" alt="{{ $product->name }} image2">
        </div>
    </div>
    @endforeach
    <a class="prev2">&#10094;</a>
    <a class="next2">&#10095;</a>
    @endif
</div>
<div class="form-style" id="order-form">
    <h2 style=""> Order Form </h2>
    <form>
        <table style="width:100%" cellpadding="1%">
            <tr> 
                <td class="input-label">Name</td>
                <td align="left"><input class="input-order-form" type="text" name="name" maxlength="30" required/></td>
            </tr>
            <tr> 
                <td class="input-label">Email</td>
                <td align="left"><input class="input-order-form" type="text" name="email" maxlength="30" required/></td>
            </tr>
            <tr> 
                <td class="input-label">Phone Number</td>
                <td align="left"><input class="input-order-form" type="text" name="phone" pattern="[0-9]*" maxlength="15" required/></td>
            </tr>
            <tr> 
                <td class="input-label">Address</td>
                <td align="left"><input class="input-order-form" type="text" name="address" maxlength="255" required/></td>
            </tr>
            <tr> 
                <td class="input-label">City</td>
                <td align="left"><input class="input-order-form" type="text" name="city" maxlength="50" required/></td>
            </tr>
            <tr> 
                <td class="input-label">State</td>
                <td align="left"><input class="input-order-form" type="text" name="state" maxlength="50" required/></td>
            </tr>
            <tr> 
                <td class="input-label">Zipcode</td>
                <td align="left"><input class="input-order-form" type="text" inputmode="numeric" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$" name="zipcode" maxlength="6" required/></td>
            </tr>
        </table>
        <button id="order-button"> ORDER </button>
    </form>
</div>
@endsection
