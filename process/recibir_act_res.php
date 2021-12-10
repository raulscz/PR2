<?php

include '../services/conexion.php';

$fecha=$_REQUEST['data_reserva'];
$hora=$_REQUEST['hora_reserva'];
$horaFi=$_REQUEST['hora_fi_reserva'];
$id_mesa=$_REQUEST['id_mesa'];
$id_reserva=$_REQUEST['id_reserva'];

$pdo->beginTransaction();
$stmt=$pdo->prepare("UPDATE tbl_reserva SET data_reserva=?, hora_reserva=?, hora_fi_reserva=?, id_mesa=? WHERE id_reserva=?");
$stmt->bindParam(1,$fecha);
$stmt->bindParam(2,$hora);
$stmt->bindParam(3,$horaFi);
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