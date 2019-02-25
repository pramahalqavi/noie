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
    @foreach($products as $index => $product)
    <form method="post" action="{{route('order-confirmation')}}" id="order-data">
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
                <div class="col-sm-8 lil-left">
                    <h3>{{ $product->material }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <h3>Size:</h3>
                </div>
                <div class="col-sm-8 lil-left">
                    @php($arr_size = explode(" ", $product->size))
                    @foreach($arr_size as $idx => $size)
                    @if ($size == '-')
                    <label class="noie-container" style="padding-left: 0">
                        <input class="size-option" type="hidden" name="size" value="-"> -
                        <!-- <span class="noie-checkmark"></span> -->
                    </label>
                    @else
                    <label class="noie-container">{{ $size }}
                        <input class="size-option" type="radio" name="size" value="{{ $size }}" @if ($idx == 0) checked @endif> 
                        <span class="noie-checkmark"></span>
                    </label>
                    @endif
                    @endforeach
                </div>
            </div>
            <br>
            <button class="noie-button" type="button" style="color: white" onclick="buyNowClick()">BUY NOW</button>
        </div>
        <div class="col-md">
            <img src="{{ asset($product->image2) }}" alt="{{ $product->name }} image2">
        </div>
    </div>
    <div class="form-style" id="order-form-{{$index}}">
        <h2 style=""> Order Form </h2>
        <input type="hidden" name="product" value="{{$product->name}}"/>
        <input type="hidden" name="product-id" value="{{$product->product_id}}"/>
        <input type="hidden" name="collection" value="{{$collection->name}}"/>
        <input type="hidden" name="year" value="{{$collection->year}}"/>
        <input type="hidden" name="price" value="{{$product->price}}"/>
        <!-- <input type="hidden" name="size" value="Not Null"/> -->
        <input type="hidden" name="collection-id" value="{{$collection->id}}"/>
        <table style="width:100%" cellpadding="1%">
            <tr> 
                <td class="input-label">Name</td>
                <td align="left"><input class="input-order-form" id="id-name-{{$index}}" type="text" name="name" maxlength="30" required/></td>
            </tr>
            <tr> 
                <td class="input-label">Email</td>
                <td align="left"><input class="input-order-form" id="id-email-{{$index}}" type="email" name="email" maxlength="30" required/></td>
            </tr>
            <tr> 
                <td class="input-label">Phone Number</td>
                <td align="left"><input class="input-order-form" id="id-phone-{{$index}}" type="text" name="phone" pattern="[0-9]*" maxlength="15" required/></td>
            </tr>
            <tr> 
                <td class="input-label">Address</td>
                <td align="left"><input class="input-order-form" id="id-address-{{$index}}" type="text" name="address" maxlength="255" required/></td>
            </tr>
            <tr> 
                <td class="input-label">City</td>
                <td align="left"><input class="input-order-form" id="id-city-{{$index}}" type="text" name="city" maxlength="50" required/></td>
            </tr>
            <tr> 
                <td class="input-label">State</td>
                <td align="left"><input class="input-order-form" id="id-state-{{$index}}" type="text" name="state" maxlength="50" required/></td>
            </tr>
            <tr> 
                <td class="input-label">Zipcode</td>
                <td align="left"><input class="input-order-form" id="id-zipcode-{{$index}}" type="text" pattern="[0-9]{6}" name="zipcode" maxlength="6" required/></td>
            </tr>
        </table>
        <div class="order-warning-message" id="order-warning-message-{{$index}}"> 
            Please fill all field
        </div>
        <button class="noie-button" type="submit" id="order-button-{{$index}}" onclick="return checkOrderForm({{$index}})"> NEXT </button>
        {{ csrf_field() }}
    </div>
    </form>
    @endforeach
    <a class="prev2">&#10094;</a>
    <a class="next2">&#10095;</a>
    @endif
    
</div>
@endsection
