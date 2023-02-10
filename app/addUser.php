<?php
    require_once 'db.php';
    $name= trim($_POST['name']);
    $email= trim($_POST['email']);
    $nickname= trim($_POST['nickname']);
    $password= trim($_POST['password']);
    $avatar= trim($_POST['avatar']);
    echo 'nombre: '.$name."<br>";
    echo 'email: '.$email."<br>";
    echo 'nickname: '.$nickname."<br>";
    echo 'password: '.$password."<br>";
    echo 'avatar: '.$avatar."<br>";

    $insertUser->execute([
        'name'=> $name,
        'email'=> $email,
        'nickname'=> $nickname,
        'avatar'=> $avatar,
        'password'=> $password
    ]);
    header('Location: ../login.html');