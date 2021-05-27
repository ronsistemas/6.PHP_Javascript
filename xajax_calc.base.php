<?php
require_once('xajax_core/xajax.inc.php');
//Inicio de sesión para los archivos que lo incorporan
session_start();
//Creando objeto clase Xajax
$xajax=new xajax('xajax_calc.server.php');

$xajax->configure('javascript URI','./');
//$xajax->configure('debug',true);

//REgistrando funciones
$xajax->register(XAJAX_FUNCTION,"establecer");
$xajax->register(XAJAX_FUNCTION,"multiplicar");
$xajax->register(XAJAX_FUNCTION,"dividir");
$xajax->register(XAJAX_FUNCTION,"sumar");
$xajax->register(XAJAX_FUNCTION,"restar");  