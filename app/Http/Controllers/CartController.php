<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderDetail;
use App\Models\Order;
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
        $buyerId = auth()->id();

        // 檢查購物車中是否已有該產品
        $cartItem = CartItem::where('product_id', $productId)
            ->where('buyer_id', $buyerId)
            ->first();

        if ($cartItem) {
            return redirect()->route('cart');
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
    public function checkout(Request $request)
    {
        $quantities = $request->input('quantities', []);

        // 驗證數據
        foreach ($quantities as $cartItemId => $quantity) {
            CartItem::where('id', $cartItemId)->update(['quantity' => $quantity]);
        }

        // 創建訂單
        $products = auth()->user()->cartItems()->with('product')->get();
        $order = Order::create([
            'buyer_id' => auth()->id(),
            'seller_id' => 1,
            'date' => date('Y-m-d'),
            'score' => 0,
            'comment' => $request->input('comment'),
            'pay' => 1,
            'price' => 100.00,
        ]);

        // 將購物車數據轉移到訂單詳細
        $cartItems = CartItem::where('buyer_id', auth()->id())->get();
        foreach ($cartItems as $cartItem) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
            ]);
        }

        // 清空購物車
        CartItem::where('buyer_id', auth()->id())->delete();

        return redirect()->route('summary', $order->id)
            ->with('success', '訂單已成功提交！');
    }
//    public function checkoutPage()
//    {
//        $cartItems = CartItem::with('product')->where('buyer_id', auth()->id())->get();
//
//        if ($cartItems->isEmpty()) {
//            return redirect()->route('home')->with('warning', '購物車是空的，請先添加商品！');
//        }
//
//        return view('checkout', compact('cartItems'));
//    }


}
