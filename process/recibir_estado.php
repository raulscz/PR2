<?php
    include '../services/conexion.php';

    $id_mesa=$_REQUEST['id_mesa'];
    $estado=$_REQUEST['estado'];
    $id_sala=$_REQUEST['id_sala'];

    if($estado=='Activo'){
        $estadoMesa="Mantenimiento";
        $pdo->beginTransaction();
        try{
            $sql=$pdo->prepare("UPDATE tbl_mesa SET estado=? WHERE id_mesa=?");
            $sql->bindParam(1,$estadoMesa);
            $sql->bindParam(2,$id_mesa);
            $sql->execute();
            $qry=$pdo->prepare("INSERT tbl_incidencia(data_incidencia, hora_incidencia, id_mesa) VALUES(CURDATE(), CURRENT_TIME(), ?)");
            $qry->bindParam(1,$id_mesa);
            $qry->execute();
            $pdo->commit();
            header("Location: ../view/control_sala.php");
        }catch(PDOException $e){
            echo $e->getMessage();
            $pdo->rollback();
            header("Location: ../view/control_sala.php");
        }
    }
    header("Location: ../view/control_sala.php");
?>