<?php
    require_once 'app/login/validation.php';
    require_once 'app/db_user.php'; 
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!-- CSS -->
        <link rel="stylesheet" href="css/home/navbar.css">

        <link rel="stylesheet" href="css/home/home.css">
        <link rel="stylesheet" href="css/home/notes.css">
    </head>

    <body id="body-pd">
        <div class="notification">
            <div class="notification__message message--info">
                <h1>Info</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                <button aria-labelledby="button-dismiss">
                <span id="button-dismiss" hidden>Dismiss</span>
                <svg viewBox="0 0 100 100" width="10" height="10">
                    <g
                        stroke="currentColor"
                        stroke-width="6"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        fill="none">
                        
                        <g transform="translate(50 50) rotate(45)">
                            
                            <path
                                d="M 0 -30 v 60 z M -30 0 h 60">
                            </path>
                        </g>
                    </g>
                </svg>
            </button>
            </div>
        </div>
        <!-- Modal para eliminar -->
        <section class="modal-start" id="delete-modal">
            <section class="content-delete">
                <form action="app/deleteNote.php" method="POST">
                    <input type="text" class="form-control d-none" name="nNoteDelete" id="nNoteDelete" placeholder="Titulo">
                    <section class="header-delete">
                        <div class="icon-box">
                            <i class="bx bx-x"></i>
                        </div>
                        <p>¿Estas seguro que quierres borrar el elemento?</p>
                    </section>
                    <section class="footer-delete">
                        <button type="button" class="btn btn-secondary" onclick="closeModal(2)">Cancelar</button>
                        <button type="submit" class="btn btn-danger" id="eliminar">Eliminar</button>
                    </section>
                </form>
            </section>
        </section>


        <!-- Comienza modal -->
        <section class="modal-start" id="edit-modal">
            <section class="content-edit">
                <section class="header-edit">
                    <h3>Editar datos</h3>
                </section>
                <section class="body-edit">
                    <form action="app/editNote.php" method="POST">
                        <input type="text" class="form-control d-block" name="nNote" id="nNote" placeholder="Titulo">
                        <!-- Titulo -->
                        <div class="form-floating">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Titulo">
                            <label for="floatingTextarea2" style="color: black;">Titulo</label>
                        </div>
                        <!-- Type -->
                        <div class="form-floating">
                            <select class="form-select" id="type" aria-label="Floating label select example" name="type">
                            <?php
                            foreach($seeTipo as $row):
                            ?>
                            <option value='<?php echo $row['id'];?>'><?php echo $row['tipo'];?></option>
                            <?php 
                            endforeach;
                            ?>
                            </select>
                            <label for="floatingTextarea2" style="color: black;">Tipo</label>
                        </div>
                        <!-- text -->
                        <div class="form-floating note">
                            <textarea class="form-control note" placeholder="Nota" style="height: 130px" id="note" name="note"></textarea>
                            <label for="floatingTextarea2" style="color: black;">Nota</label>
                        </div>
                    
                </section>
                <div class="edit-footer">
                    <button type="button" class="btn btn-danger" onclick="closeModal(1)">Cerrar</button>
                    <button type="submit" class="btn btn-success" id="modificar">Modificar</button>
                </div>
                </form>
            </section>
        </section>
        <!-- Finaliza modal -->
        <!-- navbar -->
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"><a href="profile.php"> <img src="images/home/<?php echo $avatar; ?>.jpg" alt=""></a> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav-bar">
                <div>
                    <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">isForYou</span> </a>
                    <div class="nav_list">
                        <a href="home.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Inicio</span> </a>
                        <a href="toDo.php" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Ingresar nota</span> </a>
                        <a href="#" class="nav_link active"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Visualizar notas</span> </a>
                        <a href="profile.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Perfil</span> </a>
                    </div>
                </div>
                <a href="app/login/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar sesion </span> </a>
            </nav>
        </div>


        <!--Container Main start-->
        <div class="height-100 content-all">
            <h3>Notas ✔</h3><br>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active btn" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">Todo</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn" id="pills-think-tab" data-bs-toggle="pill" data-bs-target="#pills-think" type="button" role="tab" aria-controls="pills-think" aria-selected="false">Pensamientos</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn" id="pills-love-tab" data-bs-toggle="pill" data-bs-target="#pills-love" type="button" role="tab" aria-controls="pills-love" aria-selected="false">Amor</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn" id="pills-sad-tab" data-bs-toggle="pill" data-bs-target="#pills-sad" type="button" role="tab" aria-controls="pills-sad" aria-selected="false">Triste</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link btn" id="pills-another-tab" data-bs-toggle="pill" data-bs-target="#pills-another" type="button" role="tab" aria-controls="pills-another" aria-selected="false">Otro</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <!-- star container -->
                    <div class="container">
                        <div class="row">
                            <?php 
                                foreach($seeTodo as $row):
                            ?>
                            <div class="col-lg-4">
                                <div class="card card-margin card-preview">
                                    <div class="card-body">
                                        <div class="widget-49">
                                            <div class="widget-49-title-wrapper">
                                                <div class="widget-49-date-<?php echo $row['color']; ?>">
                                                    <span class="widget-49-date-day"><?php echo $row['id']; ?></span>
                                                </div>
                                                <div class="widget-49-meeting-info">
                                                    <span class="widget-49-pro-title"><?php echo $row['titulo']; ?></span>
                                                    <span class="widget-49-meeting-time"><?php echo $row['fecha']; ?></span>
                                                </div>
                                            </div>
                                            <ol class="widget-49-meeting-points">
                                                <span><?php echo $row['nota']; ?></span>

                                            </ol>
                                            <div class="widget-49-meeting-action">
                                                <textarea class="form-control noteCopy" placeholder="Nota" style="height: 0px;" id="noteCopy" name="note"></textarea>
                                                <button class="border-0 btn-transition btn btn-outline-success btn-success btnCopy" id="btnCopy" onclick="copy('<?php echo $row['titulo']; ?>', '<?php echo $row['nota']; ?>')"> <i class="bx bx-copy"></i> </button>
                                                <button class="border-0 btn-transition btn btn-outline-primary btn-primary btnDelete" id="btnModify" onclick="showModal( '<?php echo $row['id'];?>', '<?php echo $row['titulo']; ?>', '<?php echo $row['idTipo']; ?>', '<?php echo $row['nota']; ?>')"> <i class="bx bx-pencil"></i> </button>
                                                <button class="border-0 btn-transition btn btn-outline-danger btn-danger btnModify" id="btnDelete" onclick="showModalDelete('<?php echo $row['id']; ?>')"> <i class="bx bx-trash"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                endforeach;
                            ?>
                            <!-- ;ast -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-think" role="tabpanel" aria-labelledby="pills-think-tab">
                    <div class="container">
                        <div class="row">
                            <?php 
                               
                               $db= new PDO('mysql:host=' . DB_SERVER . ';dbname=' .DB_NAME .';', DB_USER, DB_PASS);
                               $searchTodoThink = $db->prepare("
                               call UsuarioPensamientoTodo(:code);
                               ");
                               $searchTodoThink->execute([
                                  'code' => $code
                              ]);
                               
                                foreach($searchTodoThink as $row):
                            ?>
                          <div class="col-lg-4">
                                <div class="card card-margin card-preview">
                                    <div class="card-body">
                                        <div class="widget-49">
                                            <div class="widget-49-title-wrapper">
                                                <div class="widget-49-date-<?php echo $row['color']; ?>">
                                                    <span class="widget-49-date-day"><?php echo $row['id']; ?></span>
                                                </div>
                                                <div class="widget-49-meeting-info">
                                                    <span class="widget-49-pro-title"><?php echo $row['titulo']; ?></span>
                                                    <span class="widget-49-meeting-time"><?php echo $row['fecha']; ?></span>
                                                </div>
                                            </div>
                                            <ol class="widget-49-meeting-points">
                                                <span><?php echo $row['nota']; ?></span>

                                            </ol>
                                            <div class="widget-49-meeting-action">
                                                <textarea class="form-control noteCopy" placeholder="Nota" style="height: 0px;" id="noteCopy" name="note"></textarea>
                                                <button class="border-0 btn-transition btn btn-outline-success btn-success btnCopy" id="btnCopy" onclick="copy('<?php echo $row['titulo']; ?>', '<?php echo $row['nota']; ?>')"> <i class="bx bx-copy"></i> </button>
                                                <button class="border-0 btn-transition btn btn-outline-primary btn-primary btnDelete" id="btnModify" onclick="showModal( '<?php echo $row['id'];; ?>', '<?php echo $row['titulo']; ?>', '<?php echo $row['idTipo']; ?>', '<?php echo $row['nota']; ?>')"> <i class="bx bx-pencil"></i> </button>
                                                <button class="border-0 btn-transition btn btn-outline-danger btn-danger btnModify" id="btnDelete" onclick="showModalDelete('<?php echo $row['id']; ?>')"> <i class="bx bx-trash"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                endforeach;
                            ?>
                            
                        
                          
                            <!-- ;ast -->
                        </div>
                    </div>
                    <!-- last contaienr -->


                </div>
                <div class="tab-pane fade" id="pills-love" role="tabpanel" aria-labelledby="pills-love-tab">
                    <!-- star container -->
                    <div class="container">
                        <div class="row">
                        <?php 
                               $db= new PDO('mysql:host=' . DB_SERVER . ';dbname=' .DB_NAME .';', DB_USER, DB_PASS);
                               $searchTodoLove = $db->prepare("
                               call seeToDoAmorUsuario(:code);
                               ");
                               $searchTodoLove->execute([
                                  'code' => $code
                              ]);
                               
                                foreach($searchTodoLove as $row):
                            ?>
                          <div class="col-lg-4">
                                <div class="card card-margin card-preview">
                                    <div class="card-body">
                                        <div class="widget-49">
                                            <div class="widget-49-title-wrapper">
                                                <div class="widget-49-date-<?php echo $row['color']; ?>">
                                                    <span class="widget-49-date-day"><?php echo $row['id']; ?></span>
                                                </div>
                                                <div class="widget-49-meeting-info">
                                                    <span class="widget-49-pro-title"><?php echo $row['titulo']; ?></span>
                                                    <span class="widget-49-meeting-time"><?php echo $row['fecha']; ?></span>
                                                </div>
                                            </div>
                                            <ol class="widget-49-meeting-points">
                                                <span><?php echo $row['nota']; ?></span>

                                            </ol>
                                            <div class="widget-49-meeting-action">
                                                <textarea class="form-control noteCopy" placeholder="Nota" style="height: 0px;" id="noteCopy" name="note"></textarea>
                                                <button class="border-0 btn-transition btn btn-outline-success btn-success btnCopy" id="btnCopy" onclick="copy('<?php echo $row['titulo']; ?>', '<?php echo $row['nota']; ?>')"> <i class="bx bx-copy"></i> </button>
                                                <button class="border-0 btn-transition btn btn-outline-primary btn-primary btnDelete" id="btnModify" onclick="showModal( '<?php echo $row['id'];; ?>', '<?php echo $row['titulo']; ?>', '<?php echo $row['idTipo']; ?>', '<?php echo $row['nota']; ?>')"> <i class="bx bx-pencil"></i> </button>
                                                <button class="border-0 btn-transition btn btn-outline-danger btn-danger btnModify" id="btnDelete" onclick="showModalDelete('<?php echo $row['id']; ?>')"> <i class="bx bx-trash"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                endforeach;
                            ?>

                            <!-- ;ast -->
                        </div>
                    </div>
                    <!-- last contaienr -->

                </div>
                <div class="tab-pane fade" id="pills-sad" role="tabpanel" aria-labelledby="pills-sad-tab">
                    <!-- star container -->
                    <div class="container">
                        <div class="row">
                        <?php 
                               $db= new PDO('mysql:host=' . DB_SERVER . ';dbname=' .DB_NAME .';', DB_USER, DB_PASS);
                               $searchTodoSad = $db->prepare("
                               CALL seeTodoTristezaUsuario(:code);
                               ");
                               $searchTodoSad->execute([
                                  'code' => $code
                              ]);
                               
                                foreach($searchTodoSad as $row):
                            ?>
                          <div class="col-lg-4">
                                <div class="card card-margin card-preview">
                                    <div class="card-body">
                                        <div class="widget-49">
                                            <div class="widget-49-title-wrapper">
                                                <div class="widget-49-date-<?php echo $row['color']; ?>">
                                                    <span class="widget-49-date-day"><?php echo $row['id']; ?></span>
                                                </div>
                                                <div class="widget-49-meeting-info">
                                                    <span class="widget-49-pro-title"><?php echo $row['titulo']; ?></span>
                                                    <span class="widget-49-meeting-time"><?php echo $row['fecha']; ?></span>
                                                </div>
                                            </div>
                                            <ol class="widget-49-meeting-points">
                                                <span><?php echo $row['nota']; ?></span>

                                            </ol>
                                            <div class="widget-49-meeting-action">
                                                <textarea class="form-control noteCopy" placeholder="Nota" style="height: 0px;" id="noteCopy" name="note"></textarea>
                                                <button class="border-0 btn-transition btn btn-outline-success btn-success btnCopy" id="btnCopy" onclick="copy('<?php echo $row['titulo']; ?>', '<?php echo $row['nota']; ?>')"> <i class="bx bx-copy"></i> </button>
                                                <button class="border-0 btn-transition btn btn-outline-primary btn-primary btnDelete" id="btnModify" onclick="showModal( '<?php echo $row['id'];; ?>', '<?php echo $row['titulo']; ?>', '<?php echo $row['idTipo']; ?>', '<?php echo $row['nota']; ?>')"> <i class="bx bx-pencil"></i> </button>
                                                <button class="border-0 btn-transition btn btn-outline-danger btn-danger btnModify" id="btnDelete" onclick="showModalDelete('<?php echo $row['id']; ?>')"> <i class="bx bx-trash"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                endforeach;
                            ?>

                            <!-- ;ast -->
                        </div>
                    </div>
                    <!-- last contaienr -->
                </div>
                <div class="tab-pane fade" id="pills-another" role="tabpanel" aria-labelledby="pills-another-tab">
                    <!-- star container -->
                    <div class="container">
                        <div class="row">
                        <?php 
                               $db= new PDO('mysql:host=' . DB_SERVER . ';dbname=' .DB_NAME .';', DB_USER, DB_PASS);
                               $searchTodoOtro = $db->prepare("
                               CALL seeToDoOtroUsuario(:code);
                               ");
                               $searchTodoOtro->execute([
                                  'code' => $code
                              ]);
                               
                                foreach($searchTodoOtro as $row):
                            ?>
                          <div class="col-lg-4">
                                <div class="card card-margin card-preview">
                                    <div class="card-body">
                                        <div class="widget-49">
                                            <div class="widget-49-title-wrapper">
                                                <div class="widget-49-date-<?php echo $row['color']; ?>">
                                                    <span class="widget-49-date-day"><?php echo $row['id']; ?></span>
                                                </div>
                                                <div class="widget-49-meeting-info">
                                                    <span class="widget-49-pro-title"><?php echo $row['titulo']; ?></span>
                                                    <span class="widget-49-meeting-time"><?php echo $row['fecha']; ?></span>
                                                </div>
                                            </div>
                                            <ol class="widget-49-meeting-points">
                                                <span><?php echo $row['nota']; ?></span>

                                            </ol>
                                            <div class="widget-49-meeting-action">
                                                <textarea class="form-control noteCopy" placeholder="Nota" style="height: 0px;" id="noteCopy" name="note"></textarea>
                                                <button class="border-0 btn-transition btn btn-outline-success btn-success btnCopy" id="btnCopy" onclick="copy('<?php echo $row['titulo']; ?>', '<?php echo $row['nota']; ?>')"> <i class="bx bx-copy"></i> </button>
                                                <button class="border-0 btn-transition btn btn-outline-primary btn-primary btnDelete" id="btnModify" onclick="showModal( '<?php echo $row['id'];; ?>', '<?php echo $row['titulo']; ?>', '<?php echo $row['idTipo']; ?>', '<?php echo $row['nota']; ?>')"> <i class="bx bx-pencil"></i> </button>
                                                <button class="border-0 btn-transition btn btn-outline-danger btn-danger btnModify" id="btnDelete" onclick="showModalDelete('<?php echo $row['id']; ?>')"> <i class="bx bx-trash"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                endforeach;
                            ?>
                           


                            <!-- ;ast -->
                        </div>
                    </div>
                </div>
            </div>




        </div>

    </body>

    </html>
    <script src="JavaScript/navbar-home.js"></script>

    <script src="JavaScript/logic.js"></script>