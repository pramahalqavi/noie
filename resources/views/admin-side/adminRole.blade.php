@extends('layouts.admin-navbar')

@section('title', 'Admin role')

@section('content')
<h1 style="text-align: center">ADMIN ROLE</h1>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<a class="btn btn-primary top-table-btn" href="{{route('admin-role.register')}}">Add New Admin</a>
@if (Session::get('auth-email') == 'diahdewi.165@gmail.com')
    <button class="btn btn-danger top-table-btn" type="button" onclick="deleteAdminOnPress({{$admins->count()}})" id="delete-admin-btn">Delete Admin</button>
@endif
<table class="table table-striped" id="admin-table">
  <thead style="background-color: #279636; color: white">
    <tr>
      <th scope="col" width="80%">Admin</th>
      <th scope="col" width="20%"></th>
    </tr>
  </thead>
  <tbody>
  @if($admins->count())
      @foreach($admins as $index => $admin)
      <tr>
        <form method="post" action="{{route('admin-role.delete')}}">
        <td>{{$admin->email}}</td>
        <input type="hidden" value="{{$admin->email}}" name="email"/>
        <td>
        @if (Session::get('auth-email') == 'diahdewi.165@gmail.com')
            <button type="button" class="btn btn-danger table-btn" data-toggle="modal" data-target="#confirmationModal_{{$index}}" id="delete-btn-no-{{$index}}" >Delete</button>
        @endif
        </td>
        <!-- Modal -->
        <div class="modal fade" id="confirmationModal_{{$index}}" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                </div>

                <div class="modal-body">
                    <p>Deleted account cannot be restored. Are you sure want to delete {{$admin->email}} admin account?</p>
                </div>

                <div class="modal-footer text-right">
                    <button type="button" class="btn btn-primary modal-button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger modal-button" value="OK" width="20%"/>
                    {{csrf_field()}}
                </div>
            </div>
            
            </div>
        </div>
        </form>
      </tr>
      @endforeach
  @endif

  </tbody>
</table>
<div class="text-center"> 
  {!! $admins->links() !!}
</div>
@endsection