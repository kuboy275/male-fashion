@extends('front-end.master')
@section('content')

<link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
    
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 login-section-wrapper">
        <div class="login-wrapper my-auto">
            <h1 class="login-title">Log in</h1>
            {{-- Form Login--}}
            <form action="{{ route('postLogin') }}" method="POST">
                @csrf
                <div class="form-group ">
                    <label for="email">Email Or Number phone <span>*</span> </label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control">

                    @if ($errors->has('email'))
                      <span class="text-danger mt-2">{{ $errors->first('email') }}</span>
                    @endif

                </div>

                <div class="form-group">
                    <label for="password">password <span>*</span> </label>
                    <input type="password" name="password" class="form-control">

                    @if ($errors->has('password'))
                      <span class="text-danger mt-2">{{ $errors->first('password') }}</span>
                    @endif

                </div>

                <div class="form-group">
                    <div class="checkout__input__checkbox">
                        <label for="remember">
                            Remember
                            <input name="remember" type="checkbox" id="remember">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>

                @if (Session::has('error'))
                  <span class="text-danger mt-2">{{ Session::get('error') }}</span>
                @endif

                <button class="btn btn-block login-btn" type="submit"> Login </button>
            </form>
            {{-- Form Login--}}
            <a href="#!" class="forgot-password-link">Forgot password?</a>
            <p class="login-wrapper-footer-text">Don't have an account? <a href="/register" class="text-reset">Register here</a></p>
        </div>
      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img class="login-img" width="100%" src="{{ asset('frontend/img/banner/banner-1.jpg') }}" alt="">
      </div>
    </div>
  </div>

@endsection
