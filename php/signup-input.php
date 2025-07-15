<?php require "./ui/head.php"; ?>
<link href="/css/home.css" rel="stylesheet" />
</head>

<?php
require "./ui/header.php";
echo '必要事項を入力してください';
$login = $password = $name = '';
if (isset($_SESSION['customer'])) {
    $login = $_SESSION['customer']['id'];
    $password = $_SESSION['customer']['password'];
    $name = $_SESSION['customer']['name'];
}
echo '<form action="signup-output.php" method="post">';
echo '<table>';
echo '<tr><td>ニックネーム</td><td>';
echo '<input type="text" name="name" value="', $name, '">';
echo '<tr><td>ログイン名</td><td>';
echo '<input type="text" name="login" value="', $login, '">';
echo '</td></tr>';
echo '<tr><td>パスワード</td><td>';
echo '<input type="password" name="password" value="', $password, '">';
echo '</td></tr>';
echo '<tr><td>確認用パスワード</td><td>';
echo '<input type="password" name="password_confirm" value="', $password, '">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" value="登録する">';
echo '</form>';

?>

<?php require "./ui/footer.php"; ?>
