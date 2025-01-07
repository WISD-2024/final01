<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dream Game Store')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #184353 30%, #182D40, #1B2637, #1B2939);
            background-size: cover;
            background-attachment: fixed;
            color: #FFFFFF;
            font-weight: bold;

        }
        .navbar {
            background: linear-gradient(135deg, #3B6491 , #356B9A , #254E8B , #102370 );
            overflow: hidden;
            display: flex;
            justify-content: center;
            width: 50%;
            padding: 20px;
            height: 50px;
            margin: 20px auto 0;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 5px 20px;
            text-decoration: none;
            margin-left: 10px;
            margin-right: 10px;
        }
        .navbar a:hover {
            background-color: #4CAF50;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
            padding: 20px;
        }

        .dropdown {
            position: relative; /* 設定相對定位 */
            display: inline-block; /* 讓 dropdown 成為行內塊 */
            margin: 0 10px;
        }

        .dropdown-content {
            display: none;
            position: fixed;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 5px;
            padding: 10px;
            min-width: 200px;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .dropdown:hover .dropdown-content {
            display: block; /* 當 hover 時顯示 */
        }

        .dropdown-content a {
            color: white;
            display: block;
            padding: 5px 0;
        }
    </style>
</head>
<body>

<header>
    <div style="text-align: center;">
        <table>
            <tr>
                <td style="width: 25%;"></td>
                <td style="width: 50%;">
                    <h1>
                        <a href="/"><img style="color:white;width:300px;height:80px;vertical-align:middle;" src="{{ asset('images/DREAM_logo.png') }}" alt="Logo"></a>
                        歡迎來到 Dream 遊戲商店
                    </h1>
                </td>
            </tr>
        </table>
    </div>
</header>

@auth
    <nav class="navbar">
        <a href="{{ route('home') }}">首頁</a>
        <a href="{{ route('library') }}">收藏庫</a>
        <a href="{{ route('news') }}">新聞</a>
        <div class="dropdown">
            <a href="javascript:void(0)">類別</a>
            <div class="dropdown-content">
                <a href="#">動作遊戲</a>
                <a href="#">冒險遊戲</a>
                <a href="#">運動與競速</a>
                <a href="#">模擬遊戲</a>
            </div>
        </div>


        <div style="display: flex; align-items: center;">
            <form action="{{ route('search') }}" method="GET" style="display: flex;">
                <input
                    type="text"
                    name="searching"
                    id="searching"
                    placeholder="搜尋..."
                    style="padding: 10px; width: 300px; border: none; border-radius: 5px;"
                    value="{{ request('searching') }}">
                <button type="submit" style="background: none; border: none; cursor: pointer;">
                    <img src="{{ asset('images/search_icon.png') }}" alt="Search Icon" style="width: 35px; height: 35px; margin-left: 5px;">
                </button>
            </form>
        </div>

        <div style="display: flex; justify-content: space-around; align-items: center;">
            <a href="{{ route('cart') }}" class="text-gray-800 dark:text-gray-200" style="margin-right: 10px; padding: 10px 10px; background-color: #73AE22; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 18px;">購物車</a>
        </div>

        <div style="display: flex; justify-content: space-around; align-items: center;">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg" style=" padding: 10px 10px; background-color: #316282; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 18px;">
                    {{ __('登出') }}
                </x-primary-button>
            </form>
        </div>
    </nav>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
        style="width: 50%; margin: 0 auto; padding-left: 320px; padding-top: 20px;">
        {{ __('Welcome, ') }}{{ Auth::user()->name }}{{ __('') }}
    </h2>
@else
    <nav class="navbar">
        <a href="{{ route('home') }}">首頁</a>
        <a href="{{ route('library') }}">收藏庫</a>
        <a href="{{ route('news') }}">新聞</a>
        <div class="dropdown">
            <a href="javascript:void(0)">類別</a>
            <div class="dropdown-content">
                <a href="#">動作遊戲</a>
                <a href="#">冒險遊戲</a>
                <a href="#">運動與競速</a>
                <a href="#">模擬遊戲</a>
            </div>
        </div>

        <div style="display: flex; align-items: center;">
            <form action="{{ route('search') }}" method="GET" style="display: flex;">
                <input
                    type="text"
                    name="searching"
                    id="searching"
                    placeholder="搜尋..."
                    style="padding: 10px; width: 300px; border: none; border-radius: 5px;"
                    value="{{ request('searching') }}">
                <button type="submit" style="background: none; border: none; cursor: pointer;">
                    <img src="{{ asset('images/search_icon.png') }}" alt="Search Icon" style="width: 35px; height: 35px; margin-left: 5px;">
                </button>
            </form>
        </div>

        <div style="display: flex; justify-content: space-around; align-items: center;">
            <a href="{{ route('login') }}" class="text-gray-800 dark:text-gray-200" style="margin-right: 10px; padding: 10px 10px; background-color: #73AE22; color: white; border: none; border-radius: 5px; cursor: pointer;">登入</a>
            <a href="{{ route('register') }}" class="text-gray-800 dark:text-gray-200" style="padding: 10px 20px; background-color: #316282; color: white; border: none; border-radius: 5px; cursor: pointer;">註冊</a>
        </div>
    </nav>
@endauth

<main>
    @yield('content')
</main>



<footer>

</footer>

</body>
</html>
