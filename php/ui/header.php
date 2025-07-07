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
