function quejas(id,modelo,marca,anio){

	document.getElementById('papelera').outerHTML='<div id="papelera">'+
'<form method="POST" action="../Modelos/representante-vista.php">'+

'<label for="id">ID:</label>'+
'<input type="text" name="id" readonly value="'+id+'"><br>'+

'<label for="modelo">Modelo:</label>'+
'<input type="text" name="modelo" value="'+modelo+'"><br>'+

'<label for="marca">Marca:</label>'+
'<input type="text" name="marca" value="'+marca+'"><br>'+

'<label for="anio">Año:</label>'+
'<input type="number" name="anio" value="'+anio+'"><br>'+
'<button type="submit" name="btn" value="2">Modificar Datos</button>'+


'</form>'+
'</div>';
}