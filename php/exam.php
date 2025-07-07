<?php
// データベースに接続
$pdo = new PDO('mysql:host=localhost;dbname=exams_site;charset=utf8', 'staff', 'password');
?>

<?php
//POSTリクエストがあれば、DBから削除処理
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM exam WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$delete_id]);
    // 処理が終わったら、同じページにリダイレクトして再読み込みさせる
    $query = http_build_query($_GET);  //元のクエリ取得
    $redirect_url = $_SERVER['PHP_SELF'] . '?' . $query;  //リダイレクト先のurl
    header('Location: ' . $redirect_url);
    exit;
}
?>

<?php require './ui/header.php'; ?>

<?php
$exam_types = ['前期中間', '前期期末'];
$subject = $_GET['subject'];
$sql = $pdo->prepare('select * from exam where subject=? and type=?');

echo '<h1>' . $subject . '</h1>'; //ページタイトル(教科名)表示

foreach ($exam_types as $exam_type) {
    echo '<h2>・' . $exam_type . '</h2>';

    $sql->execute([$subject, $exam_type]);
    //ループでヒットした画像をすべて表示
    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $finfo->buffer($row['image']);
        $img_base64 = base64_encode($row['image']);
        echo '<img src="data:' . $mime_type . ';base64,' . $img_base64 . '">';
        //投稿の削除ボタン
        echo '<form action="" method="post">';
        echo '    <input type="hidden" name="delete_id" value="' . $row['id'] . '">';
        echo '    <button type="submit">削除</button>';
        echo '</form>';

        echo '<br><br>';
    }

    //画像がなかった場合の処理
    if ($sql->rowCount() === 0) {
        echo '投稿されていません<br><br>';
    }
}
?>

<?php require './ui/footer.php'; ?>
