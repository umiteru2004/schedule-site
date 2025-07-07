<?php require "../ui/header.php"; ?>

<?php session_start(); ?>
<?php
if (isset($_SESSION['customer'])) {
	unset($_SESSION['customer']);
	echo 'ログアウトしました。';
} else {
	echo 'すでにログアウトしています。';
}
?>

<?php require "../ui/footer.php"; ?>
