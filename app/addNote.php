<?php
    require_once 'db.php';
    require_once 'login/sesion.php';
    $codeUser= $code;
    $colors = array("success", "danger", "warning");
    $color=$colors[array_rand($colors)];
    $title= trim($_POST['title']);
    $type= trim($_POST['type']);
    $note= trim($_POST['note']);
    echo 'codigo: '.$codeUser."<br>";
    echo 'color: '.$color."<br>";
    echo 'title: '.$title."<br>";
    echo 'type: '.$type."<br>";
    echo 'notte: '.$note."<br>";

    
    $insertTodo2->execute([
        'codeUser'=> $codeUser,
        'type'=> $type,
        'title'=> $title,
        'color'=> $color,
        'note'=> $note
    ]);
    header('Location: ../toDo.php');