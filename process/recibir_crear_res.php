<?php
    include '../services/conexion.php';

    $fecha=$_REQUEST['data_reserva'];
    $hora=$_REQUEST['hora_reserva'];
    $horaFi=$_REQUEST['hora_fi_reserva'];
    $id_mesa=$_REQUEST['id_mesa'];
    $id_reserva= NULL;

    $pdo->beginTransaction();
    $stmt=$pdo->prepare("INSERT INTO tbl_reserva (id_reserva, data_reserva, hora_reserva, hora_fi_reserva, id_mesa) VALUES (?, ?, ?, ?, ?);");
    $stmt->bindParam(1,$id_reserva);
    $stmt->bindParam(2,$fecha);
    $stmt->bindParam(3,$hora);
    $stmt->bindParam(4,$horaFi);
    $stmt->bindParam(5,$id_mesa);
    //print_r($stmt);
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