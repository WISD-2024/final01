@extends('layouts.app')

@section('title', '歡迎來到 新聞')

@section('content')

<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新聞列表</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #0e3b5a; color: white; }
        .header { text-align: center; padding: 20px; }
        .news-container { width: 50%; margin: 0 auto; }
        .news-item { background-color: #1c4e70; padding: 20px; margin: 20px 0; border-radius: 8px; }
        .news-title { font-size: 24px; font-weight: bold; }
        .news-link { color: #a0c4d4; text-decoration: none; }
        .news-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="header">
    <h1>DREAM 新聞中心</h1>
</div>
<div class="news-container">
    @foreach ($news as $item)
        <div class="news-item">
            <a href="{{ route('shownews', $item->id) }}" class="news-link">
                <div class="news-title">{{ $item->title }}</div>
            </a>
        </div>
    @endforeach
</div>
</body>
</html>

@endsection
