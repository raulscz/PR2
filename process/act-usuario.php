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
            <title>Formulario Actualizar Alumnos</title>
        </head>

        <body class="actualizar">
            <div class="row flex-cv">
                <div class="cuadro_actualizar">
                    <?php
                        $id=$_REQUEST['id_emp'];

                        $sql=$pdo->prepare("SELECT * FROM tbl_empleado WHERE id_emp=$id");
                        $sql->execute();

                        $usuario=$sql->fetchAll(PDO::FETCH_ASSOC);
                        foreach($usuario as $registro){
                    ?>
                    <form action="../process/recibir_act_usu.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <p>Nombre:</p>
                            <div>
                                <input required type="text" class="inputactualizar" id="nombre_emp" name="nombre_emp" value="<?php echo "{$registro['nombre_emp']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Apellido:</p>
                            <div>
                                <input required type="text" class="inputactualizar" id="apellido_emp" name="apellido_emp" value="<?php echo "{$registro['apellido_emp']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Correo:</p>
                            <div>
                                <input required type="text" class="inputactualizar" id="email_emp" name="email_emp" value="<?php echo "{$registro['email_emp']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Contraseña:</p>
                            <div>
                                <input required type="password" class="inputactualizar" id="pass_emp" name="pass_emp" value="<?php echo "{$registro['pass_emp']}";?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Rol:</p>
                            <select name="tipo_emp" class="inputactualizar">
                                <option value="<?php echo "{$registro['tipo_emp']}";?>"><?php echo "{$registro['tipo_emp']}";?></option>
                                <option value="Administrador">Administrador</option>
                                <option value="Camarero">Camarero</option>
                                <option value="Mantenimiento">Mantenimiento</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <p>Foto:</p>
                            <div>
                                <input aria-required="true" required type="file" name="foto" id="" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="id_emp" value="<?php echo "{$registro['id_emp']}";?>">
                                <button type="submit" class="botonactualizar">Guardar</button>
                                <button onClick="location.href='../process/usuario_admin.php'" class='botonactualizar'>Cancelar</button>
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