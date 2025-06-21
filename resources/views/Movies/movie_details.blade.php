@include('Customer.navbar')

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

        <form method="GET" action="{{ route('bookings.create') }}">
            @csrf

            <label for="showtime_id">Chọn suất chiếu:</label>

            @php
                use Carbon\Carbon;

                $now = Carbon::now();
            @endphp

            @foreach ($showtimes as $showtime)
                @php
                    $release_date = Carbon::parse($movies->release_date);
                    $start_time   = Carbon::parse($showtime->start_time);
                    $can_book = true;

//                    if ($release_date->isFuture()) {
//                        $can_book = true;
//                    }

                    // Cấm nếu hôm nay và đã quá giờ chiếu
                    if ($release_date->isToday() && $start_time->lessThan($now)) {
                        $can_book = false;
                    }

                    // Cấm nếu release_date đã là quá khứ
                    if ($release_date->isPast() && !$release_date->isToday()) {
                        $can_book = false;
                    }
                @endphp

                <div class="mb-3 border p-2 rounded">
                    <p id="{{ $showtime->id }}"><strong>Suất chiếu:</strong>
                        {{ $start_time->format('H:i') }} - {{ \Carbon\Carbon::parse($showtime->end_time)->format('H:i') }}
                    </p>

                    @if ($can_book)
                        <a href="{{ route('bookings.create', ['movie_id' => $movies->id, 'showtime_id' => $showtime->id]) }}"
                           class="btn btn-success">
                            Đặt vé
                        </a>
                    @else
                        <span class="text-muted">Không thể đặt vé (quá giờ hoặc đã chiếu)</span>
                    @endif
                </div>
            @endforeach
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
