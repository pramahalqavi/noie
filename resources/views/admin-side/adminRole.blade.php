@extends('layouts.admin-navbar')

@section('content')
<h1 style="text-align: center">ADMIN ROLE</h1>
<a class="btn btn-primary top-table-btn" href="{{route('admin-role.register')}}">Add New Admin</a>
<table class="table table-striped">
  <thead style="background-color: #279636; color: white">
    <tr>
      <th scope="col" width="80%">Admin</th>
      <th scope="col" width="20%"></th>
    </tr>
  </thead>
  <tbody>
  @if($admins->count())
      @foreach($admins as $admin)
      <tr>
        <td>{{$admin->email}}</td>
        <td></td>
      </tr>
      @endforeach
  @endif
    
  </tbody>
</table>

@endsection