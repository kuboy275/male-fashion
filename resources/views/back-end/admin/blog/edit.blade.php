@extends('back-end.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Blog ', 'key' => 'Update','route_redirect'=> route('blog.index')])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @include('back-end.components.alert-session' , ['path_home' => route('blog.index')])
                        <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text"
                                       class="form-control"
                                       name="title"
                                       value="{{ $blog->title }}" />
                                    @error('title')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror                                       
                            </div>

                            <div class="form-group">
                                <label>Image master</label>
                                <input type="file"
                                       class="form-control-file"
                                       name="image_path" />

                                @error('image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror    

                                <label class="mt-3"> Image old: </label>
                                <img width="100%" height="150" src="{{ $blog->image_path }}" alt="">

                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control tinymce_editor_init" name="content" rows="4">
                                    {{ $blog->content }}
                                </textarea>
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
