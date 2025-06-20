@extends('layouts.app')

@section('title', 'Forgot Password - eStore')

@section('body-class', ' Forgot Password - page')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Forgot Password</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Login</li>
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
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <!-- Login Form -->
                            <div class="tab-pane fade show active }}" id="login-register-login-form" role="tabpanel">
                                <form method="POST" action="{{route('forgot-password.process')}}">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="login-register-login-email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="login-register-login-email"
                                            name="email">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg">Get Otp</button>
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
