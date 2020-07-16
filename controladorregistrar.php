<?php
session_start();
if (isset($_SESSION['usuario'])) {
	header('Location: verifica.php');
}

include "conexion.php";  

$ci=$_GET["ci"];
$nombre=$_GET["nombre"];
$apellidoP=$_GET["apeP"];
$apellidoM=$_GET["apeM"];
$fechanaci=$_GET["fechanaci"];
$lugar=$_GET["lugarnaci"];
$contra=$_GET["contraseña"];
$mensaje='';

if (!empty($ci)&&!empty($nombre)&&!empty($apellidoP)&&!empty($apellidoM)&&!empty($fechanaci)&&!empty($lugar)&&!empty($contra)) {

	$sql="SELECT ci,contraseña FROM usuario WHERE nombre like '$nombre' and contraseña like '$contra'";
// echo $sql."<br>";
	$result=mysqli_query($conn,$sql);
	$fila=mysqli_fetch_array($result);

	if ($ci==$fila[0]) {
		$mensaje='<li>Ya se encuentra registrado</li>';
	}
	else{	
		$sql="INSERT INTO academico.identificador (ci, nombres, apellidoP, apellidoM,fechanaci,lugarnaci,contra) VALUES ('$ci', '$nombre', '$apellidoP', '$apellidoM','$fechanaci','$lugar','$contra');";

		$result=mysqli_query($conn,$sql);

		$sql="INSERT INTO academico.usuario (ci,nombre,contraseña,color) VALUES ('$ci','$nombre','$contra','#2F4F4F');";
		$result=mysqli_query($conn,$sql);
		header('Location: iniciasesion.php');
	}
	// echo "Esta llena";
}else{
	$mensaje= '<li>No llenaste todos los datos</li>';
}


include 'registrar.php';
// echo $sql;
?>
