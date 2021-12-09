<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Control Sala</title>
            <link rel="stylesheet" href="../css/styles.css">
        </head>
        <body class="control_sala">
            <div class="row flex-cv">
                <div class="cuadro_control_sala">
                    <div class="columnusuario">
                        <h2 class="nombreusuario">Bienvenido: <?php echo $_SESSION['nombre'];?></h2>
                    </div>
                    <div class="column">
                        <form class="formbtn" action="../process/control_personal.php" method="POST">
                            <input type="hidden" name="tipo_emp" value="Camarero">
                            <button type="submit" class="btnsala">Camareros</button>
                        </form>
                    </div>
                    <div class="column">
                        <form class="formbtn" action="../process/control_personal.php" method="POST">
                            <input type="hidden" name="tipo_emp" value="Administrador">
                            <button type="submit" class="btnsala">Administradores</button>
                        </form>
                    </div>
                    <div class="column">
                    <form class="formbtn" action="../view/control_sala.php" method="POST">
                            <input type="hidden" name="tipo_emp" value="Camarero">
                            <button type="submit" class="btnsala">Proyecto Principal</button>
                        </form>
                    </div>
                    <div class="column">
                        <button class="btnsala" OnClick="location.href='../process/logout.proc.php'"><h1>Logout</h1></button>
                    </div>
                </div>
            </div>
        </body>
        </html>
    <?php
    }else{
        header('Location: ../view/login.php');
    }