<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Định nghĩa các thuộc tính có thể được gán hàng loạt
    protected $fillable = ['name'];

    // Hoặc
    // Định nghĩa các thuộc tính không thể được gán hàng loạt
    // protected $guarded = []; // Tất cả các thuộc tính đều có thể gán hàng loạt
    public function products()
{
    return $this->hasMany(Product::class);
}
}

