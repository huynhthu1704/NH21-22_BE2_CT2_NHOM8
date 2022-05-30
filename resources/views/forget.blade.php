@extends('master')
@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
            style="background-image: url({{ asset('images/backgrounds/login-bg.jpg') }})">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab"
                                    aria-controls="signin-2" aria-selected="false">Forget password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="signin-1" role="tabpanel" aria-labelledby="signin-tab-2">
                                @if (Session::has('message'))
                                    <div class="alert alert-success mb-2" role="alert"
                                        style="background: #00800028; border: 1px solid #179b17; color:#179b17;">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                @error('email')
                                    <div class="alert alert-success mb-2" role="alert"
                                        style="background: #80000028; border: 1px solid #f10909e0; color:#f10909e0;">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <form action="{{ Route('set.reset-session') }}" method="Post">
                                
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email') }}" required>

                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>Submit</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->
@endsection('content')
