(()=>{
   'use strict';
   document.addEventListener('DOMContentLoaded', ()=>{
      document.getElementById('enviar').addEventListener('click', ()=> {
         xajax.$('enviar').disabled=true;
         xajax.$('enviar').value="Procesando...";

         //Llamada a función registrada de Xajax
          xajax_validaFormulario(xajax.getFormValues("formMedicion"));

         document.getElementById("response").innerHTML = respuesta;
      });

       document.getElementById('divMsjs').addEventListener('change', ()=>{
         if(document.getElementById('divMsjs').value == "Medición almacenada en la base de datos.") {
            document.getElementById("formMedicion").reset();
         }
      });  

/*       function limpiaForm() {
         if(document.getElementById('divMsjs').value == "Medición almacenada en la base de datos.") {
            document.getElementById("formMedicion").reset();
            alert("Hola");
         }
      } */


   });
})();