<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.2s;
        }

        a:hover {
            color: #0056b3;
        }

        main {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        main h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        main p {
            font-size: 1.2rem;
        }

        main a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            font-size: 1rem;
        }

        main a:hover {
            background-color: #218838;
        }

        header, footer {
            background-color: #fff;
            padding: 15px 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        footer {
            margin-top: 40px;
            border-top: 1px solid #ddd;
            color: #888;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <h1>Добро пожаловать!</h1>
        <p><a href="/articles.php">Перейти к статьям</a></p>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
