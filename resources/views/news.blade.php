@extends('layouts.app')

@section('title', '歡迎來到 新聞')

@section('content')

    <!DOCTYPE html>
    <html lang="en">



        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>新聞頁面</title>
        </head>
        <body>
            <h1>新聞頁面</h1>
            <p>目前沒有任何新聞內容。</p>
            <a href="{{ url('/') }}">返回首頁</a>
        </body>
    </html>

@endsection
