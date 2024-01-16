<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="login-container">
        <div class="login-form">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required>
                </div>

                <button type="submit" class="btn-login">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>
@endsection

