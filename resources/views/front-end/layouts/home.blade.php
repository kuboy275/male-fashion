@extends('front-end.master')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            @foreach($sliders as $slider)
            
            <div class="hero__items set-bg" data-setbg="{{ asset($slider->image_path) }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Summer Collection</h6>
                                <h2>{{ $slider->name }}</h2>
                                <p> {{ $slider->description }} </p>
                                <a href="/shop" class="primary-btn">Shop now <span class="arrow_right"></span></a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="{{ asset('frontend/img/banner/banner-1.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Clothing Collections 2030</h2>
                            <a href="/shop">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="{{ asset('frontend/img/banner/banner-2.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Accessories</h2>
                            <a href="/shop">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="{{ asset('frontend/img/banner/banner-3.jpg') }}" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Shoes Spring 2030</h2>
                            <a href="/shop">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="all">All</li>
                        @foreach($categories as $key => $category)
                            <li class="" data-filter=".{{ Str::slug($category->name) }}">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row product__filter">

                @foreach($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix {{ Str::slug($product->category->name) }}">
                        <div class="product__item">
                            <input type="hidden" class="product_id" value="{{ $product->id }}">
                            <input type="hidden" class="product_qty" value="1">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset($product->image_path_master) }}">
                                <span class="label">New</span>
                                <ul class="product__hover">
                                    <li>
                                        <a href="#!"><img src="{{ asset('frontend/img/icon/heart.png') }}" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#!"><img src="{{ asset('frontend/img/icon/compare.png') }}" alt=""> <span>Compare</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('product.detail',$product->slug) }}"><img src="{{ asset('frontend/img/icon/search.png') }}" alt=""></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6> {{ $product->name }} </h6>
                                <a href="#" class="add-cart">+ Add To Cart</a>
                                <h5>${{ $product->price }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categories__text">
                        <h2>Clothings Hot <br /> <span>Shoe Collection</span> <br /> Accessories</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="{{ asset('frontend/img/product-sale.png') }}" alt="">
                        <div class="hot__deal__sticker">
                            <span>Sale Of</span>
                            <h5>$29.99</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Deal Of The Week</span>
                        <h2>Multi-pocket Chest Bag Black</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Hours</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Minutes</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Seconds</p>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="instagram__pic">
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('frontend/img/instagram/instagram-1.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('frontend/img/instagram/instagram-2.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('frontend/img/instagram/instagram-3.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('frontend/img/instagram/instagram-4.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('frontend/img/instagram/instagram-5.jpg') }}"></div>
                        <div class="instagram__pic__item set-bg" data-setbg="{{ asset('frontend/img/instagram/instagram-6.jpg') }}"></div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="instagram__text">
                        <h2>Instagram</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <h3>#Male_Fashion</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Latest News</span>
                        <h2>Fashion New Trends</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-6">
                        
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="{{ asset( $blog->image_path) }}"></div>
                        <div class="blog__item__text">
                            <span><img src="{{ asset('frontend/img/icon/calendar.png') }}" alt="">
                                 {{ $blog->created_at->isoFormat('DD MMMM YYYY') }} 
                            </span>
                            <h5> {{ Str::of($blog->title)->limit(40) }} </h5>
                            <a href="{{ route('blog.detail', $blog->slug) }}">Read More</a>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
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