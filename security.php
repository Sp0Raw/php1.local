<?php
/**
 * Created by PhpStorm.
 * User: dobrynin
 * Date: 26.06.2018
 * Time: 12:28
 */
session_start();

function getUsersList(){
    $hash=password_hash('admin',PASSWORD_DEFAULT);
    $users = ['user1'=> '$2y$10$N40Jpm5sDjgsTEXAYj/c5uH3dfMe.rTkP5o4/BSpKS/LJotD4to.6',  // 123456789
              'user2'=> '$2y$10$N40Jpm5sDjgsTEXAYj/c5uH3dfMe.rTkP5o4/BSpKS/LJotD4to.6',  // 123456789
              'admin'=> '$2y$10$Bh75GDnUeNuLOVamZwgxM.O7cHNrIOJ0ZK1yu4K0DYwW.0sdS/mWa'  // admin
             ];
    return $users;
}

function existsUser($login){
    $res = 0;
    foreach (getUsersList() as $key => $value){
        echo '<br> '.$key .'    '.$value;
        if ($key==$login){
            $res=1;
            echo 'key= '.$key.'   value='.$value. '     ======= > '.$res;
        }else{
            echo 'key= '.$key.'   value='.$value;
        }
    }
    return $res;
}

function сheckPassword($login, $password){
    $arr=getUsersList();
    return password_verify($password,$arr[$login]);
}

function getCurrentUser(){

}