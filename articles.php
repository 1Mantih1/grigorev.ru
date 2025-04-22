<?php
include 'includes/test_db.php';
$result = pg_query($db_conn, "SELECT * FROM articles ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Статьи</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            color: #212529;
            line-height: 1.6;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid #dee2e6;
        }

        h1 {
            color: #2c3e50;
            font-size: 2.5rem;
        }

        .btn {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #0069d9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .articles-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .article {
            background: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .article:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .article h2 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 1.8rem;
        }

        .article p {
            color: #495057;
            margin-bottom: 20px;
            font-size: 1.1rem;
            line-height: 1.7;
            white-space: pre-line;
        }

        .article small {
            color: #6c757d;
            font-size: 0.9rem;
            display: block;
            text-align: right;
        }

        .empty-message {
            text-align: center;
            padding: 50px;
            color: #6c757d;
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            h1 {
                font-size: 2rem;
            }

            .article {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Все статьи</h1>
            <a href="/pages/add_article.php" class="btn">Добавить статью</a>
        </header>

        <?php if (pg_num_rows($result) > 0): ?>
            <div class="articles-list">
                <?php while ($row = pg_fetch_assoc($result)): ?>
                    <div class="article">
                        <h2><?= htmlspecialchars($row['title']) ?></h2>
                        <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
                        <small>Опубликовано: <?= date('d.m.Y H:i', strtotime($row['created_at'])) ?></small>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="empty-message">Пока нет ни одной статьи.</div>
        <?php endif; ?>

        <?php pg_close($db_conn); ?>
    </div>
</body>
</html>
