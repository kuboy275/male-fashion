<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="{{ asset('frontend/img/logo.png') }}" alt="AdminLTE Logo" class="">
        <span class="brand-text font-weight-light">
        
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/admin" class="d-block"> {{ Auth::user()->name }} </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @can('category-view')
                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="fas fa-th-large"></i>
                            <p class="ml-2">
                                Categories
                            </p>
                        </a>
                    </li>
                @endcan

                @can('product-view')
                    <li class="nav-item">
                        <a href="{{ route('product.index') }}" class="nav-link">
                            <i class="fas fa-th-large"></i>
                            <p class="ml-2">
                                Products
                            </p>
                        </a>
                    </li>
                @endcan

                @can('slider-view')
                    <li class="nav-item">
                        <a href="{{ route('slider.index') }}" class="nav-link">
                            <i class="fas fa-th-large"></i>
                            <p class="ml-2">
                                Slider
                            </p>
                        </a>
                    </li>
                @endcan

                @can('setting-view')
                    <li class="nav-item">
                        <a href="{{ route('setting.index') }}" class="nav-link">
                            <i class="fas fa-th-large"></i>
                            <p class="ml-2">
                                Setting info
                            </p>
                        </a>
                    </li>
                @endcan

                @can('blog-view')
                    <li class="nav-item">
                        <a href="{{ route('blog.index') }}" class="nav-link">
                            <i class="fas fa-th-large"></i>
                            <p class="ml-2">
                                Blog
                            </p>
                        </a>
                    </li>
                @endcan

                @can('order-view')
                    <li class="nav-item">
                        <a href="{{ route('order-management.index') }}" class="nav-link">
                            <i class="fas fa-th-large"></i>
                            <p class="ml-2">
                                Order managerment
                            </p>
                        </a>
                    </li>
                @endcan

                @can('user-view')
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="fas fa-th-large"></i>
                            <p class="ml-2">
                                User manager
                            </p>
                        </a>
                    </li>
                @endcan

                @can('role-view')
                    <li class="nav-item">
                        <a href="{{ route('role.index') }}" class="nav-link">
                            <i class="fas fa-th-large"></i>
                            <p class="ml-2">
                                Roles
                            </p>
                        </a>
                    </li>
                @endcan

                @can('coupon-view')
                    <li class="nav-item">
                        <a href="{{ route('coupon.index') }}" class="nav-link">
                            <i class="fas fa-th-large"></i>
                            <p class="ml-2">
                                Coupon
                            </p>
                        </a>
                    </li>
                @endcan

                @can('contact-view')
                    <li class="nav-item">
                        <a href="{{ route('contact.index') }}" class="nav-link">
                            <i class="fas fa-th-large"></i>
                            <p class="ml-2">
                                Contacts
                            </p>
                        </a>
                    </li>
                @endcan


                <li class="nav-item">
                    <a href="{{ route('show_category_product') }}" class="nav-link">
                        <i class="fas fa-th-large"></i>
                        <p class="ml-2">
                            Category product
                        </p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ route('setting.index') }}" class="nav-link">
                        <i class="fas fa-th-large"></i>
                        <p class="ml-2">
                            Settings
                        </p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh muc san pham
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('menus.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menus
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Sản phẩm
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('slider.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Slider
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('settings.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
