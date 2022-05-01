@extends('back-end.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/library/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Category', 'key' => 'Add','route_redirect'=> route('category.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Category name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name category" >
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Category child</label>
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
