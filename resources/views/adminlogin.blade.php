<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        /* 設置背景漸層 */
        body {
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #184353 30%, #182D40, #1B2637, #1B2939);
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* 表單容器樣式 */
        .login-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            width: 300px;
        }

        h1 {
            font-size: 2em;
            text-align: center;
            margin-bottom: 20px;
        }

        /* 輸入框樣式 */
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* 登入按鈕樣式 */
        button {
            width: 100%;
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* 錯誤訊息樣式 */
        .error {
            color: red;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>管理者登入</h1>

    <!-- Laravel 登入表單 -->
    <form action="{{ route('admin.login') }}" method="POST">
    @csrf  <!-- 防止 CSRF 攻擊 -->

        <!-- 用戶名輸入框 -->
        <input type="text" name="email" placeholder="Email" required>

        <!-- 密碼輸入框 -->
        <input type="password" name="password" placeholder="Password" required>

        <!-- 顯示錯誤訊息 -->
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- 登入按鈕 -->
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
