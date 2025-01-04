<?php
session_start();

$db_ip = 'localhost:33060';
$db_user = 'root';
$db_psw = 'root';
$db_name = 'final01';

if (isset($_SESSION['user_account'])) {
    $user_account = $_SESSION['user_account'];

    $db_link = mysqli_connect($db_ip, $db_user, $db_psw, $db_name);

    $sql = "SELECT user_name FROM user WHERE user_account = ?";
    $stmt = mysqli_prepare($db_link, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $user_account);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $user_name);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    mysqli_close($db_link);
}
?>

<html>
<head>
    <title>歡迎來到Dream</title>
    <meta charset="UTF-8">
    <style>
        body {
            background: linear-gradient(135deg, #184353 30%, #182D40, #1B2637, #1B2939);
            color: #FFFFFF;
            font-weight: bold;
        }
        /* Your CSS styles */
    </style>
</head>
<body>
<div style="text-align: center;">
    <table>
        <tr>
            <td style='width:25%;'></td>
            <td style='width:50%;'>
                <h1><div style="text-align: center;"></div>
                        <img style="color:white;width:300px;height: 80px;vertical-align: middle;" src="{{ asset('images/DREAM_logo.png') }}" alt="Logo">
                        歡迎來到 Dream 遊戲商店
                    <div style="text-align: center;"></div></h1>
            </td>
            <td style='text-align: right;width:25%;'>
                <?php if (isset($user_account) && !empty($user_account)): ?>
                <div style="text-align: right; padding-right:100px;">
                    <div class="dropdown">
                        <p style="color: white; padding: 10px; font-size: 25px;">用戶名稱：<?php echo htmlspecialchars($user_name); ?></p>
                        <div class="dropdown-content" style="text-align: center;">
                            <a href="http://<?php echo $storage; ?>?user_account=<?php echo urlencode($user_account); ?>">收藏庫</a>
                            <a href="http://<?php echo $logout; ?>">登出帳戶</a>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div style="text-align: right;padding-right:100px;">
                    <a href="http://<?php echo $userlog; ?>">
                        <button style="font-size: 18px; color: white; background-color: #73AE22; border: none; padding: 5px 10px; cursor: pointer;">登入</button>
                    </a>
                </div>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</div>

<div class="box">
    <div class="dropdown">
        <p style="color: white; padding: 10px;font-size: 25px;">你的商店</p>
        <div class="dropdown-content">
            <a href="http://<?php echo $home; ?>">首頁</a>
            <a href="http://<?php echo $cart_item.store; ?>">購物車</a>
        </div>
    </div>

    <div class="dropdown">
        <p style="color: white; padding: 10px;font-size: 25px;">類別</p>
        <div class="dropdown-content">
            <a href="http://<?php echo $type; ?>?category=action">動作遊戲</a>
            <a href="http://<?php echo $type; ?>?category=adventure">冒險遊戲</a>
            <a href="http://<?php echo $type; ?>?category=sports">運動與競速</a>
            <a href="http://<?php echo $type; ?>?category=simulation">模擬遊戲</a>
        </div>
    </div>

    <a style="color: white; padding: 10px;font-size: 25px;" href="http://<?php echo $news; ?>">新聞</a>

    <div style="position: relative; display: flex; justify-content: flex-end;">
        <input type="text" name="searching" id="searching" style="padding: 10px; font-size: 16px; border: none; border-radius: 0 5px 5px 0; background: #316282; color: white; width: 300px;" placeholder="搜尋...">
        <img id="searchIcon" src="{{ asset('images/search_icon.png') }}" alt="Search Icon" style="position: absolute; top: 50%; right: 0; transform: translateY(-50%); cursor: pointer; width: 35px; height: 35px; vertical-align: middle; margin-right: 1px;">
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var searchIcon = document.getElementById('searchIcon');
        searchIcon.addEventListener('click', function() {
            performSearch();
        });

        function searchOnEnter(event) {
            if (event.key === 'Enter') {
                performSearch();
            }
        }

        function performSearch() {
            var searchTerm = document.getElementById('searching').value;
            window.location.href = 'http://<?php echo $search; ?>?search=' + encodeURIComponent(searchTerm);
        }

        var searchInput = document.getElementById('searching');
        searchInput.addEventListener('keydown', searchOnEnter);
    });
</script>

<?php
// 顯示遊戲資料
$db_link = mysqli_connect($db_ip, $db_user, $db_psw, $db_name);
$sql = "SELECT * FROM game";
$result = mysqli_query($db_link, $sql);
$rows = mysqli_num_rows($result);
$j = 0;
echo "<center><table><tr>";
echo "<tr><td style='font-size:24px; font-weight:bold;'>所有遊戲</td></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    if ($j % 2 == 0) {
        echo "</tr><tr>";
    }
    echo "<td class='game-item'>";
    echo "<div class='game-info'>";
    echo "<img src='Dream_pic/{$row['game_pic']}' class='game-image' alt='Game Image'>";
    echo "<div class='game-description'>";
    echo "<table>";
    echo "<tr><td style='color:black; font-size: 25px; font-weight: bold;'>{$row['game_name']}</td></tr>";
    echo "<tr><td><p style='color:black; font-size: 15px;'>發行於：{$row['game_issue']}</p></td></tr>";
    echo "<tr><td><video autoplay muted style='height: 155px; width: 275px;' src='Dream_video/{$row['game_video']}'></td></tr>";
    echo "<tr><td style='color:black;'>{$row['game_tag']}</td></tr>";
    echo "</table>";
    echo "<p><a href='product.php?name={$row['game_name']}'>
                <button style='font-size: 18px; color: white; background-color: #73AE22; border: none; padding: 5px 10px; cursor: pointer;'>前往商品頁面</button>
                </a></p>";
    echo "</div></div>";
    echo "<br>{$row['game_name']}<br>NT$ {$row['game_price']}";
    echo "</td>";
    $j++;
}
mysqli_close($db_link);
?>
</body>
</html>
