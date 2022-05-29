@extends('master')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Checkout<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="checkout-discount">
                        <form action="#">
                            <input type="text" class="form-control" required id="checkout-discount-input">
                            <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to
                                    enter your code</span></label>
                        </form>
                    </div><!-- End .checkout-discount -->
                    <form action="{{route('placeOrder')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" required name="fname">
                                    </div><!-- End .col-sm-6 -->


                                </div><!-- End .row -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" required name="lname">
                                    </div><!-- End .col-sm-6 -->
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Province / City *</label>
                                        <select name="ls_province" class="form-control"  required ></select>

                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-4">
                                        <label>Distric / County *</label>
                                        <select  name="ls_district" class="form-control" required ></select>
                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-4">

                                        <label>Ward / County *</label>
                                        <select name="ls_ward" class="form-control"  required ></select>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Email address *</label>
                                        <input type="text" class="form-control" required name="email">
                                    </div><!-- End .col-sm-6 -->


                                </div><!-- End .row -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Phone *</label>
                                        <input type="tel" class="form-control" required name="phone">
                                    </div><!-- End .col-sm-6 -->
                                </div>
                                <label>Order notes (optional)</label>
                                <textarea class="form-control" cols="30" rows="4"
                                    placeholder="Notes about your order, e.g. special notes for delivery" name="note"></textarea>

                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                @if (Session::has('cart'))
                                    <div class="summary">
                                        <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                        <table class="table table-summary">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>

                                            <tbody>
												@php
                                                	$cart = Session::get('cart');
                                                @endphp
                                                @foreach ($cart as $item)
                                                <tr id="cart-item-{{ $item['product_id'] }}-{{ $item['color_id'] }}">
                                                    <td><a
														href="{{ url('/product') }}">{{ $item['product_name'] }}</a>
                                                    </td>
                                                    <td>{{ number_format($item['price'], 0, '', ',') }}&nbsp;VNĐ</td>
                                                </tr>
												@endforeach
                                                <tr class="summary-subtotal">
                                                    <td>Subtotal:</td>
                                                    <td>$160.00</td>
                                                </tr><!-- End .summary-subtotal -->
                                                <tr>
                                                    <td>Shipping:</td>
                                                    <td>Free shipping</td>
                                                </tr>
                                                <tr class="summary-total">
                                                    <td>Total:</td>
                                                    <td>$160.00</td>
                                                </tr><!-- End .summary-total -->
												
                                            </tbody>
                                        </table><!-- End .table table-summary -->

                                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                            <span class="btn-text">Place Order</span>
                                            <span class="btn-hover-text">Proceed to Checkout</span>
                                        </button>
                                    </div><!-- End .summary -->
                                @else
                                    Your cart is empty
                                @endif
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

    <script src="{{ asset('/js/ajax/vietnam.js') }}"></script>
    <script>
        var localpicker = new LocalPicker({
            province: "ls_province",
            district: "ls_district",
            ward: "ls_ward"
        });
    </script>
@endsection('content')
