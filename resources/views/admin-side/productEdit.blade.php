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
			<li>Name</li>
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
		        <label for="img1">Image #1</label>
		        <input type="file" name="img1" id="img1" required>
		    </div>
		    <div class="form-group">
		        <label for="img2">Image #2</label>
		        <input type="file" name="img2" id="img2" required>
		    </div>
		    <div class="form-group">
		    	<label for="name">*Name</label>
		    	<input type="text" class="form-control" name="name" id="name" placeholder="Enter here" required>
            </div>
            <div class="form-group">
		    	<label for="material">*Material</label>
		    	<input type="text" class="form-control" name="material" id="material" placeholder="Enter here" required>
            </div>
            <div class="form-group">
		    	<label for="size">Size</label>
		    	<input type="text" class="form-control" name="size" id="size" placeholder="Enter here">
            </div>
            <div class="form-group">
		    	<label for="price">*Price</label>
		    	<input type="text" class="form-control" name="price" id="price" placeholder="Enter here" required>
            </div>
		    {{ csrf_field() }}
		    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
       		<!-- <p>Modal body text goes here.</p> -->
       	</div>
       	<div class="modal-footer">
       		<button type="submit" class="btn btn-primary">Save changes</button>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	    </div>
	</form>
    </div>
  </div>
</div>

@endsection