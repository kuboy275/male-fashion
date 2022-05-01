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
        @include('back-end.components.content-header', ['name' => 'Order Management ', 'key' => 'Show','route_redirect'=> route('order-management.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body">
                              <h5 class="card-title float-none mb-2">Customer info: </h5>
                              <p> <b>Full name</b> {{ $bill->customer->last_name }} {{ $bill->customer->first_name }}  </p>
                              <p> <b>Address:</b> {{ $bill->customer->address }}, {{ $bill->customer->city }}, {{ $bill->customer->country }}  </p>
                              <p> <b>Email:</b> {{ $bill->customer->email }} </p>
                              <h5 class="card-title float-none mb-2">Bill info: </h5>
                              <p> <b>Payment method:</b> {{ $bill->payment_method }} </p>
                              <p> <b>Date order:</b> {{ date('d-m-Y H:i:s', strtotime($bill->date_order)) }} </p>
                              <p> <b>Note:</b> {{ $bill->note }} </p>
                              <p> <b>Order state:</b> <span class="badge badge-info @if($bill->order_state == config('order_state.order_state.0')) badge-danger @endif">{{ $bill->order_state }}</span> </p>
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
        </div>
    </div>
@endsection

