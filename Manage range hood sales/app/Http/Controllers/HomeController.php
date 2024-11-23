<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
            $categories = Category::all(); // Lấy tất cả các danh mục từ cơ sở dữ liệu
            $products = Product::paginate(12); // Lấy danh sách sản phẩm
            return view('home', compact('categories', 'products')); // Truyền biến vào view
    }
}
