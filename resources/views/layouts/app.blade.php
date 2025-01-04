<!DOCTYPE html>
<html>
<head>

    <title>@yield('title', 'Dream 商店')</title>
    <meta charset="UTF-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #184353 30%, #182D40, #1B2637, #1B2939);
            color: #FFFFFF;
            font-weight: bold;
            margin: 0;
            font-family: Arial, sans-serif;
        }
    </style>
    
</head>
<body>
<header>
    <table>
        <tr>
            <td style="width:25%;"></td>
            <td style="width:50%;">
                <h1>
                    <img src="{{ asset('Dream_pic/DREAM_logo.png') }}" alt="Dream Logo" style="width:300px;height: 80px;">
                    歡迎來到Dream-遊戲商店
                </h1>
            </td>
            <td style="width:25%; text-align: right;">
                <!-- 放置右侧内容 -->
            </td>
        </tr>
    </table>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>&copy; 2025 Dream. 保留所有权利。</p>
</footer>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
