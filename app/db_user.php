<?php
    require_once 'db.php';
    require_once 'login/sesion.php';
    /*codigo para buscar */

    if($code==null){

    }else{
        $seeTodo->execute([
            'code' => $code
        ]);
    
    }