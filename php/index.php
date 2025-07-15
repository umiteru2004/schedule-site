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
                    require "./lib/subjects.php";

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
