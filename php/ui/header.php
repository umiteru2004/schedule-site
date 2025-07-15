<header>
    <div class="header">
        <h2 class="site-title-container">
            <a href="/" class="site-title">過去問共有サイト</a>
        </h2>

        <div class="header-menu">
            <?php
            if (isset($_SESSION['customer'])) {
                echo '<p class="login-id">', $_SESSION['customer']['login'], '</p>';
                echo '<a href="/login/logout-input.php">ログアウト</a>';
                echo '<a href="/signup-input.php">登録情報の変更</a>';
            } else {
                echo '<a href="/login/login-input.php">ログイン</a>';
                echo '<a href="/signup-input.php">新規登録</a>';
            }
            ?>
        </div>
    </div>
</header>
