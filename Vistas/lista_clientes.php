  <?php
    
  ?>

  <!DOCTYPE html>

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="stylesheet" type="text/css" href="css/lista clientes.css">
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
      <script src="js/Eliminar.js" type="text/javascript"></script>
      
  </head>
  <body>
    <header>
         <h1>Lista de clientes</h1>
         <form action="../Controlador/Controlador.php" method="POST">
              <input type="hidden" name="action" value="IngresarAgregarCliente">
               <input type="submit" value="+" name="botonIngresar">
          </form>
    </header>
    <main>
     <div class="contenedor">
     <div>
          
     </div>
      <div class="col-sm-9">
            <table class="table-container">
            
                  <thead>
                      <tr> 
                          <th >Cedula</th>     
                          <th >Primer nombre</th>
                          <th>Segundo nombre</th>
                          <th>Primer apellido</th>
                          <th>Segundo apellido</th>
                          <th>Pais</th>
                          <th>Telefono</th>
                          <th>Email</th>
                          <th>Estado</th>
                          <th colspan="4">Acción</th> 
                      </tr>
                  </thead>
             <tbody>
             
             <?php
             include '../Modelo/Consultas.php';
             $cons = new ConsultasBD();
             $resultado = $cons->verClientes();
             
             while ($registro=mysqli_fetch_array($resultado)) {?>
             
            <tr>
                  <td ><?php echo $registro['cedula'];?></td>
                  <td ><?php echo $registro['pri_nom'];?></td>
                  <td><?php echo $registro['seg_nom'];?></td>          
                  <td><?php echo $registro['pri_ape'];?></td>
                  <td><?php echo $registro['seg_ape'];?></td>
                  <td><?php echo $registro['pais'];?></td>
                  <td><?php echo $registro['Telefono'];?></td>
                  <td><?php echo $registro['correo'];?></td>
            <td>
        
            <form action="../Controlador/Controlador.php" method="post">
            <?php
            $estado = $registro['estado'];
              $estadofinanciero;
              if($estado==true){
                $estadof1= 'Activo';
                $estadof2 = 'Inactivo';
              }else{
                $estadof1 = 'Inactivo';
                $estadof2 = 'Activo';

              }

            ?>  
          <select name="estado" class="estado" >
          
              <option class="activo" name="opcion1"> <?php echo $estadof1  ?>  </option>
              <option class="inactivo" name="opcion2"> <?php echo $estadof2  ?>  </option>                
          </select>
    </td>
    <td>
    
    <input type="hidden" value="<?php echo $registro['cedula'];?>"  name="codBuscar">
    <input type="hidden" name="action" value="CambiarEstado">
      <button type="submit" class="btn_estado"href="#"><i><img src="img/state.png"></i></button> 
             </form>
    </td>
    </td> 
    <td>
    <form action="consultar_cliente.php" method="post">
      <input type="hidden" value="<?php echo $registro['cedula'];?>"  name="codBuscar">
    
      <button type="submit" class="btn_visualizar"href="#"><i><img src="img/view.png"></i></button> 
      </form>
    </td> 
    <td>
    <form action="actualizar_cliente.php" method="post">
      <input type="hidden" value="<?php echo $registro['cedula'];?>"  name="codBuscar">
      <input type="hidden" value="IngresarEditarCliente" name="action">
      <button type="submit" class="btn_editar"href="#"><i><img src="img/edit.png"></i></button>
            </form>
    </td>
    <td>
    <form action="../Controlador/Controlador.php" method="post">
    <input type="hidden" value="<?php echo $registro['cedula'];?>"  name="codBuscar">
    <input type="hidden" name="action" value="eliminarCliente">
        <button type="submit" class="btn_eliminar" onclick="return Eliminar()" href=""><i><img src="img/delete.png"></i></button> 
        </form>  
    </td>       

   </tr>
   <?php }?>
             </tbody>
          </table>
           
       </div>      
      </div>
      <div>
          
      </div>
    </main>