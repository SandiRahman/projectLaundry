<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: white;
            text-align: center;
            height: 100vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Video Background */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

         /* Navbar Transparan */
         .navbar {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            background: rgba(0, 0, 0, 0.3); /* Transparan dengan sedikit gelap */
            backdrop-filter: blur(5px); /* Efek blur */
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            display: flex;
            align-items: center;
        }

        .navbar .logo img {
            height: 80px;
            margin-right: 10px;
        }

        .navbar .header-title {
            font-size: 24px;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .navbar .button-group {
            display: flex;
            gap: 10px;
        }

        .navbar .button-group a {
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.3); /* Transparan putih */
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .navbar .button-group a:hover {
            background: rgba(255, 255, 255, 0.5);
            color: #000;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }

            .navbar .button-group {
                margin-top: 10px;
            }
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="/foto/laundry.png" alt="Logo Laundry">
            <span class="header-title">Dashboard Laundry</span>
        </div>
        <div class="button-group">
            <a href="/registerkhusus">Sign Up</a>
            <a href="/login">Sign In</a>
        </div>
    </div>

    <!-- Video Background -->
    <video class="video-background" autoplay loop muted>
        <source src="/videos/laundry.mp4" type="video/mp4">
        Browser Anda tidak mendukung video.
    </video>

</body>
</html>