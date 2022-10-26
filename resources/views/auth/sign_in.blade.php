@extends('layout.master')
@section('title', 'login')
@section('content')
    <div class="header-signup">
        <h2>ABC BANK</h2>

        <form action="{{url('store-sign-up')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="heading">
                <h4>Create new account</h4>
            </div>

            <div class="container">
                <div class="form-group">
                    <label for="name"><b>Name</b></label>
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email"><b>Email address</b></label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password"><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>̥
                <label>
                    <input type="checkbox" name="agree_policy"> Agree the <a href="#">terms and policy</a>
                </label>
                <button type="submit" class="btn btn-primary">Create New Accound</button>
            </div>
        </form>
        <span class="psw sign-up">Already have an account? <a href="{{url('login')}}">Sign in</a></span>
    </div>

@endsection
