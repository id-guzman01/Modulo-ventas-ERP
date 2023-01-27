
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/lista_descuentos.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="js/Eliminar.js" type="text/javascript"></script>

</head>
<body>
  <header>
       <h1>Lista de Descuentos</h1>
       <form action="../Controlador/Controlador.php" method="POST">
            <input type="hidden" name="action" value="ingresarAñadirDescuento">
            <input type="submit" value="+" name="botonIngresar">
        </form>
  </header>
  <main>
   <div class="contenedor">
    <div class="col-sm-9">
          <table class="table-container">
             
                <thead>
                    <tr> 
                        <th>Tipo de descuento</th>     
                        <th>Porcentaje</th>
                        <th colspan="2">Acción</th> 
                    </tr>
                </thead>
          <tbody>

          <?php
             include '../Modelo/Consultas.php';
             $cons = new ConsultasBD();
             $resultado = $cons->verDescuentos();
             
             while ($registro=mysqli_fetch_array($resultado)) {?>

<tr>
            <td ><?php echo $registro['nombre'];?></td>
            <td ><?php echo $registro['valor'];?>%</td>
            
           
              <td>
              <form action="actualizar_descuento.php" method="post">
                  <input type="hidden" value="<?php echo $registro['idDescuento'];?>"  name="codBuscar">
                      <button type="submit" class="btn_editar"href="#"><i><img src="img/edit.png"></i></button>
            </form>
                </td>

              <td>
                <form action="../Controlador/Controlador.php" method="post">
                  <input type="hidden" value="<?php echo $registro['idDescuento'];?>"  name="codBuscar">
                  <input type="hidden" name="action" value="eliminarDescuento">
                  <button type="submit" class="btn_eliminar" onclick="return Eliminar()"><i><img src="img/delete.png"></i></button> 
                    </form>  
                </td>  


            <?php }?>
            
                  
          
            </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
</html>