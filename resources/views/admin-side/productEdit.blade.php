@extends('layouts.admin-navbar')

@section('title', 'Edit product')

@section('content')

<h1 style="text-align: center">PRODUCT MANAGEMENT</h1>

<br>
<hr>

<h2>{{ $collection->name }} - {{ $collection->year }}</h2>
<button onclick="showFormAddProduct()" class="add_field_button btn btn-success btn-md"><span id="addY" class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Product</button>

<ol>
@foreach ($products as $p)
	<li>{{ $p->name }} (Rp {{ $p->price }})</li>
@endforeach
</ol>

@endsection