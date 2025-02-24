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

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #1e3a8a, #2563eb, #60a5fa);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
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
        background: linear-gradient(135deg, #0044ff, #0066ff);
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

    .card-header {
        font-size: 30px;
        font-weight: bold;
        color: #1e40af;
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

    .form-control:focus {
        border-color: #2563eb;
        outline: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #2563eb, #1e40af);
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
        background: linear-gradient(135deg, #1e40af, #2563eb);
    }

    .register-link {
        margin-top: 20px;
        font-size: 14px;
        text-align: center;
    }

    .register-link a {
        color: #1e40af;
        text-decoration: none;
        font-weight: bold;
    }

    .register-link a:hover {
        text-decoration: underline;
    }
</style>
@endsection