@extends('layouts.navbar')

@section('content')
    <h2 class="product-collection" style="font-size: 32px"> Collection 1 </h3>
    <h2 class="product-name" style="font-size: 32px"> Name 1 </h2>
    <hr style="width: 30%">
    <p class="price" style="font-size: 32px"> $ 1,000 </p>
    <p class="material" style="font-size: 28px"> Plastic Material </p>
        <p style="display: inline-block; font-size: 22px; margin-right: 25px;"> SIZE: </p>
        <label class="container"> S 
            <input type="radio" name="size" id="radio1" value="S"/>
            <span class="checkmark"></span>
        </label>
        <label class="container"> M
            <input type="radio" name="size" id="radio2" value="M" checked="checked"/>
            <span class="checkmark"></span>
        </label>
        <label class="container"> L 
            <input type="radio" name="size" id="radio3" value="L"/>
            <span class="checkmark"></span>
        </label>
        <label class="container"> XL 
            <input type="radio" name="size" id="radio4" value="XL"/> 
            <span class="checkmark"></span>
        </label>
    <br>
    <button href="{{url('collections/order')}}}"> BUY NOW </button>

@endsection