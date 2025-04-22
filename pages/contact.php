<?php include '../includes/header.php'; ?>
<main>
    <h1>Контакты</h1>
    <form method="post">
        <input type="text" name="name" placeholder="Имя" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="message" placeholder="Ваше сообщение" required></textarea>
        <button type="submit">Отправить</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        if (empty($name) || empty($email) || empty($message)) {
            $error = "Все поля обязательны для заполнения!";
        } else {
            $success = "Спасибо, ваше сообщение отправлено!";
        }
    }
    ?>

    <?php if (isset($error)): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php elseif (isset($success)): ?>
        <p style="color:green;"><?= $success ?></p>
    <?php endif; ?>
</main>

<?php include '../includes/footer.php'; ?>

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

    main {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        text-align: center;
    }

    h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
        color: #2c3e50;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    input, textarea {
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        transition: border 0.3s;
    }

    input:focus, textarea:focus {
        border-color: #3498db;
        outline: none;
    }

    input[type="text"], input[type="email"] {
        width: 100%;
    }

    textarea {
        width: 100%;
        min-height: 150px;
        resize: vertical;
    }

    button {
        padding: 12px;
        font-size: 16px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background 0.3s;
    }

    button:hover {
        background-color: #218838;
    }

    p {
        font-size: 1.2rem;
        margin-top: 20px;
    }

    p.success {
        color: green;
    }

    p.error {
        color: red;
    }

    @media (max-width: 768px) {
        main {
            margin: 20px;
            padding: 15px;
        }

        input, textarea, button {
            width: 100%;
        }
    }
</style>
