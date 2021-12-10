<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre_admin']=="") {?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Control Admin</title>
            <link rel="stylesheet" href="../css/styles.css">
        </head>
        <body class="fondo-admin">
            <div class="row flex-cv">
                <div class="cuadro_admin">
                    <div class="columnusuario">
                        <h2 class="nombreusuario">Bienvenido: <?php echo $_SESSION['nombre_admin'];?></h2>
                    </div>
                    <div class="column-2">
                        <button class="btnadmin" OnClick="location.href='../process/usuario_admin.php'"><h1>Usuarios</h1></button>
                    </div>
                    <div class="column-2">
                    <button class="btnadmin" OnClick="location.href='../process/'"><h1>Incidencias</h1></button>
                    </div>
                    <div class="column-2">
                    <button class="btnadmin" OnClick="location.href='../process/'"><h1>Mesas</h1></button>
                    </div>
                    <div class="column-2">
                    <button class="btnadmin" OnClick="location.href='../process/'"><h1>Reservas</h1></button>
                    </div>
                    <div class="column">
                        <button class="btnadmin" OnClick="location.href='../process/logout.proc.php'"><h1>Logout</h1></button>
                    </div>
                </div>
            </div>
        </body>
        </html>
    <?php
    }else{
        header('Location: ../view/login.php');
    }