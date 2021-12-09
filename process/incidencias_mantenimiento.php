<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre_mantenimiento']=="") {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Vista Incidencias Mantenimiento</title>
    </head>
    <body class="fondosala">
        <button class="botonessala" OnClick="location.href='../view/control_sala.php'">Panel de control</button> <button class="botonessala" OnClick="location.href='../process/logout.proc.php'">Logout</button>
        <br> <br>
        <div class="row flex-cv">
            <div class="cuadro-figura">   
                <br><h2>Historial Incidencias Mantenimiento</h2><br>
                <?php
                    $sentencia=$pdo->prepare("SELECT * FROM tbl_incidencia");
                    $sentencia->execute();
                    $listaReserva=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    $lista=$listaReserva;
                    ?> 
                    <br>
                    <table class="table">
                        <tr class="active">
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Hora Inicial</th>
                            <th>Descripción</th>
                            <th>Mesa</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php
                            foreach($lista as $registro){   
                        ?>
                        <tr>
                            <td><?php echo "{$registro['id_incidencia']}";?></td>
                            <td><?php echo "{$registro['data_incidencia']}";?></td>
                            <td><?php echo "{$registro['hora_incidencia']}";?></td>
                            <td><?php echo "{$registro['desc_incidencia']}";?></td>
                            <td><?php echo "{$registro['id_mesa']}";?></td>
                            <td><button type="button" class="boton" data-toggle="modal" data-target="#deleteChildresn<?php echo $registro['id_incidencia']; ?>">Eliminar</button></td>
                        </tr>
                        <!--Ventana Modal para Eliminar--->
                        <?php  include('../process/modal_eliminar.php'); ?>
                        <?php } ?>
                    </table>
            </div>
        </div>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript">
                $(document).ready(function() {

                    $(window).load(function() {
                        $(".cargando").fadeOut(1000);
                    });

            //Ocultar mensaje
                setTimeout(function () {
                    $("#contenMsjs").fadeOut(1000);
                }, 3000);



                $('.btnBorrar').click(function(e){
                    e.preventDefault();
                    var id = $(this).attr("id");

                    var dataString = 'id='+ id;
                    url = "recib_Delete.php";
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: dataString,
                            success: function(data)
                            {
                            window.location.href="index.php";
                            $('#respuesta').html(data);
                            }
                        });
                return false;

                });


            });
        </script>
    </body>
    </html>      
<?php
    }else{
        header('Location: ../view/login.php');
    }