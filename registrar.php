<?php
include "cabecera.php";
?>
<a href="principal.php">Inicio</a>
<hr style="border-style: inset;">

<h2>Registro de Datos</h2>
<form action="controladorregistrar.php" method="GET">
	<table align="center">
		<tr>
		<td >
			<input type="text" name="ci" placeholder="Num: CI" value="">
		</td>
		<td><input type="text" name="nombre" placeholder="Nombres" value=""></td>
		</tr>
		<tr>
			<td><input type="text" name="apeP" placeholder="Apellido Paterno" value=""></td>
			<td><input type="text" name="apeM" placeholder="Apellido Materno" value=""></td>
		</tr>
		<tr>
			<td><input type="text" name="fechanaci" placeholder="Año-Mes-Dia" value=""></td>
			<td><input type="password" name="contraseña" placeholder="contraseña" value=""></td>
		</tr>
		<tr>
		<td colspan="2"><!-- <input type="text" name="lugarnaci" placeholder="Lugar de nacimiento" value=""> -->
			<form >
				<select name="lugarnaci" class="selec">
					<option disabled="">Selecciona el lugar de Nacimiento</option>
					<option value="01"> La Paz</option>
					<option value="02">Cochabamba</option>
					<option value="03">Santa Cruz</option>
					<option value="04">Beni</option>
					<option value="05">Oruro</option>
					<option value="06">Potosi</option>
					<option value="07">Tarija</option>
					<option value="08">Chuquisaca</option>
					<option value="09">Pando</option>
				</select>
			</form>
			</td>
		</tr>

	</table>
	<input type="submit" value="Registrar">
</form>
	<?php  if (!empty($mensaje)){ ?>
		<div>
			<?php echo $mensaje; ?>
		</div>
 	<?php } ?>
<p>¿ Ya tienes Cuenta?</p>
<a href="iniciasesion.php">Iniciar Sesion</a>
