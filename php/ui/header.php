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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link href="/css/globals.css" rel="stylesheet" />
    <link href="/css/header.css" rel="stylesheet" />
</head>

<body>

    <header>
        <div class="header">
            <h2 class="site-title-container">
                <a href="/" class="site-title">過去問共有サイト</a>
            </h2>

            <div class="header-menu">
                <?php // --- ここからが修正部分です --- 
                ?>
                <?php if (isset($_SESSION['customer'])): ?>
                    <a href="/login/logout-input.php">ログアウト</a>
                <?php else: ?>
                    <a href="/login/login-input.php">ログイン</a>
                <?php endif; ?>
                <?php // --- ここまでが修正部分です --- 
                ?>
            </div>
        </div>
    </header>
