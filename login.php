<?php
/**
 * Created by PhpStorm.
 * User: dobrynin
 * Date: 26.06.2018
 * Time: 14:20
 */
    session_start();
    include __DIR__ . '/security.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="/login.php" method="post">
    Имя пользователя: <input type="text" name="login">
    <br>
    Пароль: <input type="password" name="password">
    <br>
    <button type="submit">Войти</button>

</form>
<?php
    $login=$_POST['login'] ?? null;
    echo $login;
    $password=$_POST['password'] ?? null;
    echo $password;
    if ($login!=null && $password!=null){
        if (сheckPassword($login, $password)) {
            echo 'Вы успешно авторизовались';
            $arr=getUsersList();
            $_SESSION[$arr[$login]]=true;
            return true;
        }else{
            echo 'что то пошло не так';
            return false;
        }
    }


///
?>
</body>
</html>
