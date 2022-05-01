@extends('back-end.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/library/select2/select2.min.css') }}">    
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'User ', 'key' => 'Create','route_redirect'=> route('user.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label> Name </label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       placeholder="Enter name"
                                       value="{{ old('name') }}" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> Email </label>
                                <input type="text"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       placeholder="Enter email"
                                       value="{{ old('email') }}" />
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> Phone number </label>
                                <input type="text"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       name="phone"
                                       placeholder="Enter phone"
                                       value="{{ old('phone') }}" />
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Choose role</label>
                                <select class="form-control @error('role_id') is-invalid @enderror"
                                        name="role_id">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}"> {{ $role->name }} </option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> Password </label>
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password"
                                       placeholder="Enter password" />
                            </div>

                            <div class="form-group">
                                <label> Password Confirm </label>
                                <input type="password"
                                       class="form-control"
                                       name="password_confirmation"
                                       placeholder="Confirm password" />

                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                
                            </div>
                         
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script src="{{ asset('backend/admins/library/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('backend/admins/library/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/d8ozmshoy7htjdoi3ytshqmtaztopd4bt6ajxemrb3uudqyz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('backend/admins/custom/custom.js') }}"></script>
@endsection
