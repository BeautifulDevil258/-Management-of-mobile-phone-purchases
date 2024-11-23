<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;

class VNPayService
{
    private $vnpUrl;
    private $vnpApiUrl;
    private $merchantId;
    private $secretKey;

    public function __construct()
    {
        // Đọc thông tin từ file cấu hình
        $this->vnpUrl = Config::get('https://sandbox.vnpayment.vn/paymentv2/vpcpay.html');
        $this->vnpApiUrl = Config::get('http://localhost:8000/checkout/vnpay/return');
        $this->merchantId = Config::get('8JAHP2J1');
        $this->secretKey = Config::get('M6C9BSSSSUHYAP1PIOZ3W15NXIMPIA2C');
    }

    public function createPaymentUrl($orderId, $amount)
    {
        $vnp_TxnRef = $orderId; // Mã giao dịch
        $vnp_Amount = $amount * 100; // Số tiền (đơn vị: đồng)
        $vnp_CurrCode = 'VND'; // Đơn vị tiền tệ
        $vnp_OrderInfo = 'Thanh toán cho đơn hàng #' . $orderId; // Thông tin đơn hàng
        $vnp_OrderType = 'billpayment'; // Loại giao dịch
        $vnp_Locale = 'vn'; // Ngôn ngữ
        $vnp_ReturnUrl = route('vnpay.return'); // Đường dẫn trả về sau khi thanh toán

        $vnp_Params = [
            "vnp_Version" => "2.0.0",
            "vnp_Command" => "pay",
            "vnp_TmnCode" => $this->merchantId,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_Amount" => $vnp_Amount,
            "vnp_CurrCode" => $vnp_CurrCode,
            "vnp_IpAddr" => request()->ip(),
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_Locale" => $vnp_Locale,
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
        ];

        // Tạo chuỗi mã hóa
        ksort($vnp_Params);
        $query = http_build_query($vnp_Params);
        $vnp_SecureHash = hash_hmac('sha256', $query, $this->secretKey);
        $vnp_Params['vnp_SecureHash'] = $vnp_SecureHash;

        // Tạo URL thanh toán
        $paymentUrl = $this->vnpUrl . "?" . http_build_query($vnp_Params);

        return $paymentUrl;
    }

    public function validateResponse($data)
    {
        $secureHash = $data['vnp_SecureHash'];
        unset($data['vnp_SecureHash']);
        ksort($data);
        $query = http_build_query($data);
        $checkSum = hash_hmac('sha256', $query, $this->secretKey);
        
        return $checkSum === $secureHash;
    }
}
