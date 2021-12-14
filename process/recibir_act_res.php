<?php

include '../services/conexion.php';

$nombre=$_REQUEST['nombre_reserva'];
$fecha=$_REQUEST['data_reserva'];
$hora=$_REQUEST['id_horario'];
$id_mesa=$_REQUEST['id_mesa'];
$id_reserva=$_REQUEST['id_reserva'];

$pdo->beginTransaction();
$stmt=$pdo->prepare("UPDATE tbl_reserva SET nombre_reserva=?, data_reserva=?, id_horario=?, id_mesa=? WHERE id_reserva=?");
$stmt->bindParam(1,$nombre);
$stmt->bindParam(2,$fecha);
$stmt->bindParam(3,$hora);
$stmt->bindParam(4,$id_mesa);
$stmt->bindParam(5,$id_reserva);

try{
    $stmt->execute();
    $pdo->commit();
    header("Location:../process/reservas_admin.php");
}catch(PDOException $e){
    echo $e->getMessage();
    $pdo->rollback();
    header("Location:../process/reservas_admin.php");
}
header("Location:../process/reservas_admin.php");
?>