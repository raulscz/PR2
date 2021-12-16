<?php 
include '../services/conexion.php';

$email=$_POST['email'];
$nombre=$_POST['name'];
$apellido=$_POST['surname'];
$password=$_POST['pass'];
$tipo_emp=$_POST['tipo'];
if(isset( $_FILES["foto"] ) && !empty( $_FILES["foto"]["name"] )){
    $nameimg=$_FILES['foto']['tmp_name'];
    $dateimg=date('Y-m-d-H-i-s');
    $path="../img/{$dateimg}_{$_FILES['foto']['name']}";
    $newpath="../img/{$dateimg}_{$_FILES['foto']['name']}";
    move_uploaded_file($nameimg, $newpath);
}else{
    $path = null;
}

$pdo->beginTransaction();
$stmt = $pdo->prepare("INSERT INTO tbl_empleado(nombre_emp, apellido_emp, email_emp, pass_emp, tipo_emp, foto_emp) VALUES (?, ?, ?, md5(?), ?, ?)");
$stmt ->bindParam(1,$nombre);
$stmt ->bindParam(2,$apellido);
$stmt ->bindParam(3,$email);
$stmt ->bindParam(4,$password);
$stmt ->bindParam(5,$tipo_emp);
$stmt ->bindParam(6,$path);
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