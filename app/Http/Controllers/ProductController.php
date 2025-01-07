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
        // 從資料庫查詢指定商品
        $products = Product::findOrFail($id);

        // 傳遞商品數據到視圖
        return view('show', compact('products'));

        $product = Product::with('comments.user')->findOrFail($id);
        return view('product.show', ['products' => $product]);
    }

    public function search(Request $request)
    {
        $query = $request->input('searching'); // 獲取搜尋關鍵字
        $products = Product::where('name', 'LIKE', '%' . $query . '%')->get(); // 搜尋商品名稱

        return view('home', compact('products')); // 返回搜尋結果頁面
    }
}
