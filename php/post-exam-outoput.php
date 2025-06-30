<?php
$pdo=new PDO('mysql:host=localhost;dbname=exams_site;charset=utf8','staff','password');
$subject = $_REQUEST['subject'] ?? '';
$type = $_REQUEST['type'] ?? '';
$file_content = null;
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $file_content = file_get_contents($_FILES['image']['tmp_name']);
} else {
    echo 'ファイルのアップロードに失敗したか、ファイルが選択されていません';
}

$sql=$pdo->prepare('insert into exam(subject, type, image) values(?, ?, ?)');
if($sql->execute([$subject, $type, $file_content])){
    echo '追加できました！！';
} else {
    echo '追加できませんでした';
}
?>