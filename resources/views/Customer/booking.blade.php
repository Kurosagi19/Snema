<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt vé - Snema</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
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

    @php
        $seats_by_row = $seats->groupBy(fn($seat) => substr($seat->seat_code, 0, 1));
    @endphp

    <div class="container mt-4">
        <div class="row">
            {{-- Cột trái: Thông tin phim --}}
            <div class="col-md-4 mb-4">
                <h5>Đặt vé: {{ $movie->title }}</h5>

                <img src="{{ asset('storage/' . $movie->poster) }}" class="img-fluid rounded mb-3" alt="Poster">

                <p><strong>Suất chiếu:</strong> lúc {{ \Carbon\Carbon::parse($showtime->start_time)->format('H:i:s') }}</p>
                <p><strong>Ngày chiếu:</strong> {{ \Carbon\Carbon::parse($showtime->date)->format('d/m/Y') }}</p>
            </div>

            {{-- Cột phải: Sơ đồ ghế --}}
            <div class="col-md-8">
                {{-- Dán sơ đồ ghế bạn đã làm ở đây --}}
                <div class="text-center mb-3">
                    <div class="screen bg-dark text-white py-2 rounded">MÀN HÌNH</div>
                </div>

                <form method="post" action="{{ route('bookings.store') }}">
                    @csrf

                    {{-- Sơ đồ ghế dạng hàng ngang --}}
                    <div class="d-flex flex-column gap-2 align-items-center">
                        @foreach ($seats_by_row as $row => $row_seats)
                            <div class="d-flex gap-2 justify-content-center align-items-center">
                                <span class="fw-bold me-2">{{ $row }}</span>

                                @foreach ($row_seats->sortBy('seat_number') as $seat)
                                    @php
                                        $is_booked = in_array($seat->id, $booked_seat_ids ?? []);
                                        $seat_type = $seat->seat_type === 'vip' ? 'vip' : 'normal';
                                    @endphp

                                    <label class="seat btn {{ $seat_type === 'vip' ? 'btn-warning' : 'btn-outline-secondary' }} {{ $is_booked ? 'disabled' : '' }}">
                                        @if(!$is_booked)
                                            <input type="checkbox" name="seat_ids[]" value="{{ $seat->id }}" class="d-none seat-checkbox">
                                        @endif
                                        {{ substr($seat->seat_code, 1) }}
                                    </label>
                                @endforeach
                            </div>
                        @endforeach

                        <div class="payment_options">
                            <select name="payment_id" id="payment_id">
                            @foreach($payment_options as $payment_option)
                                    <option value="{{ $payment_option->id }}">{{ $payment_option->option }}</option>
                            @endforeach
                            </select>
                        </div>

                            <div class="promotions">
                                <select name="promotion_id" id="promotion_id">
                                    <option value="">-- Voucher giảm giá--</option>
                                    @foreach($promotions as $promotion)
                                        <option value="{{ $promotion->id }}">

                                            @if($promotion->promotion_type == 1)
                                                Giảm 25%
                                            @elseif($promotion->promotion_type == 2)
                                                Giảm 50%
                                            @endif

                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        <button type="submit" class="btn btn-success px-4 py-2">Xác nhận đặt vé</button>

                            {{-- Ẩn các thông tin cần gửi --}}
                            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                            <input type="hidden" name="room_id" value="{{ $showtime->room_id }}">
                            <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">

                            {{-- Demo --}}
                            <input type="hidden" name="customer_id" value="1">
                            <input type="hidden" name="admin_id" value="1">
                    </div>
                </form>

            </div>
        </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.seat-checkbox');

            checkboxes.forEach(cb => {
                cb.addEventListener('change', function () {
                    const label = this.closest('label');
                    label.classList.toggle('btn-success', this.checked);
                    label.classList.toggle('btn-outline-secondary', !this.checked);
                });
            });
        });
    </script>

</body>

</html>
