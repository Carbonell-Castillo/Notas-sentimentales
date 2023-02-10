<?php
    require_once 'db.php';
    require_once 'login/sesion.php';
    $codeUser= $code;
    $newName= trim($_POST['name']);
    $email= trim($_POST['email']);
    $nickname= trim($_POST['nickname']);
    $password= trim($_POST['password']);
    $phone= trim($_POST['phone']);
   
    $newAvatar= trim($_POST['avatar']);
    echo 'nombre: '.$name."<br>";
    echo 'email: '.$email."<br>";
    echo 'nickname: '.$nickname."<br>";
    echo 'password: '.$password."<br>";
    echo 'avatar: '.$avatar."<br>";

    $updateUser->execute([
        'codeUser'=> $codeUser,
        'name'=> $newName,
        'email'=> $email,
        'nickname'=> $nickname,
        'avatar'=> $newAvatar,
        'phone'=> $phone,
        'password'=> $password
    ]);
    $_SESSION['avatar']=$newAvatar;
    $_SESSION['name']=$newName;
    $avatar=$newAvatar;
    $name=$newName;
    header('Location: ../profile.php');

    