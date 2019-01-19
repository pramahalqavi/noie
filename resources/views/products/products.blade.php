@extends('layouts.navbar')

@section('content')
<div class="rowblock-3">
    <div class="columnblock-3">
        <div class="img-slides">
            <img class="product-image" src="{{asset('images/shoes1.jpg')}}" style="width:100%">
        </div>
    </div>
    <div class="columnblock-3">
        <h2 class="product-collection" style="font-size: 26px"> Collection 1 </h3>
        <h2 class="product-name" style="font-size: 26px"> Name 1 </h2>
        <hr style="width: 30%; background-color: #888;">
        <p class="price" style="font-size: 26px"> $ 1,000 </p>
        <p class="material" style="font-size: 22px"> Plastic Material </p>
            <p style="display: inline-block; font-size: 18px; margin-right: 25px;"> SIZE: </p>
            <label class="noie-container"> S 
                <input type="radio" name="size" id="radio1" value="S"/>
                <span class="noie-checkmark"></span>
            </label>
            <label class="noie-container"> M
                <input type="radio" name="size" id="radio2" value="M" checked="checked"/>
                <span class="noie-checkmark"></span>
            </label>
            <label class="noie-container"> L 
                <input type="radio" name="size" id="radio3" value="L"/>
                <span class="noie-checkmark"></span>
            </label>
            <label class="noie-container"> XL 
                <input type="radio" name="size" id="radio4" value="XL"/> 
                <span class="noie-checkmark"></span>
            </label>
        <br>
        <button href="{{url('collections/order')}}}"> BUY NOW </button>
        <div style="text-align:center; height: auto; width: auto">
            <span class="dot" onclick=""></span> 
            <span class="dot" onclick=""></span> 
            <span class="dot" onclick=""></span> 
        </div>
    </div>
    <div class="columnblock-3">
        <div class="img-slides">
            <img class="product-image" src="{{asset('images/shoes2.jpg')}}" style="width:100%">
        </div>
    </div>
</div>
<a class="prev-slide" onclick="plusSlides(-1)">&#10094;</a>
<a class="next-slide" onclick="plusSlides(1)">&#10095;</a>
@endsection

@section('javascript')
<!-- <script src="{{asset('js/image_carousel.js')}}"></script> -->
@endsection
