@extends('front-end.master')
@section('content')

<link rel="stylesheet" href="{{ asset('frontend/css/login.css') }}">
    
<div class="container-fluid">
    <div class="row">
      <div class="col-sm-7 login-section-wrapper">
        <div class="login-wrapper my-auto">
            <h1 class="login-title">Register</h1>
            {{-- Form Login--}}
            <form action="{{ route('postRegister') }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-12">
                        <div class="form-group">
                            <label for="email">Email <span>*</span> </label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                            @if ($errors->has('email'))
                                <span class="text-danger mt-2">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="name">Name <span>*</span> </label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            @if ($errors->has('name'))
                                <span class="text-danger mt-2">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="phone">Phone <span>*</span> </label>
                            <input type="number" name="phone" value="{{ old('phone') }}" class="form-control">

                            @if ($errors->has('phone'))
                                <span class="text-danger mt-2">{{ $errors->first('phone') }}</span>
                            @endif
                            
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label for="password">Password <span>*</span> </label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Confirm password <span>*</span> </label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                @if ($errors->has('password'))
                    <span class="text-danger mt-2">{{ $errors->first('password') }}</span>
                @endif

                <button class="btn btn-block login-btn" type="submit"> Register </button>
            </form>
            {{-- Form Login--}}
            <p class="login-wrapper-footer-text">Have an account? <a href="/login" class="text-reset">Login here</a></p>
        </div>
      </div>
      <div class="col-sm-5 px-0 d-none d-sm-block">
        <img class="login-img" width="100%" src="{{ asset('frontend/img/banner/banner-1.jpg') }}" alt="">
      </div>
    </div>
  </div>

@endsection
