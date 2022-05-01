@extends('back-end.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Slider ', 'key' => 'List','route_redirect'=> route('slider.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Slider name</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       placeholder="Nhập tên"
                                       value="{{ old('name') }}"
                                >
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Slider description</label>

                                <textarea
                                    class="form-control @error('description') is-invalid @enderror"
                                    name="description" rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Slider image</label>
                                <input type="file"
                                       class="form-control-file @error('image_path') is-invalid @enderror"
                                       name="image_path" >
                                @error('image_path')
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

