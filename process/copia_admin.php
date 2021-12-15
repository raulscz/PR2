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
        <body class="region-admin" id="incidencias">
            <br>
            <div>
                <form action="../process/crear-inci.php" method="POST">
                    <button class= "botonCre" type="submit" name="Crear" value="Crear">Crear</button>
                </form>
                <form action="../view/control_admin.php" method="POST">
                    <button id="crl_adm" class= "botonCre" type="submit" name="logout" value="logout">Vista</button>
                </form>
                <form action="../process/incidencias_admin.php" method="POST">
                    <button class= "botonCre" id="inci_copia" type="submit" name="Enviar" value="Enviar">Incidencias</button>
                </form>
                <form action="../process/logout.proc.php" method="POST">
                    <button id="logout" class= "botonCre" type="submit" name="logout" value="logout">Logout</button>
                </form>
            </div>
            <div class="row">
                    <?php
                        $sentencia=$pdo->prepare("SELECT * FROM tbl_copia");
                        $sentencia->execute();
                    ?>
                    <table class="tableAdmin">
                        <tr class="active">
                            <th>ID</th>
                            <th>FECHA</th>
                            <th>HORA</th>
                            <th>DESCRIPCIÓN</th>
                            <th>ID MESA</th>
                        </tr>
                        <?php
                            $listaIncidencias=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            foreach($listaIncidencias as $registro){ 
                        ?>
                        <tr>
                            <td><?php echo "{$registro['id_incidencia']}";?></td>
                            <td><?php echo "{$registro['data_incidencia']}";?></td>
                            <td><?php echo "{$registro['hora_incidencia']}";?></td>
                            <td><?php echo "{$registro['desc_incidencia']}";?></td>
                            <td><?php echo "{$registro['id_mesa']}";?></td>
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