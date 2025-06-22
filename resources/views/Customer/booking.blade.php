@include('Customer.navbar')

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt vé - Snema</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <style rel="booking">
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
    <style rel="seats">
        .seat {
            width: 42px;
            height: 42px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
        }
        .screen {
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
            letter-spacing: 2px;
        }

        label.disabled {
            background-color: #ccc !important;
            color: #fff;
            cursor: not-allowed;
        }

        .seat.selected {
            background-color: #00FF00 !important;
            border-color: #f5c518;
            color: #000;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="booking-header">
        <a href="{{ route('movies.details', $movie->id) }}" class="back-btn">
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

    <!-- Main Content -->
    <div class="booking-container">
        {{-- Cột trái: Thông tin phim --}}
        <div class="col-md-4 mb-4">
            <h5>Đặt vé: {{ $movie->title }}</h5>

            <img src="{{ asset('storage/' . $movie->poster) }}" class="img-fluid rounded mb-3" alt="Poster">

            <p><strong>Suất chiếu:</strong> lúc {{ \Carbon\Carbon::parse($showtime->start_time)->format('H:i:s') }}</p>
            <p><strong>Ngày chiếu:</strong> {{ \Carbon\Carbon::parse($movie->release_date)->format('d/m/Y') }}</p>
        </div>

        {{-- Cột phải: Chọn ghế, đồ ăn, phương thức thanh toán --}}
        <form method="post" action="{{ route('bookings.store') }}">
            @csrf

        <div class="seat-selection">

            @php
                $seats_by_row = $seats->groupBy(fn($seat) => substr($seat->seat_code, 0, 1));
            @endphp

            <div class="seat-map d-flex flex-column gap-2 align-items-center" id="seatMap">
                @foreach ($seats_by_row as $row => $row_seats)
                    <div class="d-flex gap-2 justify-content-center align-items-center">
                        <span class="fw-bold me-2">{{ $row }}</span>

                        @foreach ($row_seats->sortBy('seat_number') as $seat)
                            @php
                                $is_booked = in_array($seat->id, $booked_seat_ids ?? []);
                                $seat_type = $seat->seat_type === 'vip' ? 'vip' : 'normal';
                            @endphp

                            <label class="seat btn {{ $seat_type === 'vip' ? 'btn-warning' : 'btn-outline-secondary' }} {{ $is_booked ? 'disabled' : '' }}">
                                @if (!$is_booked)
                                    <input type="checkbox" name="seat_ids[]" value="{{ $seat->id }}" class="d-none seat-checkbox">
                                @endif
                                {{ substr($seat->seat_code, 1) }}
                            </label>
                        @endforeach
                    </div>
                @endforeach
            </div>

{{--            Chọn đồ ăn vặt --}}
            <div id="snack-list">
                @foreach ($snacks as $snack)
                    <div class="snack-item mb-2" data-price="{{ $snack->price }}" data-id="{{ $snack->id }}">
                        <strong>{{ $snack->name }}</strong> - Giá: <span class="price">{{ number_format($snack->price) }}</span>đ
                        <div class="input-group mt-1" style="max-width: 200px;">
                            <button type="button" class="btn btn-sm btn-outline-secondary decrease">-</button>
                            <input type="text" name="snack_qty[{{ $snack->id }}]" class="form-control text-center quantity" value="0" readonly>
                            <button type="button" class="btn btn-sm btn-outline-secondary increase">+</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-3">
                <strong>Tổng tiền snack: <span id="snack-total">0</span>đ</strong>
            </div>
            <!-- End Snack Selection -->

            @if (isset($discount_percent) && $discount_percent > 0)
                <div class="alert alert-success mt-2">
                    🎉 Ưu đãi {{ $discount_percent }}% cho khách hàng đặt vé cuối tuần!
                </div>
                <input type="hidden" name="promotion_id" value="{{ $promotions->id }}">
            @endif

            <div class="form-group mt-3">
                <label for="payment_option">Phương thức thanh toán:</label>
                <select name="payment_id" id="payment_option" class="form-control" required>
                    <option value="">-- Chọn phương thức --</option>
                    @foreach ($payment_options as $id => $label)
                        <option value="{{ $id }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>

                <button type="submit" class="btn btn-success px-4 py-2 mt-3">Xác nhận đặt vé</button>

        </div>

            {{-- Ẩn các thông tin cần gửi --}}
            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
            <input type="hidden" name="room_id" value="{{ $showtime->room_id }}">
            <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">
            <input type="hidden" name="admin_id" value="1">

        </form>
    </div>

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
    <script src="{{ asset('js/snacks.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.seat-checkbox').forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    const label = this.closest('label');
                    if (this.checked) {
                        label.classList.add('selected');
                    } else {
                        label.classList.remove('selected');
                    }
                });
            });
        });
    </script>
</body>

</html>
