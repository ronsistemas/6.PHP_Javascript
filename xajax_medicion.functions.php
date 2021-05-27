<?php
require_once('config/conn.php');

//Función que valida fecha
function validaFecha(&$fecha) {
      $valores = explode('/', $fecha);
      if(count($valores) == 3 && checkdate($valores[1],$valores[0],$valores[2])) {
         $fechaFormat = date_parse_from_format("d/m/Y", $fecha);

         if(!$fechaFormat['errors'] || !$fechaFormat['warnings'] ) {
            preg_match( '/([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{2,4})/', $fecha, $datosFecha);
            $fecha = $datosFecha[3]."-".$datosFecha[2]."-".$datosFecha[1];
            //Se compara la fecha introducida con la fecha actual
            if($fecha <= date("Y-m-d")) {
               $result = true;
            } else {
               $result = false;
            } 
         } else {
            $result = false; 
         }
      } else {
         $result = false;
      }
   return $result;
}

//Función que valida estación
function validaEstacion($estacion) {
   if($estacion == "" || strlen($estacion) > 45) return false;
   return true;
}

//Función que valida tramo
function validaTramo($tramo) {
   $a = array("tramo1","tramo2","tramo3","tramo4");
   if(in_array($tramo, $a)) return true; //¿Comprobar con mayúsculas?
   return false;
}

//Función que valida recuento
function validaRecuento($recuento) {
   if(is_numeric($recuento) && $recuento >= 0) return true;
   return false;
}

//----------------------------------------------------------------------
function validaFormulario($valores) {
   $objResponse = new xajaxResponse();
   $error = false;
   //Llamada a función que valida el campo 'Fecha'
    if(!validaFecha($valores['fecha'])) {
      $objResponse->assign("errorFecha", "innerHTML", "Debe introducir fecha válida.");
      $error = true;
   } else $objResponse->clear("errorFecha", "innerHTML"); 

   //Llamada a función que valida el campo 'Estación'
   if(!validaEstacion($valores['estacion'])) {
      $objResponse->assign("errorEstacion", "innerHTML", "La estación no debe estar vacía o superar 45 caracteres.");
      $error = true;
   } else $objResponse->clear("errorEstacion", "innerHTML");

   //Llamada a función que valida el campo 'Tramo'
   if(!validaTramo($valores['tramo'])) {
      $objResponse->assign("errorTramo", "innerHTML", "El tramo debe ser 'tramo1', 'tramo2', 'tramo3' o 'tramo4'.");
      $error = true;
   } else $objResponse->clear("errorTramo", "innerHTML");

   //Llamada a función que valida el campo 'Recuento'
   if(!validaRecuento($valores['recuento'])) {
      $objResponse->assign("errorRecuento", "innerHTML", "El recuento debe ser un número mayor o igual a 0.");
      $error = true;
   } else $objResponse->clear("errorRecuento", "innerHTML");

   //Si no existe error en la validación de formulario
   //Llamada a la función 'guardar' para almacenar los datos en la BD
   if(!$error) {
      $result = guardar($valores);
      //Limpiando el formulario
      if($result == "Medición almacenada en la base de datos.") {
         $objResponse->script(' document.getElementById("formMedicion").reset();');
      }
      //Mostrando mensaje según resultado de la operación de almacenado en BD
      $objResponse->assign("divMsjs", "value", $result);

   } else {
      $objResponse->assign("divMsjs", "value", "Introducción de datos erróneos.");
   }

   //Habilita nuevamente el botón
   $objResponse->assign("enviar","value","Enviar");
   $objResponse->assign("enviar","disabled",false);

   return $objResponse;
}

//----------------------------------------------------------------------
function eliminaEspacio(&$var) {
   if(is_string($var)) $var = trim($var);
}
//Función llamada dentro de la función anterior validaFormulario que almacena los datos en la BD
function guardar($valores) {
   $msj = "";
   $cn = connect();

   if(!$cn) {
      $msj = "Error en conexión con base de datos.";
   } else {
      $sql = "INSERT INTO medicion (fecha, tramo, estacion, recuento)"
      ."VALUES(:fecha, :tramo, :estacion, :recuento)";

      $param = array(
         ":fecha" => $valores['fecha'],
         ":tramo" => $valores['tramo'],
         ":estacion" => $valores['estacion'],
         ":recuento" => $valores['recuento'],
      );
      $cn->beginTransaction();
      $stmt = $cn->prepare($sql);
      
      $stmt->execute($param);

      if($stmt->rowCount() > 0) {
         $msj = "Medición almacenada en la base de datos.";
         $cn->commit();
      }
      else {
         $msj = "Error. Medición no almacenada en la base de datos.";
         $cn->rollBack();
      }
   } 
    $cn = null;
    return $msj;
}