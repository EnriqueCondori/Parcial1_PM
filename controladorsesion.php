<?php
session_start();
if (isset($_SESSION['usuario'])) {
	header('Location: verifica.php');
}

include "conexion.php";  
$nombre=$_GET["nombre"];
$contra=$_GET["contraseña"];

// SELECT * FROM `identificador`WHERE nombres like 'Nitia Leonor' and contra like 'Brian123'
$mensaje='';
$archivo='';
if (!empty($nombre)&&!empty($contra)) {
	$sql="SELECT nombre,contraseña FROM usuario WHERE nombre like '$nombre' and contraseña like '$contra'";
// echo $sql."<br>";
	$result=mysqli_query($conn,$sql);
	$fila=mysqli_fetch_array($result);

// echo "resul".$fila[0];
	if(!empty($fila)&&$fila[0]==$nombre&&$fila[1]==$contra){
	// echo "Bienvenido ".$fila[0];
		$_SESSION['usuario']=$nombre;
		header('Location: verifica.php');
	}else{
		$mensaje.='<li>No se registro</li>';
	// header('Location: iniciasesion.php');
	}
}else{
	$mensaje.='<li>No lleno todos los Datos</li>';}
	// echo "No ingreso Datos";
	
	include "iniciasesion.php";
	?>
