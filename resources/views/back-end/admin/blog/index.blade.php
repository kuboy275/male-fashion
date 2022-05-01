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
        @include('back-end.components.content-header', ['name' => 'Blog ', 'key' => 'List','route_redirect'=> route('blog.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                   
                    @can('blog-create')
                        <div class="col-md-12">
                            <a href="{{ route('blog.create') }}" class="btn btn-info float-right m-2"> Create </a>
                        </div>
                    @endcan


                    <div class="col-md-12">
                        <table class="table table-hover table-bordered bg-white">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image detail</th>
                                <th colspan="3" scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($blogs as $blog)

                                <tr>
                                    <th scope="row">{{ $blog->id }}</th>
                                    <td>{{ $blog->title }}</td>
                                    <td>
                                        <img class="product_image_150_100" src="{{ $blog->image_path }}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('blog.show',$blog->id) }}"
                                        class="btn btn-default">Show</a>
                                    </td>
                                    
                                    @can('blog-update', $blog)
                                        <td>
                                            <a href="{{ route('blog.edit', $blog->id) }}"
                                                class="btn btn-secondary">Edit</a>
                                        </td>
                                    @endcan

                                    @can('blog-delete', $blog)
                                        <td>
                                            <form method="POST" action="{{ route('blog.destroy', $blog->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger show_confirm_delete" data-toggle="tooltip" title='Delete'>Delete</button>
                                            </form>
                                        </td>
                                    @endcan

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{ $blogs->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

