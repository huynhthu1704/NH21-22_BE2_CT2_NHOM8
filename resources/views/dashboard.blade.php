@extends('master')
@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">My Account<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-4 col-lg-3">
                            <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab"
                                        href="#tab-dashboard" role="tab" aria-controls="tab-dashboard"
                                        aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders"
                                        role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address"
                                        role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account"
                                        role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('auth.logout.action') }}">Sign Out</a>
                                </li>
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel"
                                    aria-labelledby="tab-dashboard-link">
                                    <p>Hello <span class="font-weight-normal text-dark">{{ $user->fullname }}</span> (not
                                        <span class="font-weight-normal text-dark">your account</span>? <a
                                            href="{{ route('auth.logout.action') }}">Log out</a>)
                                        <br>
                                        From your account dashboard you can view your <a href="#tab-orders"
                                            class="tab-trigger-link link-underline">recent orders</a>, manage your <a
                                            href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>,
                                        and <a href="#tab-account" class="tab-trigger-link">edit your password and account
                                            details</a>.
                                    </p>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-orders" role="tabpanel"
                                    aria-labelledby="tab-orders-link">
                                    @php
                                        // dd($orders);
                                    @endphp
                                    @if (count($orders) == 0)
                                        <p>No order has been made yet.</p>
                                        <a href="{{ route('category') }}" class="btn btn-outline-primary-2"><span>GO
                                                SHOP</span><i class="icon-long-arrow-right"></i></a>
                                    @else
                                        @foreach ($orders as $key => $order)
                                            <div class="accordion accordion-plus" id="accordion-2">
                                                <div class="card">
                                                    <div class="card-header" id="heading2-1">
                                                        <h2 class="card-title">
                                                            <a role="button" data-toggle="collapse"
                                                                href="#collapse2-{{ $key }}" aria-expanded="true"
                                                                aria-controls="collapse2-{{ $key }}">
                                                                #Order {{ $order->id }} <span
                                                                    class="status float-right">#Delivery status:
                                                                    {{ $order->status }}</span>
                                                            </a>
                                                        </h2>
                                                    </div><!-- End .card-header -->
                                                    <div id="collapse2-1" class="collapse show"
                                                        aria-labelledby="heading2-1" data-parent="#accordion-2">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-2" style="  height: 100px;
                                                                    line-height: 100px;
                                                                    text-align: center;
                                                                    border: 2px dashed #f69c55;"><b>Image</b></div>
                                                                <div class="col-5" style="  height: 100px;
                                                                    line-height: 100px;
                                                                    text-align: center;
                                                                    border: 2px dashed #f69c55;"><b>Item name</b></div>
                                                                <div class="col-1 text-end" style="  height: 100px;
                                                                    line-height: 100px;
                                                                    text-align: center;
                                                                    border: 2px dashed #f69c55;"><b>Qty</b></div>
                                                                <div class="col-2 text-end" style="  height: 100px;
                                                                    line-height: 100px;
                                                                    text-align: center;
                                                                    border: 2px dashed #f69c55;"><b>Price</b></div>
                                                                <div class="col-2 text-end" style="  height: 100px;
                                                                    line-height: 100px;
                                                                    text-align: center;
                                                                    border: 2px dashed #f69c55;"><b><i class="icon-star-o"></i></b></div>
                                                            </div>
                                                            @foreach ($order->orderItem as $item)
                                                                <div class="row">
                                                                    <div class="col-2" style="  height: 100px;
                                                                        line-height: 100px;
                                                                        text-align: center;
                                                                        border: 2px dashed #f69c55;"><img
                                                                            src="{{ asset('images/molla/' . $item->category_name . '/' . $item->image_src) }}"
                                                                            class="product-image" alt=""></div>
                                                                    <div class="col-5" style="  height: 100px;
          line-height: 100px;
          text-align: center;
          border: 2px dashed #f69c55;">{{ $item->product_name }}
                                                                    </div>
                                                                    <div class="col-1" style="  height: 100px;
          line-height: 100px;
          text-align: center;
          border: 2px dashed #f69c55;">{{ $item->quantity }}
                                                                    </div>
                                                                    <div class="col-2" style="  height: 100px;
          line-height: 100px;
          text-align: center;
          border: 2px dashed #f69c55;">
                                                                        {{ number_format($item->discount_price, 0, '', ',') }}&nbsp;VNĐ
                                                                    </div>
                                                                    <div class="col-2" style="  height: 100px;
                                                                        line-height: 100px;
                                                                        text-align: center;
                                                                        border: 2px dashed #f69c55;">
                                                                        @if (!$item->isReviewed)
                                                                            <a href="#signin-modal" data-toggle="modal"
                                                                                class="btn btn-link btn-link-dark  border-0"
                                                                                onclick="setReview({{ $item->product_id }}, {{ $item->id }}, '{{$item->product_name}}', this)">
                                                                                <span>Review</span>
                                                                                <i class="icon-long-arrow-right"></i></a>
                                                                        @else
                                                                            <a href="javascript:void(0)"
                                                                                class="btn btn-link btn-link-dark border-0">
                                                                                <span>Reviewed</span></a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        </div><!-- End .card-body -->
                                                    </div><!-- End .collapse -->
                                                    <div class="card-footer">
                                                        <div class="py-3 float-right h6">Total:
                                                            {{ number_format($order->total, 0, '', ',') }}&nbsp;VNĐ
                                                        </div>
                                                    </div>
                                                </div><!-- End .card -->
                                            </div><!-- End .accordion -->
                                        @endforeach
                                    @endif


                                </div><!-- .End .tab-pane -->



                                <div class="tab-pane fade" id="tab-address" role="tabpanel"
                                    aria-labelledby="tab-address-link">
                                    <p>The following addresses will be used on the checkout page by default.</p>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Shipping Address</h3><!-- End .card-title -->
                                                    <p>
                                                        Name: {{ $user->fullname }}<br>
                                                        Gender: {{ $user->gender }}<br>
                                                        Birthday: {{ $user->birthday }}<br>
                                                        Email: {{ $user->email }}<br>
                                                        Phone: {{ $user->phone }}<br>
                                                        Address: {{ $user->address }} {{ $user->district }}
                                                        {{ $user->city }} {{ $user->ward }}<br>
                                                        <a href="javascript:void(0)" onclick="openEditUser()">Edit <i
                                                                class="icon-edit"></i></a>
                                                    </p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->

                                    </div><!-- End .row -->
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-account" role="tabpanel"
                                    aria-labelledby="tab-account-link">
                                    <form id="set-profile">
                                        @method('post')
                                        @csrf
                                        <label>Full Name *</label>
                                        <input type="text" class="form-control" name="fullname" required
                                            value="{{ $user->fullname }}">

                                        <small class="form-text">This will be how your name will be displayed in the
                                            account section and in reviews</small>

                                        <label>Birthday *</label>
                                        <input type="date" class="form-control" name="birthday" required
                                            value="{{ $user->birthday }}">

                                        <label>Email address *</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $user->email }}" required>

                                        <label>Phone *</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}"
                                            required>


                                        <label>Gender *</label>
                                        <select type="text" class="form-control" name="gender"
                                            value="{{ $user->address }}" required>
                                            <option value="Nam" {{ $user->gender == 'Nam' ? 'selected' : '' }}>Nam
                                            </option>
                                            <option value="Nữ" {{ $user->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                            <option value="Nam" {{ $user->gender == 'Khác' ? 'selected' : '' }}>Khác
                                            </option>
                                        </select>
                                        <div class="row" class="address-container">
                                            <div class="col-sm-4">
                                                <label>Province / City *</label>
                                                <select name="register-city" class="form-control register-city"
                                                    required></select>

                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-4">
                                                <label>Distric / County *</label>
                                                <select name="register-district" class="form-control register-district"
                                                    required></select>
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-4">

                                                <label>Ward / County *</label>
                                                <select name="register-ward" class="form-control register-ward"
                                                    required></select>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->
                                        <label>Address *</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $user->address }}" required>

                                        @if ($user->provider == 'normal')
                                            <label>Current password (leave blank to leave unchanged)</label>
                                            <input type="password" class="form-control" name="password">

                                            <label>New password (leave blank to leave unchanged</label>
                                            <input type="password" class="form-control" name="new-password">

                                            <label>Confirm new password</label>
                                            <input type="password" class="form-control mb-2" name="confirm-password">
                                        @endif

                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SAVE CHANGES</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
        <div class="alert alert-success alert-dismissible fade " data-dismiss="alert" id="edit-profile-alert"
            style="position: fixed; right: 10px; bottom: 10px; padding-right: 50px; z-index: 999" role="alert">
            Edit profile success
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </main><!-- End .main -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .rate {

            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        /* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */

    </style>
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <form class="form-box rating">
                        <h3 class="title"></h3>
                        <input type="text" name="product_id" hidden>
                        <input type="text" name="order_item_id" hidden>
                        <div class="d-flex">

                            <div class="rate float-left mb-3">
                                <input type="radio" id="star5" name="rating_value" value="5">
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rating_value" value="4">
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rating_value" value="3">
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rating_value" value="2">
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rating_value" value="1">
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>

                        <textarea class="form-control" cols="30" rows="4" placeholder="Comments ..." name="content"></textarea>
                        <button type="submit" class="btn btn-outline-primary-2 float-right">
                            <span>Submit</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>
                    </form><!-- End .form-box -->


                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
    <script src="{{ asset('js/ajax/dashboard.js') }}"></script>

@endsection
