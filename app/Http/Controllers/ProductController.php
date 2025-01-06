<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
    }
}
