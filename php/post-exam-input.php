<?php
$PAGE_TITLE = "投稿";

require "./ui/head.php";
?>

</head>

<body>
    <?php require "./ui/header.php"; ?>

    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>過去問投稿ページ</title>
    </head>

    <body>
        <main>
            <form action="post-exam-output.php" method="post" enctype="multipart/form-data">
                <h1>投稿</h1>

                <label for="subject">
                    <h3>教科</h3>
                </label>
                <select name="subject" id="subject">
                    <option value="">-- 選択してください --</option>
                    <?php
                    require "./lib/subjects.php";

                    foreach ($subjects as $key => $value) {
                        echo '<option value="', $key, '">', $value, '</option>';
                    }
                    ?>
                </select>

                <label for="exam-type">
                    <h3>試験の種類</h3>
                </label>
                <select name="type" id="exam-type">
                    <option value="">-- 選択してください --</option>
                    <?php
                    $section_options = ['前期中間', '前期期末'];
                    foreach ($section_options as $value) {
                        echo '<option value="', htmlspecialchars($value), '">', htmlspecialchars($value), '</option>';
                    }
                    ?>
                </select>

                <label for="exam-file">
                    <h3>過去問</h3>
                </label>
                <div class="file-input-group">
                    <input type="file" name="image" id="exam-file">
                </div>

                <input type="submit" value="送信">
            </form>
        </main>

    </body>

    </html>
