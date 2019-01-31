@extends('layouts.admin-navbar')

@section('content')
  

<h1 style="text-align: center">ADMIN ROLE</h1>
<br><br>
<table class="table table-striped">
  <thead style="background-color: #279636; color: white">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto@local.com</td>
      <td>Administrator<i class="fas fa-sort-down" style="color: black"></i></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton@local.com</td>
      <td>Administrator<i class="fas fa-sort-down" style="color: black"></i></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird@local.com</td>
      <td>Administrator<i class="fas fa-sort-down" style="color: black"></i></td>
    </tr>
  </tbody>
</table>
@endsection