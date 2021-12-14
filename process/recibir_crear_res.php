<?php
    include '../services/conexion.php';

    $nombre=$_REQUEST['nombre_reserva'];
    $fecha=$_REQUEST['data_reserva'];
    $hora=$_REQUEST['id_horario'];
    $id_mesa=$_REQUEST['id_mesa'];
    $id_reserva= NULL;


    $pdo->beginTransaction();
    $stmt=$pdo->prepare("INSERT INTO tbl_reserva (id_reserva, nombre_reserva, data_reserva, id_horario, id_mesa) VALUES (?, ?, ?, ?, ?);");
    $stmt->bindParam(1,$id_reserva);
    $stmt->bindParam(2,$nombre);
    $stmt->bindParam(3,$fecha);
    $stmt->bindParam(4,$hora);
    $stmt->bindParam(5,$id_mesa);

    try{
        $stmt->execute();
        $pdo->commit();
        header("Location:../process/reservas_admin.php");
    }catch(PDOException $e){
        echo $e->getMessage();
        $pdo->rollback();
        header("Location:../process/reservas_admin.php");
    }
    header("Location:../process/reservas_admin.php");

?>