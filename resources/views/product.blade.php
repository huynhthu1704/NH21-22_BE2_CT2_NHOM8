@extends('master')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('category')}}">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>

                <nav class="product-pager ml-auto" aria-label="Product">
                    <a class="product-pager-link product-pager-prev" href="{{route('detail', ['id' => ($product[0]->product->id - 1)])}}" aria-label="Previous" tabindex="-1">
                        <i class="icon-angle-left"></i>
                        <span>Prev</span>
                    </a>

                    <a class="product-pager-link product-pager-next" href="{{route('detail', ['id' => ($product[0]->product->id + 1)])}}" aria-label="Next" tabindex="-1">
                        <span>Next</span>
                        <i class="icon-angle-right"></i>
                    </a>
                </nav><!-- End .pager-nav -->
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">

                                <div class="row">
                                    <figure class="product-main-image">
                                        <img id="product-zoom"
                                            src="{{ asset('images/molla/' . $category->category->category_name . '/' . $product[0]->src) }}"
                                            data-zoom-image="{{ asset('images/molla/' . $category->category->category_name . '/' . $product[0]->src) }}"
                                            alt="product image">

                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure><!-- End .product-main-image -->
                                    @foreach ($product as $k => $item)
                                        @php
                                            $imgsrc = explode('#', $item->src);
                                        @endphp
                                        <div id="product-zoom-gallery"
                                            class="product-image-gallery list-image-{{$k}} {{ $k != 0 ? 'd-none' : '' }}">
                                            @foreach ($imgsrc as $key => $src)
                                                <a class="product-gallery-item {{ $key == 0 ? 'active' : '' }} " href="#"
                                                    data-image="{{ asset('images/molla/' . $category->category->category_name . '/' . $src) }}"
                                                    data-zoom-image="{{ asset('images/molla/' . $category->category->category_name . '/' . $src) }}">
                                                    <img src="{{ asset('images/molla/' . $category->category->category_name . '/' . $src) }}"
                                                        alt="product side">
                                                </a>
                                            @endforeach
                                        </div><!-- End .product-image-gallery -->
                                    @endforeach
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title">{{ $product[0]->product->product_name }}</h1>
                                <!-- End .product-title -->

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                </div><!-- End .rating-container -->

                                <div class="product-price">
                                    {{ number_format($product[0]->product->price, 0, '', ',') . ' VNĐ' }}
                                </div><!-- End .product-price -->

                                <div class="product-content">
                                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus
                                        libero eu augue. Morbi purus libero, faucibus adipiscing. Sed lectus. </p>
                                </div><!-- End .product-content -->

                                <div class="details-filter-row details-row-size">
                                    <label>Color:</label>

                                    <div class="product-nav product-nav-dots detail-colors">
                                        @foreach ($product as $key => $item)
                                            <a href="javascript:void(0)" 
                                            class="{{ $key == 0 ? 'active' : '' }}"
                                            data-color-id="{{$item->color->id}}"
                                            data-list="list-image-{{$key}}"
                                            data-product-id="{{$item->product->id}}"
                                            style="background: {{$item->color->color_code}};"><span
                                                    class="sr-only">{{$item->color->color_name}}</span></a>
                                        @endforeach
                                    </div><!-- End .product-nav -->
                                </div>



                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Qty:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" class="form-control" value="1" min="1" max="10"
                                            step="1" data-decimals="0" required>
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->

                                <div class="product-details-action">
                                    <a href="javascript:void(0)" 
                                    data-product-id="{{$product[0]->product->id}}"
                                    data-color-id="{{$product[0]->color->id}}"
                                    onclick="addCartDetail(this)"
                                    class="btn-product btn-cart detail-cart"><span>add to cart</span></a>

                                </div><!-- End .product-details-action -->

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="#">{{ $category->category->category_name }}</a>

                                    </div><!-- End .product-cat -->

                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                                class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                                class="icon-instagram"></i></a>
                                    </div>
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->

                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab"
                                role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                                href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab"
                                aria-selected="false">Shipping &amp; Returns</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                                role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Product Information</h3>
                                <p>{{$product[0]->product->description}}</p>
                               
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-info-tab" role="tabpanel"
                            aria-labelledby="product-info-link">
                            <div class="product-desc-content">
                                <h3>Information</h3>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat
                                    mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper
                                    suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam
                                    porttitor mauris sit amet orci. </p>

                                <h3>Fabric &amp; care</h3>
                                <ul>
                                    <li>Faux suede fabric</li>
                                    <li>Gold tone metal hoop handles.</li>
                                    <li>RI branding</li>
                                    <li>Snake print trim interior </li>
                                    <li>Adjustable cross body strap</li>
                                    <li> Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>
                                </ul>

                                <h3>Size</h3>
                                <p>one size</p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                            aria-labelledby="product-shipping-link">
                            <div class="product-desc-content">
                                <h3>Delivery &amp; returns</h3>
                                <p>We deliver to over 100 countries around the world. For full details of the delivery
                                    options we offer, please view our <a href="#">Delivery information</a><br>
                                    We hope you’ll love every purchase, but if you ever need to return an item you can do so
                                    within a month of receipt. For full details of how to make a return, please view our <a
                                        href="#">Returns information</a></p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                            aria-labelledby="product-review-link">
                            <div class="reviews">
                                <h3>Reviews (2)</h3>
                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">Samanta J.</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">6 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Good, perfect size</h4>

                                            <div class="review-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum
                                                    dolores assumenda asperiores facilis porro reprehenderit animi culpa
                                                    atque blanditiis commodi perspiciatis doloremque, possimus, explicabo,
                                                    autem fugit beatae quae voluptas!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->

                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">John Doe</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">5 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Very good</h4>

                                            <div class="review-content">
                                                <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis
                                                    laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi,
                                                    quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->
                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->

                <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

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

                    @foreach ($productData->getTopProducts($category->category_id) as $product)
                        @php
                            $product_str = 'product-' . $product['product_id'] . '-' . $product['category_name'];
                        @endphp
                        <div class="product product-11 text-center" id="{{ $product_str }}">

                            <figure class="{{ asset('product-media') }}" id="{{ $product_str }}">
                                @foreach ($product['colors'] as $key => $color)
                                    @php
                                        $image = explode('#', $color['src']);
                                    @endphp
                                    @if ($key == 0)
                                        <a href='{{route('detail', ['id' => $product['product_id']])}}'
                                            id="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                            <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[0]) }}"
                                                alt="Product image" class="product-image">
                                            <img src="{{ asset('/images/molla/' . $product['category_name'] . '/' . $image[1]) }}"
                                                alt="Product image" class="product-image-hover">
                                        </a>
                                    @else
                                        <a href='{{route('detail', ['id' => $product['product_id']])}}' class="d-none"
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
                                @php
                                    $color_id = 0;
                                @endphp
                                <div class="product-nav product-nav-dots top-sales">
                                    @foreach ($product['colors'] as $key => $color)
                                        @if (count($product['colors']) == 1)
                                            @php
                                                $color_id = $color['color_id'];
                                                continue;
                                            @endphp
                                        @endif
                                        @if ($key == 0)
                                            @php
                                                $color_id = $color['color_id'];
                                            @endphp
                                            <a href="javascript:void(0)" class="{{ $product_str }} active"
                                                data-obj="{{ $product_str }}"
                                                style="background: {{ $color['color_code'] }};"
                                                data-product="{{ $product_str }}"
                                                data-color-id="{{ $color['color_id'] }}"
                                                data-product-id="{{ $product['product_id'] }}"
                                                data-color="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                <span class="sr-only">Color name</span></a>
                                        @else
                                            <a href="javascript:void(0)" class="{{ $product_str }}"
                                                style="background: {{ $color['color_code'] }};"
                                                data-color-id="{{ $color['color_id'] }}"
                                                data-product-id="{{ $product['product_id'] }}"
                                                data-product="{{ $product_str }}" data-obj="{{ $product_str }}"
                                                data-color="{{ 'product-' . $product['product_id'] . '-' . $color['color_name'] . '-' . $product['category_name'] }}">
                                                <span class="sr-only">Color name</span>
                                            </a>
                                        @endif
                                    @endforeach
                                </div>
                            </div><!-- End .product-body -->

                            <div class="product-action">
                                <a href="javascript:void(0)" class="btn-product btn-cart" onclick="addCart(this)"
                                    data-product-id="{{ $product['product_id'] }}"
                                    data-color-id="{{ $color_id }}"><span>add to cart</span></a>
                            </div><!-- End .product-action -->
                        </div><!-- End .product -->
                    @endforeach
                </div><!-- End .owl-carousel -->
                <script>
                    const colorDots = document.querySelectorAll('.product-nav.product-nav-dots.top-sales a');
                    colorDots.forEach(dot => {
                        dot.addEventListener('click', function() {

                            const productImgs = document.querySelectorAll(`#${this.dataset.product} figure a`);

                            productImgs.forEach(img => {

                                img.classList.add('d-none');
                            });
                            console.log(this.dataset.color);

                            document.querySelector(`#${this.dataset.color}`).classList.remove('d-none');

                            const colorLinks = document.querySelectorAll(`.${this.dataset.product}`);

                            colorLinks.forEach(link => {
                                link.classList.remove('active');
                            })

                            const container = document.querySelector(`#${this.dataset.obj}`);
                            const btncart = container.querySelector('.btn-cart');
                            btncart.dataset.productId = this.dataset.productId
                            btncart.dataset.colorId = this.dataset.colorId

                            this.classList.add('active')
                        })
                    });
                </script>
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main>
    <script src="{{ asset('/js/ajax/detail.js') }}"></script>
@endsection('content')
