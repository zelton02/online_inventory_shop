@extends('layouts.app')

@section('content')

<style>
    /* Center the card vertically */
    .card {
        margin-top: 50px; /* Adjust margin for top spacing */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
    }

    /* Style the card header */
    .card-header {
        background-color: #007bff; /* Primary color for header */
        color: #fff; /* Text color for header */
        text-align: center; /* Center align text */
        padding: 20px; /* Add padding to the header */
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .form-check {
        margin-bottom: 20px; /* Add margin to the form check */
    }

    /* Form styling */
    .card-body {
        padding: 30px; /* Add padding to the card body */
    }

    /* Style form labels */
    .col-form-label {
        font-weight: bold; /* Make labels bold */
    }

    /* Style form inputs */
    .form-control {
        border: 1px solid #ccc; /* Add a border to form inputs */
        border-radius: 4px; /* Add border radius for rounded corners */
        padding: 10px; /* Add padding inside input fields */
        margin-bottom: 12px; /* Add margin bottom for spacing */
    }

    /* Style form button */
    .btn-primary {
        background-color: #007bff; /* Primary color for buttons */
        border-color: #007bff; /* Border color for buttons */
        padding: 12px 20px; /* Add padding to button */
        width: 100%; /* Full width button */
        font-weight: bold;
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darken background color on hover */
        border-color: #0056b3; /* Darken border color on hover */
    }

    /* Additional styles for links */
    .btn-link {
        color: #007bff; /* Link color */
        text-decoration: none; /* Remove underline */
    }

    .btn-link:hover {
        text-decoration: underline; /* Underline on hover */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($url) ? ucwords($url) : "Login" }}</h4>
                </div>
                <div class="card-body">
                    @isset($url)
                    <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                    @else
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @endisset
                        @csrf
                        <div class="form-group">
                            <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link mt-3 d-block text-center" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
