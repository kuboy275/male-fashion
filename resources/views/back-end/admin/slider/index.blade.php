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
        @include('back-end.components.content-header', ['name' => 'Slider ', 'key' => 'List','route_redirect'=> route('slider.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @can('slider-create')
                        <div class="col-md-12">
                            <a href="{{ route('slider.create') }}" class="btn btn-info float-right m-2"> Create </a>
                        </div>
                    @endcan

                    <div class="col-md-12">
                        <table class="table table-hover table-bordered bg-white">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name slider</th>
                                <th scope="col">Desciption</th>
                                <th scope="col">Image</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($sliders as $slider)

                                <tr>
                                    <th scope="row">{{ $slider->id }}</th>
                                    <td>{{ $slider->name }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td class="w-50">
                                        <img width="100%" height="200" src="{{ $slider->image_path }}" alt="">
                                    </td>
                                    @can('slider-update', $slider)
                                        <td>
                                            <a href="{{ route('slider.edit', $slider->id) }}"
                                                class="btn btn-default mr-2">Edit</a>
                                        </td>
                                    @endcan
                                    
                                    @can('slider-delete', $slider)
                                        <td>
                                            <form method="POST" action="{{ route('slider.destroy', $slider->id) }}">
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
                        {{ $sliders->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

