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

        .btn-link {
            color: #7B61FF;
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
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <img src ="{{ asset('foto/laundry.png') }}" alt="Laundry Image">
        </div>

        <div class="right-panel">
            <div class="card-header">Login</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input id="username" type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn-primary">Login</button>
                <div class="register-link">
                    <span>Belum punya akun? <a href="{{ route('registerkhusus') }}">Daftar di sini</a></span>
                </div>
            </form>
        </div>
    </div>
</body>
</html>