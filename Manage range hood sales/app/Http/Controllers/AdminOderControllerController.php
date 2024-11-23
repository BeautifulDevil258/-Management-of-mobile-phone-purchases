<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOderControllerController extends Controller
{
     // Hiển thị danh sách đơn hàng
     public function index()
     {
         $orders = Order::with('orderItems.product')
             ->paginate(8);
 
         return view('admin.order.index', compact('orders'));
     }
     public function update(Request $request, $id)
     {
         $request->validate([
             'status' => 'required|string|in:pending,completed,canceled,in_delivery',
         ]);
     
         $order = Order::findOrFail($id);
         $order->status = $request->input('status');
         $order->save();
     
         return response()->json(['success' => true]);
     }
     
     // Hiển thị chi tiết đơn hàng
     public function show($id)
     {
         $order = Order::with('orderItems.product')->findOrFail($id);
         return view('admin.order.show', compact('order'));
     }

 }
 
