@extends('layout.master')
@section('title', 'login')
@section('content')
    <div class="header-login">
        <h2>ABC BANK</h2>

        <form action="{{url('user-login')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="heading">
                <h4>Login To Your Account</h4>
            </div>

            <div class="container">
                <div class="form-group">
                <label for="email"><b>Email</b></label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email" value="" required>
            </div>̥
            <div class="form-group">
                <label for="password"><b>Password</b></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
            </div>
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <span class="psw sign-up">Don't have account yet? <a href="{{url('sign-up')}}">Sign up</a></span>
    </div>

@endsection
