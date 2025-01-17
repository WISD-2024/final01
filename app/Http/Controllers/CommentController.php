<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $productId)
    {
        // 驗證請求資料
        $request->validate([
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);


        // 新增評論到資料庫
        Comment::create([
            'product_id' => $productId,
            'buyer_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);

        // 重新導向回商品頁面，並顯示成功訊息
        return redirect()->route('show', ['id' => $productId])
            ->with('success', '評論已成功新增！');
    }

}
