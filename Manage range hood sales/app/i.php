<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Services\AddressService; 
use App\Services\VNPayService;
class CheckoutController extends Controller
{
    public function index()
    {
        return view('customer.checkout.checkout');
    }
    
    public function process(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'province' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
            'address_detail' => 'required|string|max:255',
            'payment_method' => 'required|string',
        ]);

        $cart = Cart::where('user_id', Auth::id())->first();

        if (!$cart) {
            return redirect()->back()->with('error', 'Giỏ hàng không tồn tại.');
        }

        $existingOrder = Order::where('cart_id', $cart->id)->first();

        if ($existingOrder) {
            if ($existingOrder->status === 'pending') {
                return redirect()->back()->with('error', 'Giao dịch đã tồn tại và đang chờ thanh toán. Vui lòng kiểm tra lại.');
            } else {
                return redirect()->back()->with('error', 'Giao dịch đã tồn tại hoặc đã được xử lý.');
            }
        }

        // Tạo đơn hàng mới
        $order = new Order();
        $order->user_id = Auth::id();
        $order->cart_id = $cart->id;
        $order->name = $validatedData['name'];
        $order->phone = $validatedData['phone'];
        $order->email = $validatedData['email'];
        $order->province = $validatedData['province'];
        $order->district = $validatedData['district'];
        $order->ward = $validatedData['ward'];
        $order->address_detail = $validatedData['address_detail'];
        $order->total = $cart->total();

        if ($validatedData['payment_method'] === 'vnpay') {
            $order->payment_method = 'vnpay';
            $order->status = 'pending';
            $order->save();

            return $this->processVNPay($request, $order);
        } else {
            $order->payment_method = 'cod';
            $order->status = 'pending';
            $order->save();

            // thêm sp, cập nhật đơn
            $items = json_decode($cart->items, true);
            foreach ($items as $item) {
                $product = Product::find($item['id']);
                if ($product) {
                    $order->products()->attach($product->id, ['quantity' => $item['qty']]);

                    // số lượng trên csdl
                    $product->stock -= $item['qty'];
                    $product->save();
                }
            }
            $cart->delete();
            return $this->success($order->id);
        }
    }
    
    public function success($orderId)
    {
        $order = Order::with('products')->find($orderId);
        
        if (!$order) {
            return redirect()->route('checkout')->with('error', 'Đơn hàng không tồn tại.');
        }
        $wardName = AddressService::getWardName($order->ward);
        $districtName = AddressService::getDistrictName($order->district);
        $provinceName = AddressService::getProvinceName($order->province);
        
        return view('customer.checkout.success', [
            'order' => $order,
            'message' => 'Đơn hàng đã được đặt thành công!',
            'wardName' => $wardName,
            'districtName' => $districtName,
            'provinceName' => $provinceName,
        ]);
    }
    

    public function processVNPay(Request $request, $order = null)
    {
        $cart = Cart::where('user_id', Auth::id())->first();

        if (!$cart) {
            Log::error('Giỏ hàng không tồn tại cho user_id: ' . Auth::id());
            return redirect()->back()->with('error', 'Giỏ hàng không tồn tại.');
        }

        if (!$order) {
            $order = new Order();
            $order->user_id = Auth::id();
            $order->cart_id = $cart->id;
            $order->name = $request->input('name');
            $order->phone = $request->input('phone');
            $order->email = $request->input('email');
            $order->province = $request->input('province');
            $order->district = $request->input('district');
            $order->ward = $request->input('ward');
            $order->address_detail = $request->input('address_detail');
            $order->payment_method = 'vnpay';
            $order->total = $cart->total();
            $order->status = 'pending';
            $order->save();
        }

        $vnpayService = new VNPayService();
        $paymentUrl = $vnpayService->createPaymentUrl($order->id, $order->total);
        Log::info('VNPay Payment URL: ' . $paymentUrl);

        return redirect($paymentUrl);
    }

    public function vnpayReturn(Request $request)
    {
        $vnpData = $request->all();
        $vnpayService = new VNPayService();
        Log::info('VNPay Response Data:', $vnpData);

        $existingOrder = Order::where('vnp_TxnRef', $vnpData['vnp_TxnRef'])->first();

        if ($existingOrder) {
            if ($existingOrder->status == 'pending') {
                return redirect()->route('checkout')->with('error', 'Giao dịch đã tồn tại và đang chờ thanh toán. Vui lòng kiểm tra lại.');
            } else {
                return redirect()->route('checkout')->with('error', 'Giao dịch đã được xử lý.');
            }
        }

        if ($vnpayService->validateResponse($vnpData)) {
            if ($vnpData['vnp_ResponseCode'] == '00') {
                Log::info('VNPay thanh toán thành công với mã: ' . $vnpData['vnp_TxnRef']);

        
                $order = Order::where('id', $vnpData['vnp_TxnRef'])->first();

                if ($order && $order->status != 'paid') {
                    $order->status = 'paid';
                    $order->vnp_TxnRef = $vnpData['vnp_TxnRef'];
                    $order->save();

                    Log::info('Cập nhật trạng thái đơn hàng thành công cho order_id: ' . $order->id);

                 
                    $cart = Cart::where('user_id', Auth::id())->first();
                    if ($cart) {
                        $items = json_decode($cart->items, true);
                        foreach ($items as $item) {
                            $product = Product::find($item['id']);
                            if ($product) {
                                $order->products()->attach($product->id, ['quantity' => $item['qty']]);
                                $product->stock -= $item['qty'];
                                $product->save();
                            }
                        }
                        $cart->delete();
                    }

                    return $this->success($order->id);
                }

            } else {
                Log::warning('VNPay thanh toán không thành công với mã: ' . $vnpData['vnp_ResponseCode']);
                return redirect()->route('checkout')->with('error', 'Thanh toán không thành công. Vui lòng thử lại.');
            }
        } else {
            Log::error('VNPay chữ ký bảo mật không hợp lệ.');
            return redirect()->route('checkout')->with('error', 'Xác thực thanh toán thất bại.');
        }
    }

    public function retryPayment($orderId)
    {
        $order = Order::find($orderId);
        if (!$order || $order->status !== 'pending') {
            return redirect()->route('checkout')->with('error', 'Đơn hàng không tồn tại hoặc không còn trong trạng thái chờ thanh toán.');
        }

        return view('customer.checkout.retry_payment', compact('order'));
    }

    public function retryPaymentProcess(Request $request, $orderId)
    {
        $validatedData = $request->validate([
            'payment_method' => 'required|string|in:vnpay,cod',
        ]);

        $order = Order::find($orderId);
        if (!$order || $order->status !== 'pending') {
            return redirect()->route('checkout')->with('error', 'Đơn hàng không tồn tại hoặc không còn trong trạng thái chờ thanh toán.');
        }

        DB::transaction(function () use ($validatedData, $order) {
            if ($validatedData['payment_method'] === 'vnpay') {
                $order->payment_method = 'vnpay';
                $vnpayService = new VNPayService();
                $paymentUrl = $vnpayService->createPaymentUrl($order->id, $order->total);
                return redirect($paymentUrl);
            }
            $order->payment_method = 'cod';
            $order->status = 'paid';
            $order->cart_id = null;
            $order->save();

            $cart = Cart::where('user_id', Auth::id())->first();
            if ($cart) {
                $items = json_decode($cart->items, true);
                foreach ($items as $item) {
                    $product = Product::find($item['id']);
                    if ($product) {
                        $order->products()->attach($product->id, ['quantity' => $item['qty']]);
                        $product->stock -= $item['qty'];
                        $product->save();
                    }
                }
                $cart->delete();
            }

            return $this->success($order->id);
        });
    }
}