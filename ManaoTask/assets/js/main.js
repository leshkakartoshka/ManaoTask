/* Авторизация */

$('.button-authorization').click(function (e) 
{
    e.preventDefault();

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();

    $.ajax({
        url: 'vendor/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success (data) {
            if (data.status) {
                document.location.href = 'profile.php';
            }
            else {

                if (data.type === 1) {
                    data.fields.forEach(function (fields) {
                        $(`input[name="${fields}"]`).addClass('error');                   
                    });
                }

                $('.mesage').removeClass('none').text(data.message);
            }
        }
    });
});

/* Регистрация */

$('.button-registration').click(function (e) 
{
    e.preventDefault();

    let login = $('input[name="login"]').val(),
        password = $('input[name="password"]').val();
        confirm_password = $('input[name="confirm_password"]').val();
        email = $('input[name="email"]').val();
        name = $('input[name="name"]').val();

    $.ajax({
        url: 'vendor/signup.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            password: password,
            confirm_password: confirm_password,
            email: email,
            name: name
        },
        success (data) {
            if (data.status) {
                document.location.href = 'index.php';
            }
            else {

                if (data.type === 1) {
                    data.fields.forEach(function (fields) {
                        $(`input[name="${fields}"]`).addClass('error');                   
                    });
                }

                $('.mesage').removeClass('none').text(data.message);
            }
        }
    });
});