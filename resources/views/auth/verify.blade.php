@extends('layouts.app')

@section('content')
<div class="container">
    <div class="left-panel">
        <img src ="{{ asset('foto/laundry.png') }}" alt="Laundry Image">
    </div>
    <div class="right-panel">
        <div class="card-header">{{ __('Register Pelanggan') }}</div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama" value="{{ old('nama') }}" required autofocus>
                @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat" required>{{ old('alamat') }}</textarea>
                @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="tlp" type="text" class="form-control @error('tlp') is-invalid @enderror" name="tlp" placeholder="Telepon" value="{{ old('tlp') }}" required>
                @error('tlp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn-primary">{{ __('Register') }}</button>

            <div class="register-link">
                <span>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></span>
            </div>
        </form>
    </div>
</div>

<div class="container verify-container">
    <div class="card">
        <div class="card-header">{{ __('Verify Your Email Address') }}</div>
        <div class="card-body">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>
</div>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #7B61FF, #A385FF);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        flex-direction: column;
    }

    .container {
        width: 100%;
        max-width: 1100px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        display: flex;
        overflow: hidden;
    }

    .left-panel {
        width: 45%;
        background: linear-gradient(135deg, #7B61FF, #A385FF);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .left-panel img {
        width: 100%;
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .right-panel {
        width: 55%;
        padding: 50px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .verify-container {
        max-width: 600px;
        margin-top: 30px;
    }

    .card-header {
        font-size: 30px;
        font-weight: bold;
        color: #6A4ACB;
        text-align: center;
        margin-bottom: 35px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        padding: 14px;
        border: 1px solid #ccc;
        border-radius: 10px;
        font-size: 16px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #7B61FF, #6A4ACB);
        color: white;
        border: none;
        padding: 14px;
        width: 100%;
        font-size: 16px;
        font-weight: bold;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #6A4ACB, #7B61FF);
    }
</style>
@endsection