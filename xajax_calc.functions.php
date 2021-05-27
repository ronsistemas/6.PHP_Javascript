<?php
//Función establecer-------------------------------------------------------------------
function establecer($input) {
   if(isset($_SESSION['valorTrabajo'])) {
      $objResponse = new xajaxResponse();

      if(is_numeric($input)) {
         $valor = (int)$input;
         $_SESSION['valorTrabajo'] = $valor;
         $objResponse->assign("inputResult","value", $valor);
         longitud($objResponse, $valor);
      } else {
         $valor = strlen($input);
         $_SESSION['valorTrabajo'] = $valor;
         $objResponse->assign("inputResult","value", $valor);
         longitud($objResponse, $valor);
      }
   return $objResponse;
    } else {
      return false;
   } 
}
//Función Multiplicar-------------------------------------------------------------------
 function multiplicar($input) {
   if(isset($_SESSION['valorTrabajo'])) {
      $objResponse = new xajaxResponse();

      if(is_numeric($input)) {
         $valor = $input * $_SESSION['valorTrabajo'];
         $_SESSION['valorTrabajo'] = $valor;
         $objResponse->assign("inputResult","value", $valor);
         longitud($objResponse, $valor);
      } else {
         $valor = strlen($input);
         $_SESSION['valorTrabajo'] = $valor;
         $objResponse->assign("inputResult","value", $valor);
         longitud($objResponse, $valor);
      }
      return $objResponse;
   } else {
      return false;
   } 
}

//Función dividir-------------------------------------------------------------------
function dividir($input) {
   if(isset($_SESSION['valorTrabajo'])) {
      $objResponse = new xajaxResponse();

      if(is_numeric($input)) {
         if($input == 0) {
         $objResponse->assign("inputNumber","value", "No sea malo");
         } else {
            try {
               $valor = $_SESSION['valorTrabajo'] / $input;
            } catch(Exception $e) {
               $valor = 0;
            }
            $_SESSION['valorTrabajo'] = $valor;
            $objResponse->assign("inputResult","value", $valor);
            longitud($objResponse, $valor);
         }
      } else {
         $valor = strlen($input);
         $_SESSION['valorTrabajo'] = $valor;
         $objResponse->assign("inputResult","value", $valor); 
         longitud($objResponse, $valor);
      }
      return $objResponse;
   } else {
      return false;
   } 
}
//Función sumar-------------------------------------------------------------------
function sumar($input) {
   if(isset($_SESSION['valorTrabajo'])) {
      $objResponse = new xajaxResponse();
      if(is_numeric($input)) {
         $valor = $input + $_SESSION['valorTrabajo'];
         $_SESSION['valorTrabajo'] = $valor;
         $objResponse->assign("inputResult","value", $valor);
         longitud($objResponse, $valor);
      } else {
         $valor = strlen($input);
         $_SESSION['valorTrabajo'] = $valor;
         $objResponse->assign("inputResult","value", $valor);
         longitud($objResponse, $valor);
      }
      return $objResponse;
   } else {
      return false;
   } 
}
//Función restar-------------------------------------------------------------------
function restar($input) {
   if(isset($_SESSION['valorTrabajo'])) {
      $objResponse = new xajaxResponse();
      if(is_numeric($input)) {
         $valor =  $_SESSION['valorTrabajo'] - $input;
         $_SESSION['valorTrabajo'] = $valor;
         $objResponse->assign("inputResult","value", $valor);
         longitud($objResponse, $valor);
      } else {
         $valor = strlen($input);
         $_SESSION['valorTrabajo'] = $valor;
         $objResponse->assign("inputResult","value", $valor);
         longitud($objResponse, $valor);
      }
      return $objResponse;
   } else {
      return false;
   } 
}  
//Función para establecer longitud del campo de valor de trabajo----------------------
function longitud($objResponse, $valor) {
   $objResponse->assign("inputResult","size", strlen($valor));
   return $objResponse;
}