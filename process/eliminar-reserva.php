<?php
    include '../services/conexion.php';

    $id=$_REQUEST['id_reserva'];

    $pdo->beginTransaction();
    $stmt = $pdo->prepare("DELETE FROM tbl_reserva WHERE id_reserva = ?");
    $stmt->bindParam(1,$id);

    try{
        $stmt -> execute();
        $pdo -> commit();
        header("Location:../process/reservas_admin.php");
    }catch(PDOException $e){
        echo $e->getMessage();
        $pdo -> rollback();
        header("Location:../process/reservas_admin.php");
    }
    header("Location:../process/reservas_admin.php");
?>