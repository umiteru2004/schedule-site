<?php require "../ui/header.php"; ?>

<?php
unset($_SESSION['customer']);
$pdo = new PDO(
	'mysql:host=localhost;dbname=exams_site;charset=utf8',
	'staff',
	'password'
);
$sql = $pdo->prepare('select * from customer where login=? and password=?');
$sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
$customer = $sql->fetch(PDO::FETCH_ASSOC);

if ($customer) {
	session_regenerate_id();

	$_SESSION['customer'] = [
		'id' => $customer['id'],
		'name' => $customer['name'],
		'password' => $customer['password']
	];

	echo 'いらっしゃいませ、', $_SESSION['customer']['name'], 'さん。';
} else {
	echo 'ログイン名またはパスワードが違います。';
}
?>

<?php require "../ui/footer.php"; ?>
