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

			if (isset($_FILES["formularioPhoto"]["tmp_name"]) && !empty($_FILES["formularioPhoto"]["tmp_name"])) {

				//CAPTURAR ANCHO Y ALTO ORIGINAL DE LA IMAGEN Y DEFINIR LOS NUEVOS VALORES
				list($ancho, $alto) = getimagesize($_FILES["formularioPhoto"]["tmp_name"]);
				$nuevoAncho = 128;
				$nuevoAlto = 128;

				//CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				$directorio = "view/img/user/";

				//DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				if ($_FILES["formularioPhoto"]["type"] == "image/jpeg") {
					$aleatorio = mt_rand(100, 9999);
					$ruta = $directorio . $aleatorio . ".jpg";
					$origen = imagecreatefromjpeg($_FILES["formularioPhoto"]["tmp_name"]);
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino, $ruta);
				} else if ($_FILES["formularioPhoto"]["type"] == "image/png") {

					$aleatorio = mt_rand(100, 9999);
					$ruta = $directorio . $aleatorio . ".png";
					$origen = imagecreatefrompng($_FILES["formularioPhoto"]["tmp_name"]);
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagealphablending($destino, FALSE);
					imagesavealpha($destino, TRUE);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($destino, $ruta);
				} else {
					return "error-formato";
				}
			} else {
				$ruta = "view/img/user/default.jpg";
			}

			#LA TABLA DE MYSQL NO PUEDE LLEVAR - DE SEPARACION ENTRE PALABRAS
			$tablaNoRegistrados = "no_registrados";

			$nombre = htmlentities($_POST["formularioName"]);
			$nota = htmlentities($_POST["formularioNote"]);

			$datos = array(
				"nombre" => $nombre,
				"email" => $_POST["formularioEmail"],
				"telefono" => $_POST["formularioPhone"],
				"foto" => $ruta,
				"nota" => $nota,
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
			// echo '<script>
			// 	console.log("se esta enviando una imagen nueva");</script>';

			echo $upload_max_size = ini_get('upload_max_filesize');
			echo $post_max_size = ini_get('post_max_size');

			$prueba0 = $_FILES["foto"];
			echo '<pre>$prueba0<br />';
			var_dump($prueba0);
			echo '</pre>';
			$prueba1 = $_FILES["foto"]["tmp_name"];
			echo '<pre>$prueba1<br />';
			var_dump($prueba1);
			echo '</pre>';
			$prueba2 = $_FILES["foto"]["name"];
			echo '<pre>$prueba2<br />';
			var_dump($prueba2);
			echo '</pre>';

			//CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
			$directorio = "view/img/user/";
			$imagen_exite = basename($_FILES["actualizarPhoto"]["name"]);
			$target_file = $directorio . basename($_FILES["actualizarPhoto"]["name"]);

			//VALIDAMOS SI YA EXISTE LA IMAGEN
			if (file_exists($target_file)) {
				$ruta = $imagen_exite;
			}

			if (isset($_FILES["actualizarPhoto"]["tmp_name"]) && !empty($_FILES["actualizarPhoto"]["tmp_name"])) {

				//CAPTURAR ANCHO Y ALTO ORIGINAL DE LA IMAGEN Y DEFINIR LOS NUEVOS VALORES
				list($ancho, $alto) = getimagesize($_FILES["actualizarPhoto"]["tmp_name"]);
				$nuevoAncho = 128;
				$nuevoAlto = 128;

				//DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				if ($_FILES["actualizarPhoto"]["type"] == "image/jpeg") {
					$aleatorio = mt_rand(100, 9999);
					$ruta = $directorio . $aleatorio . ".jpg";
					$origen = imagecreatefromjpeg($_FILES["actualizarPhoto"]["tmp_name"]);
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino, $ruta);

					//FUNCIONES PARA PNG
				} else if ($_FILES["actualizarPhoto"]["type"] == "image/png") {

					$aleatorio = mt_rand(100, 9999);
					$ruta = $directorio . $aleatorio . ".png";
					$origen = imagecreatefrompng($_FILES["actualizarPhoto"]["tmp_name"]);
					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
					imagealphablending($destino, FALSE);
					imagesavealpha($destino, TRUE);
					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($destino, $ruta);
				} else {
					return "error-formato";
				}
			} else {
				$ruta = "view/img/user/default.jpg";
			}


			$tablaActualizar = "no_registrados";
			$nombre = htmlentities($_POST["actualizarName"]);
			$nota = htmlentities($_POST["actualizarNote"]);

			$datos = array(
				"id" => $_POST['idUsuario'],
				"nombre" => $nombre,
				"email" => $_POST["actualizarEmail"],
				"telefono" => $_POST["actualizarPhone"],
				"foto" => $ruta,
				"nota" => $nota
			);
			$respuesta = ModeloFormularios::mdlActualizarNoRegistrado($tablaActualizar, $datos);
			return $respuesta;
		}
	}

	/*=============================================
	Eliminar contactos de usuarios no registrados
	=============================================*/
	public static function ctrEliminarcontactos()
	{

		if (isset($_POST["eliminarContacto"])) {

			$tabla = "no_registrados";
			$valor = $_POST["id"];

			$respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

			return $respuesta;
		}
		/**
		 *  //* USABILIDAD ENTRE PUBLIC STATIC Y SOLO PUBLIC
		 *  Hay una gran diferencia entre usar solo public y usar public static, con solo public no me dejaba acceder a 
		 * la classe tranquilidamente no se todavia si no se puedo o si es por un error de sintaxis.
		 * Pero con public static puedo colocar tranquilamente otro codigo como condicional  
		 *  
		 **/
	}
}
