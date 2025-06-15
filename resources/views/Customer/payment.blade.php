<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán - Movie Ticket</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <!-- Header (giống trang chủ) -->
    <header>
        <!-- ... -->
    </header>

    <main class="payment-container">
        <div class="payment-steps">
            <div class="step completed">1. Chọn ghế</div>
            <div class="step active">2. Thanh toán</div>
            <div class="step">3. Hoàn tất</div>
        </div>

        <div class="payment-content">
            <div class="booking-summary">
                <h2>Thông tin đặt vé</h2>
                <div class="summary-item">
                    <h3>Phim:</h3>
                    <p>Avengers: Endgame</p>
                </div>
                <div class="summary-item">
                    <h3>Rạp:</h3>
                    <p>CGV Hùng Vương Plaza - Phòng 3</p>
                </div>
                <div class="summary-item">
                    <h3>Suất chiếu:</h3>
                    <p>14:00 - 17/11/2023</p>
                </div>
                <div class="summary-item">
                    <h3>Ghế:</h3>
                    <p>A3, A4, A5</p>
                </div>
                <div class="summary-item">
                    <h3>Đồ ăn/Thức uống:</h3>
                    <p>Bắp rang bơ x1, Coca Cola x2</p>
                </div>
                <div class="summary-item total">
                    <h3>Tổng cộng:</h3>
                    <p>270,000 đ</p>
                </div>
            </div>

            <div class="payment-methods">
                <h2>Phương thức thanh toán</h2>
                <form id="paymentForm">
                    <div class="payment-option">
                        <input type="radio" id="momo" name="payment" value="momo" checked>
                        <label for="momo">
                            <img src="images/momo.png" alt="Momo">
                            <span>Ví điện tử Momo</span>
                        </label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" id="zalopay" name="payment" value="zalopay">
                        <label for="zalopay">
                            <img src="images/zalopay.png" alt="ZaloPay">
                            <span>ZaloPay</span>
                        </label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" id="bank" name="payment" value="bank">
                        <label for="bank">
                            <img src="images/bank.png" alt="Bank">
                            <span>Thẻ ngân hàng</span>
                        </label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" id="cash" name="payment" value="cash">
                        <label for="cash">
                            <img src="images/cash.png" alt="Cash">
                            <span>Thanh toán tại quầy</span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="customerName">Họ tên:</label>
                        <input type="text" id="customerName" required>
                    </div>
                    <div class="form-group">
                        <label for="customerEmail">Email:</label>
                        <input type="email" id="customerEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="customerPhone">Số điện thoại:</label>
                        <input type="tel" id="customerPhone" required>
                    </div>

                    <button type="submit" class="payment-btn">Thanh toán</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer (giống trang chủ) -->
    <footer>
        <!-- ... -->
    </footer>

    <script src="js/booking.js"></script>
    <script>
        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Xử lý thanh toán
            alert('Thanh toán thành công! Vé sẽ được gửi qua email của bạn.');
            window.location.href = 'booking-success.html';
        });
    </script>
</body>

</html>