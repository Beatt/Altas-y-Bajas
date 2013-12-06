function obtenerElementos() {

	var name = confirm("¿Esta seguro?");
	if (name == true) {
		var secciones = document.getElementsByClassName('seccion');
		var alerttext = '';
		var separador = '';
		secciones.each(function(seccion) {
			alerttext += separador + Sortable.sequence(seccion);
			separador = "/";
		});

		var textoJSON = JSON.stringify(alerttext);

		jQuery.post("http://localhost/Proyecto_Cita/index.php/admin_controller/actualizar", {
			cadena : textoJSON
		}, function(respuesta) {
			console.log(respuesta);
			// Notifica que todo salio de forma correcta
			window.location.reload();
			//Refresca la página
		}).error(function() {
			console.log('Error al ejecutar la petición');
		});
	} else {
		window.location.reload();
	}

}//Fin obtenerElementos
