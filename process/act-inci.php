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
        <body class="act_inci">
            <div class="row flex-cv">
                <div class="cuadro_act_inci">
                    <?php
                        $id=$_REQUEST['id_incidencia'];

                        $sql=$pdo->prepare("SELECT * FROM tbl_incidencia WHERE id_incidencia=$id");
                        $sql->execute();

                        $inci=$sql->fetchAll(PDO::FETCH_ASSOC);
                        foreach($inci as $registro){
                    ?>
                    <br>
                    <form action="../process/recibir_act_inci.php" method="POST">
                        <div class="form-group">
                            <p>Fecha:<p>
                            <div>
                                <input required type="date" class="inputActInci" id="data_incidencia" name="data_incidencia" value="<?php echo "{$registro['data_incidencia']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Hora:</p>
                            <div>
                                <input required type="time" class="inputActInci" id="hora_incidencia" name="hora_incidencia" value="<?php echo "{$registro['hora_incidencia']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Descripción:</p>
                            <div>
                                <input required type="text" class="inputActInci" id="desc_incidencia" name="desc_incidencia" value="<?php echo "{$registro['desc_incidencia']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>ID Mesa:</p>
                            <div>
                                <input required type="number" class="inputActInci" id="id_mesa" name="id_mesa" value="<?php echo "{$registro['id_mesa']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="id_incidencia" value="<?php echo "{$registro['id_incidencia']}";?>">
                                <button type="submit" class="btnActInci">Guardar</button>
                                <button onClick="location.href='../process/incidencias_admin.php'" class='btnActInci'>Cancelar</button>
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