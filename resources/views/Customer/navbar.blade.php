<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar - Snema</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('customers.index') }}">Snema</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('customers.index') }}">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Diễn đàn</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Phim</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Rạp</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Về chúng tôi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Liên hệ</a></li>
                </ul>
                <div class="d-flex">
                    @if(session()->has('customer_id'))
                        <form method="POST" action="{{ route('customers.logout') }}">
                            @csrf
                            <button class="btn btn-primary">
                                <i class="fas fa-sign-out"></i> Đăng xuất
                            </button>
                        </form>
                    @else
                        <div class="auth-buttons">
                            <a href="{{ route('customers.login') }}" class="fas fa-sign-in">Đăng nhập</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/navbar.js"></script>
</body>
</html>
