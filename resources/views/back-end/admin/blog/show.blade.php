@extends('back-end.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

@section('js')
    <script src="{{ asset('backend/admins/library/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('backend/admins/custom/custom.js') }}"></script>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Blog ', 'key' => 'Show','route_redirect'=> route('blog.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <img class="card-img-top" height="300" src="{{ $blog->image_path }}" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title mb-3"> {{ $blog->title }}</h5>
                              {{-- <p class="card-text"> {!! $blog->content !!} </p> --}}
                             <div class="card-text mb-0">
                                {!! $blog->content !!}
                             </div>
                              <div class="d-flex">
                                <p class="card-text mr-3"> <b>Posted by:</b> {{ optional($blog->user)->name }} </p>
                                <p class="card-text"> <b>Date post:</b> {{ $blog->updated_at }} </p>
                              </div>
                              <a href="{{ route('blog.index') }}" class="btn btn-primary">Back to list</a>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

