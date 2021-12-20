<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {
        $id=$_POST['id_mesa'];
        $name=$_REQUEST['nombre_reserva'];
        $date=$_REQUEST['data_reserva'];
        $idMesa=$_REQUEST['id_mesa'];
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Crear Reserva Camarero</title>
    </head>
    <body class="crear_res">
        <?php
            $qry=$pdo->prepare("SELECT ht.id_horario, ht.hora_ini, ht.hora_fi FROM horario_taula ht LEFT JOIN (SELECT * FROM tbl_reserva WHERE tbl_reserva.data_reserva = '$date') as rf ON ht.id_horario = rf.id_horario AND ht.id_mesa=rf.id_mesa WHERE isnull(rf.id_reserva) AND ht.id_mesa = $id;");
            $qry->execute();
            $resultado=$qry->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="row flex-cv">
            <div class="cuadro_crear_res">
                <form action="../process/rec-cre-res-usu.php" method="POST">
                    <br>
                    <div class="form-group">
                        <p>Hora:</p>
                        <select name="id_horario" class="inputCreRes">
                            <?php foreach ($resultado as $filas){ ?>
                            <option value="<?php echo "$filas[id_horario]" ;?>"><?php echo "$filas[hora_ini]-$filas[hora_fi]";?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div>
                            <input type="hidden" name="nombre_reserva" value="<?php echo $name; ?>">
                            <input type="hidden" name="data_reserva" value="<?php echo $date; ?>">
                            <input type="hidden" name="id_mesa" value="<?php echo $idMesa; ?>">
                            <button type="submit" class="btnCreRes">Reservar</button>
                            <input type="button" onClick="location.href='../view/control_sala.php'" class='btnCreRes' value="Cancelar">
                        </div>
                    </div>
                </form>
                <form action="../process/crear-res-usu.php" method="POST">
                    <br>
                    <div class="form-group">
                        <p>Cambiar Fecha:<p>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btnCreRes">Cambiar</button>
                            <input type="hidden" name="id_mesa" value="<?php echo $id; ?>">
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
?>