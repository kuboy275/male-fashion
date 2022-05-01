@extends('back-end.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Blog ', 'key' => 'Create','route_redirect'=> route('blog.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title blog </label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="title"
                                       placeholder="Enter title blog"
                                       value="{{ old('title') }}"
                                >
                                @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Image Master</label>
                                <input type="file"
                                       class="form-control-file @error('image_path') is-invalid @enderror"
                                       name="image_path" >
                                @error('image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Content</label>

                                <textarea
                                    class="form-control tinymce_editor_init @error('content') is-invalid @enderror"
                                    name="content" rows="4">{{ old('content') }}</textarea>
                                @error('content')
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
