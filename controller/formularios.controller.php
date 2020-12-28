<?php

/**
 *  De aca se pasa a modelos que es donde se hace la peticion a la base de datos.
 *  view -> controller -> model
 **/

class ControladorFormularios
{

	/*=============================================
	Registro
	=============================================*/

	/** funcion estatica
	 *  Es una funcion o metodo que debe ser si o si llamado, a diferencia de una funcion no estatica en que es global, y si se llama siempre sera vista.
	 * En cambio como en este caso, la funcion ctrRegistro() no sera visible, si no solo si se llama de la siguiente forma: 
	 * $registro = ControladorFormularios::ctrRegistro();
	 * Con los 2 puntos.
	 *  En cambio para acceder a una funcion no estatica, solo basta con "new" y "->"
	 **/

	/**============================================
	  Usuarios que no se registran y llegan a index
	 *=============================================**/

	static public function ctrNoRegistrado()
	{
		if (isset($_POST["formularioName"])) {
			#LA TABLA DE MYSQL NO PUEDE LLEVAR - DE SEPARACION ENTRE PALABRAS
			$tablaNoRegistrados = "no_registrados";

			$datos = array(
				"nombre" => $_POST["formularioName"],
				"email" => $_POST["formularioEmail"],
				"telefono" => $_POST["formularioPhone"],
				"foto" => $_POST["formularioPhoto"],
				"nota" => $_POST["formularioNote"],
			);

			$respuesta = ModeloFormularios::mdlNoRegistrado($tablaNoRegistrados, $datos);

			return $respuesta;
		}
	}

	/*=============================================
	Seleccionar Registros de contactos de un usuario que no se ha registrado
	=============================================*/

	static public function ctrSeleccionarContactos()
	{
		$tabla = "no_registrados";

		$respuesta = ModeloFormularios::mdlSeleccionarContactos($tabla);

		return $respuesta;
	}

	/*=============================================
	Actualizar contactos de usuarios no registrados
	=============================================*/
	static public function ctrActualizarContactos()
	{
		if (isset($_POST["editar"])) {

			$tablaActualizar = "no_registrados";
			$id = $_POST['idUsuario'];
			$idNum = (int) $id;

			$datos = array(
				"id" => $idNum,
				"nombre" => $_POST["actualizarName"],
				"email" => $_POST["actualizarEmail"],
				"telefono" => $_POST["actualizarPhone"],
				"foto" => $_POST["actualizarPhoto"],
				"nota" => $_POST["actualizarNote"]
			);
			$respuesta = ModeloFormularios::mdlActualizarNoRegistrado($tablaActualizar, $datos);
			return $respuesta;
		}
	}

	/*=============================================
	Eliminar contactos de usuarios no registrados
	=============================================*/
	public function ctrEliminarcontactos()
	{

		if (isset($_POST["eliminarContacto"])) {

			$tabla = "no_registrados";
			$valor = $_POST["id"];

			$respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

			return $respuesta;
		}
	}
}
