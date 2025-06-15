<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt vé - Snema</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f6f7fb;
            color: #333;
        }

        /* Header Styles */
        .booking-header {
            background: #181818;
            color: #fff;
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .back-btn {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .movie-info {
            text-align: center;
        }

        .movie-info h1 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .showtime-info {
            font-size: 0.9rem;
            color: #ccc;
        }

        /* Main Content Layout */
        .booking-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
            display: grid;
            grid-template-columns: 30% 70%;
            gap: 2rem;
        }

        /* Left Column - Movie Info */
        .movie-details {
            background: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .movie-poster {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .movie-title {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: #ff4d4d;
        }

        .movie-rating {
            color: #ffd700;
            margin-bottom: 0.5rem;
        }

        .movie-meta {
            margin: 1rem 0;
            font-size: 0.9rem;
        }

        .movie-meta p {
            margin: 0.3rem 0;
            color: #666;
        }

        .trailer-btn {
            background: #ff4d4d;
            color: #fff;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            margin-top: 1rem;
            transition: background 0.3s;
        }

        .trailer-btn:hover {
            background: #ff3333;
        }

        /* Right Column - Seat Selection */
        .seat-selection {
            background: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .screen {
            background: #e0e0e0;
            height: 70px;
            margin: 0 auto 2rem;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 0.9rem;
            position: relative;
        }

        .screen::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 10px;
            background: #e0e0e0;
            border-radius: 50%;
            filter: blur(5px);
        }

        .seat-map {
            display: grid;
            grid-template-columns: repeat(10, 1fr);
            gap: 8px;
            margin: 2rem 0;
            padding: 0 1rem;
        }

        .seat {
            aspect-ratio: 1;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            transition: all 0.3s;
            position: relative;
        }

        .seat:hover::after {
            content: attr(data-seat);
            position: absolute;
            top: -25px;
            background: #333;
            color: #fff;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.7rem;
        }

        .seat.standard {
            background: #4CAF50;
        }

        .seat.vip {
            background: #9C27B0;
        }

        .seat.couple {
            background: #FF4081;
        }

        .seat.selected {
            background: #FFD700;
        }

        .seat.occupied {
            background: #9E9E9E;
            cursor: not-allowed;
        }

        /* Seat Legend */
        .seat-legend {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin: 1rem 0;
            flex-wrap: wrap;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 4px;
        }

        /* Booking Controls */
        .booking-controls {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            margin-top: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .selected-info {
            font-size: 1.1rem;
        }

        .control-buttons {
            display: flex;
            gap: 1rem;
        }

        .control-btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
        }

        .reset-btn {
            background: #e0e0e0;
            color: #333;
        }

        .continue-btn {
            background: #ff4d4d;
            color: #fff;
        }

        .control-btn:hover {
            opacity: 0.9;
        }

        /* Footer */
        .booking-footer {
            background: #f8f9fa;
            padding: 1.5rem;
            margin-top: 2rem;
            border-top: 1px solid #e0e0e0;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }

        .footer-section h3 {
            color: #333;
            margin-bottom: 1rem;
        }

        .footer-section p {
            color: #666;
            line-height: 1.6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .booking-container {
                grid-template-columns: 1fr;
            }

            .movie-details {
                display: none;
            }

            .seat-map {
                grid-template-columns: repeat(8, 1fr);
            }

            .booking-controls {
                flex-direction: column;
                gap: 1rem;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }

        /* Toast Message */
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #333;
            color: #fff;
            padding: 1rem 2rem;
            border-radius: 6px;
            display: none;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="booking-header">
        <a href="index.blade.php" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Quay lại
        </a>
        <div class="movie-info">
            <h1 id="movieTitle">Đặt vé</h1>
            <div class="showtime-info" id="showtimeInfo">
                Đặt vé
            </div>
        </div>
        <div class="logo">Snema</div>
    </header>

    <form method="POST" action="{{ route('bookings.store') }}">
        @csrf

        <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">
        <input type="hidden" name="admin_id" value="{{ $admin_id }}">
        <input type="hidden" name="customer_id" value="{{ $customer_id }}">

        <label>Phương thức thanh toán:</label>
        <select name="payment_id" class="form-control" required>
            @foreach ($payment_options as $option)
                <option value="{{ $option->id }}">
                    @if($option->option == 1)
                        Thanh toán online
                    @elseif($option->option == 2)
                        Thanh toán tại quầy
                    @endif
                </option>
            @endforeach
        </select>

        <label>Chọn mã khuyến mãi:</label>
        <select name="promotion_id" class="form-control">
            <option value="">-- Không áp dụng --</option>
            @foreach ($promotions as $promo)
                <option value="{{ $promo->id }}">
                @if($promo->promotion_type == 1)
                    Giảm 25%
                @elseif($promo->promotion_type == 2)
                    Giảm 50%
                @endif
                </option>
            @endforeach
        </select>

        <label>Chọn combo đồ ăn:</label>
        @foreach ($snacks as $snack)
            <div>
                <input type="checkbox" name="booking_snacks_id[]" value="{{ $snack->id }}">
                {{ $snack->name }} – {{ $snack->price }}đ
            </div>
        @endforeach

        <button type="submit" class="btn btn-success mt-3">Xác nhận đặt vé</button>
    </form>



    <!-- Footer -->
    <footer class="booking-footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Chính sách hủy vé</h3>
                <p>Vé có thể hủy trước giờ chiếu 24h. Phí hủy vé: 10% giá vé.</p>
            </div>
            <div class="footer-section">
                <h3>Hỗ trợ</h3>
                <p>Hotline: 1900 1234 (8:00 - 22:00)</p>
                <p>Email: support@snema.vn</p>
            </div>
        </div>
    </footer>

    <!-- Toast Message -->
    <div class="toast" id="toast"></div>

    <script>
        // Movie data - This would typically come from a database
        const movies = {
            'avengers': {
                title: 'Avengers: Endgame',
                rating: 4.5,
                genre: 'Hành động, Phiêu lưu, Khoa học viễn tưởng',
                age: '13+',
                duration: '181 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/avengers.jpg',
                trailer: 'https://www.youtube.com/watch?v=TcMBFSGVi1c'
            },
            'joker': {
                title: 'Joker',
                rating: 4.8,
                genre: 'Tội phạm, Kịch tính, Tâm lý',
                age: '16+',
                duration: '122 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/joker.jpg',
                trailer: 'https://www.youtube.com/watch?v=zAGVQLHvwOY'
            },
            'parasite': {
                title: 'Parasite',
                rating: 4.9,
                genre: 'Hài kịch, Kịch tính, Tâm lý',
                age: '16+',
                duration: '132 phút',
                language: 'Tiếng Hàn',
                subtitle: 'Tiếng Việt',
                poster: 'images/parasite.jpg',
                trailer: 'https://www.youtube.com/watch?v=5xH0HfJHsaY'
            },
            'inception': {
                title: 'Inception',
                rating: 4.7,
                genre: 'Hành động, Khoa học viễn tưởng, Phiêu lưu',
                age: '13+',
                duration: '148 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/inception.jpg',
                trailer: 'https://www.youtube.com/watch?v=YoHD9XEInc0'
            },
            'dark_knight': {
                title: 'The Dark Knight',
                rating: 4.9,
                genre: 'Hành động, Tội phạm, Kịch tính',
                age: '13+',
                duration: '152 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/dark_knight.jpg',
                trailer: 'https://www.youtube.com/watch?v=EXeTwQWrcwY'
            },
            'interstellar': {
                title: 'Interstellar',
                rating: 4.6,
                genre: 'Phiêu lưu, Khoa học viễn tưởng, Kịch tính',
                age: '13+',
                duration: '169 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/interstellar.jpg',
                trailer: 'https://www.youtube.com/watch?v=zSWdZVtXT7E'
            },
            'shawshank': {
                title: 'The Shawshank Redemption',
                rating: 4.9,
                genre: 'Kịch tính, Tội phạm',
                age: '16+',
                duration: '142 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/shawshank.jpg',
                trailer: 'https://www.youtube.com/watch?v=6hB3S9bIaco'
            },
            'pulp_fiction': {
                title: 'Pulp Fiction',
                rating: 4.8,
                genre: 'Tội phạm, Kịch tính',
                age: '18+',
                duration: '154 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/pulp_fiction.jpg',
                trailer: 'https://www.youtube.com/watch?v=s7EdQ4FqbhY'
            },
            'godfather': {
                title: 'The Godfather',
                rating: 4.9,
                genre: 'Tội phạm, Kịch tính',
                age: '18+',
                duration: '175 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/godfather.jpg',
                trailer: 'https://www.youtube.com/watch?v=sY1S34973zA'
            },
            'forrest_gump': {
                title: 'Forrest Gump',
                rating: 4.8,
                genre: 'Hài kịch, Kịch tính, Tình cảm',
                age: '13+',
                duration: '142 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/forrest_gump.jpg',
                trailer: 'https://www.youtube.com/watch?v=bLvqoHBptjg'
            },
            'matrix': {
                title: 'The Matrix',
                rating: 4.7,
                genre: 'Hành động, Khoa học viễn tưởng',
                age: '13+',
                duration: '136 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/matrix.jpg',
                trailer: 'https://www.youtube.com/watch?v=vKQi3bBA1y8'
            },
            'goodfellas': {
                title: 'Goodfellas',
                rating: 4.8,
                genre: 'Tội phạm, Kịch tính',
                age: '18+',
                duration: '146 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/goodfellas.jpg',
                trailer: 'https://www.youtube.com/watch?v=qo5jJpHtI1Y'
            },
            'silence_lambs': {
                title: 'The Silence of the Lambs',
                rating: 4.8,
                genre: 'Tội phạm, Kinh dị, Kịch tính',
                age: '18+',
                duration: '118 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/silence_lambs.jpg',
                trailer: 'https://www.youtube.com/watch?v=W6Mm8Sbe__o'
            },
            'fight_club': {
                title: 'Fight Club',
                rating: 4.7,
                genre: 'Hành động, Kịch tính, Tâm lý',
                age: '18+',
                duration: '139 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/fight_club.jpg',
                trailer: 'https://www.youtube.com/watch?v=SUXWAEX2jlg'
            },
            'lotr': {
                title: 'The Lord of the Rings',
                rating: 4.9,
                genre: 'Phiêu lưu, Hành động, Kỳ ảo',
                age: '13+',
                duration: '178 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/lotr.jpg',
                trailer: 'https://www.youtube.com/watch?v=V75dMMIW2B4'
            },
            'green_mile': {
                title: 'The Green Mile',
                rating: 4.8,
                genre: 'Kịch tính, Tội phạm, Tâm lý',
                age: '16+',
                duration: '189 phút',
                language: 'Tiếng Anh',
                subtitle: 'Tiếng Việt',
                poster: 'images/green_mile.jpg',
                trailer: 'https://www.youtube.com/watch?v=Ki4haFrqSrw'
            }
        };

        // Get movie ID from URL
        const urlParams = new URLSearchParams(window.location.search);
        const movieId = urlParams.get('movie') || 'avengers'; // Default to avengers if no movie specified

        // Load movie data
        function loadMovieData() {
            const movie = movies[movieId];
            if (!movie) {
                showToast('Không tìm thấy thông tin phim!');
                return;
            }

            // Update page title
            document.title = `Đặt vé - ${movie.title}`;

            // Update header
            document.getElementById('movieTitle').textContent = movie.title;
            document.getElementById('movieTitle2').textContent = movie.title;

            // Update movie poster
            const poster = document.getElementById('moviePoster');
            poster.src = movie.poster;
            poster.alt = movie.title;

            // Update rating
            const ratingHtml = Array(5).fill().map((_, i) => {
                if (i < Math.floor(movie.rating)) {
                    return '<i class="fas fa-star"></i>';
                } else if (i < Math.ceil(movie.rating)) {
                    return '<i class="fas fa-star-half-alt"></i>';
                } else {
                    return '<i class="far fa-star"></i>';
                }
            }).join('') + ` ${movie.rating}/5`;
            document.getElementById('movieRating').innerHTML = ratingHtml;

            // Update movie meta info
            document.getElementById('movieMeta').innerHTML = `
                <p><strong>Thể loại:</strong> ${movie.genre}</p>
                <p><strong>Độ tuổi:</strong> ${movie.age}</p>
                <p><strong>Thời lượng:</strong> ${movie.duration}</p>
                <p><strong>Ngôn ngữ:</strong> ${movie.language}</p>
                <p><strong>Phụ đề:</strong> ${movie.subtitle}</p>
            `;

            // Update trailer button
            document.getElementById('trailerBtn').onclick = () => {
                window.open(movie.trailer, '_blank');
            };
        }

        // Seat Map Generation
        const seatMap = document.getElementById('seatMap');
        const rows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        const seatsPerRow = 10;
        let selectedSeats = new Set();
        const maxSeats = 8;
        const prices = {
            standard: 75000,
            vip: 95000,
            couple: 150000
        };

        function generateSeats() {
            seatMap.innerHTML = ''; // Clear existing seats
            rows.forEach((row, rowIndex) => {
                for (let i = 1; i <= seatsPerRow; i++) {
                    const seat = document.createElement('div');
                    seat.className = 'seat';
                    seat.dataset.seat = `${row}${i}`;

                    // Random seat types for demo
                    const random = Math.random();
                    if (random < 0.7) {
                        seat.classList.add('standard');
                    } else if (random < 0.85) {
                        seat.classList.add('vip');
                    } else {
                        seat.classList.add('couple');
                    }

                    // Random occupied seats
                    if (Math.random() < 0.2) {
                        seat.classList.add('occupied');
                    }

                    seat.addEventListener('click', handleSeatClick);
                    seatMap.appendChild(seat);
                }
            });
        }

        function handleSeatClick(e) {
            const seat = e.target;
            if (seat.classList.contains('occupied')) return;

            if (seat.classList.contains('selected')) {
                seat.classList.remove('selected');
                selectedSeats.delete(seat.dataset.seat);
            } else {
                if (selectedSeats.size >= maxSeats) {
                    showToast('Tối đa 8 ghế/lần đặt!');
                    return;
                }

                if (seat.classList.contains('couple')) {
                    const seatNumber = parseInt(seat.dataset.seat.slice(1));
                    const nextSeat = document.querySelector(`[data-seat="${seat.dataset.seat[0]}${seatNumber + 1}"]`);

                    if (!nextSeat || nextSeat.classList.contains('occupied')) {
                        showToast('Vui lòng chọn 2 ghế đôi liền nhau!');
                        return;
                    }

                    nextSeat.classList.add('selected');
                    selectedSeats.add(nextSeat.dataset.seat);
                }

                seat.classList.add('selected');
                selectedSeats.add(seat.dataset.seat);
            }

            updateBookingInfo();
        }

        function updateBookingInfo() {
            const selectedCount = document.getElementById('selectedCount');
            const totalPrice = document.getElementById('totalPrice');

            let total = 0;
            selectedSeats.forEach(seatId => {
                const seat = document.querySelector(`[data-seat="${seatId}"]`);
                if (seat.classList.contains('standard')) total += prices.standard;
                else if (seat.classList.contains('vip')) total += prices.vip;
                else if (seat.classList.contains('couple')) total += prices.couple;
            });

            selectedCount.textContent = selectedSeats.size;
            totalPrice.textContent = total.toLocaleString();
        }

        function showToast(message) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.style.display = 'block';
            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000);
        }

        // Reset button
        document.getElementById('resetBtn').addEventListener('click', () => {
            selectedSeats.clear();
            document.querySelectorAll('.seat.selected').forEach(seat => {
                seat.classList.remove('selected');
            });
            updateBookingInfo();
        });

        // Continue button
        document.getElementById('continueBtn').addEventListener('click', () => {
            if (selectedSeats.size === 0) {
                showToast('Vui lòng chọn ít nhất một ghế!');
                return;
            }
            // Redirect to payment page with movie ID
            window.location.href = `payment.html?movie=${movieId}&seats=${Array.from(selectedSeats).join(',')}`;
        });

        // Initialize
        loadMovieData();
        generateSeats();
    </script>
</body>

</html>
