<?php

namespace App\Http\Controllers;

use App\Models\Product;   // Nhập model Product
use App\Models\Category;  // Nhập model Category
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    
    public function manageProducts()
    {
        $products = Product::all(); // Lấy tất cả sản phẩm
        return view('admin.products.index', compact('products')); // Truyền dữ liệu đến view
    }
    
    public function manageCategories()
    {
        $categories = Category::all(); // Lấy tất cả danh mục
        return view('admin.categories.index', compact('categories')); // Truyền dữ liệu đến view
    }
}
