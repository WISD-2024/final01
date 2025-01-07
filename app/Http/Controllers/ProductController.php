<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id); // 找到商品
        $comments = Comment::where('product_id', $id)->get(); // 取得該商品的評論

        return view('show', [
            'products' => $product,
            'comments' => $comments,
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('searching'); // 獲取搜尋關鍵字
        $products = Product::where('name', 'LIKE', '%' . $query . '%')->get(); // 搜尋商品名稱

        return view('home', compact('products')); // 返回搜尋結果頁面
    }

    public function showCategory($categoryId)
    {
        $products = Product::where('category_id', $categoryId)->get();

        return view('home', compact('products'));
    }
}
