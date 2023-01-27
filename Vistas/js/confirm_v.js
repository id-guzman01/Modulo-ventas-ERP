function confirmar(){                            
    //Ingresamos un mensaje a mostrar
     var mensaje = confirm("¿Seguro que desea realizar la venta?");
  //Detectamos si el usuario acepto el mensaje
   if (mensaje == true) {
    //alert("Registro eliminado con éxito");
     return true;
      }
   //Detectamos si el usuario denegó el mensaje
          else {
    alert("Venta rechazada.");
     return false;
     }
}