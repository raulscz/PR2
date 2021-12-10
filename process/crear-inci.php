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
            <title>Formulario Crear Incidencia</title>
        </head>
        <body class="crear_inci">
            <div class="row flex-cv">
                <div class="cuadro_crear_inci">
                    <form action="../process/recibir_crear_inci.php" method="POST">
                        <br>
                        <div class="form-group">
                            <p>Fecha:<p>
                            <div>
                                <input type="date" class="inputCreInci" id="data_incidencia" name="data_incidencia" placeholder="Introduce la fecha">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Hora:</p>
                            <div>
                                <input type="time" class="inputCreInci" id="hora_incidencia" name="hora_incidencia" placeholder="Introduce la hora">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Descripción:</p>
                            <div>
                                <input type="text" class="inputCreInci" id="desc_incidencia" name="desc_incidencia" placeholder="Introduce la descripción">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>ID Mesa:</p>
                            <div>
                                <input type="number" class="inputCreInci" id="id_mesa" name="id_mesa" placeholder="Introduce el ID de la mesa">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btnCreInci">Guardar</button>
                                <button onClick="location.href='../process/incidencias_admin.php'" class='btnCreInci'>Cancelar</button>
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