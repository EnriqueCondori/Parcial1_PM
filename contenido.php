<?php
include "cabecera.php";
session_start(); 
if (isset($_SESSION['usuario']))
{
	$nom=$_SESSION['usuario'];
	?>
	<?php 
	include 'conexion.php';
	$sql="SELECT nombre,color FROM usuario WHERE nombre like '$nom';";
	$result=mysqli_query($conn,$sql);
	$fila=mysqli_fetch_array($result);
	$color=$fila[1];
		// echo "aca".$fila[1];
	if (isset($_GET["color"])) {
		$color=$_GET["color"];
		$sql="UPDATE usuario SET color = '$color' WHERE usuario.nombre ='$nom';";
		$result=mysqli_query($conn,$sql);
	}
		//imagenes
	$archivo='';
	if($nom=='Enrique Martin'){
		$archivo='src="img/foto1.png"';
	}elseif ($nom=='Jhon Alvaro') {
		$archivo='src="img/foto2.jpg"';
	}elseif ($nom=='Gloria') {
		$archivo='src="img/fotof1.png"';
	}elseif ($nom=='Milenka') {
		$archivo='src="img/fotof1.png"';
	}elseif ($nom=='Carlos') {
		$archivo='src="img/foto3.jpg"';
	}elseif ($nom=='Ana Carolina') {
		$archivo='src="img/fotof2.png"';
	}elseif ($nom=='Nitia Leonor') {
		$archivo='src="img/fotof3.png"';
	}elseif ($nom=='Dayana') {
		$archivo='src="img/fotof4.png"';
	}elseif ($nom=='Aramiz Gustavo') {
		$archivo='src="img/foto4.jpg"';
	}
	?>

	<body  class="cuerpo">
		<header style="background-color: <?php echo $color?> ;opacity: 0.8">
			<div class="perfil">
				<?php echo '<h2>Bienvenido al Sistema '.$nom.'</h2>'?>
				<img <?php echo $archivo ?>>
				<div style="margin-right: 40px;"><a href="cerrarsesion.php"><b>cerrar sesion</b></a></div>
			</div>
		</header>
		<!-- <?php $color?> -->
		<div class="Contenido" style="background-color: <?php echo $color?> ">
			<h1>Contenido</h1>
			<p>Este contenido solo puedes visualizar una vez iniciado sesion, solo puedes visualizar fotos de las 7 personas ya registradas, las siguientes personas registradas no apareceran con su foto de perfil pero si puede loguearse ya que el contenido de imagenes solo se tomo encuenta de esas personas registradas las imagnes  </p>
			<p>El color que te aparece sera designado por el sistema ya una vez ingresado puedes personalizar el color</p>
			<p>Puedes Escoger el color de tu portada</p>
			<form action="contenido.php" action="_GET">
				<select name="color" class="selec">
					<option disabled="">Selecciona un color</option>
					<option value="#9d0a0a"> Rojo</option>
					<option value="#b8860b">Mostaza</option>
					<option value="#ff69b4">Rosado</option>
					<option value="#6b8e23">Verde Bajo</option>
					<option value="#ff4500">Naranja</option>
					<option value="#8b4513">Cafe</option>
					<option value="#663399">Purpura</option>
					<option value="#40e0d0">Turquesa</option>

				</select>
				<input type="submit" name="Enviar Color">
			</form>

			<!-- 			<a href="cerrarsesion.php"><b>cerrar sesion</b></a> -->
		</div>
		<div> 
			<h3>2 PREGUNTA SOBRE EL EXAMEN</h3>
			<p style="text-align: left; color: white;">Con la Base de datos anterior, adicione una tabla de notas por materia y cuente la cantidad de aprobados por departamento de manera que solo obtenga una sola fila de resultados (con codigo PHP, con codigo SQL)</p>
			<?php 
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
			echo'<div  class="tablas">';
			echo '<p>Sentencia Sql por defecto</p>';
			echo '<table>';
			echo"<caption>Respuesta en sql</caption>";
			$result=mysqli_query($conn,$sql);
			while($fila=mysqli_fetch_row($result))
			{
				echo "<tr>";
				echo "<td>".$fila[0]."</td>";
				echo "<td>".$fila[1]."</td>";
				echo "<td>".$fila[2]."</td>";
				echo "</tr>";
				echo "<tr>";
			}
			echo "</table>";
			//echo"</div>";
			$result=mysqli_query($conn,$sql);
			echo "<h3>Tabla obtenida con PHP</h3>";
			echo '<table>';
			echo "<caption>Cantidad de aprobados por departamento</caption>";
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
			$sql="SELECT count(case when i.lugarnaci like '01' then n.nota end) 'La Paz',
	count(case when i.lugarnaci like '02' then n.nota end) 'Cochabamba',
 	count(case when i.lugarnaci like '03' then n.nota end) 'Santa Cruz',
 	count(case when i.lugarnaci like '04' then n.nota end) 'Beni',
 	count(case when i.lugarnaci like '05' then n.nota  end) 'Oruro',
 	count(case when i.lugarnaci like '06' then n.nota  end) 'Potosi',
 	count(case when i.lugarnaci like '07' then n.nota  end) 'Tarija',
 	count(case when i.lugarnaci like '08' then n.nota  end) 'Chuquisaca',
 	count(case when i.lugarnaci like '09' then n.nota  end) 'Pando'
	FROM identificador as i, notas as n
	where i.ci like n.ci
	and n.nota > 50";
			$result=mysqli_query($conn,$sql);
			echo "<h3>Tabla obtenida por SQL</h3>";
			echo '<table>';
			echo '<caption>Numero de aprobados por Departamento</caption>';
			echo "<tr>";
			echo "<td>La Paz</td><td>Cochabamba</td><td>Santa Cruz</td><td>Beni</td><td>Oruro</td><td>Potosi</td><td>Tarija</td><td>Chuquisaca<td>Pando</td>";
			echo "</tr>";
			echo "<tr>";
			while($fila=mysqli_fetch_array($result))
			{
				echo '<td>'.$fila["La Paz"].'</td><td>'.$fila["Cochabamba"].'</td><td>'.$fila["Santa Cruz"].'</td><td>'.$fila["Beni"].'</td><td>'.$fila["Oruro"].'</td><td>'.$fila["Potosi"].'</td><td>'.$fila["Tarija"].'</td><td>'.$fila["Chuquisaca"].'</td><td>'.$fila["Pando"].'</td>';
			}
			echo "</tr>";
			echo '</table>';
			echo"</div>";
			?>
		</div>

	</body>
	</html>
<?php 
}else
{header('Location: principal.php');} ?>
</body>
</html>