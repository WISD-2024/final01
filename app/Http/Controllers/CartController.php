<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    public function index()
    {
        $cartItems = auth()->user()->cartItems()->with('product')->get(); // 加上 with('product') 來取得產品詳細資訊
        return view('cart', compact('cartItems'));
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            // Redirect to login page
            return redirect()->route('login')->with('message', '請先登入以加入購物車');
        }
        // 驗證傳入的 product_id
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        // 獲取產品 ID
        $productId = $request->input('product_id');

        // 獲取目前登入使用者
        $buyerId = auth()->id(); // Assuming you are using Laravel's built-in authentication

        // 檢查購物車中是否已有該產品
        $cartItem = CartItem::where('product_id', $productId)
            ->where('buyer_id', $buyerId)
            ->first();

        if ($cartItem) {
            // 如果已存在，增加數量
            $cartItem->quantity += 1;
        } else {
            // 否則新增新的購物車項目
            $cartItem = new CartItem([
                'product_id' => $productId,
                'buyer_id' => $buyerId,
                'quantity' => 1, // 預設數量為 1
            ]);
        }

        $cartItem->save(); // 儲存購物車項目

        return back()->with('message', '已成功加入購物車').redirect()->route('cart'); // 或許重新導向到購物車頁面
    }




}
