<?php
/**
 * Created by PhpStorm.
 * User: dobrynin
 * Date: 26.06.2018
 * Time: 11:19
 */
session_start();


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
<?php echo date("l dS of F Y h:i:s A"); ?>
    <a href="/index.php">TEST</a>
    <?php
        $count=$_SESSION['count'] ?? 0;
        $count++;
        $_SESSION['count']= $count;
    ?>
Счётчик: <?php echo $count;
                echo '<br>';
                echo session_id();
                echo '<br>';
         ?>
<br>
<?php
    echo sha1('qwerqwerqwer');
echo '<br>';
echo sha1(time());
echo '<br>';
echo sha1(microtime());
?>
</body>
</html>