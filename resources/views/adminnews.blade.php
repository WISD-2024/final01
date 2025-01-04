<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>管理者後台</title>
    <!-- 外部樣式表 -->
    <link rel="stylesheet" href="admin.css">
    <!-- 簡單內嵌樣式 -->
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
            width: 50%;
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

        h1, h2 {
            margin: 0 0 15px;
        }
    </style>
    <script>
        // 刪除確認函數
        function confirmDelete(event, newsId) {
            // 阻止默認操作
            event.preventDefault();

            // 彈出確認提示框
            if (confirm("確定要刪除這筆資料嗎？")) {
                // 使用 AJAX 刪除資料
                fetch(`/admin/news/${newsId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => {
                        if (response.ok) {
                            // 刪除當前資料行
                            var row = event.target.closest('tr');
                            row.remove();
                            alert("資料已刪除！");
                        } else {
                            alert("刪除失敗，請稍後再試！");
                        }
                    })
                    .catch(error => {
                        console.error('錯誤:', error);
                        alert("刪除失敗，請稍後再試！");
                    });
            }
        }
    </script>

</head>
<body>
<header class="header">
    <h1>DREAM 管理者後台系統</h1>
</header>

<nav class="navbar">
    <a href="{{ route('admin.home') }}">首頁</a>
    <a href="{{ route('admin.news') }}">新聞管理</a>
    <a href="{{ route('admin.home') }}">商品管理</a>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">登出</a>
</nav>

<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<div class="title">
    <h2>新聞</h2>
</div>

<div class="container">
    <section class="main-content">
        @if($newsItems->isEmpty())
            <p class="no-data">目前沒有任何新聞資料。</p>
        @else
            <table>
                <thead style="background-color: #3B6491">
                <tr>
                    <th style="width: 5%;">ID</th>
                    <th style="width: 10%;">標題</th>
                    <th style="width: 45%;">內容</th>
                    <th style="width: 10%;">日期</th>
                    <th style="width: 5%;">作者</th>
                    <th style="width: 10%;">創建時間</th>
                    <th style="width: 10%;">更新時間</th>
                    <th style="width: 5%;">新增修改</th>
                </tr>
                </thead>
                <tbody>
                @foreach($newsItems as $news)
                    <tr style="background-color: #3B6491;">
                        <td>{{ $news->id }}</td>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->content }}</td>
                        <td>{{ $news->date }}</td>
                        <td>{{ $news->name }}</td>
                        <td>{{ $news->created_at }}</td>
                        <td>{{ $news->updated_at }}</td>
                        <td>
                            <div style="display: flex; flex-direction: column; align-items: center;">
                                <!-- 修改按鈕 -->
                                <a href="{{ route('admin.news.edit', ['id' => $news->id]) }}"
                                   style="background-color: #2196F3; color: white; font-size: 16px; border: none; border-radius: 5px; cursor: pointer;
                                   display: flex; justify-content: center; align-items: center; text-align: center; text-decoration: none;
                                   margin-bottom: 10px; width: 30px; height: 50px;">
                                    修<br>改
                                </a>
                                <!-- 刪除按鈕 -->
                                <button onclick="confirmDelete(event, {{ $news->id }})"
                                        style="background-color: darkred; color: white; font-size: 16px; border: none; border-radius: 5px; cursor: pointer;
                                        width: 30px; height: 50px;">
                                    刪<br>除
                                </button>
                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </section>
</div>

<footer class="footer">
    <p></p>
</footer>

</body>
</html>
