<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt vé thành công - Movie Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1a1a1a;
            --secondary-color: #e50914;
            --text-color: #ffffff;
            --background-color: #141414;
            --card-bg: #1f1f1f;
            --hover-color: #ff0f1a;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: var(--primary-color);
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            color: var(--secondary-color) !important;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .success-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .success-card {
            background-color: var(--card-bg);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .success-icon {
            color: #28a745;
            font-size: 4rem;
            margin-bottom: 1.5rem;
        }

        .success-title {
            color: var(--text-color);
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .success-message {
            color: #b3b3b3;
            margin-bottom: 2rem;
        }

        .booking-details {
            background-color: rgba(255,255,255,0.05);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            color: #b3b3b3;
        }

        .detail-item strong {
            color: var(--text-color);
        }

        .btn-home {
            background-color: var(--secondary-color);
            color: var(--text-color);
            padding: 0.8rem 2rem;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-home:hover {
            background-color: var(--hover-color);
            color: var(--text-color);
            transform: translateY(-2px);
        }

        .footer {
            background-color: var(--primary-color);
            color: var(--text-color);
            padding: 1rem 0;
            text-align: center;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Snema</a>
        </div>
    </nav>

    <!-- Success Content -->
    <div class="success-container">
        <div class="success-card">
            <i class="fas fa-check-circle success-icon"></i>
            <h1 class="success-title">Đặt vé thành công!</h1>
            <p class="success-message">Cảm ơn bạn đã đặt vé. Dưới đây là thông tin đặt vé của bạn:</p>
            
            <div class="booking-details">
                <div class="detail-item">
                    <span>Mã đặt vé:</span>
                    <strong>#BK123456</strong>
                </div>
                <div class="detail-item">
                    <span>Phim:</span>
                    <strong>Avengers: Endgame</strong>
                </div>
                <div class="detail-item">
                    <span>Suất chiếu:</span>
                    <strong>20:00 - 22/03/2024</strong>
                </div>
                <div class="detail-item">
                    <span>Rạp:</span>
                    <strong>CGV Aeon Mall</strong>
                </div>
                <div class="detail-item">
                    <span>Ghế:</span>
                    <strong>D5, D6</strong>
                </div>
                <div class="detail-item">
                    <span>Tổng tiền:</span>
                    <strong>320.000đ</strong>
                </div>
            </div>

            <a href="/" class="btn-home">
                <i class="fas fa-home me-2"></i>Về trang chủ
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="mb-0">&copy; 2025 Snema - Đặt phim ngay hôm nay!.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 