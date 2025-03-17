<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        color: white;
        text-align: center;
        position: relative;
        min-height: 100vh;
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
        background: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(5px);
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
        background: rgba(255, 255, 255, 0.3);
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

    /* Main Content */
    .main-content {
        margin-top: 100px;
        padding: 20px;
    }

    /* Welcome Section */
    .welcome-section {
        background: rgba(100, 50, 150, 0.8); /* Warna ungu dengan opasitas 80% */
        padding: 40px 20px;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .welcome-section h1 {
        font-size: 36px;
        margin-bottom: 15px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    .welcome-section p {
        font-size: 18px;
        line-height: 1.6;
    }

    /* About Section */
    .about-section {
        background: rgba(100, 50, 150, 0.8); /* Warna ungu dengan opasitas 80% */
        padding: 30px 20px;
        border-radius: 10px;
    }

    .about-section h2 {
        font-size: 28px;
        margin-bottom: 15px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    }

    .about-section p {
        font-size: 16px;
        line-height: 1.6;
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

        .welcome-section {
            padding: 20px;
        }

        .welcome-section h1 {
            font-size: 28px;
        }

        .about-section {
            padding: 15px;
        }

        .about-section h2 {
            font-size: 24px;
        }
    }
</style>
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
        <a href="/register">Sign Up</a>
        <a href="/login">Sign In</a>
    </div>
</div>

<!-- Video Background -->
<video class="video-background" autoplay loop muted>
    <source src="/videos/laundry.mp4" type="video/mp4">
    Browser Anda tidak mendukung video.
</video>

<!-- Main Content -->
<div class="main-content">
    <!-- Welcome Section -->
    <div class="welcome-section">
        <h1>Welcome to Our Laundry Dashboard</h1>
        <p>Manage your laundry services efficiently with our modern dashboard. Track orders, manage customers, and optimize your operations all in one place.</p>
    </div>

    <!-- About Section -->
    <div class="about-section">
        <h2>About Us</h2>
        <p>We are a professional laundry service provider dedicated to delivering clean, fresh, and quality laundry solutions to our customers. With years of experience in the industry, we combine traditional care with modern technology to ensure your satisfaction.</p>
    </div>
</div>
</body>
</html>