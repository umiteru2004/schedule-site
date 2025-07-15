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
        <style>
            body {
                font-family: sans-serif;
                background-color: #e0e0e0;
                color: #333;
                padding: 20px;
            }

            h1,
            h2,
            h3,
            h4 {
                margin-top: 20px;
                margin-bottom: 5px;
                color: #333;
            }

            select,
            input[type="submit"] {
                display: block;
                margin-bottom: 15px;
                padding: 8px;
                border: 1px solid #999;
                border-radius: 4px;
                background-color: #f0f0f0;
                cursor: pointer;
            }

            select {
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                text-align: left;
            }

            .file-input-group {
                display: flex;
                align-items: center;
                margin-bottom: 15px;
            }

            .file-input-group input[type="file"] {
                display: inline-block;
                margin-bottom: 0;
                padding: 8px;
                border: 1px solid #999;
                border-radius: 4px;
                background-color: #f0f0f0;
                cursor: pointer;
            }

            .file-name-display {
                margin-left: 10px;
                font-size: 14px;
                color: #555;
            }

            input[type="submit"]:hover {
                background-color: #d0d0d0;
            }
        </style>
    </head>

    <body>

        <form action="post-exam-output.php" method="post" enctype="multipart/form-data">
            <h1>過去問投稿ページ</h1>

            <h2>教科を選択してください</h2>
            <select name="subject">
                <option value="">-- 選択してください --</option>
                <?php
                require "./lib/subjects.php";

                foreach ($subjects as $key => $value) {
                    echo '<option value="', $key, '">', $value, '</option>';
                }
                ?>
            </select>

            <h3>試験区分を選択してください</h3>
            <select name="type">
                <option value="">-- 選択してください --</option>
                <?php
                $section_options = ['前期中間', '前期期末'];
                foreach ($section_options as $value) {
                    echo '<option value="', htmlspecialchars($value), '">', htmlspecialchars($value), '</option>';
                }
                ?>
            </select>

            <h4>送信するファイルを選択してください</h4>
            <div class="file-input-group">
                <input type="file" id="exam_image" name="image">
                <span id="file_name_display" class="file-name-display">ファイルを選択していません</span>
            </div>

            <input type="submit" value="送信">
        </form>

        <script>
            document.getElementById('exam_image').addEventListener('change', function() {
                const fileName = this.files.length > 0 ? this.files[0].name : 'ファイルを選択していません';
                document.getElementById('file_name_display').textContent = fileName;
            });
        </script>

    </body>

    </html>
