@extends('back-end.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/admins/library/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/admins/custom/style.css') }}">
@endsection

@section('content')

    <div class="content-wrapper">
        @include('back-end.components.content-header', ['name' => 'Coupon', 'key' => 'Add','route_redirect'=> route('coupon.index')])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('coupon.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Coupon name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Coupon code</label>
                                <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                                @error('code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Coupon Type</label>
                                <select class="form-control select2_init" name="type">
                                    <option value="">Pick Coupon type</option>
                                    <option value="fixed"> Fixed ($) </option>
                                    <option value="percent">Percent (%)</option>
                                </select>
                                @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Coupon value ( $ Or % )</label>
                                <input type="text" class="form-control" name="value" value="{{ old('value') }}">
                                @error('value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Coupon Quantity</label>
                                <input type="text" class="form-control" name="quantity" value="{{ old('quantity') }}">
                                @error('quantity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Coupon Start at</label>
                                <input type="datetime-local" class="form-control" name="starts_at" value="{{ old('starts_at') }}">
                                @error('starts_at')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Coupon Expires at</label>
                                <input type="datetime-local" class="form-control" name="expires_at" value="{{ old('expires_at') }}">
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
