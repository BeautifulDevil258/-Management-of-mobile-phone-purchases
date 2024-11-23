<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // nếu có tính năng đăng nhập
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('payment_method');
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Khóa ngoại nếu có
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
