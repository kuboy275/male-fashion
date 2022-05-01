@extends('front-end.master')

@section('content')

    <!-- Breadcrumb Section Begin -->
    @include('front-end.components.breadcrumb',['name' => 'Shopping Cart'])
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Holy guacamole!</strong> {{ Session::get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(Session::has('error'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Apply Fail!</strong> {{ Session::get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>

                {{-- CHECK CARTS EMPTY --}}
                @if( count($carts) > 0 )
                    
               
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sub_total = 0 ;
                                @endphp
                                @foreach($carts as $cart_item)
                                    
                                
                                <tr class="product_data">
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img width="100" height="100" src="{{ asset($cart_item->products->image_path_master) }}" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{ $cart_item->products->name }}</h6>
                                            <h5>${{ number_format($cart_item->products->price,2) }}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <input type="hidden" class="product_id" value="{{ $cart_item->product_id }}" >
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="number" min="1" class="product_qty" value="{{ $cart_item->product_qty }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">${{ number_format($cart_item->products->price * $cart_item->product_qty,2)  }}</td>
                                    <td class="cart__close">
                                        <a href="#" class="delete-cart-item-btn"> <i class="fa fa-close"></i> </a>
                                    </td>
                                </tr>

                                    @php
                                        $sub_total += $cart_item->products->price * $cart_item->product_qty;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="/shop">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                    <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        @if(!Session::has('coupon'))
                            <h6>Discount codes</h6>
                            <form action="{{ route('coupon.apply') }}" method="POST" id="cart__discount">
                                @csrf
                                <input type="text" name="coupon" value="{{ old('coupon') }}" placeholder="Coupon code" required>
                                <button type="submit">Apply</button>
                            </form>
                        @else
                            <a href="{{ route('remove_coupon') }}"> Remove discount code </a>
                        @endif
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        @php
                            $discount_value = 0;
                            $total          = $sub_total;
                            $discount_unit  = null;
                            $discount_type  = null;
                            $discount_price = null;

                            if(Session::has('coupon')){
                                $coupon         = Session::get('coupon');
                                $discount_type  = $coupon->type;
                                $discount_value = $coupon->value;

                                if($coupon->type == 'fixed'){

                                    $discount_unit  = '$';
                                    $discount_price = $discount_value;
                                    $total          = $sub_total - $discount_price; 
                                    
                                }else if($coupon->type == 'percent'){
                                    
                                    $discount_unit  = '%';
                                    $discount_price = $sub_total  * $discount_value / 100;
                                    $total          =  $sub_total - $discount_price;
                                }

                            }
                            $total = ($total < 0) ? 0 : $total;

                            $cart_total = [
                                'sub_total'         => $sub_total,
                                'discount_type'     => $discount_type,
                                'discount_value'    => $discount_value,
                                'discount_unit'     => $discount_unit,
                                'discount_price'    => $discount_price,
                                'total'             => $total
                            ];

                            Session::put('cart_total',$cart_total);

                        @endphp
                        <ul>
                            <li>Subtotal <span>${{ number_format($sub_total) }}</span></li>

                            @if(Session::has('coupon'))
                                <li>Discount: 
                                    <span>
                                    {{ $discount_unit }}{{  number_format($discount_value) }}
                                    </span> 
                                </li>
                                <li>Amount to be reduced: <span> - ${{ $discount_price }} </span> </li>
                            @endif

                            <li>Total <span>${{ number_format($total) }}</span></li>
                        </ul>
                        <a href="/checkout" class="primary-btn">Proceed to checkout</a>
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
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection

@section('js-custom')
    <script src="{{ asset('backend/admins/library/sweetAlert2/sweetalert2@9.js') }}"></script>
    <script>

        $(document).ready(function(){
            $('.delete-cart-item-btn').click(function(e){
            e.preventDefault();
            let product_id = $(this).closest('.product_data').find('.product_id').val();

            $.ajax({
                    method:'POST',
                    url: '/delete-cart-item',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'product_id' : product_id,
                    },
                    dataType : 'json',
                    success : function(response){

                        Swal.fire({
                            icon: 'success',
                            title: "Deleted!",
                            text: response.status,
                        }).then(function() {
                            window.location.reload();
                        });

                    },
                    error : function(err){
                        if(err.status == 401){
                            Swal.fire({
                                icon: 'error',
                                title: 'Unauthorized',
                                text:  'Please login to continue',
                                footer: '<a href="{{ route('login') }}"> Login here </a>'
                            })
                        }                
                    }
                })

            });

            $('.pro-qty-2').on('click', '.qtybtn', function() {
                // e.preventDefault();
                let product_id = $(this).closest('.product_data').find('.product_id').val();
                let product_qty = $(this).parent().find('input').val();

                console.log(product_qty);
                $.ajax({
                    method : 'POST',
                    url : 'update-cart-item',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'product_id' : product_id,
                        'product_qty' : product_qty,
                    },
                    success : function(response){
                        Swal.fire({
                            icon: 'success',
                            title: "Deleted!",
                            text: response.status,
                        }).then(function() {
                            window.location.reload();
                        });
                    },
                    error : function(err){
                        Swal.fire({
                            icon: 'error',
                            title: 'Validate',
                            text:  err.responseJSON.errors.product_qty[0],
                        }).then(function(){
                            window.location.reload();
                        })
                    }
                });

            })

        });

        

    </script>
@endsection