<?php
include '../includes/test_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = pg_escape_string($_POST['title']);
    $content = pg_escape_string($_POST['content']);
    
    $result = pg_query_params(
        $db_conn,
        "INSERT INTO articles (title, content) VALUES ($1, $2)",
        [$title, $content]
    );
    
    if ($result) {
        header("Location: ../articles.php");
        exit;
    } else {
        $error = "Ошибка: " . pg_last_error($db_conn);
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить статью</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h1 {
            color: #2c3e50;
            font-size: 2rem;
        }

        .btn {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #2980b9;
        }

        .btn-back {
            background: #95a5a6;
        }

        .btn-back:hover {
            background: #7f8c8d;
        }

        .article-form {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border 0.3s;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #3498db;
            outline: none;
        }

        textarea {
            min-height: 200px;
            resize: vertical;
        }

        .submit-btn {
            background: #2ecc71;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #27ae60;
        }

        .error {
            color: #e74c3c;
            margin-bottom: 20px;
            padding: 10px;
            background: #fadbd8;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Добавить новую статью</h1>
            <a href="../articles.php" class="btn btn-back">Назад к статьям</a>
        </div>

        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" class="article-form">
            <div class="form-group">
                <label for="title">Заголовок:</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="content">Содержимое:</label>
                <textarea id="content" name="content" rows="8" required></textarea>
            </div>

            <input type="submit" value="Сохранить статью" class="submit-btn">
        </form>
    </div>
</body>
</html>
