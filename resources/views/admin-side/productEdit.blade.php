@extends('layouts.admin-navbar')

@section('title', 'Edit product')

@section('content')

<h1 style="text-align: center">PRODUCT MANAGEMENT</h1>

<br>
<hr>

<h2>{{ $collection->name }} - {{ $collection->year }}</h2>
<button class="add_field_button btn btn-success btn-md btnPlus" data-toggle="modal" data-target="#adding-product"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Product</button>

<ol>
@foreach ($products as $p)
	<li>{{ $p->name }} (Rp {{ $p->price }})</li>
@endforeach
</ol>

<br>

@foreach ($products as $p)
<figure class="figure">
	<img src="{{asset($p->image)}}" class="img-thumbnail figure-img img-fluid rounded" alt="..." width="200" height="200">
	<figcaption class="figure-caption">
		<ul>
			<li>Nama</li>
			<li>Material</li>
			<li>Size</li>
			<li>Price</li>
		</ul>
 	</figcaption>
</figure>
@endforeach


<!-- MODAL FOR ADDING PRODUCT -->
<div id="adding-product" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">ADD PRODUCT</h5>
        <button id="closeBtn"type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection