@extends('front-end.master')

@section('content')
    
    <!-- Shop Details Section Begin -->
    <section class="shop-details">
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="/">Home</a>
                            <a href="/shop">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-master-{{ $product->id }}" role="tab">
                                    <div class="product__thumb__pic set-bg" data-setbg="{{ asset($product->image_path_master )}}">
                                    </div>
                                </a>
                            </li>
                            @foreach($product->images as $key => $p_img)
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-{{ $p_img->id }}" role="tab">
                                        <div class="product__thumb__pic set-bg" data-setbg="{{ asset($p_img->image_path)}}">
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-master-{{ $product->id }}" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{ asset($product->image_path_master)}}" alt="">
                                </div>
                            </div>
                            @foreach($product->images as $key => $p_img)
                                <div class="tab-pane" id="tabs-{{ $p_img->id }}" role="tabpanel">
                                    <div class="product__details__pic__item">
                                        <img src="{{ asset($p_img->image_path)}}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4> {{ $product->name }} </h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span> - 4 Reviews</span>
                            </div>
                            <h3>${{ number_format($product->price,2) }}</h3>
                            <p> {!! $product->content !!} </p>
                            <div class="product__details__option">
                                <div class="product__details__option__size">
                                    <span>Size:</span>
                                    <label for="xxl">xxl
                                        <input type="radio" id="xxl">
                                    </label>
                                    <label class="active" for="xl">xl
                                        <input type="radio" id="xl">
                                    </label>
                                    <label for="l">l
                                        <input type="radio" id="l">
                                    </label>
                                    <label for="sm">s
                                        <input type="radio" id="sm">
                                    </label>
                                </div>
                                <div class="product__details__option__color">
                                    <span>Color:</span>
                                    <label class="c-1" for="sp-1">
                                        <input type="radio" id="sp-1">
                                    </label>
                                    <label class="c-2" for="sp-2">
                                        <input type="radio" id="sp-2">
                                    </label>
                                    <label class="c-3" for="sp-3">
                                        <input type="radio" id="sp-3">
                                    </label>
                                    <label class="c-4" for="sp-4">
                                        <input type="radio" id="sp-4">
                                    </label>
                                    <label class="c-9" for="sp-9">
                                        <input type="radio" id="sp-9">
                                    </label>
                                </div>
                            </div>
                            <div class="product__details__cart__option">
                                <input type="hidden" class="product_id" value="{{ $product->id }}">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" min="1" class="product_qty" value="1">
                                    </div>
                                </div>
                                <a href="#!" class="add_to_cart_btn primary-btn">add to cart</a>
                            </div>

                            <div class="product__details__last__option">
                                <h5><span>Guaranteed Safe Checkout</span></h5>
                                <img src="{{ asset('frontend/img/shop-details/details-payment.png') }}" alt="">
                                <ul>
                                    <li><span>Categories:</span>  {{ $product->category->name }} </li>
                                    <li>
                                        <span>Tag:</span>
                                        @foreach( $product->tags as $tag_item )
                                            {{ $tag_item->name }} {{ $loop->last ? '' : ',' }}
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer
                                    Previews(5)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                                    information</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                                            pharetras loremos.</p>
                                        <div class="product__details__tab__content__item">
                                            <h5>Products Infomation</h5>
                                            <p>A Pocket PC is a handheld computer, which features many of the same capabilities as a modern PC. These handy little devices allow individuals to retrieve and store e-mail messages, create a contact file, coordinate
                                                appointments, surf the internet, exchange text messages and more. Every product that is labeled as a Pocket PC must be accompanied with specific software to operate the unit and must feature a touchscreen
                                                and touchpad.</p>
                                            <p>As is the case with any new technology product, the cost of a Pocket PC was substantial during it’s early release. For approximately $700.00, consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                                These days, customers are finding that prices have become much more reasonable now that the newness is wearing off. For approximately $350.00, a new Pocket PC can now be purchased.</p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-7" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p class="note">Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo
                                            pharetras loremos.</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Related Product</h3>
                </div>
            </div>
             <div class="row">
                @foreach($product_related as $item)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset($item->image_path_master)}}">
                                <span class="label">New</span>
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
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>$67.24</h5>
                                <div class="product__color__select">
                                    <label for="pc-1">
                                        <input type="radio" id="pc-1">
                                    </label>
                                    <label class="active black" for="pc-2">
                                        <input type="radio" id="pc-2">
                                    </label>
                                    <label class="grey" for="pc-3">
                                        <input type="radio" id="pc-3">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> 
        </div>
    </section>
    <!-- Related Section End -->

@endsection


@section('js-custom')
<script src="{{ asset('backend/admins/library/sweetAlert2/sweetalert2@9.js') }}"></script>
<script>
    $(document).ready(function(){
        
        $('.add_to_cart_btn').click(function(e){
            e.preventDefault();

            let product_id = $(this).closest('.product__details__cart__option').find('.product_id').val();
            let product_qty = $(this).closest('.product__details__cart__option').find('.product_qty').val();

            $.ajax({
                method: 'post',
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
            });
        })
    });
</script>
@endsection