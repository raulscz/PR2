<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {
        $id=$_POST['id_mesa']; ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="../css/styles.css">
            <title>Disponibilidad Mesas</title>
        </head>
        <body class="fondosala">
            <br>
            <form method="POST" action="../process/crear-res-usu.php"><button class= "botonessala" type="submit" name="Enviar" value="Enviar">Crear Reserva</button><input type="hidden" name="id_mesa" value="<?php echo "$id" ?>"></form> <br> <button class="botonessala" OnClick="location.href='../view/control_sala.php'">Panel de control</button> <button class="botonessala" OnClick="location.href='../process/logout.proc.php'">Logout</button>
            <br> <br>
            <div class="row flex-cv">
                <div class="cuadro-figura">
                    <?php
                        $sentencia=$pdo->prepare("SELECT tbl_reserva.id_reserva,tbl_reserva.nombre_reserva,tbl_reserva.data_reserva,CONCAT_WS('-', tbl_horario.hora_ini, tbl_horario.hora_fi) as Horario,tbl_reserva.id_mesa FROM tbl_reserva INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_reserva.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala INNER JOIN tbl_horario ON tbl_horario.id_horario = tbl_reserva.id_horario WHERE tbl_mesa.id_mesa = $id ");
                        $sentencia->execute();
                    ?>
                    <br><h2>Información Mesa <?php echo $id ?></h2>
                    <table class="table">
                        <tr class="active">
                            <th>ID RESERVA</th>
                            <th>NOMBRE RESERVA</th>
                            <th>FECHA RESERVA</th>
                            <th>HORARIO RESERVA</th>
                            <th>ID MESA</th>
                        </tr>
                        <?php
                            $listaReservaMesa=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            foreach($listaReservaMesa as $registro){ 
                        ?>
                        <tr>
                            <td><?php echo "{$registro['id_reserva']}";?></td>
                            <td><?php echo "{$registro['nombre_reserva']}";?></td>
                            <td><?php echo "{$registro['data_reserva']}";?></td>
                            <td><?php echo "{$registro['Horario']}";?></td>
                            <td><?php echo "{$registro['id_mesa']}";?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </body>
        </html>
<?php
    }else{
        header('Location: ../view/login.php');
    }
?>