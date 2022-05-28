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
                                    <p>Hello <span class="font-weight-normal text-dark">{{ $user->full_name }}</span> (not
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
                                    <p>No order has been made yet.</p>
                                    <a href="{{ route('category') }}" class="btn btn-outline-primary-2"><span>GO
                                            SHOP</span><i class="icon-long-arrow-right"></i></a>

                                    <div class="accordion accordion-plus" id="accordion-2">

                                        <div class="card">
                                            <div class="card-header" id="heading2-1">
                                                <h2 class="card-title">
                                                    <a role="button" data-toggle="collapse" href="#collapse2-1"
                                                        aria-expanded="true" aria-controls="collapse2-1">
                                                        Cras ornare tristique elit.
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse2-1" class="collapse show" aria-labelledby="heading2-1"
                                                data-parent="#accordion-2">
                                                <div class="card-body">
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.
                                                    Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
                                                    Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
                                                    Donec nec justo eget felis facilisis fermentum.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading2-2">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse2-2" aria-expanded="false"
                                                        aria-controls="collapse2-2">
                                                        Vivamus vestibulum ntulla
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse2-2" class="collapse" aria-labelledby="heading2-2"
                                                data-parent="#accordion-2">
                                                <div class="card-body">
                                                    Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque
                                                    volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna
                                                    nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo
                                                    eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer
                                                    adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading2-3">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse2-3" aria-expanded="false"
                                                        aria-controls="collapse2-3">
                                                        Praesent placerat risus
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse2-3" class="collapse" aria-labelledby="heading2-3"
                                                data-parent="#accordion-2">
                                                <div class="card-body">
                                                    Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non,
                                                    semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis
                                                    fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                                    Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit amet,
                                                    consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                    </div><!-- End .accordion -->
                                </div><!-- .End .tab-pane -->



                                <div class="tab-pane fade" id="tab-address" role="tabpanel"
                                    aria-labelledby="tab-address-link">
                                    <p>The following addresses will be used on the checkout page by default.</p>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Billing Address</h3><!-- End .card-title -->
                                                    <p>{{ $user->full_name }}<br>
                                                        {{ $user->email }}<br>
                                                        <a href="#">Edit <i class="icon-edit"></i></a>
                                                    </p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->

                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

                                                    <p>You have not set up this type of address yet.<br>
                                                        <a href="#">Edit <i class="icon-edit"></i></a>
                                                    </p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-account" role="tabpanel"
                                    aria-labelledby="tab-account-link">
                                    <form action="#">


                                        <label>Full Name *</label>
                                        <input type="text" class="form-control" name="fullname" required
                                            value="{{ $user->full_name }}">
                                        <small class="form-text">This will be how your name will be displayed in the
                                            account section and in reviews</small>

                                        <label>Birthday *</label>
                                        <input type="date" class="form-control" name="birthday" required
                                            value="{{ $user->birthday }}">

                                        <label>Email address *</label>
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                            required>
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
      
    </main><!-- End .main -->
 
@endsection
