<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Sysadmin;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // 查詢用戶
        $admin = Sysadmin::where('email', $request->input('email'))->first();

        if ($admin && Hash::check($request->input('password'), $admin->password)) {
            // 驗證成功，重定向到 dashboard
            return redirect()->route('dashboard');
        } else {
            // 驗證失敗，返回錯誤訊息
            return redirect()->back()->withErrors(['登入失敗']);
        }
    }
}
