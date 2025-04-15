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
