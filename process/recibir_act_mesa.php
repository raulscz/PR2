<?php

include '../services/conexion.php';

$capacidad=$_REQUEST['capacidad'];
$estado=$_REQUEST['estado'];
$id_sala=$_REQUEST['id_sala'];
$id_mesa=$_REQUEST['id_mesa'];

$pdo->beginTransaction();
$stmt=$pdo->prepare("UPDATE tbl_mesa SET capacidad=?, estado=?, id_sala=? WHERE id_mesa=?");
$stmt->bindParam(1,$capacidad);
$stmt->bindParam(2,$estado);
$stmt->bindParam(3,$id_sala);
$stmt->bindParam(4,$id_mesa);

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