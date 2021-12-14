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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        </head>
        <body class="region-admin" id="reservas">
            <br>
            <div>
                <form action="../process/crear-reserva.php" method="POST">
                    <button class= "botonCre" type="submit" name="Crear" value="Crear">Crear</button>
                </form>
                <form action="../view/control_admin.php" method="POST">
                    <button id="crl_adm" class= "botonCre" type="submit" name="logout" value="logout">Vista</button>
                </form>
                <form action="../process/logout.proc.php" method="POST">
                    <button id="logout" class= "botonCre" type="submit" name="logout" value="logout">Logout</button>
                </form>
            </div>
            <div class="row">
                    <?php
                        $sentencia=$pdo->prepare("SELECT tbl_reserva.id_reserva,tbl_reserva.nombre_reserva,tbl_reserva.data_reserva,CONCAT_WS('-', tbl_horario.hora_ini, tbl_horario.hora_fi) as Horario,tbl_reserva.id_mesa FROM tbl_reserva INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_reserva.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala INNER JOIN tbl_horario ON tbl_horario.id_horario = tbl_reserva.id_horario");
                        $sentencia->execute();
                    ?>
                    <table class="tableAdmin">
                        <tr class="active">
                            <th>ID</th>
                            <th>NOMBRE RESERVA</th>
                            <th>FECHA</th>
                            <th>HORARIO</th>
                            <th>ID MESA</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                        <?php
                            $listaReservas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            foreach($listaReservas as $registro){ 
                        ?>
                        <tr>
                            <td><?php echo "{$registro['id_reserva']}";?></td>
                            <td><?php echo "{$registro['nombre_reserva']}";?></td>
                            <td><?php echo "{$registro['data_reserva']}";?></td>
                            <td><?php echo "{$registro['Horario']}";?></td>
                            <td><?php echo "{$registro['id_mesa']}";?></td>
                            <td>
                                <form action="../process/act-reserva.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id_reserva" value="<?php echo "{$registro['id_reserva']}";?>">
                                    <button class= "botonAct" type="submit" name="Modificar" value="Modificar">Modificar</button>
                                </form>
                            </td>
                            <td>
                                <form action="../process/eliminar-reserva.php" method="POST">
                                    <input type="hidden" name="id_reserva" value="<?php echo "{$registro['id_reserva']}";?>">
                                    <button class= "botonEli" type="submit" name="Eliminar" value="Eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
            </div>
        </body>
        </html>
    <?php
    }else{
        header('Location: ../view/login.php');
    }