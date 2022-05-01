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
        @include('back-end.components.content-header', ['name' => 'Coupon ', 'key' => 'Show','route_redirect'=> route('coupon.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-body">
                              <h5 class="card-title mb-3 d-block float-none"> Name: {{ $coupon->name }}</h5>
                              <p> <b>Code:</b> {{ $coupon->code }}  </p>
                              <p> <b>Type:</b> {{ $coupon->type }}  </p>
                              <p> <b>Value:</b> @if($coupon->type == 'fixed')
                                {{ number_format($coupon->value) }} $
                                @else
                                    {{ $coupon->value }} %
                                @endif  
                            </p>
                              <p> <b>Amount:</b> {{ $coupon->quantity }}  </p>
                              {{-- <p class="card-text"> {!! $coupon->content !!} </p> --}}
                              <div class="d-flex">
                                <p class="card-text"> <b>Date create:</b> {{ $coupon->created_at->format('d-m-Y H:i:s') }}  </p>
                                <p class="card-text mx-3"> <b>Date start:</b> {{ $coupon->starts_at->format('d-m-Y H:i:s') }}  </p>
                                <p class="card-text"> <b>Date expires:</b> {{ $coupon->expires_at->format('d-m-Y H:i:s') }}  </p>
                              </div>
                              <a href="{{ route('coupon.index') }}" class="btn btn-primary">Back to list</a>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

