<?php include '../includes/header.php'; ?>
<main>
    <h1>О нас</h1>
    <p>Добро пожаловать на страницу о нас! Здесь будет информация о нашей компании, миссии и ценностях.</p>
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

    p {
        font-size: 1.2rem;
        color: #555;
        line-height: 1.7;
        margin-top: 20px;
    }


    @media (max-width: 768px) {
        main {
            margin: 20px;
            padding: 15px;
        }

        h1 {
            font-size: 2rem;
        }

        p {
            font-size: 1rem;
        }
    }
</style>
