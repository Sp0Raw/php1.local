<?php
session_start();

?>

<?php
/**
 * Created by PhpStorm.
 * User: dobrynin
 * Date: 21.06.2018
 * Time: 14:44
 */

var_dump($_FILES);
echo __DIR__.'/picture/test.jpg';

if (isset($_FILES['picture'])){
    if(0==$_FILES['picture']['error']){
        move_uploaded_file(
            $_FILES['picture']['tmp_name'],
            __DIR__.'/pictures/'.$_FILES['picture']['name']
        );
    }
}
