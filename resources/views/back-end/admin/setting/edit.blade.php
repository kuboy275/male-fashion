@extends('back-end.master')

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Settings ', 'key' => 'Update','route_redirect'=> route('role.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @include('back-end.components.alert-session' , ['path_home' => route('setting.index')])
                        <form action="{{ route('setting.update',  $setting->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Config key</label>
                                <input type="text" class="form-control" name="config_key"
                                       disabled
                                       value="{{ $setting->config_key }}" >
                            </div>

                            <div class="form-group">
                                <label>Config value</label>
                                <input type="text"
                                       class="form-control @error('config_value') is-invalid @enderror"
                                       name="config_value"
                                       placeholder="Nhập config value"
                                       value="{{ $setting->config_value }}"
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

