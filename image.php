<?php
session_start();

?>

<?php
/**
 * Created by PhpStorm.
 * User: dobrynin
 * Date: 21.06.2018
 * Time: 9:20
 */

$imgDir = __DIR__.'\img';
$arr = scandir($imgDir);
//$arr = [1 => 'cal.jpg',
//    2 => 'pap.jpg',
//    3 => 'flo.jpg',
//    4 => 'grl.jpg',
//    5 => 'fsh.jpg'];
$numImg = $_GET['id'] ?? null;

$template1 = '<a href="/index.php"><img src="/img/<!--IMG-->" ></a>';

if ($_GET['id'] != null) {
    //echo '<img src="/img/' . $arr[$_GET['id']] . '" >';
    echo str_replace('<!--IMG-->', $arr[$numImg], $template1);
}

