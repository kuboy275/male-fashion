@extends('back-end.master')


@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Category', 'key' => 'List' , 'route_redirect'=> route('category.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    @can('category-create')
                        <div class="col-md-12">
                            <a href="{{ route('category.create') }}" class="btn btn-info float-right m-2">Create </a>
                        </div>
                    @endcan

                    <div class="col-md-12">
                        <table id="example1" class="table table-hover table-bordered bg-white">
                            <thead>
                            <tr>
                                <th >#</th>
                                <th  data-name="name">Category name</th>
                                <th >Category slug</th>
                                <th colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $stt =  1;
                            @endphp
                            @foreach($categories as $category)

                                <tr>
                                    <th scope="row">{{ $stt++ }}</th>
                                    <td>{{ $category->name }} </td>
                                    <td> {{ $category->slug }} </td>

                                    @can('category-update', $category)
                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class="btn btn-secondary mr-2">Edit</a>
                                        </td>
                                    @endcan
                                    
                                    @can('category-delete', $category)
                                        <td>
                                            <form method="POST" action="{{ route('category.destroy', $category->id) }}">
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
                        {{ $categories->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection


@section('js')
    <script src="{{ asset('backend/admins/library/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('backend/admins/custom/custom.js') }}"></script>
@endsection
