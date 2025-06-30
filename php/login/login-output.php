<?php require "../ui/header.php"; ?>

<?php session_start(); ?>
<?php
unset($_SESSION['customer']);
$pdo = new PDO(
	'mysql:host=localhost;dbname=exams_site;charset=utf8',
	'staff',
	'password'
);
$sql = $pdo->prepare('select * from customer where login=? and password=?');
$sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
foreach ($sql as $row) {
	$_SESSION['customer'] = [
		'id' => $row['id'],
		'name' => $row['name'],
		'password' => $row['password']
	];
}
if (isset($_SESSION['customer'])) {
	echo 'いらっしゃいませ、', $_SESSION['customer']['name'], 'さん。';
} else {
	echo 'ログイン名またはパスワードが違います。';
}
?>

<?php require "../ui/footer.php"; ?>
