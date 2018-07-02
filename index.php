<?php
session_start();
include __DIR__.'/upload.php';

if (($_GET['logout']?? 0)==1  && ($_SESSION['login']?? false)==true ){
    $_GET['logout']=0;
    $_SESSION['login']=false;
    session_register_shutdown();
    //echo '****>>'.$_SESSION['login'].'<br>';
}
    $users=require_once __DIR__.'/users.php';
    $userData =require_once __DIR__.'/security.php';

    $login = $_POST['login'] ?? null;
    $password = $_POST['password'] ?? null;
    if ($login != null && $password != null && сheckPassword($login, $password) && $_SESSION['login'] == false) {
        echo 'Вы успешно авторизовались';
        $_SESSION['login'] = true;
    } elseif ($login != null && $password != null && сheckPassword($login, $password)==false && $_SESSION['login'] == false) {
        echo 'Неправильный логин или пароль';
        $_SESSION['login'] = false;
    }elseif (($login == null || $password == null ) && $_SESSION['login'] == false){
        echo 'Незаполнены поля';
        $_SESSION['login'] = false;
    }
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
    if ($_SESSION['login']!=true) { ?>
        <form action="/index.php" method="post">
            Имя пользователя: <input type="text" name="login"> <br>
            Пароль: <input type="password" name="password"> <br>
            <button type="submit">Войти</button>
        </form>

    <?php
    } else { ?>
        <h1>Привет
            <?php echo getCurrentUser();
                echo '</h1>';
                if (!empty($_GET['logout'])) {
                    $_SESSION['login'] = false;
                }
            ?>
    <a href="index.php?logout=1" name="logout"> выход </a><br>
    <?php
    }
?>
<?php
if (($_SESSION['login'] ?? false) == true){
    echo 'тут будет форма загрузки фотографии<br>';?>
<form action="/index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="picture"><br>
    <button type="submit">Отправить</button>
</form>
<?php
//    echo 'тут будет форма вывода фотографий<br>';
    echo '=================================<br>';
    $imgDir = __DIR__.'\img';
    $fileArr = scandir($imgDir);
    //var_dump($fileArr);
    foreach ($fileArr as $num => $value){
        if (!in_array($value,array(".",".."))){
//            echo $value;
            ?>
            <a href="/image.php?id=<?php echo $num ?>"><img src="/img/<?php echo $value ?>"
                                                    width="189" height="255" alt="lorem"></a>
            <?php
            if ($num % 4 == 0) {
                echo '<br>';
            }
        }
    }
}
?>

</body>
</html>