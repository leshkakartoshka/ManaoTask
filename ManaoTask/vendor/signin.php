<?php
    session_start();

    $login = $_POST['login'];
    $password = $_POST['password'];

    $errrorFields = [];

    if ($login === '') {
        $error_fields[] = 'login';
    }

    if ($password === '') {
        $error_fields[] = 'password';
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

    $password = md5($password . "MyUniqueSault");

    $data = json_decode(file_get_contents('data.json'), true);
    $bool = false;

    for ($i = 0; $i < count($data); $i++)
    {
        if ($data[$i]['login'] === $login && $data[$i]['password'] === $password)
        {
            $bool= true;

            $_SESSION['user'] = [
                "login" => $data[$i]['login'],
                "email" => $data[$i]['email']
            ];

            $response = [
                "status" => true
            ];

            echo json_encode($response);
            die();
        }
    }

    if(!$bool)
    {
        $response = [
            "status" => false
        ];
        echo json_encode($response);
        die();
    }
?>