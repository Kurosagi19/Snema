<?php

namespace App\Services;

class VNPayService
{
    protected $vnp_TmnCode;
    protected $vnp_HashSecret;
    protected $vnp_Url;
    protected $vnp_Returnurl;

    public function __construct()
    {
        $this->vnp_TmnCode = config('vnpay.tmn_code');
        $this->vnp_HashSecret = config('vnpay.hash_secret');
        $this->vnp_Url = config('vnpay.url');
        $this->vnp_Returnurl = config('vnpay.return_url');
        $this->vnp_ApiUrl = config('vnpay.api_url');
    }

    public function createPayment($orderId, $amount, $orderInfo, $ipAddr)
    {
        $vnp_TxnRef = $orderId;
        $vnp_Amount = $amount * 100; // VNPay yêu cầu nhân 100
        $vnp_Locale = 'vn';
        $vnp_BankCode = '';
        $vnp_IpAddr = $ipAddr;

        $inputData = [
            'vnp_Version' => '2.1.0',
            'vnp_TmnCode' => $this->vnp_TmnCode,
            'vnp_Amount' => $vnp_Amount,
            'vnp_Command' => 'pay',
            'vnp_CreateDate' => date('YmdHis'),
            'vnp_CurrCode' => 'VND',
            'vnp_IpAddr' => $vnp_IpAddr,
            'vnp_Locale' => $vnp_Locale,
            'vnp_OrderInfo' => $orderInfo,
            'vnp_OrderType' => 'other',
            'vnp_ReturnUrl' => $this->vnp_Returnurl,
            'vnp_TxnRef' => $vnp_TxnRef,
        ];

        if (!empty($vnp_BankCode)) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = '';
        $i = 0;
        $hashdata = '';

        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . '=' . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . '=' . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . '=' . urlencode($value) . '&';
        }

        $vnp_Url = $this->vnp_Url . '?' . $query;
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $this->vnp_HashSecret);
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

        return $vnp_Url;
    }

    public function validateResponse($inputData)
    {
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);

        ksort($inputData);
        $hashData = '';
        $i = 0;

        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData .= '&' . urlencode($key) . '=' . urlencode($value);
            } else {
                $hashData .= urlencode($key) . '=' . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $this->vnp_HashSecret);

        if ($secureHash == $vnp_SecureHash) {
            if ($inputData['vnp_ResponseCode'] == '00') {
                return [
                    'success' => true,
                    'message' => 'Thanh toán thành công',
                    'data' => $inputData
                ];
            }
            return [
                'success' => false,
                'message' => 'Thanh toán thất bại',
                'data' => $inputData
            ];
        }

        return [
            'success' => false,
            'message' => 'Chữ ký không hợp lệ',
            'data' => null
        ];
    }
}
