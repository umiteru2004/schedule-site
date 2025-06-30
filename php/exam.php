<?php require './ui/header.php'; ?>

<?php
$exam_types = ['前期中間', '前期期末'];
$subject = $_GET['subject'];
$pdo = new PDO('mysql:host=localhost;dbname=exams_site;charset=utf8', 'staff', 'password');
$sql = $pdo->prepare('select * from exam where subject=? and type=?');

echo '<h1>' . $subject . '</h1>'; //ページタイトル(教科名)表示

foreach ($exam_types as $exam_type) {

    $sql->execute([$subject, $exam_type]);
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    if (!$row) {
        echo '<h2>・' . $exam_type . '</h2>';
        echo '投稿されていません<br><br>';
        continue;
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime_type = $finfo->buffer($row['image']);
    $img_base64 = base64_encode($row['image']);

    echo '<h2>・' . $exam_type . '</h2>';
    echo '<img src="data:' . $mime_type . ';base64,' . $img_base64 . '">';
    echo '<br><br>';
}
?>

<?php require './ui/footer.php'; ?>
