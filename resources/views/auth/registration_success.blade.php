@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registration Successful') }}</div>

                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ __('Your registration was successful! You can now ') }}
                        <a href="{{ route('login') }}">{{ __('log in') }}</a>
                        {{ __(' with your credentials.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
