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
            color: #FFFFFF;
            font-weight: bold;
        }
        .navbar {
            background: linear-gradient(135deg, #3B6491 , #356B9A , #254E8B , #102370 );
            overflow: hidden;
            display: flex;
            justify-content: center;
            width: 50%;
            margin: 20px auto 0;
        }
        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            margin-left: 10px;
            margin-right: 10px;
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
                        <a href="/home"><img style="color:white;width:300px;height:80px;vertical-align:middle;" src="{{ asset('images/DREAM_logo.png') }}" alt="Logo"></a>
                        歡迎來到 Dream 遊戲商店
                    </h1>
                </td>
            </tr>
        </table>
    </div>
</header>

<main>
    @yield('content')
</main>


</body>
</html>
