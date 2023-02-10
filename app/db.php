<?php
    require_once 'credentials.php';

    // class BaseDeDatos{
    //     public $db= new PDO('mysql:host=' . DB_SERVER . ';dbname=' .DB_NAME .';', DB_USER, DB_PASS);

    //     public getBaseDeDatos(){
    //         return $db;
    //     }
    // }
    // base
    try{
        $db= new PDO('mysql:host=' . DB_SERVER . ';dbname=' .DB_NAME .';', DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
    }catch(PDOException $e){
        print "Error en la base de datos: " . $e->getMessage(). "<br/>";
        die();
    }


    $insertUser = $db->prepare("
    CALL addUsuario(now(),:name, :email, :nickname, :avatar, '', :password);
    ");

    $updateUser = $db->prepare("
    call updateUsuario(:codeUser, :name, :email, :nickname, :avatar, :phone, :password);
    ");

    $searchUser = $db->prepare("
    CALL searchUsuario(:userr, :passwordd);
    ");

    $searchUserCode = $db->prepare("
    CALL searchUsuarioId(:code);
    ");

    $insertTodo = $db->prepare("
    INSERT INTO todo3(id_usuario, id_tipo, titulo, fecha, color, nota) 
    VALUES(:codeUserr, :typer, :titler, now(), :colorrr, :noter);
    ");

    $insertTodo2 = $db->prepare("
    CALL addToDoUsuarios(:codeUser, :type, :title, now(), :color, :note);
    ");


    $updateTodo = $db->prepare("
    CALL updateToDoUsuario(:nNote, :codeUser, :type, :title, now(), :note);
    ");


    
    $deleteTodo = $db->prepare("
    CALL deleteToDoUsuario(:codeUser, :nNoteDelete);
    ");
    //call addToDoUsuario('1', '2', 'Eres tú', now(), 'success', 'eres la razon de mi existir');



    $seeTipo= $db->prepare("
    SELECT * FROM tipo;
    ");

    $seeTipo->execute();

    /*codigo para buscar */
    $seeTodo = $db->prepare("
    CALL seeToDoUsuario(:code);
    ");

    $seeTodo3 = $db->prepare("
    CALL UsuarioTodo3(:code);
    ");
    // SELECT todo.id AS id, tipo.id AS idTipo, tipo, titulo, fecha, color, nota 
    // FROM todo INNER JOIN tipo
    // ON todo.id_tipo= tipo.id
    // INNER JOIN usuario
    // ON todo.id_usuario= usuario.id
    // WHERE id_usuario=:code LIMIT 3;

    

    $searchTodoLove = $db->prepare("
    call seeToDoAmorUsuario(:code);
    ");
    
    $searchTodoSad = $db->prepare("
    CALL seeTodoTristezaUsuario(:code);
    ");

