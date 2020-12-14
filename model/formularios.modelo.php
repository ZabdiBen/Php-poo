<?php

require_once "conexion.php";

class ModeloFormularios
{
	/**============================================
	 *CONTACTOS DE USUARIO NO REGISTRADO
	 *=============================================**/
	static public function mdlNoRegistrado($tablaNoRegistrados, $datos)
	{
		#INSER INTO es del lenguaje mysql y los : antes de los nombres es por que son parametros ocultos.
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tablaNoRegistrados (name_noRegistrados, email_noRegistrados, phone_noRegistrados, photo_noRegistrados, notes_noRegistrados) VALUES (:name_noRegistrados, :email_noRegistrados, :phone_noRegistrados, :photo_noRegistrados, :notes_noRegistrados)");

		#BINDPARAM recibe 3 parametros 
		$stmt->bindParam(":name_noRegistrados", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email_noRegistrados", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":phone_noRegistrados", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":photo_noRegistrados", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":notes_noRegistrados", $datos["nota"], PDO::PARAM_STR);

		#SI SE ESCRIBE 2 VECES EXECUTE SE ENVIA 2 VECES LAS VARIABLES POST
		if ($stmt->execute()) {
			return "ok";
		} else {
			// return "error";
			print_r(Conexion::conectar()->errorInfo());
		}
		#YA el metodo close() es obsoleto, no es necesario colocarlo
		// $stmt->close();
		$stmt = null;
	}

	/*=============================================
	Seleccionar contactos de un usuario no logeado
	=============================================*/

	static public function mdlSeleccionarContactos($tabla)
	{
		#aca tengo que selescionar con mysql que quiero que traiga
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt->execute();

		/**
		 * * Diferencia entre fetch y fetchAll
		 * fetch devulve no mas un registro
		 * fetchAll devuelve todos
		 **/
		return $stmt->fetchAll();

		$stmt = null;
	}


	/*=============================================
	Registro
	=============================================*/

	static public function mdlRegistro($tabla, $datos)
	{
		#statement: declaración

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password) VALUES (:nombre, :email, :password)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt = null;
	}

	/*=============================================
	Actualizar Registro
	=============================================*/

	static public function mdlActualizarRegistro($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, email=:email, password=:password WHERE id = :id");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt = null;
	}

	/*=============================================
	Eliminar Registro
	=============================================*/
	static public function mdlEliminarRegistro($tabla, $valor)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $valor, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			print_r(Conexion::conectar()->errorInfo());
		}

		$stmt = null;
	}
}
