<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #dbeafe, #bfdbfe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }
        .header-title {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #1e40af;
        }
        .button-group {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
        }
        .button-group a {
            margin: 0 5px;
            padding: 10px 20px;
            background-color: #3b82f6;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .button-group a:hover {
            background-color: #2563eb;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }
        h1 {
            color: #1e40af;
        }
        a {
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            color: #3b82f6;
        }
        a:hover {
            text-decoration: underline;
        }
        .info {
            margin-top: 20px;
            background-color: #f0f9ff;
            padding: 15px;
            border-radius: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <span class="header-title">Dashboard Laundry</span>
    <div class="button-group">
        <a href="{{ route('register') }}">Sign Up</a>
        <a href="{{ route('login') }}">Sign In</a>
    </div>
    <div class="container">
        <h1>Selamat Datang di Dashboard</h1>
        <div class="info">
            <h2>Laundry</h2>
            <p>Laundry adalah layanan pencucian pakaian yang biasanya dilakukan oleh pihak ketiga. Layanan ini membantu orang yang tidak memiliki waktu atau fasilitas untuk mencuci pakaian mereka sendiri. Proses laundry umumnya mencakup beberapa tahap, seperti pemilahan pakaian berdasarkan jenis dan warna, pencucian dengan deterjen yang sesuai, pembilasan, pengeringan, penyetrikaan, dan pengemasan sebelum diserahkan kembali kepada pelanggan.</p>
            <p>Dengan adanya layanan ini, pelanggan dapat menghemat waktu dan tenaga dalam merawat pakaian mereka. Laundry sangat bermanfaat terutama bagi masyarakat perkotaan yang memiliki aktivitas padat atau tidak memiliki akses ke peralatan mencuci yang memadai.</p>
        </div>
        <br>
        <a href="{{ route('login') }}">Logout</a>
    </div>
</body>
</html>
