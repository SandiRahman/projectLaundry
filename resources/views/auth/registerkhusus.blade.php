@extends('layouts.app')

@section('content')
<div class="container">
    <div class="left-panel">
        <img src ="{{ asset('foto/laundry.png') }}" alt="Laundry Image">
    </div>

    <div class="right-panel">
        <div class="card-header">Register</div>
        <div class="card-body">
            <form method="POST" action="{{ route('registerkhusus') }}">
                @csrf

                {{-- Outlet --}}
                <div class="form-group">
                    <select id="id_outlet" class="form-control @error('id_outlet') is-invalid @enderror" name="id_outlet" required>
                        <option value="">Pilih Outlet</option>
                        @foreach ($outlet as $outlet)
                            <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_outlet')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Nama --}}
                <div class="form-group">
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required placeholder="Nama" autofocus>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Username --}}
                <div class="form-group">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required placeholder="Username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Konfirmasi Password">
                </div>

                {{-- Role --}}
                <div class="form-group">
                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                        <option value="owner">Owner</option>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Tombol Register --}}
                <button type="submit" class="btn-primary">Register</button>
                <div class="register-link">
                    <span>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></span>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

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

    .form-control:focus {
        border-color: #7B61FF;
        outline: none;
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

    .register-link {
        margin-top: 20px;
        font-size: 14px;
        text-align: center;
    }

    .register-link a {
        color: #6A4ACB;
        text-decoration: none;
        font-weight: bold;
    }

    .register-link a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .left-panel, .right-panel {
            width: 100%;
            padding: 30px 20px;
        }
    }
</style>
