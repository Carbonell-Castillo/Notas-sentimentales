<?php
    require_once 'db.php';
    require_once 'login/sesion.php';
    $codeUser= $code;
    $nNote= trim($_POST['nNote']);
    $title= trim($_POST['title']);
    $type= trim($_POST['type']);
    $note= trim($_POST['note']);
    echo 'codigo: '.$codeUser."<br>";
    echo 'nNote: '.$nNote."<br>";
    echo 'title: '.$title."<br>";
    echo 'type: '.$type."<br>";
    echo 'notte: '.$note."<br>";

    
    $updateTodo->execute([
        'nNote'=> $nNote,
        'codeUser'=> $codeUser,
        'type'=> $type,
        'title'=> $title,
        'note'=> $note
    ]);
    // header('Location: ../notes.php');