@extends('master')
@section('content')
<<<<<<< Updated upstream
=======
{{-- @php dd($productData->getTopProducts(-1))
@endphp --}}
>>>>>>> Stashed changes
    <main class="main">
        <div class="intro-section bg-lighter pt-5 pb-6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                            <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside"
                                data-toggle="owl"
                                data-owl-options='{
                                                                                                                                                                                    "nav": false,
                                                                                                                                                                                    "responsive": {
                                                                                                                                                                                        "768": {
                                                                                                                                                                                            "nav": true
                                                                                                                                                                                        }
                                                                                                                                                                                    }
                                                                                                                                                                                }'>
                                <div class="intro-slide">
                                    <figure class="slide-image">
                                        <picture>
                                            <source media="(max-width: 480px)"
                                                srcset="url('/images/slider/slide-1-480w.jpg')">
                                            <img src="{{ asset('/images/slider/slide-1.jpg') }}" alt="Image Desc">
                                        </picture>
                                    </figure><!-- End .slide-image -->

                                    <div class="intro-content">
                                        <h3 class="intro-subtitle">Topsale Collection</h3><!-- End .h3 intro-subtitle -->
                                        <h1 class="intro-title">Living Room<br>Furniture</h1><!-- End .intro-title -->

                                        <a href="{{ asset('category') }}" class="btn btn-outline-white">
                                            <span>SHOP NOW</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .intro-content -->
                                </div><!-- End .intro-slide -->

                                <div class="intro-slide">
                                    <figure class="slide-image">
                                        <picture>
                                            <source media="(max-width: 480px)"
                                                srcset=" {{ asset('/images/slider/slide-2-480w.jpg') }}">
                                            <img src="{{ asset('/images/slider/slide-2.jpg') }}" alt="Image Desc">
                                        </picture>
                                    </figure><!-- End .slide-image -->

                                    <div class="intro-content">
                                        <h3 class="intro-subtitle">News and Inspiration</h3><!-- End .h3 intro-subtitle -->
                                        <h1 class="intro-title">New Arrivals</h1><!-- End .intro-title -->

                                        <a href="{{ asset('category') }}" class="btn btn-outline-white">
                                            <span>SHOP NOW</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .intro-content -->
                                </div><!-- End .intro-slide -->

                                <div class="intro-slide">
                                    <figure class="slide-image">
                                        <picture>
                                            <source media="(max-width: 480px)"
                                                srcset="{{ asset('/images/slider/slide-3-480w.jpg') }}">
                                            <img src="{{ asset('/images/slider/slide-3.jpg') }}" alt="Image Desc">
                                        </picture>
                                    </figure><!-- End .slide-image -->

                                    <div class="intro-content">
                                        <h3 class="intro-subtitle">Outdoor Furniture</h3><!-- End .h3 intro-subtitle -->
                                        <h1 class="intro-title">Outdoor Dining <br>Furniture</h1>
                                        <!-- End .intro-title -->

                                        <a href="{{ asset('category') }}" class="btn btn-outline-white">
                                            <span>SHOP NOW</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </a>
                                    </div><!-- End .intro-content -->
                                </div><!-- End .intro-slide -->
                            </div><!-- End .intro-slider owl-carousel owl-simple -->

                            <span class="slider-loader"></span><!-- End .slider-loader -->
                        </div><!-- End .intro-slider-container -->
                    </div><!-- End .col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="intro-banners">
                            <div class="row row-sm">
                                <div class="col-md-6 col-lg-12">
                                    <div class="banner banner-display">
                                        <a href="#">
                                            <img src="{{ asset('/images/banners/home/intro/banner-1.jpg') }}"
                                                alt="Banner">
                                        </a>

                                        <div class="banner-content">
                                            <h4 class="banner-subtitle text-darkwhite"><a href="#">Clearence</a></h4>
                                            <!-- End .banner-subtitle -->
                                            <h3 class="banner-title text-white"><a href="#">Chairs & Chaises <br>Up to 40%
                                                    off</a></h3><!-- End .banner-title -->
                                            <a href="#" class="btn btn-outline-white banner-link">Shop Now<i
                                                    class="icon-long-arrow-right"></i></a>
                                        </div><!-- End .banner-content -->
                                    </div><!-- End .banner -->
                                </div><!-- End .col-md-6 col-lg-12 -->

                                <div class="col-md-6 col-lg-12">
                                    <div class="banner banner-display mb-0">
                                        <a href="#">
                                            <img src="{{ asset('/images/banners/home/intro/banner-2.jpg') }}"
                                                alt="Banner">
                                        </a>

                                        <div class="banner-content">
                                            <h4 class="banner-subtitle text-darkwhite"><a href="#">New in</a></h4>
                                            <!-- End .banner-subtitle -->
                                            <h3 class="banner-title text-white"><a href="#">Best Lighting <br>Collection</a>
                                            </h3><!-- End .banner-title -->
                                            <a href="#" class="btn btn-outline-white banner-link">Discover Now<i
                                                    class="icon-long-arrow-right"></i></a>
                                        </div><!-- End .banner-content -->
                                    </div><!-- End .banner -->
                                </div><!-- End .col-md-6 col-lg-12 -->
                            </div><!-- End .row row-sm -->
                        </div><!-- End .intro-banners -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->

                <div class="mb-6"></div><!-- End .mb-6 -->

                <div class="owl-carousel owl-simple" data-toggle="owl"
                    data-owl-options='{
                                                                                                                                                                        "nav": false,
                                                                                                                                                                        "dots": false,
                                                                                                                                                                        "margin": 30,
                                                                                                                                                                        "loop": false,
                                                                                                                                                                        "responsive": {
                                                                                                                                                                            "0": {
                                                                                                                                                                                "items":2
                                                                                                                                                                            },
                                                                                                                                                                            "420": {
                                                                                                                                                                                "items":3
                                                                                                                                                                            },
                                                                                                                                                                            "600": {
                                                                                                                                                                                "items":4
                                                                                                                                                                            },
                                                                                                                                                                            "900": {
                                                                                                                                                                                "items":5
                                                                                                                                                                            },
                                                                                                                                                                            "1024": {
                                                                                                                                                                                "items":6
                                                                                                                                                                            }
                                                                                                                                                                        }
                                                                                                                                                                    }'>
                    @foreach ($brands as $brand)
                        <a href="#" class="brand">
                            <img src="{{ asset('/images/brands/' . $brand->id . '.png') }}" alt="Brand Name">
                        </a>
                    @endforeach




                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->
        </div><!-- End .bg-lighter -->

        <div class="mb-6"></div><!-- End .mb-6 -->

        <div class="container">
            <div class="heading heading-center mb-3">
                <h2 class="title-lg">Trendy Products</h2><!-- End .title -->

                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="trendy-all-link" data-toggle="tab" href="#trendy-all-tab" role="tab"
                            aria-controls="trendy-all-tab" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trendy-sofa-link" data-toggle="tab" href="#trendy-sofa-tab" role="tab"
                            aria-controls="trendy-sofa-tab" aria-selected="true">SOFAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trendy-chair-link" data-toggle="tab" href="#trendy-chair-tab"
                            role="tab" aria-controls="trendy-sofa-tab" aria-selected="true">CHAIRS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trendy-lamp-link" data-toggle="tab" href="#trendy-lamp-tab" role="tab"
                            aria-controls="trendy-sofa-tab" aria-selected="true">LAMPS</a>
                    </li>
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel"
                    aria-labelledby="trendy-all-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                                                                                                                                                                            "nav": false,
                                                                                                                                                                            "dots": true,
                                                                                                                                                                            "margin": 20,
                                                                                                                                                                            "loop": false,
                                                                                                                                                                            "responsive": {
                                                                                                                                                                                "0": {
                                                                                                                                                                                    "items":2
                                                                                                                                                                                },
                                                                                                                                                                                "480": {
                                                                                                                                                                                    "items":2
                                                                                                                                                                                },
                                                                                                                                                                                "768": {
                                                                                                                                                                                    "items":3
                                                                                                                                                                                },
                                                                                                                                                                                "992": {
                                                                                                                                                                                    "items":4
                                                                                                                                                                                },
                                                                                                                                                                                "1200": {
                                                                                                                                                                                    "items":4,
                                                                                                                                                                                    "nav": true,
                                                                                                                                                                                    "dots": false
                                                                                                                                                                                }
                                                                                                                                                                            }
                                                                                                                                                                        }'>


                        @foreach ($productData->getTopProducts(-1) as $key => $product)
                            @php
                                $product_str = 'product-' . $product['product_id'] . '-all';
                            @endphp
                            <div class="product product-11 text-center">

                                <figure class="{{ asset('product-media') }}" id="{{ $product_str }}">
                                    @foreach ($product['colors'] as $key => $color)
                                        @php
                                            $image = explode('#', $color['src']);
                                        @endphp
                                        @if ($key == 0)
                                            <a href='id=1'
                                                id="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] }}">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[0]) }}"
                                                    alt="Product image" class="product-image">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[1]) }}"
                                                    alt="Product image" class="product-image-hover">
                                            </a>
                                        @else
                                            <a href='id=1' class="d-none"
                                                id="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] }}">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[0]) }}"
                                                    alt="Product image" class="product-image">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[1]) }}"
                                                    alt="Product image" class="product-image-hover">
                                            </a>
                                        @endif
                                    @endforeach

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div><!-- End .product-action-vertical -->

                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a
                                            href="{{ asset('product') }}">{{ $product['product_name'] }}</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        {{ number_format($product['price'], 0, '', ',') . ' VNĐ' }}
                                    </div><!-- End .product-price -->

                                    {{-- :Link switch color --}}
                                    <div class="product-nav product-nav-dots top-sales">
                                        @foreach ($product['colors'] as $key => $color)
                                            @if (count($product['colors']) == 1)
                                                @php
                                                    continue;
                                                @endphp
                                            @endif
                                            @if ($key == 0)
                                                <a href="javascript:void(0)" class="{{ $product_str }} active"
                                                    style="background: {{ $color['color_code'] }};"
                                                    data-product="{{ $product_str }}"
                                                    data-color="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] }}">
                                                    <span class="sr-only">Color name</span></a>
                                            @else
                                                <a href="javascript:void(0)" class="{{ $product_str }}"
                                                    style="background: {{ $color['color_code'] }};"
                                                    data-product="{{ $product_str }}"
                                                    data-color="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] }}">
                                                    <span class="sr-only">Color name</span>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div><!-- End .product-body -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->


                <div class="tab-pane p-0 fade" id="trendy-sofa-tab" role="tabpanel" aria-labelledby="trendy-sofa-tab">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                                                                                                                                                                            "nav": false,
                                                                                                                                                                            "dots": true,
                                                                                                                                                                            "margin": 20,
                                                                                                                                                                            "loop": false,
                                                                                                                                                                            "responsive": {
                                                                                                                                                                                "0": {
                                                                                                                                                                                    "items":2
                                                                                                                                                                                },
                                                                                                                                                                                "480": {
                                                                                                                                                                                    "items":2
                                                                                                                                                                                },
                                                                                                                                                                                "768": {
                                                                                                                                                                                    "items":3
                                                                                                                                                                                },
                                                                                                                                                                                "992": {
                                                                                                                                                                                    "items":4
                                                                                                                                                                                },
                                                                                                                                                                                "1200": {
                                                                                                                                                                                    "items":4,
                                                                                                                                                                                    "nav": true,
                                                                                                                                                                                    "dots": false
                                                                                                                                                                                }
                                                                                                                                                                            }
                                                                                                                                                                        }'>

                        @foreach ($productData->getTopProducts(1) as $product)
                            <div class="product product-11 text-center">
                                @php
                                    $product_str = 'product-' . $product['product_id'] . '-' . $product['category_name'];
                                @endphp
                                <figure class="{{ asset('product-media') }}" id="{{ $product_str }}">
                                    @foreach ($product['colors'] as $key => $color)
                                        @php
                                            $image = explode('#', $color['src']);
                                        @endphp
                                        @if ($key == 0)
                                            <a href='id=1'
                                                id="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[0]) }}"
                                                    alt="Product image" class="product-image">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[1]) }}"
                                                    alt="Product image" class="product-image-hover">
                                            </a>
                                        @else
                                            <a href='id=1' class="d-none"
                                                id="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[0]) }}"
                                                    alt="Product image" class="product-image">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[1]) }}"
                                                    alt="Product image" class="product-image-hover">
                                            </a>
                                        @endif
                                    @endforeach

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div><!-- End .product-action-vertical -->

                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a
                                            href="{{ asset('product') }}">{{ $product['product_name'] }}</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        {{ number_format($product['price'], 0, '', ',') . ' VNĐ' }}
                                    </div><!-- End .product-price -->

                                    {{-- :Link switch color --}}
                                    <div class="product-nav product-nav-dots top-sales">
                                        @foreach ($product['colors'] as $key => $color)
                                            @if (count($product['colors']) == 1)
                                                @php
                                                    continue;
                                                @endphp
                                            @endif
                                            @if ($key == 0)
                                                <a href="javascript:void(0)" class="{{ $product_str }} active"
                                                    style="background: {{ $color['color_code'] }};"
                                                    data-product="{{ $product_str }}"
                                                    data-color="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                    <span class="sr-only">Color name</span></a>
                                            @else
                                                <a href="javascript:void(0)" class="{{ $product_str }}"
                                                    style="background: {{ $color['color_code'] }};"
                                                    data-product="{{ $product_str }}"
                                                    data-color="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                    <span class="sr-only">Color name</span>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div><!-- End .product-body -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->

                <div class="tab-pane p-0 fade" id="trendy-chair-tab" role="tabpanel" aria-labelledby="trendy-chair-tab">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                                                                                                                                                                            "nav": false,
                                                                                                                                                                            "dots": true,
                                                                                                                                                                            "margin": 20,
                                                                                                                                                                            "loop": false,
                                                                                                                                                                            "responsive": {
                                                                                                                                                                                "0": {
                                                                                                                                                                                    "items":2
                                                                                                                                                                                },
                                                                                                                                                                                "480": {
                                                                                                                                                                                    "items":2
                                                                                                                                                                                },
                                                                                                                                                                                "768": {
                                                                                                                                                                                    "items":3
                                                                                                                                                                                },
                                                                                                                                                                                "992": {
                                                                                                                                                                                    "items":4
                                                                                                                                                                                },
                                                                                                                                                                                "1200": {
                                                                                                                                                                                    "items":4,
                                                                                                                                                                                    "nav": true,
                                                                                                                                                                                    "dots": false
                                                                                                                                                                                }
                                                                                                                                                                            }
                                                                                                                                                                        }'>

                        @foreach ($productData->getTopProducts(3) as $product)
                            <div class="product product-11 text-center">
                                @php
                                    $product_str = 'product-' . $product['product_id'] . '-' . $product['category_name'];
                                @endphp
                                <figure class="{{ asset('product-media') }}" id="{{ $product_str }}">
                                    @foreach ($product['colors'] as $key => $color)
                                        @php
                                            $image = explode('#', $color['src']);
                                        @endphp
                                        @if ($key == 0)
                                            <a href='id=1'
                                                id="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[0]) }}"
                                                    alt="Product image" class="product-image">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[1]) }}"
                                                    alt="Product image" class="product-image-hover">
                                            </a>
                                        @else
                                            <a href='id=1' class="d-none"
                                                id="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[0]) }}"
                                                    alt="Product image" class="product-image">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[1]) }}"
                                                    alt="Product image" class="product-image-hover">
                                            </a>
                                        @endif
                                    @endforeach

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div><!-- End .product-action-vertical -->

                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a
                                            href="{{ asset('product') }}">{{ $product['product_name'] }}</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        {{ number_format($product['price'], 0, '', ',') . ' VNĐ' }}
                                    </div><!-- End .product-price -->

                                    {{-- :Link switch color --}}
                                    <div class="product-nav product-nav-dots top-sales">
                                        @foreach ($product['colors'] as $key => $color)
                                            @if (count($product['colors']) == 1)
                                                @php
                                                    continue;
                                                @endphp
                                            @endif
                                            @if ($key == 0)
                                                <a href="javascript:void(0)" class="{{ $product_str }} active"
                                                    style="background: {{ $color['color_code'] }};"
                                                    data-product="{{ $product_str }}"
                                                    data-color="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                    <span class="sr-only">Color name</span></a>
                                            @else
                                                <a href="javascript:void(0)" class="{{ $product_str }}"
                                                    style="background: {{ $color['color_code'] }};"
                                                    data-product="{{ $product_str }}"
                                                    data-color="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                    <span class="sr-only">Color name</span>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div><!-- End .product-body -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="trendy-lamp-tab" role="tabpanel" aria-labelledby="trendy-lamp-tab">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                                                                                                                                                                            "nav": false,
                                                                                                                                                                            "dots": true,
                                                                                                                                                                            "margin": 20,
                                                                                                                                                                            "loop": false,
                                                                                                                                                                            "responsive": {
                                                                                                                                                                                "0": {
                                                                                                                                                                                    "items":2
                                                                                                                                                                                },
                                                                                                                                                                                "480": {
                                                                                                                                                                                    "items":2
                                                                                                                                                                                },
                                                                                                                                                                                "768": {
                                                                                                                                                                                    "items":3
                                                                                                                                                                                },
                                                                                                                                                                                "992": {
                                                                                                                                                                                    "items":4
                                                                                                                                                                                },
                                                                                                                                                                                "1200": {
                                                                                                                                                                                    "items":4,
                                                                                                                                                                                    "nav": true,
                                                                                                                                                                                    "dots": false
                                                                                                                                                                                }
                                                                                                                                                                            }
                                                                                                                                                                        }'>

                        @foreach ($productData->getTopProducts(7) as $product)
                            <div class="product product-11 text-center">
                                @php
                                    $product_str = 'product-' . $product['product_id'] . '-' . $product['category_name'];
                                @endphp
                                <figure class="{{ asset('product-media') }}" id="{{ $product_str }}">
                                    @foreach ($product['colors'] as $key => $color)
                                        @php
                                            $image = explode('#', $color['src']);
                                        @endphp
                                        @if ($key == 0)
                                            <a href='id=1'
                                                id="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[0]) }}"
                                                    alt="Product image" class="product-image">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[1]) }}"
                                                    alt="Product image" class="product-image-hover">
                                            </a>
                                        @else
                                            <a href='id=1' class="d-none"
                                                id="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[0]) }}"
                                                    alt="Product image" class="product-image">
                                                <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[1]) }}"
                                                    alt="Product image" class="product-image-hover">
                                            </a>
                                        @endif
                                    @endforeach

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                    </div><!-- End .product-action-vertical -->

                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a
                                            href="{{ asset('product') }}">{{ $product['product_name'] }}</a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        {{ number_format($product['price'], 0, '', ',') . ' VNĐ' }}
                                    </div><!-- End .product-price -->

                                    {{-- :Link switch color --}}
                                    <div class="product-nav product-nav-dots top-sales">
                                        @foreach ($product['colors'] as $key => $color)
                                            @if (count($product['colors']) == 1)
                                                @php
                                                    continue;
                                                @endphp
                                            @endif
                                            @if ($key == 0)
                                                <a href="javascript:void(0)" class="{{ $product_str }} active"
                                                    style="background: {{ $color['color_code'] }};"
                                                    data-product="{{ $product_str }}"
                                                    data-color="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                    <span class="sr-only">Color name</span></a>
                                            @else
                                                <a href="javascript:void(0)" class="{{ $product_str }}"
                                                    style="background: {{ $color['color_code'] }};"
                                                    data-product="{{ $product_str }}"
                                                    data-color="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                    <span class="sr-only">Color name</span>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div><!-- End .product-body -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .container -->

        <script>
            const colorDots = document.querySelectorAll('.product-nav.product-nav-dots a');
            colorDots.forEach(dot => {
                dot.addEventListener('click', function() {

                    const productImgs = document.querySelectorAll(`#${this.dataset.product} a`);

                    productImgs.forEach(img => {
                        
                        img.classList.add('d-none');
                    });
                    console.log(this.dataset.color);

                    document.querySelector(`#${this.dataset.color}`).classList.remove('d-none');

                    const colorLinks = document.querySelectorAll(`.${this.dataset.product}`);

                    colorLinks.forEach(link => {
                    
                        link.classList.remove('active');
                    })

                    this.classList.add('active')
                })
            });
        </script>
        <div class="container categories pt-6">
            <h2 class="title-lg text-center mb-4">Shop by Categories</h2><!-- End .title-lg text-center -->

            <div class="row">
                <div class="col-6 col-lg-4">
                    <div class="banner banner-display banner-link-anim">
                        <a href="#">
                            <img src="{{ asset('/images/banners/home/banner-1.jpg') }}" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h3 class="banner-title text-white"><a href="#">Outdoor</a></h3><!-- End .banner-title -->
                            <a href="#" class="btn btn-outline-white banner-link">Shop Now<i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-sm-6 col-lg-3 -->
                <div class="col-6 col-lg-4 order-lg-last">
                    <div class="banner banner-display banner-link-anim">
                        <a href="#">
                            <img src="{{ asset('/images/banners/home/banner-4.jpg') }}" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-center">
                            <h3 class="banner-title text-white"><a href="#">Lighting</a></h3><!-- End .banner-title -->
                            <a href="#" class="btn btn-outline-white banner-link">Shop Now<i
                                    class="icon-long-arrow-right"></i></a>
                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-sm-6 col-lg-3 -->
                <div class="col-sm-12 col-lg-4 banners-sm">
                    <div class="row">
                        <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                            <a href="#">
                                <img src="{{ asset('/images/banners/home/banner-2.jpg') }}" alt="Banner">
                            </a>

                            <div class="banner-content banner-content-center">
                                <h3 class="banner-title text-white"><a href="#">Furniture and Design</a></h3>
                                <!-- End .banner-title -->
                                <a href="#" class="btn btn-outline-white banner-link">Shop Now<i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->

                        <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                            <a href="#">
                                <img src="{{ asset('/images/banners/home/banner-3.jpg') }}" alt="Banner">
                            </a>

                            <div class="banner-content banner-content-center">
                                <h3 class="banner-title text-white"><a href="#">Kitchen & Utensil</a></h3>
                                <!-- End .banner-title -->
                                <a href="#" class="btn btn-outline-white banner-link">Shop Now<i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div>
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-5"></div><!-- End .mb-6 -->


        <div class="container">
            <div class="heading heading-center mb-6">
                <h2 class="title">Recent Arrivals</h2><!-- End .title -->

                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab"
                            aria-controls="top-all-tab" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="top-fur-link" data-toggle="tab" href="#top-fur-tab" role="tab"
                            aria-controls="top-fur-tab" aria-selected="false">SOFAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="top-decor-link" data-toggle="tab" href="#top-decor-tab" role="tab"
                            aria-controls="top-decor-tab" aria-selected="false">CHAIRS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="top-light-link" data-toggle="tab" href="#top-light-tab" role="tab"
                            aria-controls="top-light-tab" aria-selected="false">LAMPS</a>
                    </li>
                </ul>
            </div><!-- End .heading -->


            <div class="tab-content">
                <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel" aria-labelledby="top-all-link">
                    <div class="products" >
                        <div class="row justify-content-center" id="allNew">

                        </div><!-- End .row -->
                    </div><!-- End .products -->
                    <div class="more-container text-center">
                        <a href="javascript:void(0)" class="btn btn-outline-darker btn-more" data-category-id="-1"
                            data-container="allNew"><span>Load more products</span><i class="icon-long-arrow-down"></i></a>
                    </div><!-- End .more-container -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-fur-tab" role="tabpanel" aria-labelledby="top-fur-link">
                    <div class="products" >
                        <div class="row justify-content-center" id="sofasNew">
                        </div>
                    </div><!-- End .products -->
                    <div class="more-container text-center">
                        <a href="javascript:void(0)" class="btn btn-outline-darker btn-more" data-category-id="1"
                            data-container="sofasNew"><span>Load more products</span><i
                                class="icon-long-arrow-down"></i></a>
                    </div><!-- End .more-container -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-decor-tab" role="tabpanel" aria-labelledby="top-decor-link">
                    <div class="products" >
                        <div class="row justify-content-center" id="chairNew">
                         
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                    <div class="more-container text-center">
                        <a href="javascript:void(0)" class="btn btn-outline-darker btn-more" data-category-id="3"
                            data-container="chairNew"><span>Load more products</span><i
                                class="icon-long-arrow-down"></i></a>
                    </div><!-- End .more-container -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="top-light-tab" role="tabpanel" aria-labelledby="top-light-link">
                    <div class="products" >
                        <div class="row justify-content-center" id="lampNew">
                    
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                    <div class="more-container text-center">
                        <a href="javascript:void(0)" class="btn btn-outline-darker btn-more" data-category-id="7"
                            data-container="lampNew"><span>Load more products</span><i
                                class="icon-long-arrow-down"></i></a>
                    </div><!-- End .more-container -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->

        </div><!-- End .container -->
        <script>
            const btn_LoadMore = document.querySelectorAll('.btn-more');
            
            let perpage = 4;

            let all = -1, sofas = -1, chairs = -1, lamps = -1;

            btn_LoadMore.forEach(el => {
                el.addEventListener('click', () => {
                    loadMore(el.dataset.categoryId, el.dataset.container, el);
                })
                loadMore(el.dataset.categoryId, el.dataset.container, el);
            });
         
           
            async function loadMore(category_id, container, btnLoad) {

                let p = 0;
                switch (category_id) {
                    case '-1':
                        all++
                        p = all
                   
                    break;
                    case '1':
                        sofas++
                        p = sofas
                    break;
                    case '3':
                        chairs++
                        p = chairs
                    break;
                    case '7':
                        lamps++
                        p = lamps
                    break;
                }
             

                const url = "./api/getNew/" + category_id + "/" +  p  + "/" + perpage;
                const respone = await fetch(url);
                const result = await respone.json();
                // const resultArr = [...result];
                console.log([...result]);
                const divResult = document.querySelector(`#${container}`);
                let html = '';
                let n = result.length - 1;

                if (result.length < 5) {
                    btnLoad.style.display = 'none';
                    n = result.length;
                }
            

                for (let i = 0; i < n; i++) {
                    const product = result[i];
                    html += `<div class="col-6 col-md-4 col-lg-3">
                                    <div class="product product-11 mt-v3 text-center">
                                        <figure class="product-media">`;

                                            product.colors.forEach((color, i) => {
                                                const images = color.src.split("#");
                                                html += 
                                                `<a href="#" class="${ i !== 0 ? 'd-none' : ''}">
                                                    <img src="./images/molla/${product.category_name}/${images[0]}"
                                                        alt="Product image" class="product-image">
                                                    <img src="./images/molla/${product.category_name}/${images[1]}"
                                                        alt="Product image" class="product-image-hover">
                                                </a>`;
                                            });
                                                html +=
                                                `<div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist "><span>add to
                                                            wishlist</span></a>
                                                </div>
                                            </figure>

                                            <div class="product-body">
                                                <h3 class="product-title"><a href="#">${product.product_name}</a></h3>
                                                <div class="product-price">
                                                    ${formatter.format(product.price)}
                                                </div>

                                                <div class="product-nav product-nav-dots">`;
                                                    if (product.colors.length > 1) {
                                                        product.colors.forEach((color, i) => {
                                                        html +=
                                                        `
                                                        <a href="#" class="${ i===0 ? 'active' : ''}" style="background: ${color.color_code};"><span
                                                            class="sr-only">Color name</span></a>
                                                        `
                                                    });
                                                    }
                                                html +=
                                                `</div>
                                            </div>
                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                            </div>
                                        </div>
                                    </div>`;
                

                
                }
            
                divResult.insertAdjacentHTML('beforeend', html);
            }
            var formatter = new Intl.NumberFormat('it-IT', {
                style: 'currency',
                currency: 'VND',
            });

           
        </script>

        <div class="container">
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                            <p>Free shipping for orders over $50</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rotate-left"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Return & Refund</h3><!-- End .icon-box-title -->
                            <p>Free 100% money back guarantee</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-life-ring"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                            <p>Alway online feedback 24/7</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-lg-4 col-sm-6 -->
            </div><!-- End .row -->

            <div class="mb-2"></div><!-- End .mb-2 -->
        </div><!-- End .container -->
        <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
            <div class="container">
                <h2 class="title-lg text-center mb-3 mb-md-4">From Our Blog</h2><!-- End .title-lg text-center -->

                <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                                                                                                                                                                        "nav": false,
                                                                                                                                                                        "dots": true,
                                                                                                                                                                        "items": 3,
                                                                                                                                                                        "margin": 20,
                                                                                                                                                                        "loop": false,
                                                                                                                                                                        "responsive": {
                                                                                                                                                                            "0": {
                                                                                                                                                                                "items":1
                                                                                                                                                                            },
                                                                                                                                                                            "600": {
                                                                                                                                                                                "items":2
                                                                                                                                                                            },
                                                                                                                                                                            "992": {
                                                                                                                                                                                "items":3
                                                                                                                                                                            }
                                                                                                                                                                        }
                                                                                                                                                                    }'>
                    <article class="entry entry-display">
                        <figure class="entry-media">
                            <a href="{{ asset('single') }}">
                                <img src="{{ asset('/images/blog/home/post-1.jpg') }}" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body pb-4 text-center">
                            <div class="entry-meta">
                                <a href="#">Nov 22, 2018</a>, 0 Comments
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="{{ asset('single') }}">Sed adipiscing ornare.</a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus
                                    hendrerit.<br>Pelletesque aliquet nibh necurna. </p>
                                <a href="{{ asset('single') }}" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->

                    <article class="entry entry-display">
                        <figure class="entry-media">
                            <a href="{{ asset('single') }}">
                                <img src="{{ asset('/images/blog/home/post-2.jpg') }}" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body pb-4 text-center">
                            <div class="entry-meta">
                                <a href="#">Dec 12, 2018</a>, 0 Comments
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="{{ asset('single') }}">Fusce lacinia arcuet nulla.</a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>Sed pretium, ligula sollicitudin laoreet<br>viverra, tortor libero sodales leo, eget
                                    blandit nunc tortor eu nibh. Nullam mollis justo. </p>
                                <a href="{{ asset('single') }}" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->

                    <article class="entry entry-display">
                        <figure class="entry-media">
                            <a href="{{ asset('single') }}">
                                <img src="{{ asset('/images/blog/home/post-3.jpg') }}" alt="image desc">
                            </a>
                        </figure><!-- End .entry-media -->

                        <div class="entry-body pb-4 text-center">
                            <div class="entry-meta">
                                <a href="#">Dec 19, 2018</a>, 2 Comments
                            </div><!-- End .entry-meta -->

                            <h3 class="entry-title">
                                <a href="{{ asset('single') }}">Quisque volutpat mattis eros.</a>
                            </h3><!-- End .entry-title -->

                            <div class="entry-content">
                                <p>Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae
                                    luctus metus libero eu augue. </p>
                                <a href="{{ asset('single') }}" class="read-more">Read More</a>
                            </div><!-- End .entry-content -->
                        </div><!-- End .entry-body -->
                    </article><!-- End .entry -->
                </div><!-- End .owl-carousel -->
            </div><!-- container -->

            <div class="more-container text-center mb-0 mt-3">
                <a href="blog.html" class="btn btn-outline-darker btn-more"><span>View more articles</span><i
                        class="icon-long-arrow-right"></i></a>
            </div><!-- End .more-container -->
        </div>
        <div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url('/images/backgrounds/cta/bg-6.jpg')">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9 col-xl-8">
                        <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                            <div class="col">
                                <h3 class="cta-title text-white">Sign Up & Get 10% Off</h3><!-- End .cta-title -->
                                <p class="cta-desc text-white">Molla presents the best in interior design</p>
                                <!-- End .cta-desc -->
                            </div><!-- End .col -->

                            <div class="col-auto">
                                <a href="{{ asset('login') }}" class="btn btn-outline-white"><span>SIGN UP</span><i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .col-auto -->
                        </div><!-- End .row no-gutters -->
                    </div><!-- End .col-md-10 col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cta -->
    </main><!-- End .main -->

@endsection('content')
