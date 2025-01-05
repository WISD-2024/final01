<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Sysadmin;
use App\Models\News;
use App\Models\Product;

class AdminController extends Controller
{
    // 顯示登入頁面
    public function showLoginForm()
    {
        return view('adminlogin'); // 返回登入頁面的視圖
    }

    // 登入處理
    public function login(Request $request)
    {
        // 驗證輸入資料
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 查詢用戶
        $admin = Sysadmin::where('email', $request->input('email'))->first();

        if ($admin && Hash::check($request->input('password'), $admin->password)) {
            // 登入成功，跳轉到管理員主頁
            return redirect()->route('admin.home');
        } else {
            // 驗證失敗，回傳錯誤訊息
            return redirect()->back()->withErrors(['email' => '帳號或密碼錯誤']);
        }
    }

    // 管理員主頁
    public function home()
    {
        return view('adminhome'); // 顯示管理員首頁
    }

    // 登出
    public function logout()
    {
        return redirect()->route('admin.login'); // 跳轉到登入頁面
    }

    // 新聞
    public function news()
    {
        // 從資料庫抓取所有新聞
        $newsItems = News::all();

        // 傳遞資料到視圖
        return view('adminnews', compact('newsItems'));
    }

    public function newsdestroy($id)
    {
        // 查找資料並刪除
        $news = News::find($id);

        if ($news) {
            $news->delete();
            return response()->json(['message' => '資料已刪除'], 200);
        } else {
            return response()->json(['message' => '資料不存在'], 404);
        }
    }

    public function newsedit($id)
    {
        $news = News::findOrFail($id); // 從資料庫中查詢新聞
        return view('adminedit', compact('news'));
    }

    public function newsupdate(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->update($request->all()); // 保存更新
        return redirect()->route('admin.news')->with('success', '新聞已成功更新');
    }

    //商品
    public function product()
    {
        // 從資料庫抓取所有新聞
        $productItems = Product::all();

        // 傳遞資料到視圖
        return view('adminproduct', compact('productItems'));
    }

    public function productedit($id)
    {
        // 找到對應的產品
        $product = Product::findOrFail($id);

        // 返回編輯頁面，並傳遞產品資料
        return view('adminpedit', compact('product'));
    }

    public function productupdate(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'price' => $request->price,
            'inventory' => $request->inventory,
            'detail' => $request->detail,
            // 其他需要更新的欄位
        ]);
        return redirect()->route('admin.product')->with('success', '商品已成功更新');
    }

    public function productdestroy($id)
    {
        // 查找資料並刪除
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return response()->json(['message' => '資料已刪除'], 200);
        } else {
            return response()->json(['message' => '資料不存在'], 404);
        }
    }

    public function newscreate()
    {
        return view('admincreate'); // 顯示新增新聞的表單
    }

    public function newsstore(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'date' => 'required|date',
            'name' => 'required|string|max:100',
        ]);

        // 創建新聞資料
        News::create($validatedData);

        // 成功後返回新聞列表
        return redirect()->route('admin.news')->with('success', '新聞已成功新增');
    }

    public function productcreate()
    {
        return view('adminpcreate'); // 顯示新增新聞的表單
    }

    public function productstore(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|integer',
            'seller_id' => 'required|integer',
            'name' => 'required|string|max:100',
            'pictures' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'inventory' => 'required|integer|min:0',
            'detail' => 'required|string',
        ]);

        // 創建商品資料
        Product::create($validatedData);

        // 成功後返回商品列表
        return redirect()->route('admin.product')->with('success', '商品已成功新增');
    }


}
