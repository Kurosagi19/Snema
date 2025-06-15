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
        /* Ô ghế */
        .seat-block {
            display: inline-flex;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
            border-radius: 6px;
            border: 1px solid #666;
            cursor: pointer;
            transition: 0.2s ease;
            user-select: none;
            margin: 2px;
        }

        /* Các loại ghế */
        .seat-normal { background-color: #e0e0e0; }      /* Ghế thường */
        .seat-vip    { background-color: #ffe066; }      /* Ghế VIP */
        .seat-booked {
            background-color: #999 !important;
            cursor: not-allowed;
            color: white;
            pointer-events: none;
        }

        /* Khi checkbox được chọn */
        .seat-input:checked + .seat-block {
            background-color: #28a745 !important;
            color: white;
            border-color: #1c7c36;
        }

        /* Huy hiệu chú thích */
        .legend-box {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            border: 1px solid #666;
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

        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Sơ đồ ghế</h2>

            @php
                $groupedSeats = $seats->groupBy(function($seat) {
                    return substr($seat->seat_code, 0, 1); // Lấy ký tự hàng: A, B, C...
                });
            @endphp

            <div class="space-y-2" id="seat-map">
                @foreach ($groupedSeats as $rowLabel => $seatsInRow)
                    <div class="flex items-center gap-2">
                        <div class="w-6 font-semibold">{{ $rowLabel }}</div>
                        @foreach ($seatsInRow->sortBy('seat_number') as $seat)
                            @php
                                $isBooked = in_array($seat->id, $bookedSeatIds ?? []);
                                $seatTypeClass = $seat->seat_type === 'vip' ? 'seat-vip' : 'seat-normal';
                                $disabled = $isBooked ? 'disabled' : '';
                            @endphp

                            <input type="checkbox"
                                   name="seat_ids[]"
                                   id="seat_{{ $seat->id }}"
                                   value="{{ $seat->id }}"
                                   class="seat-input hidden"
                                {{ $disabled }}>

                            <label for="seat_{{ $seat->id }}"
                                   class="seat-block {{ $seatTypeClass }} {{ $isBooked ? 'seat-booked' : '' }}">
                                {{ substr($seat->seat_code, 1) }}
                            </label>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                <strong>Ghế đã chọn:</strong>
                <span id="selected-seats" class="text-blue-600 text-sm"></span>
            </div>

            <div class="flex items-center gap-4 mt-6 text-sm">
                <div class="flex items-center gap-1"><div class="legend-box bg-gray-300"></div> Ghế thường</div>
                <div class="flex items-center gap-1"><div class="legend-box bg-yellow-400"></div> Ghế VIP</div>
                <div class="flex items-center gap-1"><div class="legend-box bg-gray-500"></div> Đã đặt</div>
                <div class="flex items-center gap-1"><div class="legend-box bg-green-500"></div> Đang chọn</div>
            </div>
        </div>


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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.seat-input');
            const selectedSeatsDisplay = document.getElementById('selected-seats');

            function updateSelectedSeats() {
                const selected = Array.from(checkboxes)
                    .filter(cb => cb.checked)
                    .map(cb => cb.nextElementSibling.innerText.trim()); // lấy mã ghế từ label
                selectedSeatsDisplay.textContent = selected.join(', ');
            }

            checkboxes.forEach(cb => {
                cb.addEventListener('change', updateSelectedSeats);
            });

            updateSelectedSeats(); // load sẵn nếu có giá trị
        });
    </script>

</body>

</html>
