@extends('layouts.admin-navbar')

@section('title', 'Edit product')

@section('content')

<h1 style="text-align: center">PRODUCT MANAGEMENT</h1>

<br>
<hr>

<ul>
	<li>{{ $collection->id }}</li>
	<li>{{ $collection->name }}</li>
	<li>{{ $collection->year }}</li>
</ul>

@endsection