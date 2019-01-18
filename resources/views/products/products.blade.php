@extends('layouts.navbar')

@section('content')
    <h3 class="product-collection"> Collection 1 </h3>
    <h2 class="product-name"> Name 1 </h2>
    <hr>
    <p class="price"> $ 1,000 </p>
    <p class="material"> Plastic Material </p>
        <label class="container"> S 
            <input type="radio" name="size" id="radio1" value="S" checked="checked"/>
            <span class="checkmark"></span>
        </label>
        <label class="container"> M
            <input type="radio" name="size" id="radio2" value="M"/>
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
    <button form="buy-form"> BUY NOW </button>
@endsection