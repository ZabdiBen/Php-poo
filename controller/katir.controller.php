<?php

class ControladorKatir
{

	/*=============================================
	Llamada a Katir
	=============================================*/

	public function ctrTraerKatir()
	{

		#include() Se utiliza para invocar el archivo que contiene código html-php.
		include "view/formulario.php";
	}
}

// ─── VARIABLES GET  ───────────────────────────
/* 
	NOTE 
	Las variables get se pasan a travez de la url, es decir son visibles y se pasan de un archivo a otro 
	- Estan en la url y la primera empieza con ? por ejemplo: 
	- https://www.google.com/ ? q=clases+php 
	- Las demas variables get se separan con el amperson & por ejemplo: 
	- https://www.google.com/ ? q=clases+php & oq=clases
	- Se pueden utilizar las que uno quiera
	- Que desventajas tienen? 
		- No nos ayudan con las url amigables

------------------------- */