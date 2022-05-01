@extends('front-end.master')

@section('content')
    <!-- Breadcrumb Section Begin -->
    @include('front-end.components.breadcrumb',['name' => 'Check Out'])
    <!-- Breadcrumb Section End -->


    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <div class="col-lg-12 mb-3">
                    @if(Session::has('error'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Warning!</strong> {{ Session::get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <form action="{{ route('checkout.post') }}" method="POST">
                    @csrf
                    <div class="row">

                        @if( count($carts) > 0 )

                        <div class="col-lg-7 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="{{ route('cart.view') }}">Click
                            here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="first_name" value="{{ old('first_name') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country" value="{{ old('country') }}">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city" value="{{ old('city') }}">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address" value="{{ old('address') }}" placeholder="Street Address"  class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="post_code" value="{{ old('post_code') }}">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" value="{{ Auth::user()->phone }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span></span></p>
                                <input type="text" name="note" value="{{ old('note') }}"
                                placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach($carts as $cart_item)
                                        <li> {{ $stt++ }}. {{ $cart_item->products->name }} 
                                            <span> ${{ $cart_item->product_qty * $cart_item->products->price }}  </span>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="checkout__total__all">
                                    <li>Subtotal: <span>${{ number_format(session('cart_total.sub_total')) }}</span></li>
                                    <li>Discount ({{ session('cart_total.discount_unit') }}): 
                                        <span>
                                           {{  number_format(session('cart_total.discount_value')) }}
                                        </span> 
                                    </li>
                                    <li>Total: <span>${{ number_format(session('cart_total.total')) }}</span></li>
                                </ul>
                                {{-- <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> --}}
                                @foreach(config('order_state.payment_mothod') as $key => $method)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method" value="{{ $method }}" @if($key == 1) checked @endif>
                                        <label class="form-check-label">
                                            {{ $method }}
                                        </label>
                                    </div>
                                @endforeach
                                <input type="hidden" name="order_state" value="{{ config('order_state.order_state.0') }}">
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>

                        @else 

                            <div class="col-12">
                                <div class="continue__btn text-center">
                                    <p>Your shopping cart is empty. Let's continue shopping!</p>
                                    <a href="/shop">Continue Shopping</a>
                                </div>
                            </div>
        
                        @endif

                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection