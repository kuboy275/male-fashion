@extends('back-end.master')

@section('content')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/library/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

<div class="content-wrapper">
    @include('back-end.components.content-header', ['name' => 'Order management', 'key' => 'Edit','route_redirect'=> route('order-management.index')])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    @include('back-end.components.alert-session' , ['path_home' => route('order-management.index')])
                    <form action="{{ route('order-management.update',$bill->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Status Order:</label>
                            <div class="col-sm-6">
                                <select class="form-control select2_init" name="order_state" required>
                                    @foreach(config('order_state.order_state') as $key => $value)
                                        <option value="{{ $value }}" @if($value == $bill->order_state) selected @endif >{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-primary w-100">Update</button>
                            </div>
                        </div>
                      </form>
                    <table class="table table-bordered mb-4 bg-white">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $stt =  1;
                        @endphp
                        @foreach($bill_detail as $item)

                            <tr>
                                <th scope="row">{{ $stt++ }}</th>
                                <td> {{ $item->product_name }} </td>
                                <td> {{ $item->quantity }} </td>
                                <td> ${{ $item->price }} </td>
                            </tr>

                        @endforeach

                            <tr>
                                <th colspan="3">Sub Total:</th>
                                <th>${{ $bill->sub_total }}</th>
                            </tr>
                            @if($bill->discount_value != 0)
                                <tr>
                                    <th colspan="3">Discount:</th>
                                    <th>
                                        @if($bill->discount_type == 'fixed')$@endif 
                                            {{ $bill->discount_value }} 
                                        @if($bill->discount_type == 'percent')%@endif 
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="3">Amount to be reduced:</th>
                                    <th>${{ $bill->discount_price }}</th>
                                </tr>
                            @endif
                            
                            <tr>
                                <th colspan="3">Total:</th>
                                <th>${{ $bill->total }}</th>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('order-management.index') }}" class="btn btn-primary">Back to list</a>
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
