<?php
session_start();

if ($_SESSION['$2y$10$Bh75GDnUeNuLOVamZwgxM.O7cHNrIOJ0ZK1yu4K0DYwW.0sdS/mWa']==true) {
//    include(__DIR__.'/login.php');
    $i++;
//    exit();
}
    session_start();
//    setcookie('username','admin');
//    setcookie('secret',sha1('13.05.1985'));

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
<h1>Привет <?php var_dump(getCurrentUser());?></h1>

<br>
<?php
var_dump(сheckPassword('admin','qw3eadfa'));

?>


<br>
<br>
<br>

<?php
echo 'getUsersList()<br>';
var_dump(getUsersList());
echo '<br> existsUser(\'admin\')';
echo '<br> ================> ';
var_dump(existsUser('admin'));

echo '<br>   res  '.existsUser('admin');
?>
<br>
<?php

$password='12asdf3456';

echo password_hash($password, PASSWORD_DEFAULT);
echo  '<br>';
$db='$2y$10$JiFjgYBQxA2vCxDGKxM7LeaePVXrImjbSE/WRJ.NsQrBmvUZo0Oju'; // типа хешь из БД
echo  '<br>';
var_dump(password_verify($password,$db));
echo  '<br>';
?>


<?php
if ($_COOKIE['username']== 'admin' && $_COOKIE['secret']== sha1($users['admin'])) {
    ?> Вы админ!!! <br>

    <?php
}
?>

<a href="/test.php">TEST</a>
<?php
    $count=$_SESSION['count'] ?? 0;
    $count++;
    $_SESSION['count']= $count;

?>
Счётчик: <?php echo $count?>
<br>

<?php
$array = ['val1', 'val2', 'val3'];
foreach ($array as $value) {
    echo $value . '<br>';
}
//echo ($_GET['name']) . '<br>';
var_dump($_GET);

$name = $_GET['name'] ?? null;
?>

<form action="/send.php" method="post">
    Имя пользователя: <input type="text" name="login">
    <br>
    Пароль: <input type="password" name="password">
    <br>
    <button type="submit">Войти</button>

</form>

<form action="/index.php" method="post">
    A: <input type="text" name="numA">
    <br>
    B: <input type="text" name="numB">
    <br>
    <button type="submit">Считать</button>

</form>

<?php

//var_dump($_POST);

$numA = $_POST['numA'] ?? NULL;
$numB = $_POST['numB'] ?? NULL;

$res = $numA + $numB;
if ($numA != null && $numB != null) {
    echo $numA . '+' . $numB . '=' . $res;
}
?>

<?php
$arr = [1 => 'cal.jpg',
    2 => 'pap.jpg',
    3 => 'flo.jpg',
    4 => 'grl.jpg',
    5 => 'fsh.jpg'];
foreach ($arr as $num => $phName) {
    ?>
    <a href="/image.php?id=<?php echo $num ?>"><img src="/img/<?php echo $phName ?>"
                                                    width="189" height="255" alt="lorem"></a>
    <?php echo $num ?>
    <?php
    if ($num % 4 == 0) {
        echo '<br>';
    }
}
?>
<br>
<?php
$path = __DIR__ . '/text.txt';

$fh = fopen($path, 'r');
var_dump($fh);
echo '<br>';
while (!feof($fh)) {
    $line = fgets($fh);
    echo $line;
}
fclose($fh);
echo '<br>';
//   file_put_contents()
var_dump(scandir(__DIR__));

?>

<?php

?>
<form action="/upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="picture"><br>
    <button type="submit">Отправить</button>
</form>

</body>
</html>