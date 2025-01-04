<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Models\News;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::put('/admin/news/{id}', [AdminController::class, 'update'])->name('admin.news.update');
Route::get('/admin/news/{id}/edit', [AdminController::class, 'edit'])->name('admin.news.edit');
Route::delete('/admin/news/{id}', [AdminController::class, 'destroy'])->name('admin.news.destroy');

// 顯示新聞頁面（GET 請求）
Route::get('/admin/news', [AdminController::class, 'news'])->name('admin.news');


// 顯示登入頁面（GET 請求）
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');

// 登入表單提交（POST 請求）
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');

// 登出（POST 請求）
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// 管理員主頁（GET 請求）
Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');

Route::get('/adminlogin', function () {
    return view('adminlogin');
});

Route::get('/', function () {
    return view('home');
});


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/news', function () {
    return view('news');
});

Route::get('/news', [NewsController::class, 'news']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('/');


Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
