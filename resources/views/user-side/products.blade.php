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
            <img src="{{ asset($product->image1) }}" alt="nama_product">
        </div>
        <div class="col-md">
            <h1>{{ $collection->name }} - {{ $collection->year }}</h1>
            <h2>{{ $product->name }}</h2>
            <br>
            <hr class="style-three">
            <h2>Rp {{ $product->price }}</h2>
            <br>
            <h3>Material: {{ $product->material }}</h3>
            <h3>Size: <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>{{ $product->size }}</h3>
            <br>
            <button type="button" style="color: white">Buy Now</button>
        </div>
        <div class="col-md">
            <img src="{{ asset($product->image2) }}" alt="nama_product">
        </div>
    </div>
    @endforeach
    <a class="prev2" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next2" onclick="plusSlides(1)">&#10095;</a>
    @endif
</div>
@endsection
