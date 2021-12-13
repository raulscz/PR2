<?php
    include '../services/conexion.php';

    $nombre=$_REQUEST['nombre_reserva'];
    $fecha=$_REQUEST['data_reserva'];
    $hora=$_REQUEST['hora_reserva'];
    $id_mesa=$_REQUEST['id_mesa'];
    $id_reserva= NULL;

    $pdo->beginTransaction();
    $stmt=$pdo->prepare("INSERT INTO tbl_reserva (id_reserva, nombre_reserva, data_reserva, hora_reserva, id_mesa) VALUES (?, ?, ?, ?, ?);");
    $stmt->bindParam(1,$id_reserva);
    $stmt->bindParam(2,$nombre);
    $stmt->bindParam(3,$fecha);
    $stmt->bindParam(4,$hora);
    $stmt->bindParam(5,$id_mesa);
    //print_r($stmt);
    try{
        $stmt->execute();
        $pdo->commit();
        header("Location:../view/control_sala.php");
    }catch(PDOException $e){
        echo $e->getMessage();
        $pdo->rollback();
        header("Location:../view/control_sala.php");
    }
    header("Location:../view/control_sala.php");
?>