<?php
    include '../services/conexion.php';

    $id=$_REQUEST['id_emp'];

    $pdo->beginTransaction();
    $stmt = $pdo->prepare("DELETE FROM tbl_empleado WHERE id_emp = ?");
    $stmt->bindParam(1,$id);

    try{
        $stmt -> execute();
        $pdo -> commit();
        header("Location:../process/usuario_admin.php");
    }catch(PDOException $e){
        echo $e->getMessage();
        $pdo -> rollback();
        header("Location:../process/usuario_admin.php");
    }
    header("Location:../process/usuario_admin.php");
?>