<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>修改商品</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #184353 30%, #182D40, #1B2637, #1B2939);
        }

        .header {
            background-color: #171D25;
            color: white;
            padding: 20px;
            text-align: center;
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

        .navbar a:hover {
            background-color: #4CAF50;
        }

        .title {
            color: lightgray;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: auto;
            width: 50%;
            background-color: #3B6491;
            margin: 20px auto;
        }

        .container {
            display: flex;
            margin: 20px auto;
            width: 50%; /* 設定容器寬度為50% */
            height: auto;
            flex-direction: column;
        }

        .main-content {
            color: lightgray;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: auto;
        }

        .footer {
            background-color: #171D25;
            color: white;
            text-align: center;
            padding: 10px;
            bottom: 0;
            width: 100%;
            height: 60px;
        }

        th, td {
            border: 1px solid transparent;
            padding: 10px;
            text-align: center;
            vertical-align: middle;
        }

        button {
            width: 100%;
            background-color: #2196F3;
            color: white;
            border: none;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #1B88E5;
        }
    </style>
</head>
<body>
<header class="header">
    <h1>DREAM 管理者後台系統</h1>
</header>

<nav class="navbar">
    <a href="{{ route('admin.home') }}">首頁</a>
    <a href="{{ route('admin.news') }}">新聞管理</a>
    <a href="{{ route('admin.product') }}">商品管理</a>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">登出</a>
</nav>

<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<div class="title">
    <h2>商品修改</h2>
</div>

<div class="container">
    <section class="main-content">
        <table>
            <thead style="background-color: #3B6491">
            <tr>
                <th style="width: 5%;">ID</th>
                <th style="width: 5%;">類別</th>
                <th style="width: 5%;">賣家</th>
                <th style="width: 10%;">商品名稱</th>
                <th style="width: 10%;">商品圖片</th>
                <th style="width: 5%;">價格</th>
                <th style="width: 10%;">庫存</th>
                <th style="width: 45%;">遊戲資訊</th>
                <th style="width: 5%;">修改</th>
            </tr>
            </thead>
            <tbody>
            <tr style="background-color: #3B6491;">
                <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->seller_id}}</td>
                    <td>{{ $product->name }}</td>
                    <td style="text-align: center; vertical-align: middle;">
                        <img src="{{ asset('images/' . $product->pictures) }}" alt="{{ $product->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                    </td>
                    <td><textarea style="resize: none; width: 90%; height: 50px;" name="price">{{ $product->price }}</textarea></td>
                    <td><textarea style="resize: none; width: 90%; height: 50px;" name="inventory">{{ $product->inventory }}</textarea></td>
                    <td><textarea style="resize: none; width: 90%; height: 100px;" name="detail">{{ $product->detail }}</textarea></td>
                    <td>
                        <button type="submit">提交修改</button>
                    </td>
                </form>
            </tr>
            </tbody>
        </table>
    </section>
</div>

<footer class="footer">
    <p></p>
</footer>

</body>
</html>
