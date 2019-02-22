@extends('layouts.admin-navbar')

@section('title', 'Collection per year')

@section('content')

<h1 style="text-align: center">PRODUCT MANAGEMENT</h1>

<br>
<hr>
<br>
<br>

<button class="add_field_button btn btn-success btn-md btnPlus" data-toggle="modal" data-target="#adding-year"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add</button>

@if (session('success'))
<br>
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

@foreach ($years as $year)
    <h2 class="year-section" onclick="showCollection('{{$year->year}}')"><i id="arrow{{$year->year}}" class="fas fa-angle-right"></i> {{ $year->year }}</h2>
    <ol id="show{{$year->year}}" class="collection-list">
        @foreach ($collections as $collection)
            @if ($collection->year == $year->year)
            <a href="/admin/product/{{ $collection->id }}"><li>{{ $collection->name }}</li></a>
            @endif
        @endforeach
    </ol>
@endforeach

<!-- MODAL FOR ADDING YEARLY PERIOD -->
<div id="adding-year" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Collection Per Year</h5>
        <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/admin/product" method="post">
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
                <label for="year" style="font-size: 2em">Year</label>
                <input type="text" class="form-control" name="year" id="year" placeholder="Enter here" required>
            </div>
            <br>
            <div class="form-group">
                <label for="collection1">Collection 1</label>
                <input type="text" class="form-control" name="collection1" id="collection1" placeholder="Enter here" required>
            </div>
            <div class="form-group">
                <label for="collection2">Collection 2</label>
                <input type="text" class="form-control" name="collection2" id="collection2" placeholder="Enter here" required>
            </div>
            <div class="form-group">
                <label for="collection3">Collection 3</label>
                <input type="text" class="form-control" name="collection3" id="collection3" placeholder="Enter here">
            </div>
            <div class="form-group">
                <label for="collection4">Collection 4</label>
                <input type="text" class="form-control" name="collection4" id="collection4" placeholder="Enter here" required>
            </div>
            {{ csrf_field() }}
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
    </form>
    </div>
  </div>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="{{ asset('storage/product/product-img.jpg') }}" class="d-block w-100" alt="...">
      <!-- <div class="d-block w-100" style="background-color: red">
          <p>Testing testing 1</p>
      </div> -->
    </div>
    <div class="carousel-item">
        <img src="{{ asset('storage/product/3-1.jpg') }}" class="d-block w-100" alt="...">
      <!-- <div class="d-block w-100" style="background-color: green">
          <p>Testing testing 2</p>
      </div> -->
    </div>
    <div class="carousel-item">
        <img src="{{ asset('storage/product/product-img.jpg') }}" class="d-block w-100" alt="...">
     <!--  <div class="d-block w-100" style="background-color: yellow">
          <p>Testing testing 3</p>
      </div> -->
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

@endsection