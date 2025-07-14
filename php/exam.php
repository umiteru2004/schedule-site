<?php
$subject = $_GET['subject'];
$PAGE_TITLE = $subject;

require "./ui/head.php";
?>

</head>

<body>
    <?php require "./ui/header.php"; ?>

    <main>

        <?php
        $exam_types = ['前期中間', '前期期末'];
        $pdo = new PDO('mysql:host=localhost;dbname=exams_site;charset=utf8', 'staff', 'password');
        $sql = $pdo->prepare('select * from exam where subject=? and type=?');

        $subjects = [
            'applied_math_b1' => '応用数学BⅠ',
            'general_english_b1' => '総合英語BⅠ',
            'signal_processing_1' => '信号処理Ⅰ',
            'network_application' => 'ネットワーク応用',
            'system_control_exercises' => 'システム制御演習'
        ];

        echo '<h1>', $subjects[$subject], '</h1>';

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
    </main>

    <?php require './ui/footer.php'; ?>
