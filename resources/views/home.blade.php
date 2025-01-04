@extends('layouts.app')

@section('title', '歡迎來到 Dream 遊戲商店')

@section('content')

    <td style="width: 25%;">
    @auth
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Welcome, ') }}{{ Auth::user()->name }}
            </h2>
            <nav class="navbar">
                <a href="{{ route('home') }}">首頁</a>
                <a href="{{ route('dashboard') }}">收藏庫</a>
                <div class="dropdown" style="margin: 0 10px;">
                    <p style="color: white; font-size: 20px; font-weight: bold;">類別</p>
                    <div class="dropdown-content" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 5px; padding: 10px;">
                        {{-- <a href="{{ url($type . '?category=action') }}" style="color: white; display: block; padding: 5px 0;">動作遊戲</a> --}}
                        {{-- <a href="{{ url($type . '?category=adventure') }}" style="color: white; display: block; padding: 5px 0;">冒險遊戲</a> --}}
                        {{-- <a href="{{ url($type . '?category=sports') }}" style="color: white; display: block; padding: 5px 0;">運動與競速</a> --}}
                        {{-- <a href="{{ url($type . '?category=simulation') }}" style="color: white; display: block; padding: 5px 0;">模擬遊戲</a> --}}
                    </div>
                </div>
                {{--        <a href="{{ route('admin.home') }}">商品管理</a>--}}
                {{--        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">登出</a>--}}

                <div style="display: flex; align-items: center;">
                    <input type="text" name="searching" id="searching" placeholder="搜尋..." style="padding: 10px; width: 300px; border: none; border-radius: 5px;">
                    <img id="searchIcon" src="{{ asset('images/search_icon.png') }}" alt="Search Icon" style="cursor: pointer; width: 35px; height: 35px; margin-left: 5px;">
                </div>

                <div style="display: flex; justify-content: space-around; align-items: center;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg" style=" padding: 10px 20px; background-color: #316282; color: white; border: none; border-radius: 5px; cursor: pointer;">
                            {{ __('登出') }}
                        </x-primary-button>
                    </form>
                </div>
            </nav>


    @else

            <nav class="navbar">
                <a href="{{ route('home') }}">首頁</a>
                <a href="{{ route('dashboard') }}">收藏庫</a>
                <div class="dropdown" style="margin: 0 10px;">
                    <p style="color: white; font-size: 20px; font-weight: bold;">類別</p>
                    <div class="dropdown-content" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 5px; padding: 10px;">
                        {{-- <a href="{{ url($type . '?category=action') }}" style="color: white; display: block; padding: 5px 0;">動作遊戲</a> --}}
                        {{-- <a href="{{ url($type . '?category=adventure') }}" style="color: white; display: block; padding: 5px 0;">冒險遊戲</a> --}}
                        {{-- <a href="{{ url($type . '?category=sports') }}" style="color: white; display: block; padding: 5px 0;">運動與競速</a> --}}
                        {{-- <a href="{{ url($type . '?category=simulation') }}" style="color: white; display: block; padding: 5px 0;">模擬遊戲</a> --}}
                    </div>
                </div>
                {{--        <a href="{{ route('admin.home') }}">商品管理</a>--}}
                {{--        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">登出</a>--}}

                <div style="display: flex; align-items: center;">
                    <input type="text" name="searching" id="searching" placeholder="搜尋..." style="padding: 10px; width: 300px; border: none; border-radius: 5px;">
                    <img id="searchIcon" src="{{ asset('images/search_icon.png') }}" alt="Search Icon" style="cursor: pointer; width: 35px; height: 35px; margin-left: 5px;">
                </div>

                <div style="display: flex; justify-content: space-around; align-items: center;">
                    <a href="{{ route('login') }}" class="text-gray-800 dark:text-gray-200" style="margin-right: 10px; padding: 10px 20px; background-color: #73AE22; color: white; border: none; border-radius: 5px; cursor: pointer;">登入</a>
                    <a href="{{ route('register') }}" class="text-gray-800 dark:text-gray-200" style="padding: 10px 20px; background-color: #316282; color: white; border: none; border-radius: 5px; cursor: pointer;">註冊</a>
                </div>

            </nav>


        @endauth
    </td>

@endsection



