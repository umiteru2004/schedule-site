<?php require "./ui/head.php"; ?>
<link href="/css/home.css" rel="stylesheet" />
</head>

<body>
    <?php require "./ui/header.php"; ?>

    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=exams_site;charset=utf8', 'staff', 'password');
    if (isset($_SESSION['customer'])) {
        $id = $_SESSION['customer']['id'];
        $sql = $pdo->prepare('select * from customer where id!=? and login=?');
        $sql->execute([$id, $_REQUEST['login']]);
    } else {
        $sql = $pdo->prepare('select * from customer where login=?');
        $sql->execute([$_REQUEST['login']]);
    }
    if (empty($sql->fetchAll())) {
        if (isset($_SESSION['customer'])) {
            $sql = $pdo->prepare('update customer set login=?, password=? where id=?');
            $sql->execute([$_REQUEST['login'], $_REQUEST['password'], $id]);
            $_SESSION['customer'] = [
                'id' => $id,
                'login' => $_REQUEST['login'],
                'password' => $_REQUEST['password']
            ];
            echo '登録情報を更新しました';
        } else {
            $sql = $pdo->prepare('insert into customer (name, login, password) values(?,?,?)');
            $sql->execute([$_REQUEST['name'], $_REQUEST['login'], $_REQUEST['password']]);
            echo 'お客様情報を登録しました';
        }
    } else {
        echo 'ログイン名が既に使用されています。変更してください。';
        echo '<a href="signup-input.php">サインインページに戻る</a>';
    }
    ?>

    <?php require './ui/footer.php'; ?>
