<h1>Thanh toán thành công</h1>
<p>Mã giao dịch: {{ $data['vnp_TransactionNo'] }}</p>
<p>Số tiền: {{ number_format($data['vnp_Amount']/100) }} VND</p>
<p>Nội dung: {{ $data['vnp_OrderInfo'] }}</p>
