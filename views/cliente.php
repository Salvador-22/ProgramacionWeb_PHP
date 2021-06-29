<!----datos del cliente
	id
	nombre
	app
	apm
	direccion
	telefono
	---->

<!DOCTYPE html>
<html>
<head>
	<title>cliente</title>
</head>
<script type="text/javascript" src="javaScripClientes.js"></script>
<body>
<!----Dentro del cuerpo--->
<form method="POST" action="../modelo/datos.php">


	<input type="text" required name="nombre" placeholder="Ingresa un Nombre">
	<input type="text" required name="apellido_p" placeholder="Ingresa apellido paterno">
	<input type="text" required name="apellido_m" placeholder="Ingresa apellido materno">

	<textarea rows="5" cols="15" name="direccion" placeholder="Ingresa una direccion"></textarea>

<input type="number" name="telefono" placeholder="ingresa un numero">
<button type="submit" name="btn" value="1"> Alta de Cliente </button>
</form>

<table>
	<tr>
		<th>id</th>
		<th>Nombre</th>
		<th>Apellido Paterno</th>
		<th>Apellido Materno</th>
		<th>Direccion</th>
		<th>Telefono</th>
	</tr>
	<?php 
	foreach ($datos ["clientes"] as $fila) {

		echo '<tr>';
		echo '<td>'.$fila["id"].'</td>';
		echo '<td>'.$fila["nombre"].'</td>';
		echo '<td>'.$fila["apellido_pat"].'</td>';
		echo '<td>'.$fila["apellido_mat"].'</td>';
		echo '<td>'.$fila["direccion"].'</td>';
		echo '<td>'.$fila["telefono"].'</td>';
		echo '<td><button onclick="modificar('."'".$fila["id"]."'".","."'".$fila["nombre"]."'".","."'".$fila["apellido_pat"]."'".","."'".$fila["apellido_mat"]."'".","."'".$fila["direccion"]."'".","."'".$fila["telefono"]."'".')">Modificar</button></td>';
		echo '</tr>';
	      }
	?>
</table>

<form method="POST" action="../modelo/datos.php">
	<label for="ids"> Seleccione un id</label>
	<select name="ids" required>
		<option></option>
		
		<?php
		foreach ($datos["clientes"] as $id) {
			echo '<option>' .$id["id"]. '</option>';
		}
		?>
	</select>

<button type="submit" name="btn" value="2">Eliminar</button>
</form>

<div id="alta">
	
</div>


</body>
</html>