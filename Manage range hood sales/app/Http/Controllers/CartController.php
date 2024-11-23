<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Thêm sản phẩm vào giỏ hàng
    public function add(Request $request, $productId)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!auth()->check()) {
            // Hiển thị thông báo và chuyển hướng đến trang đăng nhập
            return redirect()->route('login')->with('warning', 'Bạn cần đăng nhập trước khi thêm sản phẩm vào giỏ hàng.')
                             ->with('redirect_url', url()->previous()); // Chuyển về trang trước sau khi đăng nhập
        }

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Kiểm tra xem sản phẩm có tồn tại không
        $product = Product::findOrFail($productId);

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $cartItem = Cart::where('product_id', $productId)
                        ->where('user_id', auth()->id())
                        ->first();

        if ($cartItem) {
            // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng mới
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, tạo mới
            Cart::create([
                'product_id' => $productId,
                'user_id' => auth()->id(),
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart.show')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }

    // Hiển thị giỏ hàng
    public function show()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart.show', compact('cartItems', 'total'));
    }

    // Update cart item quantity
    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);

        if ($request->input('quantity') == 0) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
        }

        $cartItem->quantity = $request->input('quantity');
        $cartItem->save();

        return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật thành công!');
    }

    // Remove item from cart
    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng thành công!');
    }
}
