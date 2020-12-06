<?php

//
// ──────────────────────────────────────────────────────────────────────────────── I ──────────
//   ::::::ANCHOR L O G I C A   D E T R A S   D E   M V C : :  :   :    :     :        :          :
// ──────────────────────────────────────────────────────────────────────────────────────────
//
//
// ─── De forma breve ───────────────────────────────────────────────────────────────────────
//
// NOTE 
// Vista:lo que tu ves en la web, este la pasa al -> 
// Controlador: Este recive los datos del usuario y revisa que sean correctos y los manda al -> 
// Modelo: Este es el encargado de almacenar los datos.

require_once "controller/katir.controller.php";
require_once "controller/formularios.controller.php";


$katir = new ControladorKatir();
$katir->ctrTraerKatir();
