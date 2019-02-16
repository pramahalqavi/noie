@extends('layouts.admin-navbar')

@section('title', 'Product management')

@section('content')

<h1 style="text-align: center">PRODUCT MANAGEMENT</h1>

<hr style="width: .2%">

@foreach ($years as $year)
    <hr class="right-line"><h2 class="year-section" onclick="showCollection('{{$year->year}}')"><i id="arrow{{$year->year}}" class="fas fa-angle-right"></i> {{ $year->year }}</h2>
    <ol id="show{{$year->year}}" class="collection-list">
        @foreach ($collections as $collection)
            @if ($collection->year == $year->year)
            <li>{{ $collection->name }}</li>
            @endif
        @endforeach
    </ol>
@endforeach

<br>
<button onclick="showFormAddYear()" class="add_field_button btn btn-success btn-md"><span id="addY" class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Year</button>
    
<div id="addYear">
    <br><hr><br>
    <form action="/admin/product" method="POST">
        <div class="form-group row">
            <label for="collection1" class="col-sm-2 col-form-label" style="margin-top: .8em">Collection 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="collection1" placeholder="Type here...">
            </div>
        </div>
        <div class="form-group row">
            <label for="collection2" class="col-sm-2 col-form-label" style="margin-top: .8em">Collection 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="collection2" placeholder="Type here...">
            </div>
        </div>
        <div class="form-group row">
            <label for="collection3" class="col-sm-2 col-form-label" style="margin-top: .8em">Collection 3</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="collection3" placeholder="Type here...">
            </div>
        </div>
        <div class="form-group row">
            <label for="collection4" class="col-sm-2 col-form-label" style="margin-top: .8em">Collection 4</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="collection4" placeholder="Type here...">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection