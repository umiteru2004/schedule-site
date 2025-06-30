<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8') : 'My Website'; ?></title>
    <style>
        /* 簡単なスタイリング */
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
        }

        header h1 {
            margin: 0;
        }

        header h1 a {
            font-size: 24px;
            color: #333;
            text-decoration: none;
        }

        header .header-menu a {
            margin-left: 15px;
            text-decoration: none;
            color: #007bff;
        }

        main {
            padding: 20px;
        }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            border-top: 1px solid #ddd;
            font-size: 14px;
            color: #777;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <header>
        <h1><a href="index.php">My Awesome Site</a></h1>

        <div class="header-menu">
            <?php // --- ここからが修正部分です --- 
            ?>
            <?php if (isset($_SESSION['id'])): ?>
                <a href="login/logout-input.php">ログアウト</a>
            <?php else: ?>
                <a href="login/login-input.php">ログイン</a>
            <?php endif; ?>
            <?php // --- ここまでが修正部分です --- 
            ?>
        </div>
    </header>
