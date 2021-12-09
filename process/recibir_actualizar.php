<?php

include '../services/conexion.php';

$id=$_REQUEST['id_incidencia'];
$desc=$_REQUEST['desc_incidencia'];
$stmt = $pdo->prepare("UPDATE tbl_incidencia SET desc_incidencia=:desc WHERE id_incidencia=:id" );
$stmt->bindParam(':id',$id);
$stmt->bindParam(':desc',$desc);
$stmt->execute();
header("Location:../view/control_sala.php");

?>