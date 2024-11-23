<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Kiểm tra xem có tham số tìm kiếm không
        $query = $request->input('query');

        // Thực hiện truy vấn tìm kiếm nếu có từ khóa
        if ($query) {
            $products = Product::where('name', 'LIKE', '%' . $query . '%')->paginate(12);
        } else {
            $products = Product::paginate(12); // Hiển thị 12 sản phẩm mỗi trang nếu không có từ khóa tìm kiếm
        }

        return view('product.index', compact('products', 'query')); // Truyền cả query để hiển thị trên thanh tìm kiếm
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    
    // Thực hiện truy vấn tìm kiếm trong cơ sở dữ liệu
    $products = Product::where('name', 'LIKE', '%' . $query . '%')->paginate(12);

    // Thông báo tìm kiếm
    $message = count($products) > 0 ? "Các sản phẩm cho tìm kiếm: \"$query\"" : "Không tìm thấy sản phẩm nào cho: \"$query\"";

    return view('product.index', compact('products', 'query', 'message'));
}
}
