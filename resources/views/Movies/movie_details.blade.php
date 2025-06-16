<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avengers: Endgame - Movie Ticket</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/movie-detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('customer.index') }}">Snema</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.index') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Phim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Rạp chiếu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Khuyến mãi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Liên hệ</a>
                    </li>
                </ul>
                <div class="nav-buttons">
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Đăng nhập</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Chi tiết phim -->
    <section class="movie-detail">
        @if($movies)
        <div class="movie-poster">
            <img src="{{ asset('storage/' . $movies->poster) }}" alt="{{ $movies->title }}">
        </div>
        <div class="movie-info">
            <h1>{{ $movies->title }}</h1>
            <div class="movie-meta">
                <span class="rating"><i class="fas fa-star"></i>{{ $movies->rating }}/10</span>
                <span class="duration">{{ $movies->duration }} phút</span>
                <span class="genre">{{ $movies->genre_movie->genre->genre_name }}</span>
            </div>
            <div class="movie-description">
                <h3>Nội dung phim</h3>
                <p>{{ $movies->description }}</p>
            </div>
            <div class="movie-language">
                <h3>Ngôn ngữ</h3>
                <p>{{ $movies->language }}</p>
            </div>
            <div class="movie-caption">
                <h3>Phụ đề</h3>
                <p>{{ $movies->caption }}</p>
            </div>
            <div class="movie-director">
                <h3>Đạo diễn</h3>
                <p>{{ $movies->author }}</p>
            </div>
        </div>
        @endif
    </section>

    <!-- Lịch chiếu -->
    <section class="showtimes">
        <div class="cinema-filter">
            <h2>Lịch chiếu</h2>
            <label for="cinema-select">Chọn rạp:</label>
            @foreach($cinemas as $cinema)
            <select id="cinema-select">
                <option value="all">{{ $cinema->name }}</option>
            </select>
            @endforeach
        </div>

        <h4 class="mt-4">Suất chiếu</h4>

        <form action="{{ route('bookings.create') }}" method="GET">
            @csrf

            <label for="showtime_id">Chọn suất chiếu:</label>
            <select name="showtime_id" id="showtime_id" class="form-select" required>
                <option value="">-- Chọn suất chiếu --</option>
                @foreach ($movies->showtimes as $showtime)
                    <option value="{{ $showtime->id }}">
                        {{ \Carbon\Carbon::parse($showtime->date)->format('d/m/Y') }} –
                        {{ \Carbon\Carbon::parse($showtime->start_time)->format('H:i') }}
                    </option>
                @endforeach
            </select>

            <input type="hidden" name="movie_id" value="{{ $movies->id }}">
            <button type="submit" class="btn btn-primary mt-2">Đặt vé</button>
        </form>
    </section>

    <!-- Footer (giống trang chủ) -->
    <footer>
        <!-- ... -->
    </footer>

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/booking.js') }}"></script>
</body>

</html>
