@extends('layouts.admin-navbar')

@section('title', 'Edit product')

@section('content')

<h1 style="text-align: center">PRODUCT MANAGEMENT</h1>

<br>
<hr>

<h2>{{ $collection->name }} - {{ $collection->year }}</h2>
<button class="add_field_button btn btn-success btn-md btnPlus" data-toggle="modal" data-target="#adding-product"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Product</button>

@if (session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@elseif (session('failed'))
<div class="alert alert-danger" role="alert">
  {{ session('failed') }}
</div>
@endif

<br>

<table class="table">
  <thead class="thead-dark" style="background-color: #DDDDDD">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Material</th>
      <th scope="col">Size</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$i = 0;
  	foreach ($products as $p) {
  	$i++; ?>
    <tr>
      <th scope="row">{{ $i }}</th>
      <td>
      	<figure class="figure">
			<img src="{{asset($p->thumbnail1)}}" class="img-thumbnail figure-img img-fluid rounded" alt="...">
		</figure>
		<figure class="figure">
			<img src="{{asset($p->thumbnail2)}}" class="img-thumbnail figure-img img-fluid rounded" alt="...">
		</figure>
      </td>
      <td>{{ $p->name }}</td>
      <td>{{ $p->material }}</td>
      <td>{{ $p->size }}</td>
      <td>{{ $p->price }}</td>
    </tr>
    <?php } ?>
  </tbody>
</table>


<!-- MODAL FOR ADDING PRODUCT -->
<div id="adding-product" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">ADD PRODUCT</h5>
        <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ url('admin/image') }}" method="post" enctype="multipart/form-data">
      	<div class="modal-body">
      		@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
      		<input type="hidden" name="collection_id" value="{{ $collection->id }}">
      		<div class="form-group">
		        <label for="img1"><span style="color: red">*</span>Image #1</label>
		        <input type="file" name="img1" id="img1" required>
		    </div>
		    <div class="form-group">
		        <label for="img2"><span style="color: red">*</span>Image #2</label>
		        <input type="file" name="img2" id="img2" required>
		    </div>
		    <div class="form-group">
		    	<label for="name"><span style="color: red">*</span>Name</label>
		    	<input type="text" class="form-control" name="name" id="name" placeholder="Enter here" required>
            </div>
            <div class="form-group">
		    	<label for="material"><span style="color: red">*</span>Material</label>
		    	<input type="text" class="form-control" name="material" id="material" placeholder="Enter here" required>
            </div>
            <div class="form-group">
		    	<label for="size">Size</label>
		    	<input type="text" class="form-control" name="size" id="size" placeholder="Enter here">
            </div>
            <div class="form-group">
		    	<label for="price"><span style="color: red">*</span>Price</label>
		    	<input type="text" class="form-control" name="price" id="price" placeholder="Enter here" required>
            </div>
            <p style="color: red">* : Required</p>
		    {{ csrf_field() }}
		    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
       		<!-- <p>Modal body text goes here.</p> -->
       	</div>
       	<div class="modal-footer">
       		<button type="submit" class="btn btn-primary">Submit</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	    </div>
	</form>
    </div>
  </div>
</div>

@endsection