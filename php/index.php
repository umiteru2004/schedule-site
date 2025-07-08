<?php require "./ui/head.php"; ?>
</head>

<body>
    <?php require "./ui/header.php"; ?>

    <?php
    $subjects = [
        ['name' => '応用数学BⅠ', 'path' => '応用数学B1'],
        ['name' => '総合英語BⅠ', 'path' => '総合英語B1'],
        ['name' => '信号処理Ⅰ', 'path' => '信号処理1'],
        ['name' => 'ネットワーク応用', 'path' => 'ネットワーク応用'],
        ['name' => 'システム制御演習', 'path' => 'システム制御演習'],
    ];
    ?>
    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <style>
            table {
                width: 60%;
                border-collapse: collapse;
                margin: 0 auto;
                font-size: 20px;
            }

            table,
            th,
            td {
                border: 1px solid black;
                text-align: center;
                padding: 10px;
            }

            th {
                background-color: rgb(173, 209, 226);
            }

            td {
                background-color: rgb(255, 255, 255);
            }

            .kakomon {
                margin: 10px;
            }
        </style>
    </head>

    <body>
        <h1>トップページ</h1>
        <h3>過去問を見たい教科を選んでね</h3>
        <table>
            <tr>
                <th>教科名</th>
            </tr>
            <tr>
                <?php foreach ($subjects as $subject): ?>
                    <td><a href="exam.php?subject=<?php echo urlencode($subject['path']); ?>"><?php echo htmlspecialchars($subject['name']); ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
        <a href="post-exam-input.php" class="kakomon">過去問投稿ページはこちら</a>
    </body>

    </html>
