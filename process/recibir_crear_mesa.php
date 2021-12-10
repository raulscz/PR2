<?php
    include '../services/conexion.php';

    $capacidad=$_REQUEST['capacidad'];
    $estado=$_REQUEST['estado'];
    $id_sala=$_REQUEST['id_sala'];
    $id_mesa= NULL;

    $pdo->beginTransaction();
    $stmt=$pdo->prepare("INSERT INTO tbl_mesa (id_mesa, capacidad, estado, id_sala) VALUES(?, ?, ?, ?)");
    $stmt->bindParam(1,$id_mesa);
    $stmt->bindParam(2,$capacidad);
    $stmt->bindParam(3,$estado);
    $stmt->bindParam(4,$id_sala);
    try{
        $stmt->execute();
        $pdo->commit();
        header("Location:../process/mesas_admin.php");
    }catch(PDOException $e){
        echo $e->getMessage();
        $pdo->rollback();
        header("Location:../process/mesas_admin.php");
    }
    header("Location:../process/mesas_admin.php");
?>