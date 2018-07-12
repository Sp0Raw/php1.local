<?php

/**
 * Created by PhpStorm.
 * User: dobrynin
 * Date: 26.06.2018
 * Time: 12:28
 */
/* Вернёт пользователей и их хеши паролей */
function getUsersList(){
    $hash=password_hash('admin',PASSWORD_DEFAULT);
    $users = ['user1'=> '$2y$10$Bh75GDnUeNuLOVamZwgxM.O7cHNrIOJ0ZK1yu4K0DYwW.0sdS/mWa',  // 123456789
              'user2'=> '$2y$10$Bh75GDnUeNuLOVamZwgxM.O7cHNrIOJ0ZK1yu4K0DYwW.0sdS/mWa',  // 123456789
              'admin'=> '$2y$10$Bh75GDnUeNuLOVamZwgxM.O7cHNrIOJ0ZK1yu4K0DYwW.0sdS/mWa'  // admin
             ];
    return $users;
}

/* Проверка существования пользователя */
function existsUser($login){
    $res = 0;
    foreach (getUsersList() as $key => $value){
        //echo '<br> '.$key .'    '.$value;
        if ($key==$login){
            $res=1;
//            echo 'key= '.$key.'   value='.$value. '     ======= > '.$res;
//        }else{
//            echo 'key= '.$key.'   value='.$value;
        }
    }
    return $res;
}

/* проверяет пользователя и пароль */
function сheckPassword($login, $password){
    $arr=getUsersList();
//    var_dump($arr[$login]);
//    var_dump(existsUser($login));
//    var_dump(password_verify($password,$arr[$login]));
    if (existsUser($login) && password_verify($password,$arr[$login])) {
       $_SESSION['username']= $login;
//       echo 'записываем юзер найм';
//       echo '$arr[$login]=' . $arr[$login];
//       echo 'Читаем юзер найм';
//       echo '$_SESSION[\'username\']='.$_SESSION['username'];
       $_SESSION['login']=true;
       //exit;
    }
    return password_verify($password,($arr[$login] ?? null));
}

function getCurrentUser(){
    return $_SESSION['username'] ?? '';
}

