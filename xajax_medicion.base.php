<?php

require_once('xajax_core/xajax.inc.php');

$xajax=new xajax('xajax_medicion.server.php');

$xajax->configure('javascript URI','./');
//$xajax->configure('debug',true);

$xajax->register(XAJAX_FUNCTION,"validaFormulario");