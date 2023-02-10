<?php
    require_once 'app/login/validation.php';
    // require_once 'app/db.php';
//     $db = new mysqli('localhost', 'root', '', 'isForYou35');
//     if ($db->connect_errno != null) {
//    echo "Error número $db->connect_errno conectando a la base de datos.<br>Mensaje: $db->connect_error.";
//    exit(); 
// }

    require_once 'app/login/sesion.php';
    require_once 'app/db.php';
?>
    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
        <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
        <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">

        <!-- cdn boostrap 5 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!-- CSS -->
        <link rel="stylesheet" href="css/home/navbar.css">
        <link rel="stylesheet" href="css/home/home.css">
    </head>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"><a href="profile.php"> <img src="images/home/<?php echo $avatar; ?>.jpg" alt=""></a> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav-bar">
                <div>
                    <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">isForYou</span> </a>
                    <div class="nav_list">
                        <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Inicio</span> </a>
                        <a href="toDo.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Ingresar nota</span> </a>
                        <a href="notes.php" class="nav_link"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Visualizar notas</span> </a>
                        <a href="profile.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Perfil</span> </a>
                    </div>
                </div>
                <a href="app/login/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar sesion </span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 content-all">
            <h3>Bievenido
                <?php echo $name; ?> 👋</h3><br>
            <!-- menu -->
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card card-estadisticas">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-pencil primary font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>
                                            <?php
                                            //$resultado = $db->query('SELECT * FROM todo');
                                            // $consulta = "CALL seeToDoUsuario('$code')";
                                            // $resultado = $db->query($consulta);
                                            // $registros = $resultado->num_rows;
                                            //  echo $registros;
                                            $db= new PDO('mysql:host=' . DB_SERVER . ';dbname=' .DB_NAME .';', DB_USER, DB_PASS);

                                            $seeTodo->execute([
                                                'code' => $code
                                            ]);    
                                            echo $seeTodo->rowCount();
                                             ?>
                                        </h3>
                                        <span>Notas agregadas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card card-estadisticas">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-speech warning font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>
                                            <?php 
                                            // $db2 = new mysqli('localhost', 'root', '', 'isForYou35');
                                            // $consulta2 = "SELECT * FROM tipo";
                                            // $resultado2 = $db2->query($consulta2);
                                            // $registros2 = $resultado2->num_rows;
                                            //  echo $registros2;
                                            $db= new PDO('mysql:host=' . DB_SERVER . ';dbname=' .DB_NAME .';', DB_USER, DB_PASS);
                                            $searchTodoThink = $db->prepare("
                                            call UsuarioPensamientoTodo(:code);
                                            ");
                                            $searchTodoThink->execute([
                                               'code' => $code
                                           ]);
                                           echo $searchTodoThink->rowCount();
                                            ?>
                                        </h3>
                                        <span>Nuevos Pensamientos</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card card-estadisticas">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-heart success font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>
                                        <?php 
                                            // $db2 = new mysqli('localhost', 'root', '', 'isForYou35');
                                            // $consulta2 = "SELECT * FROM tipo";
                                            // $resultado2 = $db2->query($consulta2);
                                            // $registros2 = $resultado2->num_rows;
                                            //  echo $registros2;
                                            $db= new PDO('mysql:host=' . DB_SERVER . ';dbname=' .DB_NAME .';', DB_USER, DB_PASS);
                                            $searchTodoLove = $db->prepare("
                                            call seeToDoAmorUsuario(:code);
                                            ");
                                            $searchTodoLove->execute([
                                               'code' => $code
                                           ]);
                                           echo $searchTodoLove->rowCount();
                                            ?>
                                        </h3>
                                        <span>Nuevas frases</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card card-estadisticas">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-graph danger font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>
                                        <?php 
                                            // $db2 = new mysqli('localhost', 'root', '', 'isForYou35');
                                            // $consulta2 = "SELECT * FROM tipo";
                                            // $resultado2 = $db2->query($consulta2);
                                            // $registros2 = $resultado2->num_rows;
                                            //  echo $registros2;
                                            $db= new PDO('mysql:host=' . DB_SERVER . ';dbname=' .DB_NAME .';', DB_USER, DB_PASS);
                                            $searchTodoSad = $db->prepare("
                                            CALL seeTodoTristezaUsuario(:code);
                                            ");
                                            $searchTodoSad->execute([
                                               'code' => $code
                                           ]);
                                           echo $searchTodoSad->rowCount();
                                            ?>
                                        </h3>
                                        <span>Triste</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Recent students -->
            <h3 class="t-40">Recientes</h3>



            <div class="container">
                <div class="row">
                    <?php 
                      // $db2 = new mysqli('localhost', 'root', '', 'isForYou35');
                      // $consulta2 = "SELECT * FROM tipo";
                      // $resultado2 = $db2->query($consulta2);
                      // $registros2 = $resultado2->num_rows;
                      //  echo $registros2;
                      $db= new PDO('mysql:host=' . DB_SERVER . ';dbname=' .DB_NAME .';', DB_USER, DB_PASS);
                      $seeTodo3 = $db->prepare("
                        CALL UsuarioTodo3(:code);
                      ");         
                      $seeTodo3->execute([
                         'code' => $code
                     ]);
                        foreach($seeTodo3 as $row):
                    ?>
                    <div class="col-lg-4">
                        <div class="card card-margin card-preview">
                            <div class="card-body">
                                <div class="widget-49">
                                    <div class="widget-49-title-wrapper">
                                        <div class="widget-49-date-warning">
                                            <span class="widget-49-date-day"><?php echo $row['id'];?></span>
                                        </div>
                                        <div class="widget-49-meeting-info">
                                            <span class="widget-49-pro-title"><?php echo $row['titulo'];?></span>
                                            <span class="widget-49-meeting-time"><?php echo $row['fecha'];?></span>
                                        </div>
                                    </div>
                                    <ol class="widget-49-meeting-points">
                                        <span><?php echo $row['nota']?></span>

                                    </ol>
                                    <div class="widget-49-meeting-action">
                                        
                                        <a href="notes.php" class="text-white">Ver todo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endforeach;
                    ?>
                </div>
            </div>
        </div>
        <!--Container Main end-->

    </html>
    <script src="JavaScript/navbar-home.js"></script>
