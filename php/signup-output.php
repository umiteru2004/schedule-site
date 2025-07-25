<?php
$PAGE_TITLE = '登録結果';

require "./ui/head.php";
?>
</head>

<body>
    <?php require "./ui/header.php"; ?>

    <main>
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
                $sql = $pdo->prepare('update customer set name=?, login=?, password=? where id=?');
                $sql->execute([
                    $_REQUEST['name'],
                    $_REQUEST['login'],
                    $_REQUEST['password'],
                    $id
                ]);

                $_SESSION['customer'] = [
                    'id' => $id,
                    'name' => $_REQUEST['name'],
                    'login' => $_REQUEST['login'],
                    'password' => $_REQUEST['password']
                ];
                echo '登録情報を更新しました。';
            } else {
                $sql = $pdo->prepare('insert into customer values(null,?,?,?,?)');
                $sql->execute([
                    $_REQUEST['name'],
                    $_REQUEST['login'],
                    $_REQUEST['password']
                ]);
                echo '登録しました。';
            }
        } else {
            echo 'ログイン名がすでに使用されていますので、変更してください。';
        }
        ?>
    </main>

    <?php require './ui/footer.php'; ?>
