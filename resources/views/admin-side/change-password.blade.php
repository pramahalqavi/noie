@extends('layouts.admin-navbar')

@section('content')
<div class="container">
    <div class="col-lg-10" style="margin:0 auto;" >
        <div class="jumbotron">
            <div class="form-group">
                <h2>
                    Change Password
                </h2>
            </div>
            <br>
            <form class="form-horizontal" style="margin: 0 auto" action="{{route('change-password.submit')}}" method="post">
                <label for="curpsw"><b>Current Password</b></label>
                <input type="password" placeholder="Enter Current Password" name="curpsw" id="cur-psw-id" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter New Password" onblur="checkPassword()" name="psw" id="psw-id" pattern=".{8,}" required>
                <p id="pass-warning"></p>

                <label for="pswrepeat"><b>Confirm Password</b></label>
                <input type="password" placeholder="Confirm New Password" onblur="checkConfPassword()" name="pswrepeat" id="psw-repeat-id" pattern=".{8,}" required>
                <p id="confpass-warning"></p>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div classs="form-group row input-group" style="margin-top: 2em">
                    <button class="btn btn-lg btn-primary text-uppercase btn-block" type="submit" onclick="return checkChangePassword()" id="reg-btn">Submit</button>
                    {{ method_field('PUT') }}
                    {{csrf_field()}}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection