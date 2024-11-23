<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên sản phẩm
            $table->text('description'); // Mô tả sản phẩm
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->decimal('price'); // Giá sản phẩm
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Liên kết với danh mục
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        $table->dropColumn('image');
    }
};
