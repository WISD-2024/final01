<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Sysadmin;
use App\Models\News;

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

    public function destroy($id)
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

    public function edit($id)
    {
        $news = News::findOrFail($id); // 從資料庫中查詢新聞
        return view('adminedit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->update($request->all()); // 保存更新
        return redirect()->route('admin.news')->with('success', '新聞已成功更新');
    }
}
