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

        <label>Chọn ghế:</label>
        <div class="max-w-3xl mx-auto p-4 bg-white rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Chọn ghế</h2>

            @php
                // Nhóm ghế theo hàng (ký tự đầu tiên của seat_code)
                $groupedSeats = $seats->groupBy(function($seat) {
                    return substr($seat->seat_code, 0, 1); // A, B, C...
                });
            @endphp

            <div id="seat-map" class="space-y-2">
                @foreach ($groupedSeats as $rowLabel => $seatsInRow)
                    <div class="flex items-center space-x-2">
                        <div class="w-6 font-semibold">{{ $rowLabel }}</div>
                        @foreach ($seatsInRow->sortBy('seat_number') as $seat)
                            @php
                                $isBooked = in_array($seat->id, $bookedSeatIds ?? []);
                                $typeClass = $seat->seat_type === 'vip' ? 'bg-yellow-400' : 'bg-gray-300';
                                $statusClass = $isBooked ? 'bg-gray-500 cursor-not-allowed opacity-60' : $typeClass;
                            @endphp

                            <label class="relative w-10 h-10 flex items-center justify-center rounded-md text-sm font-bold
                                  border border-gray-500 hover:ring-2 transition
                                  {{ $statusClass }}">
                                @if (!$isBooked)
                                    <input type="checkbox" name="seat_ids[]" value="{{ $seat->id }}"
                                           class="absolute inset-0 opacity-0 cursor-pointer seat-checkbox">
                                @endif
                                {{ substr($seat->seat_code, 1) }}
                            </label>
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                <h4 class="text-sm font-medium">Ghế đã chọn:</h4>
                <p id="selected-seats" class="text-blue-600 text-sm"></p>
            </div>

            <div class="flex items-center gap-4 mt-6 text-sm">
                <div class="flex items-center gap-1"><div class="w-4 h-4 bg-gray-300 rounded"></div> Ghế thường</div>
                <div class="flex items-center gap-1"><div class="w-4 h-4 bg-yellow-400 rounded"></div> Ghế VIP</div>
                <div class="flex items-center gap-1"><div class="w-4 h-4 bg-gray-500 rounded"></div> Đã đặt</div>
                <div class="flex items-center gap-1"><div class="w-4 h-4 bg-green-500 rounded"></div> Đang chọn</div>
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

    <script src="{{ asset('js/booking.js') }}" ></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.seat-checkbox');
            const selectedSeatsDisplay = document.getElementById('selected-seats');

            checkboxes.forEach(cb => {
                cb.addEventListener('change', function () {
                    const label = this.parentElement;

                    if (this.checked) {
                        label.classList.add('bg-green-500');
                    } else {
                        label.classList.remove('bg-green-500');
                    }

                    const selected = Array.from(checkboxes)
                        .filter(cb => cb.checked)
                        .map(cb => cb.closest('label').innerText.trim());

                    selectedSeatsDisplay.innerText = selected.join(', ');
                });
            });
        });
    </script>
</body>

</html>
