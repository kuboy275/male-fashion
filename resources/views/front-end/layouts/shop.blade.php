@extends('front-end.master')

@section('content')


    <!-- Breadcrumb Section Begin -->
    @include('front-end.components.breadcrumb',['name' => 'Shop'])
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('front-end.components.sidebar-shop')
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">$0 - $55</option>
                                        <option value="">$55 - $100</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach( $products as $key => $item)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <input type="hidden" class="product_id" value="{{ $item->id }}">
                                    <input type="hidden" class="product_qty" value="1">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset($item->image_path_master) }}">
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="{{ asset('frontend/img/icon/heart.png')}}" alt=""></a></li>
                                            <li>
                                                <a href="#"><img src="{{ asset('frontend/img/icon/compare.png')}}" alt=""> 
                                                    <span>Compare</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('product.detail', $item->slug ) }}"><img src="{{ asset('frontend/img/icon/search.png')}}" alt="">
                                                    <span>Product details</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6> {{ $item->name }} </h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>${{ number_format($item->price,2) }}</h5>
                                        <div class="product__color__select">
                                            <label for="pc-4">
                                                <input type="radio" id="pc-4">
                                            </label>
                                            <label class="active black" for="pc-5">
                                                <input type="radio" id="pc-5">
                                            </label>
                                            <label class="grey" for="pc-6">
                                                <input type="radio" id="pc-6">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product__pagination">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

@endsection

<script src="{{ asset('backend/admins/library/sweetAlert2/sweetalert2@9.js') }}"></script>

@section('js-custom')
    
    <script>

        $(document).ready(function(){
            
            $('.add-cart').click(function(e){
                e.preventDefault();

                let product_id = $(this).closest('.product__item').find('.product_id').val();
                let product_qty = $(this).closest('.product__item').find('.product_qty').val();

                $.ajax({
                    method: 'POST',
                    url: '/add-to-cart',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'product_id' : product_id,
                        'product_qty' : product_qty
                    },
                    success : function( response ){
                    if(response.code == 201){

                        Swal.fire({
                            icon: 'success',
                            title: "Good job!!",
                            text: response.status,
                        }).then(function() {
                            window.location = "/shopping-cart";
                        });

                    } else if (response.code == 208){

                            Swal.fire({
                                icon: 'info',
                                title: "Not added to cart!",
                                text: response.status,
                            }).then(function() {
                                window.location = "/shopping-cart";
                            });

                        }
                    },
                    error : function(err){
                        if(err.status == 401){
                            Swal.fire({
                                icon: 'error',
                                title: 'Unauthorized',
                                text:  'Please login to continue',
                                footer: '<a href="{{ route('login') }}"> Login here </a>'
                            })
                        }else{
                            Swal.fire({
                                icon: 'warning',
                                title: 'Validate',
                                text:  err.responseJSON.errors.product_qty[0],
                            })
                        }
                    }
                })

            })

        })


    </script>

@endsection