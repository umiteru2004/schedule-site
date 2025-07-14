<?php
$PAGE_TITLE = "ログアウト";

require "../ui/head.php";
?>

</head>

<body>
	<?php require "../ui/header.php"; ?>

	<main>
		<?php
		if (isset($_SESSION['customer'])) {
			unset($_SESSION['customer']);
			echo 'ログアウトしました。';
		} else {
			echo 'すでにログアウトしています。';
		}
		?>
	</main>

	<?php require "../ui/footer.php"; ?>
