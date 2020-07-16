<?php 
include 'conexion.php';
$sql="SELECT count(a.lugarnaci) cantidad,(a.lugarnaci),(case 
	when a.lugarnaci like '01' then 'La Paz'
	when a.lugarnaci like '02' then 'Cochabamba'
 	when a.lugarnaci like '03' then 'Santa Cruz'
 	when a.lugarnaci like '04' then 'Beni'
 	when a.lugarnaci like '05' then 'Oruro'
 	when a.lugarnaci like '06' then 'Potosi'
 	when a.lugarnaci like '07' then 'Tarija'
 	when a.lugarnaci like '08' then 'Chuquisaca'
 	when a.lugarnaci like '09' then 'Pando'
	end) Departamento
FROM (SELECT ci,lugarnaci
FROM identificador) as a, notas as n
where a.ci like n.ci
and n.nota > 50
GROUP by a.lugarnaci;";
$result=mysqli_query($conn,$sql);
// $fila=mysqli_fetch_array($result);
 ?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>

	<div class="tablas"> <h3>2 PREGUNTA SOBRE EL EXAMEN</h3><h4>Setencia con php</h4>
			<?php 
			echo "<table>";
			echo "<tr>";
			echo "<th>Departamento</th>";
			while($fila=mysqli_fetch_row($result))
			{
				echo "<td>".$fila[2]."</td>";
			}
			echo "</tr>";
			echo "<tr>";
			echo "<th>Nro Aprobados</th>";
			$result=mysqli_query($conn,$sql);
			while($fila=mysqli_fetch_row($result))
			{
				echo "<td>".$fila[0]."</td>";
			}
			echo "</tr>";
			echo "</table>";
			?>
	</div>

</body>
</html>


