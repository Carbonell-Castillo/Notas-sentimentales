<?php
    require_once 'app/login/sesion.php';
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
    </head>

    <body id="body-pd">
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
                        <a href="#" class="nav_link active"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Ingresar nota</span> </a>
                        <a href="notes.php" class="nav_link"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Visualizar notas</span> </a>
                        <a href="profile.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Perfil</span> </a>
                    </div>
                </div>
                <a href="app/login/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar sesion </span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 content-all">
            <h3>ToDo ✔</h3><br>

            <div class="content content-all">
                <div class="content__inner">

                    <div class="container overflow-hidden">
                        <div class="multisteps-form">
                            <div class="row">
                                <div class="col-12 col-lg-12 ml-auto mr-auto mb-4">
                                    <div class="multisteps-form__progress">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-11 m-auto">

                                    <!-- form -->
                                    <form class="multisteps" method="POST" action="app/addNote.php" style="height: auto;">
                                        <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                                            <!-- <h3 class="multisteps-form__title" style="color: black;">Complete los datos</h3> -->
                                            <div class="multisteps-form__content">
                                                <div class="form-row mt-4">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control" id="floatingInputValue" placeholder="Titulo" name="title" required>
                                                                <label for="floatingTextarea2" style="color: black;">Titulo</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                            <div class="form-floating">
                                                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="type">
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
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-row mt-4">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-12">
                                                            <div class="form-floating">
                                                                <textarea class="form-control note" placeholder="Nota" id="floatingTextarea2" style="height: 130px" name="note" required></textarea>
                                                                <label for="floatingTextarea2" style="color: black;">Nota</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn btn-danger" type="submit" title="Prev">Añadir</button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Datos del alumno -->

                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        </div>

    </body>

    </html>
    <script src="JavaScript/navbar-home.js"></script>
    <script src="JavaScript/multi-step.js"></script>
    <script src="JavaScript/logic.js"></script>