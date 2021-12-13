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
            <title>Formulario Crear Reserva</title>
        </head>
        <body class="crear_res">
            <div class="row flex-cv">
                <div class="cuadro_crear_res">
                    <form action="../process/recibir_crear_res.php" method="POST">
                        <br>
                        <div class="form-group">
                            <p>Nombre Reserva:</p>
                            <div>
                                <input type="text" class="inputCreRes" id="nombre_reserva" name="nombre_reserva" placeholder="Introduce el nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Fecha:<p>
                            <div>
                                <input type="date" class="inputCreRes" id="data_reserva" name="data_reserva" placeholder="Introduce la fecha">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Hora:</p>
                            <div>
                                <input type="time" class="inputCreRes" id="hora_reserva" name="hora_reserva" placeholder="Introduce la hora">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>ID Mesa:</p>
                            <div>
                                <input type="number" class="inputCreRes" id="id_mesa" name="id_mesa" placeholder="Introduce el id mesa">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btnCreRes">Guardar</button>
                                <button onClick="location.href='../process/reservas_admin.php'" class='btnCreRes'>Cancelar</button>
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