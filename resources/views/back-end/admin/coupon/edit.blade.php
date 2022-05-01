@extends('back-end.master')

@section('content')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/library/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

<div class="content-wrapper">
    @include('back-end.components.content-header', ['name' => 'Coupon', 'key' => 'Edit','route_redirect'=> route('coupon.index')])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    @include('back-end.components.alert-session' , ['path_home' => route('coupon.index')])
                    <form action="{{ route('coupon.update', $coupon->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Coupon name</label>
                            <input type="text" class="form-control" name="name" value="{{ $coupon->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Coupon code</label>
                            <input type="text" class="form-control" name="code" value="{{ $coupon->code }}">
                            @error('code')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Coupon Type</label>
                            <select class="form-control select2_init" name="type">
                                <option value="fixed" @if($coupon->type=='fixed') selected @endif > Fixed ($) </option>
                                <option value="percent" @if($coupon->type=='percent') selected @endif>Percent (%)</option>
                            </select>
                            @error('type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Coupon value ( $ Or % )</label>
                            <input type="text" class="form-control" name="value" value="{{ $coupon->value }}">
                            @error('value')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Coupon Quantity</label>
                            <input type="text" class="form-control" name="quantity" value="{{ $coupon->quantity }}">
                            @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Coupon Start at</label>
                            {{-- {{ dd($coupon->starts_at) }} --}}
                            <input type="datetime-local" class="form-control" name="starts_at" value="{{ $coupon->starts_at->format('Y-m-d\TH:i:s') }}">
                            @error('starts_at')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Coupon Expires at</label>
                            <input type="datetime-local" class="form-control" name="expires_at" value="{{ $coupon->expires_at->format('Y-m-d\TH:i:s') }}">
                            @error('expires_at')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
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
