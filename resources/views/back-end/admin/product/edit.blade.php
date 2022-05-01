@extends('back-end.master')


@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/library/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Product', 'key' => 'Edit','route_redirect'=> route('product.index')])

        @include('back-end.components.alert-session' , ['path_home' => route('product.index')])

        <form action="{{ route('product.update',  $product->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       value="{{ $product->name }}" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Product Price</label>
                                <input step="any" type="number"
                                       class="form-control"
                                       name="price"
                                       value="{{ $product->price }}" />
                                @error('price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Image Master</label>
                                <input type="file"
                                       class="form-control-file"
                                       name="image_path_master"
                                       value="{{ $product->image_path_master }}" />

                                @error('image_path_master')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-md-4 feature_image_container">
                                    <div class="row">
                                        <img class="feature_image" src="{{ $product->image_path_master }}" alt="">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Image Details</label>
                                <input type="file"
                                       multiple
                                       class="form-control-file"
                                       name="image_path[]" />

                                @error('image_path')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-md-12 container_image_detail">
                                    <div class="row">
                                        @foreach($product->images as $producImageItem)
                                            <div class="col-md-3">
                                                <img class="image_detail_product"
                                                     src="{{ $producImageItem->image_path }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">
                                <label>Select Category</label>
                                <select class="form-control select2_init" name="category_id" required>
                                    <option value="">Chọn danh mục</option>
                                    {!! $html_option !!}
                                </select>
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Product Tags</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                    @foreach($product->tags as $tagItem )
                                        <option value="{{ $tagItem->name }}" selected>{{ $tagItem->name }}</option>
                                    @endforeach 
                                </select>
                            </div>


                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea name="content" class="form-control tinymce_editor_init"
                                          rows="8">{{ $product->content }}</textarea>

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
