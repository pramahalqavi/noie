@extends('layouts.admin-navbar')

@section('title', 'Collection per year')

@section('content')

<h1 style="text-align: center">PRODUCT MANAGEMENT</h1>

<br>
<hr>
<br>
<br>

<button onclick="showFormAddYear()" class="add_field_button btn btn-success btn-md"><span id="addY" class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Year</button>
<!-- <hr class="right-line"> -->
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

<div id="addYear">
    <br><br><br>
    <form action="/admin/product" method="POST">
        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label" style="font-size: 2em">Year</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="year" name="year" placeholder="Type here...">
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <label for="collection1" class="col-sm-2 col-form-label" style="margin-top: .8em; text-align: center">Collection 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="collection1" name="collection1" placeholder="Type here...">
            </div>
        </div>
        <div class="form-group row">
            <label for="collection2" class="col-sm-2 col-form-label" style="margin-top: .8em; text-align: center">Collection 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="collection2" name="collection2" placeholder="Type here...">
            </div>
        </div>
        <div class="form-group row">
            <label for="collection3" class="col-sm-2 col-form-label" style="margin-top: .8em; text-align: center">Collection 3</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="collection3" name="collection3" placeholder="Type here...">
            </div>
        </div>
        <div class="form-group row">
            <label for="collection4" class="col-sm-2 col-form-label" style="margin-top: .8em; text-align: center">Collection 4</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="collection4" name="collection4" placeholder="Type here...">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {{ csrf_field() }}
    </form>
</div>

@endsection