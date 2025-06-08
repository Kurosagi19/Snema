<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - Đặt vé phim đa rạp</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>

<body>
    <!-- Header -->
    <header>
        <div class="logo">MOVIE TICKET</div>
        <nav>
            <a href="#" class="active">Trang chủ</a>
            <a href="{{ route('Movies.index') }}">Phim</a>
            <a href="cinemas.html">Rạp</a>
            <a href="#">Khuyến mãi</a>
        </nav>
        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="login-btn">Đăng nhập</a>
            <a href="{{ route('login') }}" class="register-btn">Đăng ký</a>
        </div>
    </header>

    <!-- Banner chính -->
    <section class="main-banner">
        <div class="banner-content">
            <h1>Trải nghiệm điện ảnh tuyệt vời</h1>
            <p>Đặt vé ngay để không bỏ lỡ những bộ phim hay nhất</p>
            <a href="movies.html" class="cta-button">Xem phim đang chiếu</a>
        </div>
    </section>

    <!-- Phim đang hot -->
    <section class="featured-movies">
        <h2>Phim đang hot</h2>
        <div class="movie-slider">
            @foreach($movies as $movie)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $movie->poster) }}" class="card-img-top" alt="{{ $movie->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">Ngày phát hành: {{ $movie->release_date }} </p>
                            <p class="card-text">Thời lượng: {{ $movie->duration }} phút</p>
                            <a href="#" class="btn btn-primary">Chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Rạp chiếu -->
    <section class="featured-cinemas">
        <h2>Hệ thống rạp</h2>
        <div class="cinema-grid">
            <!-- Danh sách rạp sẽ được thêm bằng JS -->
        </div>
    </section>

    <!--	Footer	-->
    <div id="footer-bottom" class="bg-dark">
        <div class="container text-center text-light">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>
                        2025 © <a href="https://bkacad.edu.vn">BKACAD</a>. All rights reserved. Developed by <a href="https://github.com/Kurosagi19">Kurosagi19</a> and <a href="https://www.facebook.com/DPawsParrot">DPawsParrot.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--	End Footer	-->

    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
</body>

</html>
