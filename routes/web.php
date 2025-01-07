<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Models\News;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
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
Route::get('/admin/product/create', [AdminController::class, 'productcreate'])->name('admin.product.create');
Route::post('/admin/product', [AdminController::class, 'productstore'])->name('admin.product.store');

Route::delete('/admin/product/{id}', [AdminController::class, 'productdestroy'])->name('admin.product.destroy');
Route::put('/admin/product/{id}', [AdminController::class, 'productupdate'])->name('admin.product.update');
Route::get('/admin/product/{id}/edit', [AdminController::class, 'productedit'])->name('admin.product.edit');

Route::get('/admin/news/create', [AdminController::class, 'newscreate'])->name('admin.news.create');
Route::post('/admin/news', [AdminController::class, 'newsstore'])->name('admin.news.store');

Route::put('/admin/news/{id}', [AdminController::class, 'newsupdate'])->name('admin.news.update');
Route::get('/admin/news/{id}/edit', [AdminController::class, 'newsedit'])->name('admin.news.edit');
Route::delete('/admin/news/{id}', [AdminController::class, 'newsdestroy'])->name('admin.news.destroy');

// 顯示商品頁面（GET 請求）
Route::get('/admin/product', [AdminController::class, 'product'])->name('admin.product');

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


Route::get('/news', function () {
    return view('news');
})->name('news');


Route::get('/cart', function () {
    return view('cart');
});

Route::get('/news', [NewsController::class, 'news'])->name('news');

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('show');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

Route::get('/preview', [CartController::class, 'preview'])->name('preview');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/order/{id}/summary', [OrderController::class, 'summary'])->name('summary');

Route::get('/library', [LibraryController::class, 'index'])->name('library')->middleware('auth');

//Route::get('/library', function () {
//    return view('library');
//})->middleware(['auth', 'verified'])->name('/');

//Route::middleware(['auth', 'verified'])->get('/library', function () {
//    return view('library');
//})->name('library');

// 新聞列表頁面
Route::get('/news', [NewsController::class, 'index'])->name('news');

// 新聞詳細頁面
Route::get('/news/{id}', [NewsController::class, 'show'])->name('shownews');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
});


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//搜尋layout
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::post('/product/{productId}/comment', [CommentController::class, 'store'])->name('comment.store');

require __DIR__.'/auth.php';
