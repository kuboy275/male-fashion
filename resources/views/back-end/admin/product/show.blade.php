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
        @include('back-end.components.content-header', ['name' => 'Product ', 'key' => 'Show','route_redirect'=> route('product.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <img class="card-img-top" style="object-fit: unset;width: 50%;" height="350" src="{{ $product->image_path_master }}" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title mb-2"> {{ $product->name }} - ${{ number_format($product->price,2) }}</h5>
                             <div class="card-text mb-0">
                                {!! $product->content !!}
                             </div>
                             <div class="row">
                                @foreach($product->images as $producImageItem)
                                    <div class="col-md-4 mb-3">
                                        <img class="image_detail_product"
                                             src="{{ $producImageItem->image_path }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                              <div class="d-flex mt-3">
                                <p class="card-text mr-3"> <b>Posted by:</b> {{ optional($product->user)->name }} </p>
                                <p class="card-text mr-3"> <b>Category:</b> {{ optional($product->category)->name }} </p>
                                <p class="card-text"> <b>Date post:</b> {{ $product->updated_at }} </p>
                              </div>
                              <a href="{{ route('product.index') }}" class="btn btn-primary">Back to list</a>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

