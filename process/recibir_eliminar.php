<?php
    include '../services/conexion.php';

    $id=$_REQUEST['id_incidencia'];
    $stmt = $pdo->prepare("DELETE FROM tbl_incidencia WHERE id_incidencia=:id");
    $stmt->bindParam(':id',$id);
    $stmt -> execute();
    header("Location:../view/control_sala.php");
?>