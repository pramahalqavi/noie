@extends('layouts.admin-navbar')

@section('title', 'Product management')

@section('content')

<h1 style="text-align: center">PRODUCT MANAGEMENT</h1>

<hr style="width: .2%">

@foreach ($years as $year)
    <hr class="right-line"><h2 onclick="showCollection('{{$year->year}}')"><i id="arrow{{$year->year}}" class="fas fa-angle-right"></i> {{ $year->year }}</h2>
    <ol id="show{{$year->year}}" class="collection-list" style="display: none">
        @foreach ($collections as $collection)
            @if ($collection->year == $year->year)
            <li>{{ $collection->name }}</li>
            @endif
        @endforeach
    </ol>
@endforeach

<!-- <h1>Periode 1 <button class="add_field_button btn btn-success btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></h1>
<div class="row">
    <div class="col-lg-1" style="text-align: center"><i class="fas fa-chevron-left" style="font-size: 6em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-1" style="text-align: center"><i class="fas fa-chevron-right" style="font-size: 6em"></i></div>
</div><div class="row">
    <div class="col-lg-1" style="text-align: center"></div>
    <div class="col-lg-2" style="text-align: center">Produk A</div>
    <div class="col-lg-2" style="text-align: center">Produk B</div>
    <div class="col-lg-2" style="text-align: center">Produk C</div>
    <div class="col-lg-2" style="text-align: center">Produk D</div>
    <div class="col-lg-2" style="text-align: center">Produk E</div>
    <div class="col-lg-1" style="text-align: center"></div>
</div>
<h1>Periode 2 <button class="add_field_button btn btn-success btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></h1>
<div class="row">
    <div class="col-lg-1" style="text-align: center"><i class="fas fa-chevron-left" style="font-size: 6em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-1" style="text-align: center"><i class="fas fa-chevron-right" style="font-size: 6em"></i></div>
</div><div class="row">
    <div class="col-lg-1" style="text-align: center"></div>
    <div class="col-lg-2" style="text-align: center">Produk A</div>
    <div class="col-lg-2" style="text-align: center">Produk B</div>
    <div class="col-lg-2" style="text-align: center">Produk C</div>
    <div class="col-lg-2" style="text-align: center">Produk D</div>
    <div class="col-lg-2" style="text-align: center">Produk E</div>
    <div class="col-lg-1" style="text-align: center"></div>
</div>
<h1>Periode 3 <button class="add_field_button btn btn-success btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></h1>
<div class="row">
    <div class="col-lg-1" style="text-align: center"><i class="fas fa-chevron-left" style="font-size: 6em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-1" style="text-align: center"><i class="fas fa-chevron-right" style="font-size: 6em"></i></div>
</div><div class="row">
    <div class="col-lg-1" style="text-align: center"></div>
    <div class="col-lg-2" style="text-align: center">Produk A</div>
    <div class="col-lg-2" style="text-align: center">Produk B</div>
    <div class="col-lg-2" style="text-align: center">Produk C</div>
    <div class="col-lg-2" style="text-align: center">Produk D</div>
    <div class="col-lg-2" style="text-align: center">Produk E</div>
    <div class="col-lg-1" style="text-align: center"></div>
</div>
<h1>Periode 4 <button class="add_field_button btn btn-success btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></h1>
<div class="row">
    <div class="col-lg-1" style="text-align: center"><i class="fas fa-chevron-left" style="font-size: 6em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-2" style="text-align: center"><i class="fas fa-image" style="font-size: 8em"></i></div>
    <div class="col-lg-1" style="text-align: center"><i class="fas fa-chevron-right" style="font-size: 6em"></i></div>
</div><div class="row">
    <div class="col-lg-1" style="text-align: center"></div>
    <div class="col-lg-2" style="text-align: center">Produk A</div>
    <div class="col-lg-2" style="text-align: center">Produk B</div>
    <div class="col-lg-2" style="text-align: center">Produk C</div>
    <div class="col-lg-2" style="text-align: center">Produk D</div>
    <div class="col-lg-2" style="text-align: center">Produk E</div>
    <div class="col-lg-1" style="text-align: center"></div>
</div> -->
<br>
<button class="add_field_button btn btn-success btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Periode</button>
                    
@endsection