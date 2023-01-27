  
<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="stylesheet" type="text/css" href="css/lista de productos.css">
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <script src="js/Eliminar.js" type="text/javascript"></script>
  </head>
  <body>
      <header>
       <h1>Lista de Productos</h1>
       <form action="../Controlador/Controlador.php" method="POST">
            <input type="hidden" name="action" value="ingresarAgregarProducto">
            <input type="submit" value="+" name="botonIngresar">
        </form>
  </header>
  <main>
   <div class="contenedor">
    <div class="col-sm-9">
          <table class="table-container">
             
                <thead>
                    <tr> 
                          <th>Imagen</th>     
                          <th>Nombre de producto</th>
                          <th>Descripción</th>
                          <th>Precio Venta</th>
                          <th>Stock</th>
                          <th colspan="3">Acción</th> 
                    </tr>
                </thead>
          <tbody>

          <?php
             include '../Modelo/Consultas.php';
             $cons = new ConsultasBD();
             $resultado = $cons->verProductos();
             
             while ($registro=mysqli_fetch_array($resultado)) {?>
                <tr>
                <td> <img src="data:image/jpg;base64,<?php echo base64_encode($registro['imagen']) ?>" alt="" width="85" height="85">  </td>
                <td> <?php echo $registro['nombre']; ?> </td> 
                <td> <?php echo $registro['descripcion']; ?> </td> 
                <td> <?php echo $registro['pre_venta']; ?> </td>
                <td> <?php echo $registro['cantidad']; ?> </td>

              <td>
              <form action="consultar_producto.php" method="post">
              <input type="hidden" value="<?php echo $registro['idProductos'];?>"  name="codBuscar">
                      <button type="submit" class="btn_visualizar"href="#"><i><img src="img/view.png"></i></button>    
            </form>   
                </td> 

              <td>
              <form action="actualizar_producto.php" method="post">
              <input type="hidden" value="<?php echo $registro['idProductos'];?>"  name="codBuscar">
                      <button type="submit" class="btn_editar"href="#"><i><img src="img/edit.png"></i></button>
            </form>
                </td>

                <td>
                <form action="../Controlador/Controlador.php" method="post">
                  <input type="hidden" value="<?php echo $registro['idProductos'];?>"  name="codBuscar">
                  <input type="hidden" name="action" value="eliminarProducto">
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