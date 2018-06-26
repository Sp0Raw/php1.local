<?php

//var_dump($_POST);

$numA=$_POST['numA'] ?? NULL;
$numB=$_POST['numB'] ?? NULL;

$res=$numA+$numB;

echo $numA.'+'.$numB.'='.$res;