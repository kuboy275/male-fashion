@extends('back-end.master')

@section('js')
    <script src="{{ asset('backend/admins/library/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('backend/admins/custom/custom.js') }}"></script>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Coupon', 'key' => 'List','route_redirect'=> route('coupon.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @can('coupon-create')
                        <div class="col-md-12">
                            <a href="{{ route('coupon.create') }}" class="btn btn-info float-right m-2">Create </a>
                        </div>
                    @endcan

                    <div class="col-md-12">
                        <table class="table table-hover table-bordered bg-white">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Code</th>
                                <th scope="col">Type</th>
                                <th scope="col">Coupon Value</th>
                                <th scope="col">Amount</th>
                                <th colspan="3" scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $stt =  1;
                            @endphp
                            @foreach($coupons as $coupon)

                                <tr>
                                    <th scope="row">{{ $stt++ }}</th>
                                    <td>{{ $coupon->name }} </td>
                                    <td> {{ $coupon->code }} </td>
                                    <td> 
                                        {{ $coupon->type }}
                                    </td>
                                    <td>
                                        @if($coupon->type == 'fixed')
                                            {{ number_format($coupon->value) }} $
                                        @else
                                            {{ $coupon->value }} %
                                        @endif
                                    </td>
                                    <td> {{ number_format($coupon->quantity) }} </td>
                                    <td>
                                        <a href="{{ route('coupon.show', $coupon->id) }}"
                                            class="btn btn-light">Show</a>
                                    </td>

                                    @can('coupon-update',$coupon)
                                        <td>
                                            <a href="{{ route('coupon.edit', $coupon->id) }}"
                                                class="btn btn-secondary">Edit</a>
                                        </td>
                                    @endcan

                                    @can('coupon-delete', $coupon)
                                        <td>
                                            <form method="POST" action="{{ route('coupon.destroy', $coupon->id) }}">
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
                        {{ $coupons->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

