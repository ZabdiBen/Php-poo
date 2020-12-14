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


	/**============================================
	 *Usarios que se registran
	 *=============================================**/

	static public function ctrRegistro()
	{

		if (isset($_POST["formularioName"])) {

			/**============================================
			 *Forma sencilla de probar que se esten enviando las variables post correctamente
						echo "$_POST[formularioName]";                  
			 *=============================================**/

			$tabla = "registros";

			$datos = array(
				"nombre" => $_POST["formularioName"],
				"email" => $_POST["formularioEmail"],
				"password" => $_POST["registroPassword"]
			);

			$respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);

			return $respuesta;
		}
	}

	/*=============================================
	Seleccionar Registros
	=============================================*/

	static public function ctrSeleccionarRegistros($item, $valor)
	{

		$tabla = "registros";

		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	Ingreso
	=============================================*/

	public function ctrIngreso()
	{

		if (isset($_POST["ingresoEmail"])) {

			$tabla = "registros";
			$item = "email";
			$valor = $_POST["ingresoEmail"];

			$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

			if ($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]) {

				$_SESSION["validarIngreso"] = "ok";

				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?pagina=inicio";

				</script>';
			} else {


				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

				</script>';

				echo '<div class="alert alert-danger">Error al ingresar al sistema, el email o la contraseña no coinciden</div>';
			}
		}
	}

	/*=============================================
	Actualizar Registro
	=============================================*/
	static public function ctrActualizarRegistro()
	{

		if (isset($_POST["actualizarNombre"])) {

			if ($_POST["actualizarPassword"] != "") {

				$password = $_POST["actualizarPassword"];
			} else {

				$password = $_POST["passwordActual"];
			}

			$tabla = "registros";

			$datos = array(
				"id" => $_POST["idUsuario"],
				"nombre" => $_POST["actualizarNombre"],
				"email" => $_POST["actualizarEmail"],
				"password" => $password
			);

			$respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

			return $respuesta;
		}
	}

	/*=============================================
	Eliminar Registro
	=============================================*/
	public function ctrEliminarRegistro()
	{

		if (isset($_POST["eliminarRegistro"])) {

			$tabla = "registros";
			$valor = $_POST["eliminarRegistro"];

			$respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

			if ($respuesta == "ok") {

				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?pagina=inicio";

				</script>';
			}
		}
	}
}
