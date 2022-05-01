@extends('back-end.master')

@section('js')
    <script src="{{ asset('backend/admins/library/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('backend/admins/custom/custom.js') }}"></script>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Coupon', 'key' => 'List','route_redirect'=> route('order-management.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered bg-white">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Order date</th>
                                <th scope="col">Order state</th>
                                <th colspan="3" scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $stt =  1;
                            @endphp
                            @foreach($bills as $bill)

                                <tr>
                                    <th scope="row">{{ $stt++ }}</th>
                                    <td>{{ $bill->customer->last_name }} {{ $bill->customer->first_name }} </td>
                                    <td> {{ $bill->customer->address }}, {{ $bill->customer->city }}, {{ $bill->customer->country }} </td>
                                    <td> 
                                        {{ $bill->customer->email }}
                                    </td>
                                    <td>
                                        {{ $bill->date_order }}
                                    </td>
                                    <td>
                                        @php
                                            $class = "";
                                            switch ($bill) {
                                                case $bill->order_state == config('order_state.order_state.0'):
                                                   $class = "badge-danger";
                                                    break;
                                                case $bill->order_state == config('order_state.order_state.1');
                                                    $class = "badge-warning";
                                                    break;
                                                case $bill->order_state == config('order_state.order_state.2');
                                                    $class = "badge-primary";
                                                    break;
                                                case $bill->order_state == config('order_state.order_state.3');
                                                    $class = "badge-info";
                                                    break;
                                                case $bill->order_state == config('order_state.order_state.4');
                                                    $class = "badge-success";
                                                    break;
                                                case $bill->order_state == config('order_state.order_state.5');
                                                    $class = "badge-secondary";
                                                    break;
                                                default:
                                                    break;
                                            }
                                        @endphp
                                        <span class="badge {{ $class }}">{{ $bill->order_state }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('order-management.show', $bill->id) }}"
                                            class="btn btn-light">Show</a>
                                    </td>

                                    @can('order-update', $bill)
                                        <td>
                                            <a href="{{ route('order-management.edit', $bill->id) }}"
                                                class="btn btn-secondary">Edit</a>
                                        </td>
                                    @endcan

                                    @can('order-delete', $bill)
                                        <td>
                                            <form method="POST" action="{{ route('order-management.destroy', $bill->id) }}">
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
                        {{ $bills->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

