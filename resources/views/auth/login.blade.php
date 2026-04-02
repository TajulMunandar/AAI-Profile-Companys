@extends('layouts.auth')

@section('title', 'Login - AAI Profile')

@section('content')
<div class="col-xl-7 col-xxl-8">
    <a href="{{ url('/') }}" class="text-nowrap logo-img d-block px-4 py-9 w-100">
        <img src="{{ asset('assets/logo website aai.png') }}" class="dark-logo" alt="Logo-Dark" width="200" />
        <img src="{{ asset('assets/logo website aai.png') }}" class="light-logo" alt="Logo-light" width="200" />
    </a>
    <div class="d-none d-xl-flex align-items-center justify-content-center h-n80">
        <img src="{{ asset('assets/images/backgrounds/login-security.svg') }}" alt="modernize-img" class="img-fluid" width="500">
    </div>
</div>
<div class="col-xl-5 col-xxl-4">
    <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
        <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
            <h2 class="mb-1 fs-7 fw-bolder">Welcome to AAI Profile</h2>
            <p class="mb-7">Admin Dashboard Login</p>

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form method="POST" action="{{ route('login.process') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" name="remember">
                        <label class="form-check-label text-dark fs-3" for="flexCheckChecked">
                            Remember this Device
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
            </form>
        </div>
    </div>
</div>
@endsection
