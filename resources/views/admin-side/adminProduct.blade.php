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
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    @foreach ($years as $year)
    <div class="row">
        <div class="col-md-2">
            <h2 class="year-section" onclick="showCollection('{{$year->year}}')" style="display: inline-block;"><i id="arrow{{$year->year}}" class="fas fa-angle-right"></i> {{ $year->year }}</h2>

            <!-- Edit button to trigger modal -->
            <button id="editYear-button-{{ $year->year }}" type="button" class="editYear" data-toggle="modal" data-target="#editYear-{{$year->year}}"><i class="fas fa-pencil-alt edit-icon"></i></button>

        </div>
        <div class="col-md-10">
            <hr style="width: 100%; margin: 2.15em 0">
        </div>
    </div>
    <div class="row">
        @php($collections = App\Models\Collection::where('year', $year->year)->get(['id', 'name']))

        <!-- MODAL FOR EDITING YEARLY PERIOD -->
        <div id="editYear-{{$year->year}}" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Annual Collections</h5>
                        <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('collections.edit') }}" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="year" style="font-size: 2em">Year</label>
                            <input type="text" class="form-control" name="year" id="year" value="{{$year->year}}">
                        </div>
                        <br>

                        @foreach ($collections as $i => $c)
                        <div class="form-group">
                            <label for="collection{{$i+1}}">Collection {{$i+1}}</label>
                            <input type="text" class="form-control" name="collection{{$i+1}}" id="collection{{$i+1}}" value="{{$c->name}}">
                        </div>
                        @endforeach

                        <input type="hidden" name="_method" value="PUT">

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
        
        <ol id="show{{$year->year}}" class="collection-list">
        @foreach ($collections as $c)
            <a href="{{ route('products.show', $c->id) }}"><li>{{ $c->name }}</li></a>
        @endforeach
        </ol>
    </div>
    @endforeach
</div>

<!-- MODAL FOR ADDING YEARLY PERIOD -->
<div id="adding-year" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Annual Collections</h5>
        <button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('collections.store') }}" method="post">
        <div class="modal-body">
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