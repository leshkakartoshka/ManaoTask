<?php
    session_start();

    if (!$_SESSION['user'])
    {
        header('location: /');
    }
?>

<!doctype html>
<html lang="ru">
    <head>
        <title>Профиль</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/mainstyle.css">
		<meta charset="UTF-8">
    </head>
    <body>
        <!-- Форма главной страницы -->
        <form>
            <h2><?= $_SESSION['user']['login'] ?></h2>
            <a href="#"><?= $_SESSION['user']['email'] ?></a>
            <a href="vendor/logout.php" class="logout">Выход</a>
        </form>       
    </body>
</html>