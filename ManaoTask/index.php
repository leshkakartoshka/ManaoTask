<?php
    session_start();

    if ($_SESSION['user'])
    {
        header('location: profile.php');
    }
?>

<!doctype html>
<html lang="ru">
    <head>
        <title>Авторизация</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/mainstyle.css">
		<meta charset="UTF-8">
    </head>
    <body>

        <!-- Форма авторизации -->
        <form>
            <label>логин</label>
            <input type="text" name="login" placeholder="Введите свой логин"/>
            <label>пароль</label>
            <input type="password" name="password" placeholder="Введите свой пароль"/>
            <button type="submit" class="button-authorization">Войти</button>
            <p>У вас нет аккаунта? - <a href="/registration.php">зарегистрируйтесь</a>!</p>
            <p class="mesage none">Не верное имя или пароль</p>
        </form>

        <!-- Подключение скриптов -->
        <script src="assets/js/jquery-3.6.1.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
