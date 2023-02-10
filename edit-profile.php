<?php
     require_once 'app/login/validation.php';
     require_once 'app/login/sesion.php';
     require_once 'app/db.php';
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


        <link rel="stylesheet" href="css/home/profile.css">
    </head>

    <body id="body-pd">
        <!-- modal -->
        <section class="modal-start" id="profile-modal">
            <section class="content-avatar">
                <form action="app/updateUser.php" method="POST">
                    <section class="header-avatar">
                        <p>Selecciona su avatar</p>
                    </section>
                    <section class="body-modal">
                        <section class="avatar">
                            <div class="section over-hide z-bigger">
                                <div class="section over-hide z-bigger">
                                    <div class="container">
                                        <div class="row justify-content-center pb-5">
                                        
                                            <div class="col-12">
                                                <input class="checkbox-tools" type="radio" name="avatar" id="tool-1" checked value="avatar1" onclick="avatarProfile(this.value)">
                                                <label class="for-checkbox-tools" for="tool-1">
                                                    <img src="images/home/avatar.jpg" alt="" srcset="">
                                                </label>
                                                <!--
                                                --><input class="checkbox-tools" type="radio" name="avatar" id="tool-2" value="avatar2" onclick="avatarProfile(this.value)">
                                                <label class="for-checkbox-tools" for="tool-2">
                                                    <img src="images/home/avatar2.jpg" alt="" srcset="">
                                                </label>
                                                <!--
                                                --><input class="checkbox-tools" type="radio" name="avatar" id="tool-3" value="avatar3" onclick="avatarProfile(this.value)">
                                                <label class="for-checkbox-tools" for="tool-3">
                                                    <img src="images/home/avatar3.jpg" alt="" srcset="">
                                                </label>
                                                <!--
                                                --><input class="checkbox-tools" type="radio" name="avatar" id="tool-4" value="avatar4" onclick="avatarProfile(this.value)">
                                                <label class="for-checkbox-tools" for="tool-4">
                                                    <img src="images/home/avatar4.jpg" alt="" srcset="">
                                                    
                                                </label>
                                                <!--
                                                --><input class="checkbox-tools" type="radio" name="avatar" id="tool-5" value="avatar5" onclick="avatarProfile(this.value)">
                                                <label class="for-checkbox-tools" for="tool-5">
                                                    <img src="images/home/avatar5.jpg" alt="" srcset="">
                                                </label>
                                                <!--
                                                --><input class="checkbox-tools" type="radio" name="avatar" id="tool-6" value="avatar6" onclick="avatarProfile(this.value)">
                                                <label class="for-checkbox-tools" for="tool-6">
                                                    <img src="images/home/avatar6.jpg" alt="" srcset="">
                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </section>
                    <section class="avatar-footer">
                        <button type="button" class="btn btn-secondary" onclick="closeModal(3)">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="cambiarAvatar" onclick="changeAvatar()">Cambiar Avatar</button>
                    </section>
                
            </section>
        </section>


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
                        <a href="notes.php" class="nav_link"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Visualizar notas</span> </a>
                        <a href="profile.php" class="nav_link active"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Perfil</span> </a>
                    </div>
                </div>
                <a href="app/login/logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Cerrar sesion </span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 content-all">
            <h3 class="text-white">Editar Perfil</h3><br>
            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="images/home/<?php echo $avatar; ?>.jpg" alt="Admin" class="rounded-circle p-1 bg-primary profile-avatar" width="110" id="profile">
                                        <?php
                                         $searchUserCode->execute([
                                            'code' => $code
                                        ]);
                                        foreach($searchUserCode as $row):
                                        ?>
                                        <div class="mt-3 pb-4">
                                            <h4> <?php echo $row['nombre']; ?></h4>
                                            <p class="text-secondary mb-3 mt-3"><?php echo $row['usuario']; ?></p>

                                            <button type="button" class="btn btn-outline-primary" onclick="showModalProfile()">Cambiar avatar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nombre Completo</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="name" value="<?php echo $row['nombre']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Usuario</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="nickname" value="<?php echo $row['usuario']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Telefono</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="phone" value="<?php echo $row['telefono']; ?>" >
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Contraseña</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="password" class="form-control" name="password" value="<?php echo $row['contraseña']; ?>" required>
                                        </div>
                                    </div>
                                    <?php
                                    endforeach;
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Guardar cambios">
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