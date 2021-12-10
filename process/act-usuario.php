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

        <body>
        <div class="crear_persona">
            <h1>Actualizar Empleado</h1>
            <?php
                $id=$_REQUEST['id_emp'];

                $sql=$pdo->prepare("SELECT * FROM tbl_empleado WHERE id_emp=$id");
                $sql->execute();

                $usuario=$sql->fetchAll(PDO::FETCH_ASSOC);
                foreach($usuario as $registro){
            ?>
            <form action="../process/recibir_act_usu.php" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre_emp" name="nombre_emp" value="<?php echo "{$registro['nombre_emp']}";?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Apellido:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="apellido_emp" name="apellido_emp" value="<?php echo "{$registro['apellido_emp']}";?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Correo:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email_emp" name="email_emp" value="<?php echo "{$registro['email_emp']}";?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Contraseña:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pass_emp" name="pass_emp" value="<?php echo "{$registro['pass_emp']}";?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Rol:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tipo_emp" name="tipo_emp" value="<?php echo "{$registro['tipo_emp']}";?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nombre">Foto:</label>
                    <div class="col-sm-10">
                        <input aria-required="true" required type="file" name="foto" id="" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="hidden" name="id_emp" value="<?php echo "{$registro['id_emp']}";?>">
                        <button type="submit" class="btn btn-info">Guardar</button>
                        <a href='../process/usuario_admin.php' class='btn btn-danger'>Cancelar</a>
                    </div>
                </div>
            </form>
            <?php } ?>
        </body>
        </html>
    <?php
    }else{
        header('Location: ../view/login.php');
    }