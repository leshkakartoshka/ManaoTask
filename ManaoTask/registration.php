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
        <title>Регистрация</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/mainstyle.css">
		<meta charset="UTF-8">
    </head>
    <body>
        <!-- Форма регистрации -->
        <form>
            <label>логин</label>
            <input type="text" name="login" placeholder="Введите свой логин"/>
            <label>пароль</label>
            <input type="password" name="password" placeholder="Введите свой пароль"/>
            <label>подтверждение пароля</label>
            <input type="password" name="confirm_password" placeholder="Введите свой пароль ещё раз"/>
            <label>электронная почта</label>
            <input type="email" name="email"  placeholder="Введите адрес своей электронной почты "/>
            <label>имя</label>
            <input type="text" name="name" placeholder="Введите своё имя"/>
            <button type="submit" class="button-registration">Зарегистрироваться</button>
            <p>
                У вас уже есть аккаунт? - <a href="/index.php">авторизируйтесь</a>!
            </p>
            <p class="mesage none">'Пароли не совпадает'</p>
        </form>

        <!-- Подключение скриптов -->
        <script src="assets/js/jquery-3.6.1.min.js"></script>
        <script src="assets/js/main.js"></script>
    </body>
</html>
