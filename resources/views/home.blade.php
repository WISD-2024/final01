@extends('layouts.app')

@section('title', '歡迎來到 Dream 遊戲商店')

@section('content')


    <div class="auth-buttons" style="text-align: center; margin-bottom: 20px;">
        <button onclick="window.location.href='/login'" style="margin-right: 10px; padding: 10px 20px; background-color: #73AE22; color: white; border: none; border-radius: 5px; cursor: pointer;">登入</button>
        <button onclick="window.location.href='/register'" style="padding: 10px 20px; background-color: #316282; color: white; border: none; border-radius: 5px; cursor: pointer;">註冊</button>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center; text-align: center;">
        <!-- 「你的商店」 -->
        <div class="dropdown" style="margin: 0 10px;">
            <p style="color: white; font-size: 20px; font-weight: bold;">你的商店</p>
            <div class="dropdown-content" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 5px; padding: 10px;">
                {{-- <a href="{{ url($home) }}" style="color: white; display: block; padding: 5px 0;">首頁</a> --}}
                {{-- <a href="{{ url($cart_item.store) }}" style="color: white; display: block; padding: 5px 0;">購物車</a> --}}
            </div>
        </div>

        <!-- 「類別」 -->
        <div class="dropdown" style="margin: 0 10px;">
            <p style="color: white; font-size: 20px; font-weight: bold;">類別</p>
            <div class="dropdown-content" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 5px; padding: 10px;">
                {{-- <a href="{{ url($type . '?category=action') }}" style="color: white; display: block; padding: 5px 0;">動作遊戲</a> --}}
                {{-- <a href="{{ url($type . '?category=adventure') }}" style="color: white; display: block; padding: 5px 0;">冒險遊戲</a> --}}
                {{-- <a href="{{ url($type . '?category=sports') }}" style="color: white; display: block; padding: 5px 0;">運動與競速</a> --}}
                {{-- <a href="{{ url($type . '?category=simulation') }}" style="color: white; display: block; padding: 5px 0;">模擬遊戲</a> --}}
            </div>
        </div>

        <!-- 搜尋框 -->
        <div style="display: flex; align-items: center;">
            <input type="text" name="searching" id="searching" placeholder="搜尋..." style="padding: 10px; width: 300px; border: none; border-radius: 5px;">
            {{-- <img id="searchIcon" src="{{ asset('images/search_icon.png') }}" alt="Search Icon" style="cursor: pointer; width: 35px; height: 35px; margin-left: 5px;"> --}}
        </div>
    </div>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>遊戲商店首頁</title>
    </head>
    <body>
    <a href="{{ url('/news') }}">
        <a href="{{ url('/news') }}">查看新聞</a>
    </a>
    </body>
    </html>
@endsection
