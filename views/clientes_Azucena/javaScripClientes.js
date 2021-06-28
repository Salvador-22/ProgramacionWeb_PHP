function modificar (id,nombre,app,apm,dir,tel) {
	/*alert(id+""+nombre+""+app+""+apm+""+dir+""+tel+"");*/

document.getElementById('alta').outerHTML=
'<div id="alta">'+
	'<form method="POST" action="../modelo/datos.php">'+
	'<label for="id">ID:</label>'+
	'<input type="text" name="id" readonly value="'+id+'"><br>'+

	'<label for="nombre">Nombre:</label>'+
	'<input type="text" name="nom" value="'+nombre+'"><br>'+


	'<label for="app">Apellido Paterno:</label>'+
    '<input type="text" name="app" value="'+app+'"><br>'+


    '<label for="apm">Apellido Materno:</label>'+
    '<input type="text" name="apm" value="'+apm+'"><br>'+


    '<label for="dir">Direccion:</label>'+
    '<textarea name="dir" cols="15" rows="5">'+dir+'</textarea> <br>'+
    	

    '<label for="tel">Telefono:</label>'+
    '<input type="number" name="tel" value="'+tel+'"><br>'+

    '<button type="submit" name="btn" value="3">Modificar Datos </button>'+

'</form>'+
'</div>';


}