<?php
    require_once 'db.php';
    require_once 'login/sesion.php';
    $codeUser= $code;
    $nNoteDelete= trim($_POST['nNoteDelete']);
    
    //  echo 'codigo: '.$codeUser."<br>";
    //  echo 'nNote: '.$nNoteDelete."<br>";
    // // echo 'title: '.$title."<br>";
    // // echo 'type: '.$type."<br>";
    // // echo 'notte: '.$note."<br>";

    
    $deleteTodo->execute([
        'codeUser'=> $codeUser,
        'nNoteDelete'=> $nNoteDelete
    ]);
    header('Location: ../notes.php');