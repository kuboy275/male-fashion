@extends('back-end.master')

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Settings ', 'key' => 'List','route_redirect'=> route('role.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('setting.store') . '?type=' . request()->type }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Config key</label>
                                <input type="text"
                                       class="form-control @error('config_key') is-invalid @enderror"
                                       name="config_key"
                                       placeholder="Nhập config key"
                                >
                                @error('config_key')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Config value</label>
                                <input type="text"
                                        class="form-control @error('config_value') is-invalid @enderror"
                                        name="config_value"
                                        placeholder="Nhập config value"
                                >
                                @error('config_value')
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

