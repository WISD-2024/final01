<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Library;
class LibraryController extends Controller
{
    public function index()
    {
        $library = Library::where('buyer_id', auth()->id())->with('product')->get();

        if($library->isNotEmpty()) { // 使用 `isNotEmpty()` 方法來檢查集合是否不為空
            $products = Product::all(); // 取出所有產品
            return view('library', compact('products'));
        } else {
            // 如果沒有收藏，顯示適當訊息或導向其他頁面
            return view('library', ['message' => '目前沒有收藏遊戲。']);
        }



    }
}
