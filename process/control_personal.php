<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {
        $tipo_emp=$_POST['tipo_emp'];
        // echo $tipo_emp;
        // die; ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="../css/styles.css">
            <title>Control Personal <?php $tipo_emp ?></title>
        </head>
        <body class="fondosala">
            <?php
                if($tipo_emp=="Administrador"){ ?>
                    <form action="../process/crear_admin.php" method="POST">
                        <button class="botonessala" OnClick="location.href='../process/crear_administrador.php'">Crear Admin.</button>
                    </form>
                    <br>
                    <button class="botonessala" OnClick="location.href='../view/control.php'">Control Personal</button> <button class="botonessala" OnClick="location.href='../process/logout.proc.php'">Logout</button>
                    <br> <br>
                    <div class="row flex-cv">
                        <div class="cuadro-figura">
                            <?php
                                $sentencia=$pdo->prepare("SELECT * FROM `tbl_empleado` WHERE tbl_empleado.tipo_emp= :tipo_emp;");
                                $sentencia -> bindParam(':tipo_emp', $tipo_emp);
                                $sentencia->execute();
                            ?>
                            <br><h2>Información <?php $tipo_emp ?></h2>
                            <table class="table">
                                <tr class="active">
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>APELLIDO</th>
                                    <th>CORREO</th>
                                    <th>TRABAJO</th>
                                </tr>
                                <?php
                                    $listaEmpleado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($listaEmpleado as $registro){
                                ?>
                                <tr>
                                    <td><?php echo "{$registro['id_emp']}";?></td>
                                    <td><?php echo "{$registro['nombre_emp']}";?></td>
                                    <td><?php echo "{$registro['apellido_emp']}";?></td>
                                    <td><?php echo "{$registro['email_emp']}";?></td>
                                    <td><?php echo "{$registro['tipo_emp']}";?></td>
                                </tr>
                                <?php } ?>
                            </table>
            <?php } else{ ?>
                <br>
                <button class="botonessala" OnClick="location.href='../view/control.php'">Control Personal</button> <button class="botonessala" OnClick="location.href='../process/logout.proc.php'">Logout</button>
                <br> <br>
                <div class="row flex-cv">
                    <div class="cuadro-figura">
                        <br><h2>Información <?php $tipo_emp ?></h2>
                        <table class="table">
                            <form action="../process/control_personal.php" method="POST">
                                <input type="text" name="nombre_emp" placeholder="Nombre">
                                <input type="text" name="apellido_emp" placeholder="Apellido">
                                <input type="hidden" name="tipo_emp" value="<?php echo $tipo_emp ?>">
                                <input type="submit" value="Filtrar" name="filtro">
                            </form>
                            <br>
                            <?php 
                                if (isset($_REQUEST['filtro'])){
                                    $nombre=$_REQUEST['nombre_emp'];
                                    $apellido=$_REQUEST['apellido_emp'];
                                    if($nombre="" && $apellido=""){
                                        $sentencia=$pdo->prepare("SELECT * FROM `tbl_empleado` WHERE tbl_empleado.tipo_emp= 'Camarero';");
                                    }else if($nombre="" && $apellido!=""){
                                        $sentencia=$pdo->prepare("SELECT * FROM `tbl_empleado` WHERE tbl_empleado.tipo_emp= 'Camarero' AND tbl_empleado.apellido_emp LIKE '%$apellido%';");
                                    }else if($apellido="" && $nombre!=""){
                                        $sentencia=$pdo->prepare("SELECT * FROM `tbl_empleado` WHERE tbl_empleado.tipo_emp= 'Camarero' AND tbl_empleado.nombre_emp LIKE '%$nombre%';");
                                    }else{
                                        $sentencia=$pdo->prepare("SELECT * FROM `tbl_empleado` WHERE tbl_empleado.tipo_emp= 'Camarero' AND tbl_empleado.nombre_emp LIKE '%$nombre%' AND tbl_empleado.apellido_emp LIKE '%$apellido%';");
                                    }
                                    $sentencia->execute();
                                    $listaEmpleado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                                    // print_r($listaEmpleado);
                                    // die;
                                    ?>
                                    <br>
                                    <tr class="active">
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>APELLIDO</th>
                                        <th>CORREO</th>
                                        <th>TRABAJO</th>
                                    </tr>
                                    <?php
                                        foreach($listaEmpleado as $registro){
                                    ?>
                                    <tr>
                                        <td><?php echo "{$registro['id_emp']}";?></td>
                                        <td><?php echo "{$registro['nombre_emp']}";?></td>
                                        <td><?php echo "{$registro['apellido_emp']}";?></td>
                                        <td><?php echo "{$registro['email_emp']}";?></td>
                                        <td><?php echo "{$registro['tipo_emp']}";?></td>
                                    </tr>
                                <?php } ?>
                        </table>
                        <?php } ?>
                </div>
            </div>
            <?php } ?>
        </body>
    </html>
<?php
    }else{
        header('Location: ../view/login.php');
    }