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
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Section */
        .navbar {
            background-color: #468dff;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .header-title {
            font-size: 24px;
            font-weight: bold;
        }

        .navbar .button-group a {
            margin-left: 10px;
            padding: 8px 16px;
            background-color: white;
            color: #2563eb;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar .button-group a:hover {
            background-color: #dbeafe;
        }

        /* Container Section */
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            margin: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            flex-grow: 1;
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

        .info p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <span class="header-title">Dashboard Laundry</span>
        <div class="button-group">
            <a href="{{ route('register') }}">Sign Up</a>
            <a href="{{ route('login') }}">Sign In</a>
        </div>
    </div>

    <div class="container">
        <h2>Laundry</h2>
            <p>Laundry adalah layanan pencucian pakaian yang biasanya dilakukan oleh pihak ketiga. Layanan ini membantu orang yang tidak memiliki waktu atau fasilitas untuk mencuci pakaian mereka sendiri. Proses laundry umumnya mencakup beberapa tahap, seperti pemilahan pakaian berdasarkan jenis dan warna, pencucian dengan deterjen yang sesuai, pembilasan, pengeringan, penyetrikaan, dan pengemasan sebelum diserahkan kembali kepada pelanggan.</p>
            <p>Dengan adanya layanan ini, pelanggan dapat menghemat waktu dan tenaga dalam merawat pakaian mereka. Laundry sangat bermanfaat terutama bagi masyarakat perkotaan yang memiliki aktivitas padat atau tidak memiliki akses ke peralatan mencuci yang memadai.</p>
    </div>
</body>
</html>
