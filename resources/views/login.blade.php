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
                                <a class="nav-link {{ Session::has('keepRegisterForm') ? '' : 'active' }}"
                                    id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2"
                                    aria-selected="false">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Session::has('keepRegisterForm') ? 'active' : '' }}"
                                    id="register-tab-2" data-toggle="tab" href="#register-2" role="tab"
                                    aria-controls="register-2" aria-selected="true">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade {{ Session::has('keepRegisterForm') ? '' : 'show active' }}"
                                id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                <form action="{{ Route('auth.login.action') }}" method="POST">

                                    @if ($message = Session::get('message'))
                                        <div class="alert alert-success mb-2" role="alert"
                                            style="background: #00800028; border: 1px solid #179b17; color:#179b17;">
                                            {{ $message }}
                                        </div>
                                    @endif

                                    @error('loginfail')
                                        <div class="alert alert-success mb-2" role="alert"
                                            style="background: #80000028; border: 1px solid #f10909e0; color:#f10909e0;">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    @csrf
                                    <div class="form-group">
                                        <label for="username-2">Username *</label>
                                        <input type="text" class="form-control" id="username-2" name="username"
                                            value="{{ old('username') }}" required>
                                        @error('username')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password-2">Password *</label>
                                        <input type="password" class="form-control" id="singin-password-2"
                                            value="{{ old('password') }}" name="password" required>
                                        @error('password')
                                            <div style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                            <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                                        </div><!-- End .custom-checkbox -->

                                        <a href="{{route('verify.form')}}" class="forgot-link">Forgot Your Password?</a>
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="{{ route('google-login') }}" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Login With Google
                                            </a>
                                        </div><!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="{{route('facebook-login')}}" class="btn btn-login btn-f">
                                                <i class="icon-facebook-f"></i>
                                                Login With Facebook
                                            </a>
                                        </div><!-- End .col-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .form-choice -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade {{ Session::has('keepRegisterForm') ? 'show active' : '' }}"
                                id="register-2" role="tabpanel" aria-labelledby="register-tab-2">

                                <form action="{{ Route('auth.register.action') }}" method="POST" id="register-login">
                                    <div class="form-group">
                                        <label for="register-username">Username *</label>
                                        <input type="text" class="form-control" id="register-username"
                                            name="register-username" value="{{ old('register-username') }}" required>
                                        @error('register-username')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    @csrf

                                    <div class="form-group">
                                        <label for="register-password">Password *</label>
                                        <input type="password" class="form-control" id="register-password"
                                            value="{{ old('register-password') }}" name="register-password" required>
                                        @error('register-password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-birthday">Birthday *</label>
                                        <input type="date" class="form-control" id="register-birthday"
                                            name="register-birthday" value="{{ old('register-birthday', date('Y-m-d')) }}"
                                            required>
                                        @error('register-birthday')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-email">Email *</label>
                                        <input type="email" class="form-control" id="register-email" name="register-email"
                                            value="{{ old('register-email') }}" required>
                                        @error('register-email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-fullname">Full name *</label>
                                        <input type="text" class="form-control" id="register-fullname"
                                            name="register-fullname" value="{{ old('register-fullname') }}" required>
                                        @error('register-fullname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-phone">Phone *</label>
                                        <input type="text" class="form-control" id="register-phone" name="register-phone"
                                            value="{{ old('register-phone') }}" required>
                                        @error('register-phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- End .form-group -->
                                    <div class="row">
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
                                    <div class="form-group">
                                        <label for="register-address">Address *</label>
                                        <input type="text" class="form-control" id="register-address"
                                            name="register-address" value="{{ old('register-address') }}" required>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="register-gender">Gender *</label>
                                        <select type="text" class="form-control" id="register-gender"
                                            name="register-gender" required>
                                            <option value="Nam" {{ old('register-gender') == 'Nam' ? 'selected' : '' }}>Nam
                                            </option>
                                            <option value="Nu" {{ old('register-gender') == 'Nu' ? 'selected' : '' }}>Nữ</option>
                                            <option value="Khac" {{ old('register-gender') == 'Khac' ? 'selected' : '' }}>Khác
                                            </option>
                                        </select>
                                        @error('register-gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy1"
                                                required>
                                            <label class="custom-control-label" for="register-policy1">I agree to the <a
                                                    href="#">privacy policy</a> *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="{{ route('google-login') }}" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Login With Google
                                            </a>
                                        </div><!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="facebook-login" class="btn btn-login  btn-f">
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
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->
@endsection('content')
