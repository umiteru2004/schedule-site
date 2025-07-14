<?php require "./ui/head.php"; ?>
<link href="/css/home.css" rel="stylesheet" />
</head>

<body>
    <?php require "./ui/header.php"; ?>

    <main>
        <div>
            <table class="subject-table">
                <thead>
                    <tr>
                        <th class="subject-th">教科名</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $subjects = [
                        'applied_math_b1' => '応用数学BⅠ',
                        'general_english_b1' => '総合英語BⅠ',
                        'signal_processing_1' => '信号処理Ⅰ',
                        'network_application' => 'ネットワーク応用',
                        'system_control_exercises' => 'システム制御演習'
                    ];

                    foreach ($subjects as $key => $value) {
                        echo '<tr><td  class="subject-td">';
                        echo '<a href="exam.php?subject=', $key, '">', $value, '</a>';
                        echo '</td></tr>';
                        echo "\n";
                    }
                    ?>
                </tbody>
            </table>

            <div class="post-link">
                <a href="post-exam-input.php">過去問投稿ページはこちら</a>
            </div>
        </div>
    </main>
</body>

</html>
