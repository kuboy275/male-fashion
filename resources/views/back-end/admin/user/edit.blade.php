@extends('back-end.master')


@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/library/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'User', 'key' => 'Edit','route_redirect'=> route('user.index')])

        @include('back-end.components.alert-session' , ['path_home' => route('user.index')])

        <form action="{{ route('user.update',  $user->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label> Name </label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       value="{{ $user->name }}" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> Email </label>
                                <input type="text"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ $user->email }}" />
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label> Phone number </label>
                                <input type="text"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       name="phone"
                                       value="{{ $user->phone }}" />
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Choose role</label>
                                <select class="form-control select2_init @error('role_id') is-invalid @enderror" name="role_id" required>
                                    <option value=""> Choose role </option>
                                    @foreach($roles as $role)
                                        @if($user->roles == null)
                                            <option  value="{{ $role->id }}"> {{ $role->name }} </option>
                                        @else
                                            <option  value="{{ $role->id }}" {{ $role->id == $user->roles->id ? 'selected' : ''   }}> {{ $role->name }} </option>
                                        @endif
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
                                       name="password" />
                            </div>

                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')
    <script src="{{ asset('backend/admins/library/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('backend/admins/library/select2/select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/d8ozmshoy7htjdoi3ytshqmtaztopd4bt6ajxemrb3uudqyz/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('backend/admins/custom/custom.js') }}"></script>
@endsection
