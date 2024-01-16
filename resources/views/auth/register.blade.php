<!-- resources/views/auth/register.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="register-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="nama">{{ __('Nama') }}</label>
            <input id="nama" type="text" name="nama" value="{{ old('nama') }}" required autofocus>

            <label for="alamat">{{ __('Alamat') }}</label>
            <input id="alamat" type="text" name="alamat" value="{{ old('alamat') }}" required>

            <label for="nomor_telepon">{{ __('Nomor Telepon') }}</label>
            <input id="nomor_telepon" type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}" required>

            <label for="nomor_sim">{{ __('Nomor SIM') }}</label>
            <input id="nomor_sim" type="text" name="nomor_sim" value="{{ old('nomor_sim') }}" required>

            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>

            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required>

            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>

            <button type="submit">
                {{ __('Register') }}
            </button>
        </form>
    </div>
@endsection
