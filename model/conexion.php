<?php

//
// ───── CLASES ─────────────────────────────── I ──────────
/*
/* REVIEW
 Lo que entiendo de una clase es que es como una funcion global, que contiene otras funiones 
/* ------------------------------------------------------ */

class Conexion
{

	static public function conectar()
	{

		/* ------------------------------------------------------ */
		/*  NOTE PDO es Otra  forma de conectarse a una base de datos, con 2 puntos  
		------------------------------------------------------ */

		#PDO("nombre del servidor; nombre de la base de datos", "usuario", "contraseña")

		$link = new PDO(
			"mysql:host=localhost;dbname=php-oop",
			"root",
			""
		);

		$link->exec("set names utf8");

		return $link;
	}
}
