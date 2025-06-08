@extends('layouts.app')

@section('content')<style>
    :root {
        --primary-color: #8B0000;
        --secondary-color: #4A0404;
        --accent-color: #D61212;
        --text-color: #333;
        --light-bg: #f8f9fc;
    }

    body {
        color: var(--text-color);
    }

    .card {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        border: none;
        border-radius: 0.75rem;
        background: #fff;
    }

    .card-header {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        color: white !important;
        border-radius: 0.75rem 0.75rem 0 0 !important;
        padding: 1.25rem 1.5rem;
    }

    .form-label {
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .form-control {
        border-radius: 0.5rem;
        border: 1px solid #d1d3e2;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(139, 0, 0, 0.25);
    }

    .table {
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .table thead th {
        background-color: var(--light-bg);
        border-bottom: 2px solid #e3e6f0;
        color: var(--primary-color);
        font-weight: 600;
    }

    .table tbody tr:hover {
        background-color: var(--light-bg);
    }

    .btn-primary {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        border: none;
        border-radius: 0.5rem;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
    }

    .navbar {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color)) !important;
    }

    .sidebar {
        background: #fff;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .nav-link {
        color: var(--text-color) !important;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: var(--primary-color) !important;
        background-color: var(--light-bg);
    }

    .nav-link.active {
        color: var(--primary-color) !important;
        font-weight: 600;
    }

    .sidebar-heading {
        color: var(--primary-color);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* Additional elegant styles */
    .toast {
        border-radius: 0.5rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .alert {
        border-radius: 0.5rem;
        border: none;
    }

    .select2-container--default .select2-selection--single {
        border-radius: 0.5rem;
        border: 1px solid #d1d3e2;
        height: calc(2.25rem + 2px);
    }

    .btn-info {
        background: linear-gradient(90deg, #36d1dc 0%, #5b86e5 100%);
        border: none;
        color: #fff;
        font-weight: 500;
        box-shadow: 0 2px 4px rgba(91, 134, 229, 0.3);
        transition: all 0.2s ease;
    }

    .btn-info:hover {
        background: linear-gradient(90deg, #5b86e5 0%, #36d1dc 100%);
        color: #fff;
        box-shadow: 0 4px 8px rgba(91, 134, 229, 0.4);
    }

    .btn-info:active,
    .btn-info:focus {
        background: linear-gradient(90deg, #5b86e5 0%, #36d1dc 100%);
        color: #fff;
        box-shadow: 0 2px 4px rgba(91, 134, 229, 0.3);
    }

    .btn-secondary {
        background: linear-gradient(90deg, #6c757d 0%, #495057 100%);
        border: none;
        color: #fff;
        font-weight: 500;
        box-shadow: 0 2px 4px rgba(108, 117, 125, 0.3);
        transition: all 0.2s ease;
    }

    .btn-secondary:hover {
        background: linear-gradient(90deg, #495057 0%, #6c757d 100%);
        color: #fff;
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.4);
    }

    .btn-secondary:active,
    .btn-secondary:focus {
        background: linear-gradient(90deg, #495057 0%, #6c757d 100%);
        color: #fff;
        box-shadow: 0 2px 4px rgba(108, 117, 125, 0.3);
    }
</style>
<div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-5">
            <div class="card login-card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary px-4 py-2">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-secondary ms-2 px-4 py-2">
                                    {{ __('Register') }}
                                </a>
                                @endif

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection