
    function Eliminar(){                            
       //Ingresamos un mensaje a mostrar
        var mensaje = confirm("¿Seguro que desea eliminar el registro?");
     //Detectamos si el usuario acepto el mensaje
      if (mensaje == true) {
       //alert("Registro eliminado con éxito");
        return true;
         }
      //Detectamos si el usuario denegó el mensaje
             else {
       alert("El registro no se ha eliminado.");
        return false;
        }
   }
                
            

