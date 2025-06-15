<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avengers: Endgame - Movie Ticket</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <!-- Header (giống trang chủ) -->
    <header>
        <!-- ... -->
    </header>

    <!-- Chi tiết phim -->
    <section class="movie-detail">
        <div class="movie-poster">
            <img src="images/movie1.jpg" alt="Avengers: Endgame">
        </div>
        <div class="movie-info">
            <h1>Avengers: Endgame</h1>
            <div class="movie-meta">
                <span class="rating"><i class="fas fa-star"></i> 8.5/10</span>
                <span class="duration">181 phút</span>
                <span class="genre">Hành động, Phiêu lưu</span>
            </div>
            <div class="movie-description">
                <h3>Nội dung phim</h3>
                <p>Sau những sự kiện tàn khốc của Avengers: Infinity War, vũ trụ đang tan hoang. Với sự giúp đỡ của các đồng minh còn lại, Avengers phải tập hợp lại một lần nữa để đảo ngược hành động của Thanos và khôi phục trật tự cho vũ trụ.</p>
            </div>
            <div class="movie-cast">
                <h3>Diễn viên</h3>
                <p>Robert Downey Jr., Chris Evans, Mark Ruffalo, Chris Hemsworth, Scarlett Johansson</p>
            </div>
            <div class="movie-director">
                <h3>Đạo diễn</h3>
                <p>Anthony Russo, Joe Russo</p>
            </div>
        </div>
    </section>

    <!-- Lịch chiếu -->
    <section class="showtimes">
        <h2>Lịch chiếu</h2>
        <div class="cinema-filter">
            <label for="cinema-select">Chọn rạp:</label>
            <select id="cinema-select">
                <option value="all">Tất cả rạp</option>
                <option value="1">CGV Hùng Vương Plaza</option>
                <option value="2">Lotte Cinema Đà Nẵng</option>
            </select>
        </div>
        <div class="showtime-list">
            <!-- Các suất chiếu sẽ được thêm bằng JS -->
        </div>
    </section>

    <!-- Footer (giống trang chủ) -->
    <footer>
        <!-- ... -->
    </footer>

    <script src="js/main.js"></script>
    <script src="js/booking.js"></script>
</body>

</html>