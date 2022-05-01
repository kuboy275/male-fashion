@extends('back-end.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection



@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Product', 'key' => 'List','route_redirect'=> route('product.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    @can('product-create')
                        <div class="col-md-12">
                            <a href="{{ route('product.create') }}" class="btn btn-info float-right m-2">Create </a>
                        </div>
                    @endcan

                    <div class="col-md-12">
                        <table class="table table-hover table-bordered bg-white">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product name</th>
                                <th scope="col">Pricing</th>
                                <th scope="col">Image master</th>
                                <th scope="col">Category</th>
                                <th colspan="3" scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $stt = 1
                                @endphp
                            @foreach($products as $productItem)
                                <tr>
                                    <th scope="row">{{ $stt ++  }}</th>
                                    <td>{{ $productItem->name }} </td>
                                    <td> <span class="badge badge-info">${{ number_format($productItem->price,2) }}</span>  </td>
                                    <td>
                                        <img class="product_image_150_100" src="{{ $productItem->image_path_master }}">
                                    </td>
                                    <td>{{ optional($productItem->category)->name }}</td>
                                    <td> 
                                            <a href="{{ route('product.show', $productItem->id) }}"
                                            class="btn btn-default">Show</a>
                                    </td>

                                    @can('product-update',$productItem)
                                        <td> 
                                            <a href="{{ route('product.edit', $productItem->id) }}"
                                            class="btn btn-secondary">Edit</a>
                                        </td>
                                    @endcan

                                    @can('product-delete', $productItem)
                                        <td>
                                            <form method="POST" action="{{ route('product.destroy', $productItem->id) }}">
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
                        {{ $products->links() }}
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