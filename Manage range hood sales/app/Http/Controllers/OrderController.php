<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $selectedItems = $request->input('selected_items', []);
        Log::info('Selected Items: ', $selectedItems);

        $cartItems = empty($selectedItems)
            ? Cart::where('user_id', auth()->id())->with('product')->get()
            : Cart::whereIn('id', $selectedItems)->with('product')->get();

        Log::info('Cart Items: ', $cartItems->toArray());

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
        Log::info('Total Amount: ', [$total]);

        return view('orders.create', compact('cartItems', 'total'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'payment_method' => 'required|string',
    ]);

    $selectedItems = $request->input('selected_items', []);
    Log::info('Selected Items for Order: ', $selectedItems);

    if (empty($selectedItems)) {
        return redirect()->back()->withErrors(['selected_items' => 'Chưa chọn sản phẩm nào.']);
    }

    $cartItems = Cart::whereIn('id', $selectedItems)->with('product')->get();
    if ($cartItems->isEmpty()) {
        return redirect()->back()->withErrors(['selected_items' => 'Chưa chọn sản phẩm nào.']);
    }

    $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
    Log::info('Total Amount for Order: ', [$total]);

    // Tạo mã đơn hàng ngẫu nhiên
    $vnp_TxnRef = uniqid(); // Tạo mã ngẫu nhiên

    $order = Order::create([
        'user_id' => auth()->id(),
        'name' => $validatedData['name'],
        'address' => $validatedData['address'],
        'phone' => $validatedData['phone'],
        'total_amount' => $total,
        'payment_method' => $validatedData['payment_method'],
        'order_id' => $vnp_TxnRef, // Sử dụng mã đơn hàng ngẫu nhiên
    ]);

    foreach ($cartItems as $item) {
        Log::info('Order Item: ', [
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->product->price,
        ]);

        $order->orderItems()->create([
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->product->price,
        ]);

        $item->product->decrement('quantity', $item->quantity);
    }

    if ($validatedData['payment_method'] === 'cash_on_delivery') {
        Log::info('Order Created: ', [$order]);
        Cart::where('user_id', auth()->id())->whereIn('id', $selectedItems)->delete();
        return redirect()->route('home')->with('success', 'Đơn hàng của bạn sẽ được giao.');
    } elseif ($validatedData['payment_method'] === 'vnpay') {
       // Tạo mã đơn hàng ngẫu nhiên
    $vnp_TxnRef = uniqid();

    $total = $order->total_amount; // Giá trị ví dụ, bạn có thể thay bằng tính toán tổng tiền giỏ hàng
    
    // Thông tin VNPay
    $vnp_TmnCode = "VINO001G"; // Mã website
    $vnp_HashSecret = "OEU3FD73AUNCOLCO0D56KHU5SLPW8JUK"; // Chuỗi bí mật
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = route('home'); // URL trả về sau khi thanh toán

    $vnp_OrderInfo = "Thanh toán đơn hàng #" . $vnp_TxnRef;
    $vnp_OrderType = "billpayment";
    $vnp_Amount = $total * 100; // VNPay yêu cầu đơn vị VNĐ là x100
    $vnp_Locale = "vn";
    $vnp_IpAddr = $request->ip();

    $inputData = [
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    ];

    // Lọc các giá trị null hoặc rỗng trước khi sắp xếp
    $inputData = array_filter($inputData);

    // Sắp xếp tham số theo thứ tự chữ cái
    ksort($inputData);

    // Tạo chuỗi hash
    $hashData = urldecode(http_build_query($inputData));
    Log::info('Data for VNPay Hash: ' . $hashData); // Log chuỗi để kiểm tra

    // Tạo chữ ký
    $vnpSecureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

    // Tạo URL với chữ ký
    $vnp_Url = $vnp_Url . "?" . http_build_query($inputData) . '&vnp_SecureHash=' . $vnpSecureHash;

    // Log thông tin URL để kiểm tra
    Log::info('VNPay URL: ' . $vnp_Url);

    // Chuyển hướng tới VNPay
    return redirect()->to($vnp_Url);
}
}

    // Xử lý sau khi VNPay trả về
    public function vnpayReturn(Request $request)
    {
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        $vnp_TxnRef = $request->input('vnp_TxnRef');
        $vnp_Amount = $request->input('vnp_Amount') / 100;

        // Lấy đơn hàng
        $order = Order::find($vnp_TxnRef);

        // Log để kiểm tra các giá trị trả về
        Log::info('VNPay Response: ', $request->all());

        if ($vnp_ResponseCode == '00') {
            // Thanh toán thành công
            $order->update(['status' => 'paid']);
            return redirect()->route('home')->with('success', 'Thanh toán thành công!');
        } else {
            // Thanh toán thất bại
            Log::error('VNPay Error: ', ['ResponseCode' => $vnp_ResponseCode]);
            return redirect()->route('home')->with('error', 'Có lỗi xảy ra trong quá trình xử lý. Vui lòng liên hệ 1900 55 55 77 để được hỗ trợ.');
        }
    }

    public function index()
    {
        // Lấy danh sách đơn hàng của người dùng hiện tại
        $userId = auth()->id();

        // Kiểm tra nếu người dùng đã đăng nhập
        if (!$userId) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem đơn hàng.');
        }

        $orders = Order::with('orderItems.product')
            ->where('user_id', $userId)
            ->paginate(10); // Phân trang 10 đơn hàng mỗi trang

        return view('orders.index', compact('orders'));
    }
    public function show($id)
{
    // Lấy đơn hàng theo ID kèm theo các sản phẩm trong đơn hàng
    $order = Order::with('orderItems.product')->findOrFail($id);

    // Kiểm tra xem người dùng có quyền xem đơn hàng này không
    if ($order->user_id !== auth()->id()) {
        return redirect()->route('orders.index')->with('error', 'Bạn không có quyền xem đơn hàng này.');
    }

    // Log chi tiết đơn hàng để kiểm tra
    Log::info('Chi tiết đơn hàng: ', $order->toArray());

    // Trả về view hiển thị chi tiết đơn hàng
    return view('orders.show', compact('order'));
}
public function cancel($id)
    {
        // Tìm đơn hàng theo ID
        $order = Order::findOrFail($id);

        // Kiểm tra trạng thái đơn hàng
        if ($order->status === 'pending') {
            // Cập nhật trạng thái đơn hàng thành 'canceled'
            $order->status = 'canceled';
            $order->save();

            // Chuyển hướng về trang chi tiết đơn hàng với thông báo thành công
            return redirect()->route('orders.show', $order->id)
                             ->with('success', 'Đơn hàng đã được hủy thành công.');
        }

        // Nếu không thể hủy, chuyển hướng về trang chi tiết đơn hàng với thông báo lỗi
        return redirect()->route('orders.show', $order->id)
                         ->with('error', 'Không thể hủy đơn hàng trong trạng thái hiện tại.');
    }
}
