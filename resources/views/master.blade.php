@php
// dd(Session::forget('user'));
// Session::forget('user');
// dd(openssl_get_cert_locations());
@endphp
<!DOCTYPE html>
<html lang="en">
<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="{{ asset('image/png') }}" sizes="32x32"
        href="{{ asset('/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="{{ asset('image/png') }}" sizes="16x16"
        href="{{ asset('/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/images/icons/site.html') }}">
    <link rel="mask-icon" href="{{ asset('/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('/images/icons/favicon.icon') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plugins/nouislider/nouislider.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
                <div class="container">

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li><a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a></li>
                                    <li><a href="{{ url('wishlist') }}"><i class="icon-heart-o"></i>Wishlist
                                            <span>(3)</span></a></li>
                                    <li><a href="{{ url('about') }}">About Us</a></li>
                                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                                    <li>
                                        @if (Session::has('user'))
                                            @php
                                                $user = Session::get('user');
                                                
                                            @endphp
                                            <div class="dropdown compare-dropdown">
                                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false" data-display="static"
                                                    title="Compare Products" aria-label="Compare Products"
                                                    style="font-size: 13px">
                                                    {{ $user->full_name }}
                                                </a>


                                                <div class="dropdown-menu dropdown-menu-right" style="width: 150px">
                                                    <ul class="compare-products flex-column align-items-start">
                                                        <li class="d-block w-100 ml-0 mt-2">
                                                            <a href="#" class=""><i
                                                                    class="icon-user"></i> Dashboard</a>
                                                        </li>
                                                        <li class="d-block w-100 ml-0 mt-2">
                                                            <a href="{{route('viewcart')}}" class=""><i
                                                                    class="icon-shopping-cart"></i> Cart</a>
                                                        </li>
                                                        <li class="d-block w-100 ml-0 mt-2">
                                                            <a href="#" class=""><i
                                                                    class="icon-heart-o"></i> WishList</a>
                                                        </li>
                                                        <li class="d-block w-100 ml-0 mt-2">
                                                            <a href="{{ route('auth.logout.action') }}"
                                                                class=""><i class="icon-arrow-right"></i>
                                                                Log out</a>
                                                        </li>
                                                    </ul>
                                                </div><!-- End .dropdown-menu -->
                                            </div><!-- End .compare-dropdown -->
                                        @else
                                            <a href="#signin-modal" data-toggle="modal"><i
                                                    class="icon-user"></i>Login</a>
                                        @endif
                                    </li>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="{{ route('index') }}" class="logo">
                            <img src="{{ asset('/images/logo.png') }}" alt="Molla Logo" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ url('category') }}" class="sf-with-ul">Shop</a>

                                    <div class="megamenu megamenu-md">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="menu-col">
                                                    <div class="row">
                                                        @php
                                                            $categories = \App\Models\Category::all();
                                                        @endphp
                                                        <div class="col-md-6">
                                                            @foreach ($categories as $item)
                                                                <div class="menu-title">
                                                                    {{ $item->category_name }}
                                                                </div><!-- End .menu-title -->
                                                                <ul>
                                                                    <li><a href="{{ route('category', ['categoryId' => $item->id]) }}">Shop
                                                                            List</a></li>
                                                                </ul>
                                                            @endforeach



                                                        </div><!-- End .col-md-6 -->

                                                        <div class="col-md-6">
                                                            <div class="menu-title">Shop Pages</div>
                                                            <!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="{{ url('cart') }}">Cart</a></li>
                                                                <li><a href="{{ url('checkout') }}">Checkout</a></li>
                                                                <li><a href="{{ url('wishlist') }}">Wishlist</a></li>
                                                                <li><a href="{{ url('dashboard') }}">My Account</a>
                                                                </li>
                                                                <li><a href="#">Lookbook</a></li>
                                                            </ul>
                                                        </div><!-- End .col-md-6 -->
                                                    </div><!-- End .row -->
                                                </div><!-- End .menu-col -->
                                            </div><!-- End .col-md-8 -->

                                            <div class="col-md-4">
                                                <div class="banner banner-overlay">
                                                    <a href="category.html" class="banner banner-menu">
                                                        <img src="{{ asset('/images/menu/banner-1.jpg') }}"
                                                            alt="Banner">

                                                        <div class="banner-content banner-content-top">
                                                            <div class="banner-title text-white">Last
                                                                <br>Chance<br><span><strong>Sale</strong></span>
                                                            </div>
                                                            <!-- End .banner-title -->
                                                        </div><!-- End .banner-content -->
                                                    </a>
                                                </div><!-- End .banner banner-overlay -->
                                            </div><!-- End .col-md-4 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu megamenu-md -->
                                </li>


                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button" title="Search"><i
                                    class="icon-search"></i></a>
                            <form action="{{ route('category') }}" method="get">
                                <div class="header-search-wrapper">
                                    <label for="keyword" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="keyword" id="keyword"
                                        placeholder="Search in..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                @if (session()->has('cart'))
                                    <span class="cart-count">{{ count(session()->get('cart')) }}</span>
                                @else
                                    <span class="cart-count">0</span>
                                @endif

                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    @if (session()->has('cart'))
                                        @php
                                            $cart = Session::get('cart');
                                        @endphp
                                        <div id="product_container">
                                            @foreach ($cart as $key => $item)
                                                <div class="product">
                                                    <div class="product-cart-details">
                                                        <h4 class="product-title">
                                                            <a
                                                                href="{{ route('detail', ['id' => $item['product_id']]) }}">{{ $item['product_name'] }}</a>
                                                        </h4>

                                                        <span class="cart-product-info">
                                                            <span class="cart-product-qty">1</span>
                                                            x
                                                            {{ number_format($item['price'], 0, '', ',') . ' VNĐ' }}
                                                        </span>
                                                    </div><!-- End .product-cart-details -->
                                                    <figure class="product-image-container">
                                                        <a href="{{ route('detail', ['id' => $item['product_id']]) }}"
                                                            class="product-image">
                                                            <img src={{ asset('/images/molla/' . $item['category_name'] . '/' . $item['src']) }}
                                                                alt="product">
                                                        </a>
                                                    </figure>
                                                    <a href="javascript:removeItem('{{ $key }}')"
                                                        class="btn-remove" title="Remove Product"><i
                                                            class="icon-close"></i></a>
                                                </div><!-- End .product -->
                                            @endforeach
                                        </div>

                                        <div class="dropdown-cart-total">
                                            <span>Total</span>

                                            <span
                                                class="cart-total-price">{{ number_format(App\Http\Controllers\CartController::totalPrice($cart), 0, '', ',') . ' VNĐ' }}</span>
                                        </div><!-- End .dropdown-cart-total -->

                                        <div class="dropdown-cart-action">
                                            <a href="{{ route('viewcart') }}" class="btn btn-primary">View Cart</a>
                                            <a href="{{route('checkout')}}"
                                                class="btn btn-outline-primary-2"><span>Checkout</span><i
                                                    class="icon-long-arrow-right"></i></a>
                                        </div><!-- End .dropdown-cart-total -->
                                    @else
                                        <div id="product_container">
                                            Cart is empty
                                        </div>
                                        <div class="dropdown-cart-total">
                                            <span>Total</span>
                                            <span class="cart-total-price">0 VND</span>
                                        </div><!-- End .dropdown-cart-total -->

                                        <div class="dropdown-cart-action">
                                            <a href="{{ route('viewcart') }}" disabled class="btn btn-primary">View
                                                Cart</a>
                                            <a href="{{route('checkout')}}" disabled
                                                class="btn btn-outline-primary-2"><span>Checkout</span><i
                                                    class="icon-long-arrow-right"></i></a>
                                        </div><!-- End .dropdown-cart-total -->
                                    @endif
                                </div><!-- End .cart-product -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        @yield('content')

        <footer class="footer">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <img src="{{ asset('images/logo.png') }}" class="footer-logo" alt="Footer Logo"
                                    width="105" height="25">
                                <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate
                                    magna eros eu erat. </p>

                                <div class="social-icons">
                                    <a href="#" class="social-icon" target="_blank" title="Facebook"><i
                                            class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Twitter"><i
                                            class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Instagram"><i
                                            class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Youtube"><i
                                            class="icon-youtube"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Pinterest"><i
                                            class="icon-pinterest"></i></a>
                                </div><!-- End .soial-icons -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="{{ url('about') }}">About Molla</a></li>
                                    <li><a href="#">How to shop on Molla</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="{{ url('contact') }}">Contact us</a></li>
                                    <li><a href="{{ url('login') }}">Log in</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="#">Money-back guarantee!</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Terms and conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Sign In</a></li>
                                    <li><a href="{{ route('viewcart') }}">View Cart</a></li>
                                    <li><a href="#">My Wishlist</a></li>
                                    <li><a href="#">Track My Order</a></li>
                                    <li><a href="#">Help</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p>
                    <!-- End .footer-copyright -->
                    <figure class="footer-payments">
                        <img src="{{ asset('images/payments.png') }}" alt="Payment methods" width="272" height="20">
                    </figure><!-- End .footer-payments -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search"
                    placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active">
                        <a href="index.html">Home</a>

                        <ul>
                            <li><a href="index.html">01 - furniture store</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="category.html">Shop</a>
                        <ul>
                            <li><a href="category-list.html">Shop List</a></li>
                            <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                            <li><a href="category.html">Shop Grid 3 Columns</a></li>
                            <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                            <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span
                                            class="tip tip-hot">Hot</span></span></a></li>
                            <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                            <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                            <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span
                                            class="tip tip-new">New</span></span></a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="#">Lookbook</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="product.html" class="sf-with-ul">Product</a>
                        <ul>
                            <li><a href="product.html">Default</a></li>
                            <li><a href="product-centered.html">Centered</a></li>
                            <li><a href="product-extended.html"><span>Extended Info<span
                                            class="tip tip-new">New</span></span></a></li>
                            <li><a href="product-gallery.html">Gallery</a></li>
                            <li><a href="product-sticky.html">Sticky Info</a></li>
                            <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                            <li><a href="product-fullwidth.html">Full Width</a></li>
                            <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Pages</a>
                        <ul>
                            <li>
                                <a href="about.html">About</a>

                                <ul>
                                    <li><a href="about.html">About 01</a></li>
                                    <li><a href="about-2.html">About 02</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>

                                <ul>
                                    <li><a href="contact.html">Contact 01</a></li>
                                    <li><a href="contact-2.html">Contact 02</a></li>
                                </ul>
                            </li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="faq.html">FAQs</a></li>
                            <li><a href="404.html">Error 404</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="blog.html">Blog</a>

                        <ul>
                            <li><a href="blog.html">Classic</a></li>
                            <li><a href="blog-listing.html">Listing</a></li>
                            <li>
                                <a href="#">Grid</a>
                                <ul>
                                    <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                    <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                    <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                    <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Masonry</a>
                                <ul>
                                    <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                    <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                    <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                    <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Mask</a>
                                <ul>
                                    <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                    <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Single Post</a>
                                <ul>
                                    <li><a href="single.html">Default with sidebar</a></li>
                                    <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                    <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="elements-list.html">Elements</a>
                        <ul>
                            <li><a href="elements-products.html">Products</a></li>
                            <li><a href="elements-typography.html">Typography</a></li>
                            <li><a href="elements-titles.html">Titles</a></li>
                            <li><a href="elements-banners.html">Banners</a></li>
                            <li><a href="elements-product-category.html">Product Category</a></li>
                            <li><a href="elements-video-banners.html">Video Banners</a></li>
                            <li><a href="elements-buttons.html">Buttons</a></li>
                            <li><a href="elements-accordions.html">Accordions</a></li>
                            <li><a href="elements-tabs.html">Tabs</a></li>
                            <li><a href="elements-testimonials.html">Testimonials</a></li>
                            <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                            <li><a href="elements-portfolio.html">Portfolio</a></li>
                            <li><a href="elements-cta.html">Call to Action</a></li>
                            <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i
                        class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i
                        class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    @if (!Session::has('user'))
        <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="icon-close"></i></span>
                        </button>

                        <div class="form-box">
                            <div class="form-tab">
                                <ul class="nav nav-pills nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                                            role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register"
                                            role="tab" aria-controls="register" aria-selected="false">Register</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="tab-content-5">
                                    <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                        aria-labelledby="signin-tab">
                                        <form action="{{ Route('auth.login.action') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="singin-email">Username *</label>
                                                <input type="text" class="form-control" id="singin-email"
                                                    name="username" required>
                                            </div><!-- End .form-group -->

                                            <div class="form-group">
                                                <label for="singin-password">Password *</label>
                                                <input type="password" class="form-control" id="singin-password"
                                                    name="password" required>
                                            </div><!-- End .form-group -->

                                            <div class="form-footer">
                                                <button type="submit" class="btn btn-outline-primary-2">
                                                    <span>LOG IN</span>
                                                    <i class="icon-long-arrow-right"></i>
                                                </button>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="signin-remember">
                                                    <label class="custom-control-label" for="signin-remember">Remember
                                                        Me</label>
                                                </div><!-- End .custom-checkbox -->

                                                <a href="#" class="forgot-link">Forgot Your Password?</a>
                                            </div><!-- End .form-footer -->
                                        </form>
                                        <div class="form-choice">
                                            <p class="text-center">or sign in with</p>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a href="{{ route('google-login') }}"
                                                        class="btn btn-login btn-g">
                                                        <i class="icon-google"></i>
                                                        Login With Google
                                                    </a>
                                                </div><!-- End .col-6 -->
                                                <div class="col-sm-6">
                                                    <a href="{{ route('facebook-login') }}"
                                                        class="btn btn-login btn-f">
                                                        <i class="icon-facebook-f"></i>
                                                        Login With Facebook
                                                    </a>
                                                </div><!-- End .col-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .form-choice -->
                                    </div><!-- .End .tab-pane -->
                                    <div class="tab-pane fade" id="register" role="tabpanel"
                                        aria-labelledby="register-tab">
                                        <form action="{{ Route('auth.register.action') }}" method="POST">

                                            @csrf

                                            <div class="form-group">
                                                <label for="register-username">Username *</label>
                                                <input type="text" class="form-control" id="register-username"
                                                    name="register-username" required>
                                            </div><!-- End .form-group -->

                                            <div class="form-group">
                                                <label for="register-password">Password *</label>
                                                <input type="password" class="form-control" id="register-password"
                                                    value="{{ old('password') }}" name="register-password" required>
                                            </div><!-- End .form-group -->

                                            <div class="form-group">
                                                <label for="register-birthday">Birthday *</label>
                                                <input type="date" class="form-control" id="register-birthday"
                                                    name="register-birthday" required>
                                            </div><!-- End .form-group -->

                                            <div class="form-group">
                                                <label for="register-email">Email *</label>
                                                <input type="email" class="form-control" id="register-email"
                                                    name="register-email" value="{{ old('email') }}" required>
                                            </div><!-- End .form-group -->

                                            <div class="form-group">
                                                <label for="register-fullname">Full name *</label>
                                                <input type="text" class="form-control" id="register-fullname"
                                                    value="{{ old('fullname') }}" name="register-fullname" required>
                                            </div><!-- End .form-group -->

                                            <div class="form-group">
                                                <label for="register-phone">Phone *</label>
                                                <input type="text" class="form-control" id="register-phone"
                                                    name="register-phone" value="{{ old('phone') }}" required>
                                            </div><!-- End .form-group -->

                                            <div class="form-group">
                                                <label for="register-gender">Gender *</label>
                                                <select type="text" class="form-control" id="register-gender"
                                                    name="register-gender" required>
                                                    <option value="Nam" selected>Nam</option>
                                                    <option value="Nam">Nữ</option>
                                                    <option value="Nam">Khác</option>
                                                </select>
                                            </div><!-- End .form-group -->

                                            <div class="form-group">
                                                <label for="register-address">Address *</label>
                                                <input type="text" class="form-control" id="register-address"
                                                    name="register-address" value="1 khavancan" required>
                                            </div><!-- End .form-group -->

                                            <div class="form-footer">
                                                <button type="submit" class="btn btn-outline-primary-2">
                                                    <span>SIGN UP</span>
                                                    <i class="icon-long-arrow-right"></i>
                                                </button>

                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="register-policy" required>
                                                    <label class="custom-control-label" for="register-policy">I agree
                                                        to
                                                        the <a href="#">privacy policy</a> *</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .form-footer -->
                                        </form>
                                        <div class="form-choice">
                                            <p class="text-center">or sign in with</p>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a href="#" class="btn btn-login btn-g">
                                                        <i class="icon-google"></i>
                                                        Login With Google
                                                    </a>
                                                </div><!-- End .col-6 -->
                                                <div class="col-sm-6">
                                                    <a href="#" class="btn btn-login  btn-f">
                                                        <i class="icon-facebook-f"></i>
                                                        Login With Facebook
                                                    </a>
                                                </div><!-- End .col-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .form-choice -->

                                    </div><!-- .End .tab-pane -->
                                </div><!-- End .tab-content -->
                            </div><!-- End .form-tab -->
                        </div><!-- End .form-box -->
                    </div><!-- End .modal-body -->
                </div><!-- End .modal-content -->
            </div><!-- End .modal-dialog -->
        </div><!-- End .modal -->
    @endif
    
    <div class="alert alert-success alert-dismissible fade " data-dismiss="alert"
        style="position: fixed; right: 10px; bottom: 10px; padding-right: 50px;" role="alert">
        <strong>Add cart success</strong> Do you want to <a href="#" class="font-weight-bold">view cart</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- Plugins JS File -->
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('/js/superfish.min.js') }}"></script>
    <script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/js/wNumb.js') }}"></script>


    <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('/js/superfish.min.js') }}"></script>
    <script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/js/wNumb.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.elevateZoom.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="{{ asset('/js/ajax/cart.js') }}"></script>
</body>


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

</html>
