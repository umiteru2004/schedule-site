<?php
// セッションがまだ開始されていなければ開始する
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') : 'My Website'; ?></title>
    <link href="/css/globals.css" rel="stylesheet" />
</head>

<body>

    <header>
        <h1><a href="/">My Awesome Site</a></h1>

        <div class="header-menu">
            <?php // --- ここからが修正部分です --- 
            ?>
            <?php if (isset($_SESSION['id'])): ?>
                <a href="/login/logout-input.php">ログアウト</a>
            <?php else: ?>
                <a href="/login/login-input.php">ログイン</a>
            <?php endif; ?>
            <?php // --- ここまでが修正部分です --- 
            ?>
        </div>
    </header>
