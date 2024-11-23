<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->after('user_id'); // Thêm cột product_id
            $table->integer('quantity')->default(1)->after('product_id'); // Thêm cột quantity
        });
    }

    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['product_id']); // Xóa khóa ngoại
            $table->dropColumn(['product_id', 'quantity']); // Xóa cột
        });
    }
};
