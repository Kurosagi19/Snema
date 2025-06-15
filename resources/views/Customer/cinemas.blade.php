<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snema - Rạp chiếu</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cinemas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: #f6f7fb;
            color: #222;
            font-family: 'Segoe UI', Arial, sans-serif;
            padding-top: 60px;
        }
        .navbar {
            background: #181818;
            color: #fff;
            padding: 0.8rem 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            letter-spacing: 1px;
            color: #ff4d4d;
            text-decoration: none;
            transition: color 0.2s;
        }
        .logo:hover {
            color: #e43c3c;
        }
        nav {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background 0.2s;
            font-size: 0.95rem;
            white-space: nowrap;
        }
        nav a.active, nav a:hover {
            background: #ff4d4d;
            color: #fff;
        }
        .auth-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        .auth-buttons a {
            color: #fff;
            background: #ff4d4d;
            border-radius: 4px;
            padding: 0.5rem 1.2rem;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.2s;
            font-size: 0.95rem;
            white-space: nowrap;
        }
        .auth-buttons a.login-btn {
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }
        .auth-buttons a:hover {
            background: #e43c3c;
        }
        .auth-buttons a.register-btn {
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }
        .main-content {
            display: flex;
            gap: 2rem;
            margin: 2rem auto;
            max-width: 1400px;
            padding: 0 1rem;
        }
        .ad-sidebar {
            width: 200px;
            background: #fff;
            border-radius: 12px;
            padding: 1rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .content-area {
            flex: 1;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="container">
            <a href="index.blade.php" class="logo">Snema</a>
            <nav>
                <a href="index.blade.php">Trang chủ</a>
                <a href="forum.blade.php">Diễn đàn</a>
                <a href="movies.blade.php">Phim</a>
                <a href="cinemas.blade.php" class="active">Rạp</a>
                <a href="food.blade.php">Đồ ăn</a>
                <a href="about.blade.php">Về chúng tôi</a>
                <a href="contact.blade.php">Liên hệ</a>
            </nav>
            <div class="auth-buttons">
                <a href="login.blade.php" class="login-btn">Đăng nhập</a>
                <a href="register.blade.php" class="register-btn">Đăng ký</a>
            </div>
        </div>
    </header>
    <div class="main-content">
        <h1 class="page-title">Rạp chiếu phim</h1>
        <div class="cinemas-grid">
            <!-- Rạp 1 -->
            <div class="cinema-card">
                <div class="cinema-image">
                    <img src="images/cinemas/cgv-aeon.jpg" alt="CGV Aeon Mall">
                </div>
                <div class="cinema-info">
                    <h2 class="cinema-title">CGV Aeon Mall</h2>
                    <div class="cinema-details">
                        <p><i class="fas fa-map-marker-alt"></i> Tầng 4, Aeon Mall, 30 Bờ Bao Tân Thắng, P. Sơn Kỳ, Q. Tân Phú, TP.HCM</p>
                        <p><i class="fas fa-phone"></i> 1900 6017</p>
                    </div>
                    <a href="#" class="view-schedule-btn">Xem lịch chiếu</a>
                </div>
            </div>

            <!-- Rạp 2 -->
            <div class="cinema-card">
                <div class="cinema-image">
                    <img src="images/cinemas/cgv-crescent.jpg" alt="CGV Crescent Mall">
                </div>
                <div class="cinema-info">
                    <h2 class="cinema-title">CGV Crescent Mall</h2>
                    <div class="cinema-details">
                        <p><i class="fas fa-map-marker-alt"></i> Tầng 5, Crescent Mall, 101 Tôn Dật Tiên, P. Tân Phú, Q.7, TP.HCM</p>
                        <p><i class="fas fa-phone"></i> 1900 6017</p>
                    </div>
                    <a href="#" class="view-schedule-btn">Xem lịch chiếu</a>
                </div>
            </div>

            <!-- Rạp 3 -->
            <div class="cinema-card">
                <div class="cinema-image">
                    <img src="images/cinemas/cgv-landmark.jpg" alt="CGV Landmark 81">
                </div>
                <div class="cinema-info">
                    <h2 class="cinema-title">CGV Landmark 81</h2>
                    <div class="cinema-details">
                        <p><i class="fas fa-map-marker-alt"></i> Tầng B1, Landmark 81, 772 Điện Biên Phủ, P.22, Q. Bình Thạnh, TP.HCM</p>
                        <p><i class="fas fa-phone"></i> 1900 6017</p>
                    </div>
                    <a href="#" class="view-schedule-btn">Xem lịch chiếu</a>
                </div>
            </div>

            <!-- Rạp 4 -->
            <div class="cinema-card">
                <div class="cinema-image">
                    <img src="images/cinemas/cgv-vincom.jpg" alt="CGV Vincom Center">
                </div>
                <div class="cinema-info">
                    <h2 class="cinema-title">CGV Vincom Center</h2>
                    <div class="cinema-details">
                        <p><i class="fas fa-map-marker-alt"></i> Tầng 4, Vincom Center, 72 Lê Thánh Tôn, P. Bến Nghé, Q.1, TP.HCM</p>
                        <p><i class="fas fa-phone"></i> 1900 6017</p>
                    </div>
                    <a href="#" class="view-schedule-btn">Xem lịch chiếu</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
