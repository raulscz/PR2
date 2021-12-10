<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre_admin']=="") {?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="../css/styles.css">
            <title>Formulario Crear Mesa</title>
        </head>
        <body class="crear_mesa">
            <div class="row flex-cv">
                <div class="cuadro_crear_mesa">
                    <form action="../process/recibir_crear_mesa.php" method="POST">
                        <br>
                        <div class="form-group">
                            <p>Capacidad:<p>
                            <div>
                                <input type="text" class="inputcrear" id="capacidad" name="capacidad" placeholder="Introduce la capacidad">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Estado:</p>
                            <div>
                                <input type="text" class="inputcrear" id="estado" name="estado" placeholder="Introduce el estado">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>ID Sala:</p>
                            <div>
                                <input type="number" class="inputcrear" id="id_sala" name="id_sala" placeholder="Introduce la sala">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="botoncrear">Guardar</button>
                                <button onClick="location.href='../process/mesas_admin.php'" class='botoncrear'>Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </body>
        </html>
    <?php
    }else{
        header('Location: ../view/login.php');
    }