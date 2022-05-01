    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span> SIGN IN <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD 1</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="{{ asset('frontend/img/icon/search.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('frontend/img/icon/heart.png') }}" alt=""></a>
            <a href="#"><img src="{{ asset('frontend/img/icon/cart.png') }}" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p>Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <a href="#">FAQs</a>
                            </div>
                            @if (!Auth::check())
                                <div class="header__top__links">
                                    <a href="{{ route('login') }}">Sign in</a>
                                </div>
                            @else
                                <div class="header__top__hover">
                                    <span> My Account:  {{ Auth::user()->name }} <i class="arrow_carrot-down"></i></span>
                                    <ul>
                                        @if(Auth::user()->is_admin == 'admin' || Auth::user()->is_admin == 'user' )
                                            <li> <a href="/admin">DASHBOARD</a> </li>
                                        @endif
                                        <li> <a href="{{ route('logout') }}">LOGOUT</a> </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="/"><img src="{{ asset('frontend/img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="/">Home</a></li>
                            <li class="{{ (request()->is('shop')) ? 'active' : '' }}">
                                <a href="/shop">Shop</a>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="/about">About Us</a></li>
                                    <li><a href="/shopping-cart">Shopping Cart</a></li>
                                    {{-- <li><a href="/checkout">Check Out</a></li> --}}
                                </ul>
                            </li>
                            <li class="{{ (request()->is('blog')) ? 'active' : '' }}">
                                <a href="/blog">Blog</a>
                            </li>
                            <li class="{{ (request()->is('contact')) ? 'active' : '' }}">
                                <a href="/contact">Contacts</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="header__nav__option">
                        <a href="#" class="search-switch"><img src="{{ asset('frontend/img/icon/search.png') }}" alt=""></a>
                        <a href="#"><img src="{{ asset('frontend/img/icon/heart.png') }}" alt=""></a>
                        <a href="{{ route('cart.view') }}">
                            <img width="23" height="23" src="{{ asset('frontend/img/icon/cart.png') }}" alt=""> 
                            <span>
                                {{-- {{ Session::get('cart.total_qty') }} --}}
                                {{ \App\Models\Cart::where('user_id',Auth::id())->sum('product_qty') }}
                            </span>
                        </a>
                        @if(Session::has('cart_total'))
                            <div class="price">${{ Session::get('cart_total.total') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->