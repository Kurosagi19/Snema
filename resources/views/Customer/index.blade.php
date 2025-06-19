<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snema - Đặt vé xem phim</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>
    <header class="navbar">
        <div class="container">
            <a href="index.blade.php" class="logo">Snema</a>
            <nav>
                <a href="{{ route('customers.index') }}" class="active">Trang chủ</a>
                <a href="">Diễn đàn</a>
                <a href="">Phim</a>
                <a href="">Rạp</a>
                <a href="">Đồ ăn</a>
                <a href="">Về chúng tôi</a>
                <a href="">Liên hệ</a>
            </nav>
            <div class="auth-buttons">
                <a href="{{ route('customers.login') }}" class="login-btn">Đăng nhập</a>
            </div>
        </div>
    </header>
    <div class="main-content">
        <div class="ad-sidebar">
            <!-- Quảng cáo bên trái -->
            <img src="images/ad-left.jpg" alt="Quảng cáo" style="width:100%;border-radius:8px;">
        </div>
        <div class="content-area">
            <!-- Nội dung chính -->
            <section class="search-banner">
                <h1>Đặt vé xem phim trực tuyến, nhanh chóng và tiện lợi</h1>
                <p>Khám phá phim hot, ưu đãi hấp dẫn và trải nghiệm rạp chiếu hiện đại</p>
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="Tìm phim yêu thích...">
                    <button id="searchBtn"><i class="fas fa-search"></i></button>
                    <div class="autocomplete-suggestions" id="autocompleteList" style="display:none;"></div>
                </div>
                <a href="#" class="cta-button" style="margin-top:2rem;display:inline-block;">Đăng ký thành viên để nhận ưu đãi</a>
            </section>
            <section class="promo-slider container">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="images/banner1.jpg" alt="Khuyến mãi 1"></div>
                        <div class="swiper-slide"><img src="images/banner2.jpg" alt="Khuyến mãi 2"></div>
                        <div class="swiper-slide"><img src="images/banner3.jpg" alt="Khuyến mãi 3"></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
            <div class="container cinema-select">
                <label for="cinemaSelect">Chọn rạp:</label>
                <select id="cinemaSelect">
                    <option value="all">Tất cả các rạp</option>
                    <option value="cgv">CGV Hà Nội</option>
                    <option value="lotte">Lotte Đà Nẵng</option>
                    <option value="galaxy">Galaxy Sài Gòn</option>
                </select>
            </div>

                <div class="container">
                    <div class="movie-tabs" id="movieTabs">
                        @foreach($genres as $genre)
                        <div class="movie-tab" data-genre="all">{{ $genre->genre_name }}</div>
                        @endforeach
                    </div>
                </div>


                <!-- Phim -->
                @foreach($movies as $movie)
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <div class="card h-100">
                                <img src="{{ asset('storage/' . $movie->poster) }}" class="card-img-top" alt="{{ $movie->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $movie->title }}</h5>
                                        <button type="button" class="btn btn-primary"><a href="{{ route('movies.details', $movie->id) }}" style="color: white">Chi tiết</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            <section class="container featured-movies" id="suggestedSection" style="display:none;">
                <h2 class="section-title">Dành cho bạn</h2>
                <div class="movie-grid" id="suggestedGrid">
                    <!-- Movie cards sẽ được render ở đây bằng JS hoặc backend -->
                </div>
                <div class="pagination" id="suggestedPagination"></div>
            </section>
        </div>
        <div class="ad-sidebar">
            <!-- Quảng cáo bên phải -->
            <img src="images/ad-right.jpg" alt="Quảng cáo" style="width:100%;border-radius:8px;">
        </div>
    </div>
    <footer>
        <div class="footer-grid">
            <div>
                <div class="footer-title">Snema</div>
                <p>Hệ thống đặt vé xem phim trực tuyến hiện đại, tiện lợi và nhanh chóng.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-zalo"></i></a>
                </div>
            </div>
            <div>
                <div class="footer-title">Liên kết nhanh</div>
                <ul class="footer-links">
                    <li><a href="#">Lịch chiếu</a></li>
                    <li><a href="#">Giá vé</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Khuyến mãi</a></li>
                </ul>
            </div>
        <div style="text-align:center;margin-top:2rem;color:#bbb;font-size:0.95rem;">&copy; 2024 Snema. All rights reserved.</div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</body>

</html>
