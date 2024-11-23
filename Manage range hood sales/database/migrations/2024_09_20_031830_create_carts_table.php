<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(); // Nếu bạn có tính năng đăng nhập
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
    public function add(Request $request, $productId)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);
    $cart = Cart::updateOrCreate(
        [
            'product_id' => $productId,
            'user_id' => auth()->id(), // nếu có tính năng đăng nhập
        ],
        [
            'quantity' => $request->quantity,
        ]
    );

    return redirect()->route('cart.show')->with('success', 'Product added to cart successfully!');
}
};
