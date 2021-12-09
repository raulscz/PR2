<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {
        $id_sala=$_POST['id_sala']; 
        $id=$id_sala;
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Vista Incidencias</title>
    </head>
    <body class="fondosala">
        <button class="botonessala" OnClick="location.href='../view/control_sala.php'">Panel de control</button> <button class="botonessala" OnClick="location.href='../process/logout.proc.php'">Logout</button>
        <br> <br>
        <div class="row flex-cv">
             <div class="cuadro-figura">   
                <br><h2>Información Historial Incidencias</h2><br>
                <form action="../process/vista_incidencia.php" method="POST">
                    <input type="text" name="data_incidencia" placeholder="Fecha">
                    <input type="text" name="hora_incidencia" placeholder="Hora">
                    <input type="text" name="mesa" placeholder="Mesa">
                    <input type="hidden" name="id_sala" value="<?php echo $id ?>">
                    <input type="submit" value="Filtrar" name="filtro"> 
                    
                </form>
                <?php
                    if(isset($_REQUEST['filtro'])){
                        $fecha=$_REQUEST['data_incidencia'];
                        $hora=$_REQUEST['hora_incidencia'];
                        $mesa=$_REQUEST['mesa'];
                        if($fecha="" && $hora="" && $mesa=""){
                            $sentencia=$pdo->prepare("SELECT tbl_incidencia.id_incidencia,tbl_incidencia.data_incidencia,tbl_incidencia.hora_incidencia,tbl_incidencia.desc_incidencia,tbl_incidencia.id_mesa FROM tbl_incidencia INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_incidencia.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id;"); //Cambiar el 1 por $id_sala
                        }else if(!empty($fecha) && $hora="" && $mesa=""){
                            $setencia=$pdo->prepare("SELECT tbl_incidencia.id_incidencia,tbl_incidencia.data_incidencia,tbl_incidencia.hora_incidencia,tbl_incidencia.desc_incidencia,tbl_incidencia.id_mesa FROM tbl_incidencia INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_incidencia.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_incidencia.data_incidencia LIKE '%$fecha%';");
                        }else if(!empty($fecha) && !empty($hora) && $mesa=""){
                            $setencia=$pdo->prepare("SELECT tbl_incidencia.id_incidencia,tbl_incidencia.data_incidencia,tbl_incidencia.hora_incidencia,tbl_incidencia.desc_incidencia,tbl_incidencia.id_mesa FROM tbl_incidencia INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_incidencia.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_incidencia.data_incidencia LIKE '%$fecha%' AND tbl_incidencia.hora_incidencia LIKE '%$hora%';");
                        }else if(!empty($fecha) && $hora="" && !empty($mesa)){
                            $setencia=$pdo->prepare("SELECT tbl_incidencia.id_incidencia,tbl_incidencia.data_incidencia,tbl_incidencia.hora_incidencia,tbl_incidencia.desc_incidencia,tbl_incidencia.id_mesa FROM tbl_incidencia INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_incidencia.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_incidencia.data_incidencia LIKE '%$fecha%' AND tbl_incidencia.id_mesa LIKE '%$mesa%';");
                        }else if($fecha="" && !empty($hora) && $mesa=""){
                            $sentencia=$pdo->prepare("SELECT tbl_incidencia.id_incidencia,tbl_incidencia.data_incidencia,tbl_incidencia.hora_incidencia,tbl_incidencia.desc_incidencia,tbl_incidencia.id_mesa FROM tbl_incidencia INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_incidencia.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_incidencia.hora_incidencia LIKE '%$hora%';");
                        }else if($fecha="" && !empty($hora) && !empty($mesa)){
                            $sentencia=$pdo->prepare("SELECT tbl_incidencia.id_incidencia,tbl_incidencia.data_incidencia,tbl_incidencia.hora_incidencia,tbl_incidencia.desc_incidencia,tbl_incidencia.id_mesa FROM tbl_incidencia INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_incidencia.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_incidencia.hora_incidencia LIKE '%$hora%' AND tbl_incidencia.id_mesa LIKE '%$mesa%';");
                        }else if($fecha="" && $hora="" && !empty($mesa)){
                            $sentencia=$pdo->prepare("SELECT tbl_incidencia.id_incidencia,tbl_incidencia.data_incidencia,tbl_incidencia.hora_incidencia,tbl_incidencia.desc_incidencia,tbl_incidencia.id_mesa FROM tbl_incidencia INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_incidencia.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_incidencia.id_mesa LIKE '%$mesa%';");
                        }else{
                            $sentencia=$pdo->prepare("SELECT tbl_incidencia.id_incidencia,tbl_incidencia.data_incidencia,tbl_incidencia.hora_incidencia,tbl_incidencia.desc_incidencia,tbl_incidencia.id_mesa FROM tbl_incidencia INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_incidencia.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_incidencia.data_incidencia LIKE '%$fecha%' AND tbl_incidencia.hora_incidencia LIKE '%$hora%' AND tbl_incidencia.id_mesa LIKE '%$mesa%';");
                        }
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
                                <th>Modificar</th>
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
                                <td><button type="button" class="boton" data-toggle="modal" data-target="#editChildresn<?php echo $registro['id_incidencia']; ?>">Modificar</button></td>
                            </tr>
                            <!--Ventana Modal para Actualizar--->
                            <?php  include('../process/modal_modificar.php'); ?>
                            <?php } ?>
                        </table>
                    <?php } ?>
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