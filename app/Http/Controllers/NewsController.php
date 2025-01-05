<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::latest()->get(); // 獲取所有新聞
        return view('news', compact('news'));
    }

    // 新聞詳細頁面
    public function shownews($id)
    {
        $newsItem = News::findOrFail($id); // 獲取單篇新聞
        return view('shownews', compact('newsItem'));
    }
}
