(()=> {
   'use strict';
   document.addEventListener('DOMContentLoaded', ()=>{
      //Evita mandar el formulario
      document.getElementById("form1").addEventListener("submit",(e)=>{
         e.preventDefault();
      });
      //Listener de botón establecer
      document.getElementsByName('btnEstablecer')[0].addEventListener('click', ()=>{
         let input = document.getElementById("inputNumber").value;
         xajax_establecer(input);
      }, true);

      //Listener de botón multiplicar
       document.getElementsByName('btnMultiplicar')[0].addEventListener('click', () => {
         let input = document.getElementById("inputNumber").value;
         xajax_multiplicar(input);
      });

      //Listener de botón dividir
       document.getElementsByName('btnDividir')[0].addEventListener('click', () => {
         let input = document.getElementById("inputNumber").value;
         xajax_dividir(input);
      });

      //Listener de botón sumar
      document.getElementsByName('btnSumar')[0].addEventListener('click', () => {
         let input = document.getElementById("inputNumber").value;
         xajax_sumar(input);
      });

      //Listener de botón restar
      document.getElementsByName('btnRestar')[0].addEventListener('click', () => {
         let input = document.getElementById("inputNumber").value;
         xajax_restar(input);
      });  
      //Desahbilitando la escritura en el input del valor de trabajo -- También realizado en HTML 
      document.getElementById("inputResult").readOnly=true;

   });
})();