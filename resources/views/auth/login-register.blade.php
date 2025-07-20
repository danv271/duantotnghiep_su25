@extends('layouts.app')

@section('title', 'Login Register - eStore')

@section('body-class', 'login-register-page')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Đăng nhập </h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Trang chủ </a></li>
                    <li class="current">Đăng nhập </li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Login Register Section -->
       @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
       
       @endif
    <section id="login-register" class="login-register section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="login-register-wraper">
                        <!-- Tab Navigation -->
                        <ul class="nav nav-tabs nav-tabs-bordered justify-content-center mb-4" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                                    data-bs-toggle="tab" data-bs-target="#login-register-login-form" type="button"
                                    role="tab" aria-selected="true">
                                    <i class="bi bi-box-arrow-in-right me-1"></i>Đăng nhập 
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}"
                                    data-bs-toggle="tab" data-bs-target="#login-register-registration-form" type="button"
                                    role="tab" aria-selected="false">
                                    <i class="bi bi-person-plus me-1"></i>Đăng ký
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content">
                            <!-- Login Form -->
                            <div class="tab-pane fade {{ request()->routeIs('login') ? 'show active' : '' }}"
                                id="login-register-login-form" role="tabpanel">
                                <form method="POST" action="{{ route('login.process') }}">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="login-register-login-email" class="form-label">Email </label>
                                        <input type="email" class="form-control" id="login-register-login-email"
                                            name="email">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="login-register-login-password" class="form-label">Mật Khẩu </label>
                                        <input type="password" class="form-control" id="login-register-login-password"
                                            name="password">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                             @error('error')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="login-register-remember-me"
                                                name="remember">
                                            <label class="form-check-label" for="login-register-remember-me">Nhớ tôi
                                                </label>
                                        </div>
                                        <a href="{{route('forgot-password')}}" class="forgot-password">Quên mật khẩu ?</a>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg">Đăng Nhập </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Registration Form -->
                            <div class="tab-pane fade {{ request()->routeIs('register') ? 'show active' : '' }}"
                                id="login-register-registration-form" role="tabpanel">
                                <form method="POST" action="{{ route('register.process') }}">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="login-register-reg-firstname" class="form-label">Họ 
                                                    </label>
                                                <input type="text" class="form-control" id="login-register-reg-firstname"
                                                    name="first_name">
                                            </div>
                                            @error('first_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-4">
                                                <label for="login-register-reg-lastname" class="form-label">Tên
                                                    </label>
                                                <input type="text" class="form-control" id="login-register-reg-lastname"
                                                    name="last_name">
                                                @error('last_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label for="login-register-reg-email" class="form-label">Email
                                                    </label>
                                                <input type="email" class="form-control" id="login-register-reg-email"
                                                    name="email">
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label for="login-register-reg-password"
                                                    class="form-label">Mật Khẩu </label>
                                                <input type="password" class="form-control"
                                                    id="login-register-reg-password" name="password">
                                            </div>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label for="login-register-reg-confirm-password"
                                                    class="form-label">Nhập lại mật khẩu </label>
                                                <input type="password" class="form-control"
                                                    id="login-register-reg-confirm-password" name="password_confirmation">
                                                @error('password')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="login-register-terms"
                                                    name="terms">
                                                <label class="form-check-label" for="login-register-terms">
                                                   Tôi đồng ý <a href="#">Điều khoản dịch vụ </a> và <a
                                                        href="#">Chính sách bảo mật </a>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-lg">Tạo tài khoản 
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Login Register Section -->
@endsection
