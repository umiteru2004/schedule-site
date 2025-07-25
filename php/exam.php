<?php
require "./lib/subjects.php";

$subject = $_GET['subject'];
$PAGE_TITLE = $subjects[$subject];

require "./ui/head.php";
?>

<link href="/css/exam.css" rel="stylesheet" />
</head>

<body>
    <?php require "./ui/header.php"; ?>

    <main>

        <?php
        echo '<h1>', $subjects[$subject], '</h1>';

        $exam_types = ['前期中間', '前期期末'];
        $pdo = new PDO('mysql:host=localhost;dbname=exams_site;charset=utf8', 'staff', 'password');
        $sql = $pdo->prepare('select * from exam where subject=? and type=?');

        foreach ($exam_types as $exam_type) {

            $sql->execute([$subject, $exam_type]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                echo '<h2>', $exam_type, '</h2>';
                echo '<p>投稿されていません</p>';
                continue;
            }

            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->buffer($row['image']);
            $img_base64 = base64_encode($row['image']);

            echo '<h2>', $exam_type, '</h2>';
            echo '<img src="data:', $mime_type, ';base64,', $img_base64, '" class="exam-img">';
        }
        ?>
    </main>

    <?php require './ui/footer.php'; ?>
