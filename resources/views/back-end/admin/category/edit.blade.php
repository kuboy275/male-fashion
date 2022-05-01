@extends('back-end.master')

@section('content')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/library/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

<div class="content-wrapper">
    @include('back-end.components.content-header', ['name' => 'Category', 'key' => 'Edit','route_redirect'=> route('category.index')])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    @include('back-end.components.alert-session' , ['path_home' => route('category.index')])
                    <form action="{{ route('category.update', $category->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Chọn danh mục cha</label>
                            <select class="form-control select2_init" name="parent_id">
                                <option value="0">Pick Category Parent</option>
                                {!! $html_option !!}
                            </select>
                            @error('parent_id')
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
    <script src="{{ asset('backend/admins/custom/custom.js') }}"></script>
    <script src="{{ asset('backend/admins/library/select2/select2.min.js') }}"></script>
@endsection
