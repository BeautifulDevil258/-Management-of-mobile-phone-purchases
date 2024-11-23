<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', ['products' => $products]);
    }

    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.create', compact('categories', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);
        $validated['image'] = $this->handleImageUpload($request);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $this->validateRequest($request);
        $validated['image'] = $this->handleImageUpload($request, $product->image);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            \Storage::delete('public/' . $product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    private function handleImageUpload(Request $request, $existingImage = null)
    {
        if ($request->hasFile('image')) {
            if ($existingImage) {
                \Storage::delete('public/' . $existingImage);
            }
            return $request->file('image')->store('images', 'public');
        }
        return $existingImage;
    }
    public function uploadImage(Request $request)
{
    if ($request->hasFile('upload')) {
        $file = $request->file('upload');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('images', $filename, 'public');

        $url = asset('storage/' . $path);
        return response()->json(['url' => $url]);
    }

    return response()->json(['error' => 'Image upload failed.']);
}
}
