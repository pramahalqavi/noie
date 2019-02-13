@extends('layouts.admin-navbar')

@section('content')
<div class="container">
    <div class="col-lg-10" style="margin:0 auto;" >
        <div class="jumbotron">
            <div class="form-group">
                <h2>
                    Register New Admin
                </h2>
            </div>
            <br>
            <form class="form-horizontal" style="margin: 0 auto" action="{{route('admin-role')}}" method="post">
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" onblur="checkEmail()" name="email" id="email-id" required value="{{old('email')}}">
                <p id="email-warning"></p>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" onblur="checkPassword()" name="psw" id="psw-id" required>
                <p id="pass-warning"></p>

                <label for="psw-repeat"><b>Confirm Password</b></label>
                <input type="password" placeholder="Confirm Password" onblur="checkConfPassword()" name="psw-repeat" id="psw-repeat-id" required>
                <p id="confpass-warning"></p>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div classs="form-group row input-group" style="margin-top: 2em">
                    <button class="btn btn-lg btn-primary text-uppercase btn-block" type="submit" onclick="return checkEmail()" id="reg-btn">Register</button>
                    {{csrf_field()}}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection