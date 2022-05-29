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
                    @if (Session::has('cart'))
                    @php
                    $cart = Session::get('cart');
                @endphp
                    <form action="{{ route('placeOrder') }}" method="POST" >
                        
                        {{ csrf_field() }}
                        <input hidden type="text"  name="quantity" value="{{ App\Http\Controllers\CartController::totalQuantity($cart) }}">
                        <input hidden type="text"  name="subtotal" value="{{ App\Http\Controllers\CartController::totalSalesPrice($cart) }}">
                        <input hidden type="text"  name="shipping_fee" value="0">
                        <input hidden type="text"  name="total" value="{{ App\Http\Controllers\CartController::totalSalesPrice($cart) }}">
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
                                        <select id="city" name="ls_province" class="form-control"
                                            onchange="getShipping(this)" required></select>

                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-4">
                                        <label>Distric / County *</label>
                                        <select name="ls_district" class="form-control" required></select>
                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-4">

                                        <label>Ward / County *</label>
                                        <select name="ls_ward" class="form-control" required></select>
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
                                    placeholder="Notes about your order, e.g. special notes for delivery"
                                    name="note"></textarea>

                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                
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
                                               
                                                @foreach ($cart as $item)
                                                    <tr
                                                        id="cart-item-{{ $item['product_id'] }}-{{ $item['color_id'] }}">
                                                        <td><a
                                                                href="{{ url('/product') }}">{{ $item['product_name'] }}</a>
                                                        </td>
                                                        <td>{{ number_format($item['price'] * $item['quantity'], 0, '', '.') }}&nbsp;VNĐ
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                                <tr class="summary-subtotal">
                                                    <td>Subtotal:</td>
                                                    <td name="subtotal" data-subtotal="{{App\Http\Controllers\CartController::totalSalesPrice($cart)}}">
                                                        {{ number_format(App\Http\Controllers\CartController::totalSalesPrice($cart), 0, '', '.') . ' VNĐ' }}
                                                    </td>
                                                </tr><!-- End .summary-subtotal -->
                                                <tr>
                                                    <td>Shipping:</td>
                                                    <td name="shipping_fee"></td>
                                                </tr>
                                                <tr class="summary-total">
                                                    <td>Total:</td>
                                                    <td name="total"></td>
                                                </tr><!-- End .summary-total -->

                                            </tbody>
                                        </table><!-- End .table table-summary -->

                                        <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                            <span class="btn-text">Place Order</span>
                                            <span class="btn-hover-text">Proceed to Checkout</span>
                                        </button>
                                    </div><!-- End .summary -->
                                
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                        
                    </form>
                    @else
                                    Your cart is empty
                                @endif
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

    <script src="{{ asset('/js/ajax/vietnam.js') }}"></script>
    <script>
        var formatter = new Intl.NumberFormat('it-IT', {
            style: 'currency',
            currency: 'VND',
        });
        var localpicker = new LocalPicker({
            province: "ls_province",
            district: "ls_district",
            ward: "ls_ward"
        });

        async function getShipping(city) {
            const url = "/shipping"
            const data = {

            }
            const token = document.querySelector('meta[name=csrf-token]').content
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    "Content-type": "application/json;charset=UTF-8",
                    'X-CSRF-TOKEN': token,
                },
                body: JSON.stringify(data)
            })

            const result = await response.json();
            const shipping = document.querySelector('td[name=shipping_fee]');
            const total = document.querySelector('td[name=total]');
            const shipping1 = document.querySelector('input[name=shipping_fee]');
            const subtotal = document.querySelector('td[name=subtotal');
            const total1 = document.querySelector('input[name=total');
            
            if (city.options[city.selectedIndex].text == "Hồ Chí Minh") {

                shipping.innerHTML = formatter.format(result[0].price)
                shipping1.value = result[0].price
                total.innerHTML =formatter.format( +subtotal.dataset.subtotal + result[0].price)
                total1.value = +subtotal.dataset.subtotal + result[0].price
            }else{
                shipping.innerHTML = formatter.format(result[1].price)
                shipping1.value = result[1].price
                total.innerHTML =formatter.format( +subtotal.dataset.subtotal + result[1].price)
                total1.value = +subtotal.dataset.subtotal + result[1].price

            }

        }
        
    </script>
@endsection('content')
