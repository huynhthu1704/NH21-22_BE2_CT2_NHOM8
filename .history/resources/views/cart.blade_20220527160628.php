@extends('master')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('index.html') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    @if (Session::has('cart'))
                    <div class="row">
                        <div class="col-lg-9">
                            <table class="table table-cart table-mobile">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $cart = Session::get('cart');
                                    @endphp
                                    @foreach ($cart as $item)
                                        <tr id="cart-item-{{ $item['product_id'] }}-{{ $item['color_id'] }}">
                                            <td class="product-col">
                                                <div class="product">

                                                    <figure class="product-media">
                                                        <a href="{{ route('detail', ['id' => $item['product_id']]) }}">
                                                            @php
                                                                $src = explode('#', $item['src']);
                                                            @endphp
                                                            <img src="{{ asset('images/molla/' . $item['category_name'] . '/' . $src[0]) }}"
                                                                alt="Product image">
                                                        </a>
                                                    </figure>

                                                    <h3 class="product-title">
                                                        <a href="{{ url('/product') }}">{{ $item['product_name'] }}</a>
                                                    </h3><!-- End .product-title -->
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col">
                                                {{ number_format($item['price'], 0, '', ',') }}&nbsp;VN??
                                            </td>
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control"
                                                        onchange="updateCart({{ $item['product_id'] }}, {{ $item['color_id'] }}, this.value)"
                                                        value="{{ $item['quantity'] }}" min="1" max="10" step="1"
                                                        data-decimals="0" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
                                            <td class="total-col">{{ number_format($item['price'] * $item['quantity'], 0, '', '.') }}&nbsp;VN??</td>
                                            <td class="remove-col"><button class="btn-remove"
                                                    onclick="removeViewCartItem({{ $item['product_id'] }}, {{ $item['color_id'] }})"><i
                                                        class="icon-close"></i></button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><!-- End .table table-wishlist -->

                            <div class="cart-bottom">
                                <div class="cart-discount">
                                    <form action="#">
                                        <div class="input-group">
                                            <input type="text" class="form-control" required placeholder="coupon code">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary-2" type="submit"><i
                                                        class="icon-long-arrow-right"></i></button>
                                            </div><!-- .End .input-group-append -->
                                        </div><!-- End .input-group -->
                                    </form>
                                </div><!-- End .cart-discount -->
                            </div><!-- End .cart-bottom -->
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary summary-cart">
                                <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <tbody>
                                        <tr class="summary-subtotal">
                                            <td>Total:</td>
                                            @php
                                               $cart1 = new App\Http\Controllers\CartController;
                                            dd($cart1)
                                            @endphp
                                            <td class="sub-total"> {{ number_format($cart1->totalPrice($cart), 0, '', ',')}}&nbsp;VN??</td>
                                        </tr><!-- End .summary-subtotal -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <a href="{{ url('checkout') }}"
                                    class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                            </div><!-- End .summary -->

                            <a href="{{ url('category') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                                    SHOPPING</span><i class="icon-refresh"></i></a>
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                    @else
                        Your cart is empty
                    @endif
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
    <script src="{{ asset('/js/ajax/viewCart.js') }}"></script>
@endsection('content')
