<?php
    include '../services/conexion.php';

    $id=$_REQUEST['id_incidencia'];
    $pdo ->beginTransaction();
    try{
        $qry = $pdo->prepare("SELECT id_mesa FROM tbl_incidencia WHERE id_incidencia=?");
        $qry -> bindParam(1,$id);
        $qry -> execute();
        $stmt = $pdo->prepare("DELETE FROM tbl_incidencia WHERE id_incidencia=?");
        $stmt->bindParam(1,$id);
        $stmt -> execute();
        $comprobacion=$qry->fetch(PDO::FETCH_ASSOC);
        $resultado = $comprobacion['id_mesa'];
        $estadoMesa= "Activo";
        $sql = $pdo -> prepare("UPDATE tbl_mesa SET estado=? WHERE id_mesa=?");
        $sql -> bindParam(1,$estadoMesa);
        $sql -> bindParam(2,$resultado);
        $sql->execute();
        $pdo->commit();
        header("Location:../process/incidencias_mantenimiento.php");
    }catch(PDOException $e){
        echo $e -> getMessage();
        $pdo ->rollBack();
        header("Location:../process/incidencias_mantenimiento.php");
    }
    header("Location:../process/incidencias_mantenimiento.php");
?>