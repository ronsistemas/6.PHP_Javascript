<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Medición Xajax</title>
   <link href="css/estilos.css" rel="stylesheet" type="text/css">
   <?php
      require_once('xajax_medicion.base.php');
      $xajax->printJavascript();
   ?>
      <script src="js/medicion.js"></script>
</head>
<body>

   <!--Formulario---------------------------------------->
   <form action="" method="POST" name="formMedicion" id="formMedicion">
      <fieldset>
         <legend>Introduzca datos de medición</legend>
         <p><label class="labelForm" for="fecha">Fecha:</label>
            <input type="text" name="fecha" placeholder="d/m/a" id="fecha"></p>
         <p><span id="errorFecha" class="error"></span></p>
         

         <p><label class="labelForm" for="estacion">Estación:</label>
            <input type="text" name="estacion" id="estacion"></p>
         <p><span id="errorEstacion" class="error"></span></p>
         

         <p><label class="labelForm" for="tramo">Tramo:</label>
            <input type="text" name="tramo" id="tramo"></p>
         <p><span id="errorTramo" class="error"></p>
         

         <p><label class="labelForm" for="recuento">Recuento:</label>
            <input type="number" name="recuento" id="recuento"></p>
         <p><span id="errorRecuento" class="error"></p>
         
         <p class="pSubmit">
            <input type="submit" name="enviar" id="enviar" value="Enviar">
         </p>

      </fieldset>
   </form>
   <!--------Fin de formulario--------------------------->
   <!-- <div id="divMsjs"></div> -->
   <input type="text" id="divMsjs" disabled>
</body>
</html>