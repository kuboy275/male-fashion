@extends('back-end.master')


@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/library/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Product', 'key' => 'Create','route_redirect'=> route('product.index')])
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf

                            <div class="form-group">
                                <label>Name product</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       placeholder="Enter name product"
                                       value="{{ old('name') }}"
                                >
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pricing product </label>
                                <input type="text"
                                       class="form-control @error('price') is-invalid @enderror"
                                       name="price"
                                       placeholder="Enter pricing product"
                                       value="{{ old('price') }}"
                                >
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Master image</label>
                                <input type="file" class="form-control-file"  name="image_path_master" >
                                @error('image_path_master')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Detailed images</label>
                                <input type="file"
                                       multiple
                                       class="form-control-file"
                                       name="image_path[]" />
                                @error('image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Choose category</label>
                                <select class="form-control select2_init @error('category_id') is-invalid @enderror"
                                        name="category_id">
                                    <option value="">Choose category</option>
                                    {!! $html_option !!}
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Enter tags product </label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">

                                </select>
                            </div>


                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Enter content description</label>
                                <textarea
                                    name="content"
                                    class="@error('content') is-invalid @enderror 
                                            form-control tinymce_editor_init"
                                    rows="8">{{ old('content') }}
                                </textarea>

                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
