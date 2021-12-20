<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {
        $id=$_REQUEST['id_mesa'];
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
            $stmt=$pdo->prepare("SELECT id_mesa FROM tbl_mesa WHERE id_mesa=$id");
            $stmt->execute();
            //$qry=$pdo->prepare("SELECT * FROM tbl_horario");
           // $qry->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            //$resultado=$qry->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <div class="row flex-cv">
            <div class="cuadro_crear_res">
                <form action="../process/buscar-reserva.php" method="POST">
                    <br>
                    <div class="form-group">
                        <p>Nombre Reserva:</p>
                        <div>
                            <input required type="text" class="inputCreRes" id="nombre_reserva" name="nombre_reserva" placeholder="Introduce el nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Fecha:<p>
                        <div>
                            <input required type="date" class="inputCreRes" id="data_reserva" min="<?php echo date("Y-m-d"); ?>" name="data_reserva" placeholder="Introduce la fecha">
                        </div>
                    </div>
                    <div class="form-group">
                        <p>ID Mesa:</p>
                        <?php
                            foreach ($result as $registro){
                        ?>
                        <div>
                            <input required type="text" class="inputCreRes" id="id_mesa" name="id_mesa" value="<?php echo $registro['id_mesa']?>">
                        </div>
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btnCreRes">Buscar</button>
                            <input type="button" onClick="location.href='../view/control_sala.php'" class='btnCreRes' value="Cancelar">
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