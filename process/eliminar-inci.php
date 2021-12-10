<?php
    include '../services/conexion.php';

    $id=$_REQUEST['id_incidencia'];

    $pdo->beginTransaction();
    $stmt = $pdo->prepare("DELETE FROM tbl_incidencia WHERE id_incidencia = ?");
    $stmt->bindParam(1,$id);

    try{
        $stmt -> execute();
        $pdo -> commit();
        header("Location:../process/incidencias_admin.php");
    }catch(PDOException $e){
        echo $e->getMessage();
        $pdo -> rollback();
        header("Location:../process/incidencias_admin.php");
    }
    header("Location:../process/incidencias_admin.php");
?>