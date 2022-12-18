<?php
    session_start();

    // инициализация полей для данных JSON
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $name = $_POST['name'];

    $errrorFields = [];

    if ($login === '') {
        $error_fields[] = 'login';
    }

    if ($password === '') {
        $error_fields[] = 'password';
    }

    if ($confirm_password === '') {
        $error_fields[] = 'confirm_password';
    }

    if ($email === '') {
        $error_fields[] = 'email';
    }

    if ($name === '') {
        $error_fields[] = 'name';
    }

    if (!empty($error_fields)) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Проверьте правильность полей",
            "fields" => $error_fields
        ];

        echo json_encode($response);
        die();
    }

    if (!preg_match("/^(?=.*[a-zа-я])[a-zA-Zа-яА-Я\d]{6,}$/",$login))
    {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Логин должен содержать минимум 6 символов",
            "fields" => ['login']
        ];

        echo json_encode($response);
        die();
    }

    if (!preg_match("/^(?=.*[a-zа-я])(?=.*\d)[a-zA-Zа-яА-Я\d]{6,}$/",$password))
    {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Пароль должен содержать минимум 6 символов и состоять из букв и цифр",
            "fields" => ['password']
        ];

        echo json_encode($response); 
        die();      
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Некорректно введена электронная почта",
            "fields" => ['email']
        ];

        echo json_encode($response);
        die();
    } 

    if (!preg_match("/^[a-zA-Zа-яА-Я]{2,}$/",$name))
    {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Имя должно содержать минимум 2 символа и состоять из букв",
            "fields" => ['name']
        ];

        echo json_encode($response); 
        die();
    }

    $data = json_decode(file_get_contents('../json/data.json'), true);

    for ($i = 0; $i < count($data); $i++)
    {
        if ($data[$i]['login'] === $login)
        {
            $response = [
                "status" => false,
                "type" => 1,
                "message" => "Такой логин уже существует",
                "fields" => ['login']
            ];

            echo json_encode($response);
            die();
        }
    }

    for ($i = 0; $i < count($data); $i++)
    {
        if ($data[$i]['email'] === $email)
        {
            $response = [
                "status" => false,
                "type" => 1,
                "message" => "Такой имэил уже существует",
                "fields" => ['email']
            ];

            echo json_encode($response);
            die();
        }
    }

    // проверка правильности пароля
    if ($password === $confirm_password)
    {
        // хэширование пароля
        $password = md5($password . "MyUniqueSault");

        // массив для данных из JSON
        $user = array(
            'login' => $login,
            'password' => $password,
            'email' => $email,
            'name' => $name,
        );
        
        // вытаскиваем данные из JSON и добавляем новые
        $tempArray = json_decode(file_get_contents('../json/data.json'), true);
        $tempArray[] = $user;
        file_put_contents('../json/data.json', json_encode($tempArray));

        $response = [
            "status" => true,
        ];
        
        echo json_encode($response);
        die();
    }
    else
    {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Пароли не совпадают",
            "fields" => ['password']
        ];

        echo json_encode($response);
        die();
    }
?>