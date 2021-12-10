<?php

    include '../services/conexion.php';

    $id=$_REQUEST['id_emp'];
    $nombre=$_REQUEST['nombre_emp'];
    $apellido=$_REQUEST['apellido_emp'];
    $email=$_REQUEST['email_emp'];
    $password=$_REQUEST['pass_emp'];
    $tipo=$_REQUEST['tipo_emp'];
    if(isset( $_FILES["foto"] ) && !empty( $_FILES["foto"]["name"] )){
        $nameimg=$_FILES['foto']['tmp_name'];
        $dateimg=date('Y-m-d-H-i-s');
        $path="../img/{$dateimg}_{$_FILES['foto']['name']}";
        move_uploaded_file($nameimg, $path);
    }else{
        $path = null;
    }

    $pdo->beginTransaction();
    $stmt=$pdo->prepare("UPDATE tbl_empleado SET nombre_emp=?, apellido_emp=?, email_emp=?, pass_emp=?, tipo_emp=?, foto_emp=? WHERE id_emp=?");
    $stmt->bindParam(1,$nombre);
    $stmt->bindParam(2,$apellido);
    $stmt->bindParam(3,$email);
    $stmt->bindParam(4,$password);
    $stmt->bindParam(5,$tipo);
    $stmt->bindParam(6,$path);
    $stmt->bindParam(7,$id);

    try{
        $stmt->execute();
        $pdo->commit();
        header("Location:../process/usuario_admin.php");
    }catch(PDOException $e){
        echo $e->getMessage();
        unlink($nameimg);
        $pdo->rollBack();
        header("Location:../process/usuario_admin.php");
    }
    header("Location:../process/usuario_admin.php");
?>