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
                        @include('back-end.components.alert-session' , ['path_home' => route('slider.index')])
                        <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Slider Name</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       value="{{ $slider->name }}" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Slider Description</label>
                                <textarea class="form-control" 
                                        name="description" rows="4">{{ $slider->description }}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror                                        
                            </div>

                            <div class="form-group">
                                <label>Slider Image</label>
                                <input type="file"
                                       class="form-control-file"
                                       name="image_path" />

                                @error('image_path')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror    
                                <label class="mt-3"> Image old: </label>
                                <img width="100%" height="150" src="{{ $slider->image_path }}" alt="">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

