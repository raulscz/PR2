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
            <title>Formulario Actualizar Mesa</title>
        </head>

        <body class="actualizar_mesas">
            <div class="row flex-cv">
                <div class="cuadro_actualizar_mesas">
                    <?php
                        $id=$_REQUEST['id_mesa'];

                        $sql=$pdo->prepare("SELECT * FROM tbl_mesa WHERE id_mesa=$id");
                        $sql->execute();

                        $mesa=$sql->fetchAll(PDO::FETCH_ASSOC);
                        foreach($mesa as $registro){
                    ?>
                    <br>
                    <form action="../process/recibir_act_mesa.php" method="POST">
                        <div class="form-group">
                            <p>Capacidad:</p>
                            <div>
                                <input type="text" class="inputActMesa" id="capacidad" name="capacidad" value="<?php echo "{$registro['capacidad']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Estado:</p>
                            <div>
                                <input type="text" class="inputActMesa" id="estado" name="estado" value="<?php echo "{$registro['estado']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>ID Sala:</p>
                            <div>
                                <input type="text" class="inputActMesa" id="id_sala" name="id_sala" value="<?php echo "{$registro['id_sala']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="id_mesa" value="<?php echo "{$registro['id_mesa']}";?>">
                                <button type="submit" class="btnActMesa">Guardar</button>
                                <button onClick="location.href='../process/mesas_admin.php'" class='btnActMesa'>Cancelar</button>
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