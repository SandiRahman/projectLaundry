<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3a8a, #2563eb, #60a5fa);
            color: white;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            text-align: center;
            padding: 50px 0;
        }

        header h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        header p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: white;
            color: #2563eb;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #dbeafe;
        }

        .features {
            display: flex;
            justify-content: space-between;
            margin: 50px 0;
        }

        .feature {
            flex: 1;
            text-align: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            margin: 0 10px;
        }

        .feature h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .feature p {
            font-size: 1rem;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background: rgba(0, 0, 0, 0.2);
            margin-top: 50px;
        }

        footer p {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Selamat Datang di Laundry</h1>
            <p>Layanan laundry terbaik dengan harga terjangkau dan hasil maksimal.</p>
            <a href="{{ route('login') }}" class="btn">Login</a>
            <a href="{{ route('register') }}" class="btn">Daftar</a>
        </header>

        <section class="features">
            <div class="feature">
                <h2>Cepat</h2>
                <p>Proses laundry cepat dan tepat waktu.</p>
            </div>
            <div class="feature">
                <h2>Bersih</h2>
                <p>Hasil laundry bersih dan wangi.</p>
            </div>
            <div class="feature">
                <h2>Terjangkau</h2>
                <p>Harga terjangkau untuk semua kalangan.</p>
            </div>
        </section>

        <footer>
            <p>&copy; 2023 Laundry Pro. Semua hak dilindungi.</p>
        </footer>
    </div>
</body>
</html>