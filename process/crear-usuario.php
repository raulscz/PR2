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
            <title>Formulario Crear Alumnos</title>
        </head>

        <body class="crear">
            <div class="row flex-cv">
                <div class="cuadro_crear">
                    <form action="../process/recibir_crear.php" method="POST" enctype="multipart/form-data">
                        <br>
                        <div class="form-group">
                            <p>Nombre:<p>
                            <div>
                                <input required type="text" class="inputcrear" id="name" name="name" placeholder="Introduce tu nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Apellido:</p>
                            <div>
                                <input required type="text" class="inputcrear" id="surname" name="surname" placeholder="Introduce tu apellido">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Correo:</p>
                            <div>
                                <input required type="text" class="inputcrear" id="email" name="email" placeholder="Introduce tu correo">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Contraseña:</p>
                            <div>
                                <input required type="text" class="inputcrear" id="pass" name="pass" placeholder="Introduce tu password">
                            </div>
                        </div>
                        <div class="form-group">
                            <p>Rol:</p>
                            <select name="tipo" class="inputcrear">
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
                                <button type="submit" class="botoncrear">Guardar</button>
                                <button onClick="location.href='../process/usuario_admin.php'" class='botoncrear'>Cancelar</button>
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