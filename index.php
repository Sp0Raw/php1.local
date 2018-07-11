<?php
session_start();

if ($_GET['logout']==1 && $_SESSION['login']==true){
    $_GET['logout']=0;
    $_SESSION['login']=false;
    session_register_shutdown();
    //echo '****>>'.$_SESSION['login'].'<br>';
}
    $users=require_once __DIR__.'/users.php';
    $userData =require_once __DIR__.'/security.php';

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
<?php
    //var_dump($_SESSION['login']);
    //echo '<br>'.$_SESSION['login'].'<br>';
?>
<?php
    if ($_SESSION['login']!=true) { ?>
    <form action="/index.php" method="post">
        Имя пользователя: <input type="text" name="login"> <br>
        Пароль: <input type="password" name="password"> <br>
        <button type="submit">Войти</button>
    </form>
    <?php
    $login = $_POST['login'] ?? null;
    //echo '**LOGIN**' . $login . '<br>';
    $password = $_POST['password'] ?? null;
    //echo '**PASS**' . $password . '<br>';
    //var_dump($_SESSION['login']);
    //echo '=================<br>';
    //var_dump(сheckPassword($login, $password));
    //echo '=================<br>';
    if ($login != null && $password != null && сheckPassword($login, $password)) {
        echo 'Вы успешно авторизовались';
        $arr = getUsersList();
        //$_SESSION[$arr[$login]]=true;
        $_SESSION['login'] = true;
        //return true;
        exit;
    } elseif ($login != null && $password != null && сheckPassword($login, $password)==false) {
        echo 'Неправильный логин или пароль';
        $_SESSION['login'] = false;
    }elseif ($login == null || $password != null ) {
       // echo 'Незаполнены поля';
        $_SESSION['login'] = false;
    }
}
    else {
    ?>

<h1>Привет <?php var_dump(getCurrentUser()) . '</h1>';
    echo '<br>=================-------------<br>';
    var_dump($_SESSION['login']);
    echo '<br>';
    echo '<br>';
    if ($_GET['logout'] == 1) {
        $_SESSION['login'] = false;
    }
    ?>
    <a href="index.php?logout=1" name="logout"> выход </a>
    <?php
    }
?>

</body>
</html>