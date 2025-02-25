<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-check input {
            margin-right: 8px;
        }

        .form-check label {
            font-size: 14px;
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

        .btn-link {
            color: #2563eb;
            text-decoration: none;
            font-size: 14px;
            margin-top: 12px;
            display: block;
            text-align: center;
        }

        .btn-link:hover {
            text-decoration: underline;
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

        .admin-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .admin-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .admin-link a:hover {
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
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <img src ="{{ asset('foto/laundry.png') }}" alt="Laundry Image">
        </div>

        <div class="right-panel">
            <div class="card-header">{{ __('Login') }}</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">{{ __('Remember Me') }}</label>
                </div>

                <button type="submit" class="btn-primary">{{ __('Login') }}</button>

                @if (Route::has('password.request'))
                    <a class="btn-link" href="{{ route('password.request') }}">{{ __('Lupa Kata Sandi Anda?') }}</a>
                @endif

                <div class="register-link">
                    <span>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></span>
                </div>

                <div class="admin-link">
                    <a href="{{ url('/admin/login') }}">Login Admin</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
