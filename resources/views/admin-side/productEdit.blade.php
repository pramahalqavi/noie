@extends('layouts.admin-navbar')

@section('title', 'Edit product')

@section('content')

<h1 style="text-align: center">PRODUCT MANAGEMENT</h1>

<br>
<hr>

<h2>Collection {{ $collection->name }} <i class="fas fa-arrow-right" style="font-size: .8em"></i> {{ $collection->year }}</h2>
<button class="add_field_button btn btn-success btn-md btnPlus" data-toggle="modal" data-target="#adding-product"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Product</button>

@if (session('success'))
<br>
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@elseif (session('failed'))
<br>
<div class="alert alert-danger" role="alert">
  {{ session('failed') }}
</div>
@endif

<br>

<table id="edit-product" class="table">
  <thead class="thead-dark" style="background-color: #DDDDDD">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Material</th>
      <th scope="col">Size</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@php($i = 0)
  	@foreach ($products as $p)
  	@php($i++)
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
      <td>Rp {{ number_format($p->price) }}</td>
      <td>

        <!-- Button trigger modal -->
        <button id="editProduct-button-{{ $p->product_id }}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProduct-{{ $p->product_id }}" style="padding-left: 0.8em; padding-right: 0.8em"><i style="font-size: 1.5em" class="fas fa-pencil-alt"></i></i></button>

        <!-- MODAL FOR EDIT PRODUCT -->
        <div id="editProduct-{{ $p->product_id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editProductTitle-{{ $p->product_id }}" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editProductTitle-{{ $p->product_id }}">EDIT PRODUCT</h5>
                <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ url('admin/product', $collection->id) }}" method="post" enctype="multipart/form-data">
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
                  <div class="form-group">
                    <label for="img1">Image #1</label>
                    <input type="file" name="img1" id="img1">
                </div>
                <div class="form-group">
                    <label for="img2">Image #2</label>
                    <input type="file" name="img2" id="img2">
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ $p->name }}">
                    </div>
                    <div class="form-group">
                  <label for="material">Material</label>
                  <input type="text" class="form-control" name="material" id="material" value="{{ $p->material }}">
                    </div>
                    <div class="form-group">
                  <label for="size">Size</label>
                  <p>Separate using space. E.g: S M L XL</p>
                  <p>One size? Let the field empty</p>
                  <input type="text" class="form-control" name="size" id="size" value="{{ $p->size }}">
                    </div>
                    <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" name="price" id="price" value="{{ $p->price }}">
                    </div>
                    <p style="color: red">* Required</p>
                {{ csrf_field() }}
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
          </form>
            </div>
          </div>
        </div>

        <!-- Button trigger modal -->
        <button id="deleteProduct-button-{{$p->product_id}}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-confirm-{{ $p->product_id }}"><i style="font-size: 1.5em" class="fas fa-trash"></i></button>

        <!-- MODAL FOR DELETE CONFIRMATION -->
        <div class="modal fade" id="delete-confirm-{{ $p->product_id }}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmTItle-{{ $p->product_id }}" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmTItle-{{ $p->product_id }}">DELETE CONFIRMATION</h5>
                <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Deleted product cannot be restored. Are you sure you want to delete {{$p->name}} product?</p>
              </div>
              <div class="modal-footer">
                <form action="{{ url('admin/product', $collection->id) }}" method="post" style="display: inline-block;">
                  <button type="submit" class="btn btn-primary">Yes, Delete</button>
                  <input type="hidden" name="id" value="{{ $p->product_id }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                </form>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No, Cancel</button>
              </div>
            </div>
          </div>
        </div>

      </td>
    </tr>
    @endforeach
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
		        <label for="img1">Image #1<span style="color: red">*</span></label>
		        <input type="file" name="img1" id="img1" required>
		    </div>
		    <div class="form-group">
		        <label for="img2">Image #2<span style="color: red">*</span></label>
		        <input type="file" name="img2" id="img2" required>
		    </div>
		    <div class="form-group">
		    	<label for="name">Name<span style="color: red">*</span></label>
		    	<input type="text" class="form-control" name="name" id="name" placeholder="Enter here" required>
            </div>
            <div class="form-group">
		    	<label for="material">Material</label>
		    	<input type="text" class="form-control" name="material" id="material" placeholder="Enter here">
            </div>
            <div class="form-group">
		    	<label for="size">Size</label>
          <p>Separate using space. E.g: S M L XL</p>
          <p>One size? Let the field empty</p>
		    	<input type="text" class="form-control" name="size" id="size" placeholder="Enter here">
            </div>
            <div class="form-group">
		    	<label for="price">Price<span style="color: red">*</span></label>
		    	<input type="text" class="form-control" name="price" id="price" placeholder="Enter here" required>
            </div>
            <p style="color: red">* Required</p>
		    {{ csrf_field() }}
		    <!-- <button type="submit" class="btn btn-default">Submit</button> -->
       		<!-- <p>Modal body text goes here.</p> -->
       	</div>
       	<div class="modal-footer">
       		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

@endsection