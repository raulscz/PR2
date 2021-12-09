<?php 
include '../services/conexion.php';

$email=$_POST['email'];
$nombre=$_POST['name'];
$apellido=$_POST['surname'];
$password=$_POST['pass'];
$tipo_emp="Administrador";
$stmt = $pdo->prepare("INSERT INTO tbl_empleado(nombre_emp, apellido_emp, email_emp, pass_emp, tipo_emp) VALUES (:nombre_emp, :apellido_emp, :email_emp, :pass_emp, :tipo_emp)");
$stmt ->bindParam(':nombre_emp',$nombre);
$stmt ->bindParam(':apellido_emp',$apellido);
$stmt ->bindParam(':email_emp',$email);
$stmt ->bindParam(':pass_emp',$password);
$stmt ->bindParam(':tipo_emp',$tipo_emp);
$stmt->execute();
// print_r($stmt);
// die;
header("Location:../view/control.php");
?>