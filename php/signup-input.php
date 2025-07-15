<?php
$PAGE_TITLE = '登録';

require "./ui/head.php";
?>

<link href="/css/login.css" rel="stylesheet" />
</head>

<body>
    <?php
    require "./ui/header.php";

    $login = $password = $name = '';

    if (isset($_SESSION['customer'])) {
        $customer = $_SESSION['customer'];
        $login = $customer['id'];
        $name = $customer['name'];
        $password = $customer['password'];
    }
    ?>

    <main>
        <div class="login-form">
            <h2 class="login-title">登録</h2>

            <form action="signup-output.php" method="post">
                <label for="name" class="login-label">ニックネーム</label>
                <?= '<input type="text" name="name" value="', $name, '" id="name" class="login-input">' ?>

                <label for="login" class="login-label">ログイン名</label>
                <?= '<input type="text" name="login" value="', $login, '" id="login" class="login-input">' ?>

                <label for="password" class="login-label">パスワード</label>
                <?= '<input type="password" name="password" value="', $password, '" id="password" class="login-input">' ?>

                <input type="submit" value="登録" class="login-button">
            </form>
        </div>
    </main>

    <?php require "./ui/footer.php"; ?>
