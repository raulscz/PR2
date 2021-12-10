<?php
    include '../services/conexion.php';

    $id=$_REQUEST['id_mesa'];

    $pdo->beginTransaction();
    $stmt = $pdo->prepare("DELETE FROM tbl_mesa WHERE id_mesa = ?");
    $stmt->bindParam(1,$id);

    try{
        $stmt -> execute();
        $pdo -> commit();
        header("Location:../process/mesas_admin.php");
    }catch(PDOException $e){
        echo $e->getMessage();
        $pdo -> rollback();
        header("Location:../process/mesas_admin.php");
    }
    header("Location:../process/mesas_admin.php");
?>