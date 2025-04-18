<?php
include 'includes/test_db.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить статью</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; background: #f4f4f4; }
        h2 { color: #333; }
        form { background: #fff; padding: 20px; border-radius: 10px; max-width: 600px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        label { display: block; margin-top: 15px; }
        input[type="text"], textarea {
            width: 100%; padding: 10px; margin-top: 5px;
            border: 1px solid #ccc; border-radius: 5px;
        }
        input[type="submit"] {
            margin-top: 20px;
            background: #4CAF50; color: white; padding: 10px 20px;
            border: none; border-radius: 5px; cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #45a049;
        }
    </style>
</head>
<body>

<h2>Добавить новую статью</h2>

<form method="post" action="create_article.php">
    <label for="title">Заголовок:</label>
    <input type="text" name="title" required>

    <label for="content">Содержимое:</label>
    <textarea name="content" rows="8" required></textarea>

    <input type="submit" value="Сохранить статью">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = pg_escape_string($_POST['title']);
    $content = pg_escape_string($_POST['content']);

    $result = pg_query_params(
        $db_conn,
        "INSERT INTO articles (title, content) VALUES ($1, $2)",
        [$title, $content]
    );

    if ($result) {
        echo "<p style='color: green;'>Статья успешно добавлена!</p>";
    } else {
        echo "<p style='color: red;'>Ошибка: " . pg_last_error($db_conn) . "</p>";
    }

    pg_close($db_conn);
}
?>

</body>
</html>
