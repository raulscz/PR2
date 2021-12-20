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
            <title>Formulario Actualizar Incidencias</title>
        </head>

        <body class="actualizar_res">
            <div class="row flex-cv">
                <div class="cuadro_actualizar_res">
                    <?php
                        $id=$_REQUEST['id_reserva'];

                        $sql=$pdo->prepare("SELECT * FROM tbl_reserva WHERE id_reserva=$id");
                        $sql->execute();

                        $reserva=$sql->fetchAll(PDO::FETCH_ASSOC);
                        foreach($reserva as $registro){
                    ?>
                    <br>
                    <form action="../process/buscar-res-act-admin.php" method="POST">
                        <div class="form-group">
                            <p>Nombre Reserva:</p>
                            <div>
                                <input required type="text" class="inputCreRes" id="nombre_reserva" name="nombre_reserva" value="<?php echo "{$registro['nombre_reserva']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Fecha:<p>
                            <div>
                                <input required type="date" class="inputCreRes" id="data_reserva" min="<?php echo date("Y-m-d"); ?>" name="data_reserva" value="<?php echo "{$registro['data_reserva']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>ID Mesa:</p>
                            <div>
                                <input required type="number" class="inputCreRes" id="id_mesa" name="id_mesa" value="<?php echo "{$registro['id_mesa']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="id_reserva" value="<?php echo "{$registro['id_reserva']}";?>">
                                <button type="submit" class="btnActRes">Guardar</button>
                                <input type="button" onClick="location.href='../process/reservas_admin.php'" class='btnActRes' value="Cancelar">
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </body>
        </html>
    <?php
    }else{
        header('Location: ../view/login.php');
    }