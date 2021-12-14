<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {
        $id_sala=$_POST['id_sala'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Vista Historial</title>
    </head>
    <body class="fondosala">
    <form class="formbtn" action="../process/vista_incidencia.php" method="POST"><input type="hidden" name="id_sala" value="<?php echo $id_sala; ?>"><button type="submit" class="botonessala">Incidencias</button></form>
        <button class="botonessala" OnClick="location.href='../view/control_sala.php'">Panel De Control</button> <button class="botonessala" OnClick="location.href='../process/logout.proc.php'">Logout</button>
        <br> <br>
        <div class="row flex-cv">
            <div class="cuadro-figura">
                <br><h2>Información Historial Reservas</h2><br>
                <form action="../process/vista_historial.php" method="POST">
                    <input type="text" name="data_reserva" placeholder="Fecha">
                    <input type="text" name="hora_reserva" placeholder="Hora">
                    <input type="number" name="mesa" placeholder="Mesa">
                    <input type="hidden" name="id_sala" value="<?php echo $id ?>">
                    <input type="submit" value="Filtrar" name="filtro">
                </form>
                <?php
                    $sentencia=$pdo->prepare("SELECT tbl_reserva.id_reserva,tbl_reserva.nombre_reserva,tbl_reserva.data_reserva,CONCAT_WS('-', tbl_horario.hora_ini, tbl_horario.hora_fi) as Horario,tbl_reserva.id_mesa FROM tbl_reserva INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_reserva.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala INNER JOIN tbl_horario ON tbl_horario.id_horario = tbl_reserva.id_horario WHERE tbl_sala.id_sala = $id_sala;"); //Cambiar el 1 por $id_sala
                    $sentencia->execute();
                    $listaReserva=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    $lista=$listaReserva;
                ?> 
                    <br>
                    <table class="table">
                        <tr class="active">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Hora Inicial</th>
                            <th>Mesa</th>
                        </tr>
                        <?php
                            foreach($lista as $registro){
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