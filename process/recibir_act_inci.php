<?php

include '../services/conexion.php';

$fecha=$_REQUEST['data_incidencia'];
$hora=$_REQUEST['hora_incidencia'];
$desc=$_REQUEST['desc_incidencia'];
$id_mesa=$_REQUEST['id_mesa'];
$id=$_REQUEST['id_incidencia'];

$pdo->beginTransaction();
$stmt=$pdo->prepare("UPDATE tbl_incidencia SET data_incidencia=?, hora_incidencia=?, desc_incidencia=?, id_mesa=? WHERE id_incidencia=?");
$stmt->bindParam(1,$fecha);
$stmt->bindParam(2,$hora);
$stmt->bindParam(3,$desc);
$stmt->bindParam(4,$id_mesa);
$stmt->bindParam(5,$id);

try{
    $stmt->execute();
    $pdo->commit();
    header("Location:../process/incidencias_admin.php");
}catch(PDOException $e){
    echo $e->getMessage();
    $pdo->rollback();
    header("Location:../process/incidencias_admin.php");
}
header("Location:../process/incidencias_admin.php");
?>