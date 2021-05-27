<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>XajaxCalc</title>
   <link href="css/estilos.css" type="text/css" rel="stylesheet">
   <?php
      require_once('xajax_calc.base.php');
      $xajax->printJavascript();
   ?>
   <script src="js/calc.js"></script>
</head>
<body>
   <?php
      if(!isset($_SESSION['valorTrabajo'])) {
         $_SESSION['valorTrabajo'] = 0;
      } 
   ?>

   <p>
      Número de trabajo: 
      <input type="text" name="inputResult" id="inputResult" value="<?php if(isset($_SESSION['valorTrabajo'])) echo $_SESSION['valorTrabajo'];?>" readonly="readonly" size=1> 
   </p>
  
   <form action="" method="POST" id="form1">
      <button type="submit" name="btnEstablecer">Establecer</button>
      <button type="submit" name="btnMultiplicar">Multiplicar</button>
      <button type="submit" name="btnDividir">Dividir</button>
      <button type="submit" name="btnSumar">Sumar</button>
      <button type="submit" name="btnRestar">Restar</button>
      <input type="text" name="inputNumber" id="inputNumber">
  </form> 
   
</body>
</html>