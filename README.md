
# 系統畫面


## 首頁
<a href ="https://imgur.com/LCTdZUx"><img src="https://i.imgur.com/LCTdZUx.jpg" title="source: imgur.com" /></a>

## 遊戲瀏覽
<a href ="https://imgur.com/aHNek5a"><img src="https://i.imgur.com/aHNek5a.jpg" title="source: imgur.com" /></a>

## 遊戲個別頁面
<a href ="https://imgur.com/s5n6Kna"><img src="https://i.imgur.com/s5n6Kna.jpg" title="source: imgur.com" /></a>

## 登入
<a href ="https://imgur.com/dF6jBAD"><img src="https://i.imgur.com/dF6jBAD.jpg" title="source: imgur.com" /></a>

## 註冊
<a href ="https://imgur.com/7YjCHdO"><img src="https://i.imgur.com/7YjCHdO.jpg" title="source: imgur.com" /></a>

## 購物車
<a href ="https://imgur.com/lx4sKoz"><img src="https://i.imgur.com/lx4sKoz.jpg" title="source: imgur.com" /></a>

## 買家收藏庫
<a href ="https://imgur.com/aHNek5a"><img src="https://i.imgur.com/aHNek5a.jpg" title="source: imgur.com" /></a>

## 買家評論
<a href ="https://imgur.com/PbqM2pH"><img src="https://i.imgur.com/PbqM2pH.jpg" title="source: imgur.com" /></a>

## 新聞
<a href ="https://imgur.com/GlDTVEL"><img src="https://i.imgur.com/GlDTVEL.jpg" title="source: imgur.com" /></a>

## 後台登入
<a href ="https://imgur.com/xwQddYL"><img src="https://i.imgur.com/xwQddYL.jpg" title="source: imgur.com" /></a>

## 後台首頁
<a href ="https://imgur.com/RXvm0Zk"><img src="https://i.imgur.com/RXvm0Zk.jpg" title="source: imgur.com" /></a>

## 後台遊戲管理
編輯:<a href ="https://imgur.com/c7alTyj"><img src="https://i.imgur.com/c7alTyj.jpg" title="source: imgur.com" /></a>
新增:<a href ="https://imgur.com/iL8VvjY"><img src="https://i.imgur.com/iL8VvjY.jpg" title="source: imgur.com" /></a>

## 後台新聞管理
編輯:<a href ="https://imgur.com/6opaG65"><img src="https://i.imgur.com/6opaG65.jpg" title="source: imgur.com" /></a>
新增:<a href ="https://imgur.com/NQT2uyc"><img src="https://i.imgur.com/NQT2uyc.jpg" title="source: imgur.com" /></a>

## 系統名稱及作用
Dream遊戲商店

- 讓顧客能線上購買遊戲

## 系統的主要功能
### 訪客/會員 
- 首頁 Route::get('/', [ProductController::class, 'index'])->name('home'); [葉佳豪 3B132096](https://github.com/3B132096)
- 使用者註冊畫頁 (Route::get('register', [RegisteredUserController::class, 'create'])->name('register');[王翊安 3B132075](https://github.com/3B132075)
- 使用者登入畫頁 (Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');[王翊安 3B132075](https://github.com/3B132075)
- 查詢遊戲 Route::get('/search', [ProductController::class, 'search'])->name('search');)[陳洧倫 3B132068](https://github.com/3B132068)
- 遊戲個別頁面 Route::get('/products/{id}', [ProductController::class, 'show'])->name('show');)[王翊安 3B132075](https://github.com/3B132075)[陳洧倫 3B132068](https://github.com/3B132068)
- 新聞頁面 Route::get('/news', [NewsController::class, 'index'])->name('news');[葉佳豪 3B132096](https://github.com/3B132096)
- 新聞詳細頁面 Route::get('/news/{id}', [NewsController::class, 'show'])->name('shownews');[葉佳豪 3B132096](https://github.com/3B132096)
- 收藏庫頁面 Route::get('/library', [LibraryController::class, 'index'])->name('library')->middleware('auth');[王翊安 3B132075](https://github.com/3B132075)
- 遊戲評論 Route::post('/product/{productId}/comment', [CommentController::class, 'store'])->name('comment.store');[葉佳豪 3B132096](https://github.com/3B132096)[陳洧倫 3B132068](https://github.com/3B132068)

><訂單>
- 個別遊戲頁面 Route::get('/products/{id}', [ProductController::class, 'show'])->name('show'); [王翊安 3B132075](https://github.com/3B132075)
- 加入購物車 Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add'); [王翊安 3B132075](https://github.com/3B132075)
- 結帳並儲存至收藏庫 Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');[王翊安 3B132075](https://github.com/3B132075)

### 後台管理員

><遊戲管理>

- 遊戲列表 Route::get('/admin/product', [AdminController::class, 'product'])->name('admin.product');[陳洧倫 3B132068](https://github.com/3B132068)
- 新增遊戲 Route::get('/admin/product/create', [AdminController::class, 'productcreate'])->name('admin.product.create');[陳洧倫 3B132068](https://github.com/3B132068)
- 儲存遊戲 Route::post('/admin/product', [AdminController::class, 'productstore'])->name('admin.product.store');[陳洧倫 3B132068](https://github.com/3B132068)
- 刪除遊戲 Route::delete('/admin/product/{id}', [AdminController::class, 'productdestroy'])->name('admin.product.destroy');[陳洧倫 3B132068](https://github.com/3B132068)
- 更新遊戲 Route::put('/admin/product/{id}', [AdminController::class, 'productupdate'])->name('admin.product.update');[陳洧倫 3B132068](https://github.com/3B132068)
- 編輯遊戲 Route::get('/admin/product/{id}/edit', [AdminController::class, 'productedit'])->name('admin.product.edit');[陳洧倫 3B132068](https://github.com/3B132068)

><新聞管理>
- 新聞列表 Route::get('/admin/news', [AdminController::class, 'news'])->name('admin.news');[陳洧倫 3B132068](https://github.com/3B132068)
- 新增新聞 Route::get('/admin/news/create', [AdminController::class, 'newscreate'])->name('admin.news.create');[陳洧倫 3B132068](https://github.com/3B132068)
- 儲存新聞 Route::post('/admin/news', [AdminController::class, 'newsstore'])->name('admin.news.store');[陳洧倫 3B132068](https://github.com/3B132068)
- 編輯新聞 Route::get('/admin/news/{id}/edit', [AdminController::class, 'newsedit'])->name('admin.news.edit');[陳洧倫 3B132068](https://github.com/3B132068)
- 更新新聞 Route::put('/admin/news/{id}', [AdminController::class, 'newsupdate'])->name('admin.news.update');[陳洧倫 3B132068](https://github.com/3B132068)
- 刪除新聞 Route::delete('/admin/news/{id}', [AdminController::class, 'newsdestroy'])->name('admin.news.destroy');[陳洧倫 3B132068](https://github.com/3B132068)

## ERD
<a href ="https://imgur.com/1xzPWBd"><img src="https://i.imgur.com/1xzPWBd.jpg" title="source: imgur.com" /></a>


## 關聯式綱要圖
<a href ="https://imgur.com/MfI55yS"><img src="https://i.imgur.com/MfI55yS.jpg" title="source: imgur.com" /></a>


## 實際資料表欄位設計
<a href ="https://imgur.com/yFxBIhI"><img src="https://i.imgur.com/yFxBIhI.jpg" title="source: imgur.com" /></a>
<a href ="https://imgur.com/0FP3Gm1"><img src="https://i.imgur.com/0FP3Gm1.jpg" title="source: imgur.com" /></a>
<a href ="https://imgur.com/jj0HMBV"><img src="https://i.imgur.com/jj0HMBV.jpg" title="source: imgur.com" /></a>


## 初始專案與DB負責的同學
- 初始專案 [葉佳豪 3B132096](https://github.com/3B132096)
- DB [王翊安 3B132075](https://github.com/3B132075) [陳洧倫 3B132068](https://github.com/3B132068) [葉佳豪 3B132096](https://github.com/3B132096)
- readme撰寫[王翊安 3B132075](https://github.com/3B132075) [葉佳豪 3B132096](https://github.com/3B132096) [陳洧倫 3B132068](https://github.com/3B132068)


## 額外使用的套件或樣板
無
## 系統測試資料存放位置

     final01底下的sql資料夾

## 系統使用者測試帳號

★ 前台
    
     帳號：user1@gmail.com
     密碼：12345678

★ 後台

     帳號：test@gmail.com
     密碼：12345678


## 系統開發人員與工作分配
- 王翊安:訪客/買家活動圖、實體關聯圖、關聯式資料庫綱要圖、訪客/買家request的路由。
- 陳洧倫:系統使用案例圖、系統管理員活動圖、系統管理員request的路由。
- 葉佳豪:賣家活動圖、實體關聯圖、資料表欄位設計、賣家request的路由。

