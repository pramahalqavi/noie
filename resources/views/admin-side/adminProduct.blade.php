@extends('layouts.admin-navbar')

@section('title', 'Collection per year')

@section('content')

<h1 style="text-align: center">PRODUCT MANAGEMENT</h1>

<hr class="cus-style">
<br>
<br>

<button class="add_field_button btn btn-success btn-md btnPlus" data-toggle="modal" data-target="#adding-year"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add</button>

<br>

@if (session('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="container">
    @foreach ($years as $year)
    <div class="row">
        <div class="col-md-2">
            <h2 class="year-section" onclick="showCollection('{{$year->year}}')"><i id="arrow{{$year->year}}" class="fas fa-angle-right"></i> {{ $year->year }}</h2>
            <ol id="show{{$year->year}}" class="collection-list">
                @foreach ($collections as $collection)
                    @if ($collection->year == $year->year)
                    <a href="{{ route('products.show', $collection->id) }}"><li>{{ $collection->name }}</li></a>
                    @endif
                @endforeach
            </ol>
        </div>
        <div class="col-md-10">
            <hr style="width: 100%; margin: 2.2em 0">
        </div>
    </div>
    @endforeach
</div>

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
      <form action="{{ route('collections.store') }}" method="post">
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
                <label for="year" style="font-size: 2em">Year<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="year" id="year" placeholder="Enter here" required>
            </div>
            <br>
            <div class="form-group">
                <label for="collection1">Collection 1<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="collection1" id="collection1" placeholder="Enter here" required>
            </div>
            <div class="form-group">
                <label for="collection2">Collection 2<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="collection2" id="collection2" placeholder="Enter here" required>
            </div>
            <div class="form-group">
                <label for="collection3">Collection 3<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="collection3" id="collection3" placeholder="Enter here" required>
            </div>
            <div class="form-group">
                <label for="collection4">Collection 4<span style="color: red">*</span></label>
                <input type="text" class="form-control" name="collection4" id="collection4" placeholder="Enter here" required>
            </div>
            <p style="color: red">* Required</p>
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

@endsection