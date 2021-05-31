@extends('front.layouts.app')
@section('content')
<style>
    ul li
    {
        list-style-type: none;
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card-group">
            <div class="card p-2">
                <div class="card-body">
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @include('front.layouts.message')

                    <form action="/user/login" method="post">
                        {{ csrf_field() }}
                        <h1>
                            <div class="login-logo" style="text-align: center;">
                                <img src="{{asset('images/rgob-logo.png')}}" alt="rgob-logo" class="img-fluid w-25 h-25">
                                <h3>
                                   LOGIN FORM
                                </h3>
                            </div>
                        </h1>
                        <hr>
                        <div class="input-group mb-3" style="padding-bottom:5px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input name="email" type="text" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter Email Address">
                            @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                            @endif
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            </div>
                            <input name="password" type="password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Enter Password">
                            @if($errors->has('password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </em>
                            @endif
                        </div>
                        <div class="row" style="font-family: Verdana, Geneva, Tahoma, sans-serif">
                            <div class="col-6">
                                <input type="submit" class="btn btn-success px-4" value="login">
                                <label class="ml-2"><br>
                                    <input name="remember" type="checkbox"> 
                                    Remember Me
                                </label>
                            </div>
                            <div class="col-6 text-right">
                                <a class="btn btn-link px-0" href="#">
                                    Forgot Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
