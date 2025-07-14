<?php
$PAGE_TITLE = "ログイン";

require "../ui/head.php";
?>

<link href="/css/login.css" rel="stylesheet" />
</head>

<body>
    <?php require "../ui/header.php"; ?>

    <main>
        <div class="login-form">
            <h2 class="login-title">ログイン</h2>

            <form action="login-output.php" method="post">
                <label for="login" class="login-label">ログイン名</label>
                <input type="text" name="login" class="login-input">

                <label for="login" class="login-label">パスワード</label>
                <input type="password" name="password" class="login-input">

                <input type="submit" value="ログイン" class="login-button">
        </div>
        </form>
    </main>

    <?php require "../ui/footer.php"; ?>
