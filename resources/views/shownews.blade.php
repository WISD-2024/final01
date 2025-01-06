@extends('layouts.app')

@section('title', '歡迎來到 新聞')

@section('content')

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $newsItem->title }}</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #0e3b5a; color: white; }
        .header { text-align: center; padding: 20px; }
        .news-container { width: 80%; margin: 0 auto; }
        .news-item { background-color: #1c4e70; padding: 20px; border-radius: 8px; }
        .news-title { font-size: 28px; font-weight: bold; }
        .news-date { font-size: 14px; color: #a0c4d4; }
        .news-content { margin-top: 20px; }
        .news-image { margin-top: 20px; text-align: center; }
        .news-image img { max-width: 100%; border-radius: 8px; }
    </style>
</head>
<body>
<div class="header">
    <h1>{{ $newsItem->title }}</h1>
</div>
<div class="news-container">
    <div class="news-item">
        <div class="news-date">{{ $newsItem->date->format('Y 年 m 月 d 日') }}</div>
        <div class="news-content">{{ $newsItem->content }}</div>
        @if ($newsItem->image)
            <div class="news-image">
                <img src="{{ asset('storage/' . $newsItem->image) }}" alt="新聞圖片">
            </div>
        @endif
    </div>
</div>
</body>
</html>
@endsection
