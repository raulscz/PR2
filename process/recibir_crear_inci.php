<?php

    include '../services/conexion.php';

    $fecha=$_REQUEST['data_incidencia'];
    $hora=$_REQUEST['hora_incidencia'];
    $desc=$_REQUEST['desc_incidencia'];
    $id_mesa=$_REQUEST['id_mesa'];
    $id=NULL;

    $pdo->beginTransaction();
    $stmt=$pdo->prepare("INSERT INTO tbl_incidencia(id_incidencia, data_incidencia, hora_incidencia, desc_incidencia, id_mesa) VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam(1,$id);
    $stmt->bindParam(2,$fecha);
    $stmt->bindParam(3,$hora);
    $stmt->bindParam(4,$desc);
    $stmt->bindParam(5,$id_mesa);

    try{
        $stmt -> execute();
        $pdo->commit();
        header("Location:../process/incidencias_admin.php");
    }catch(PDOException $e){
        echo $e->getMessage();
        $pdo->rollBack();
        header("Location:../process/incidencias_admin.php");
    }
    header("Location:../process/incidencias_admin.php");
?>