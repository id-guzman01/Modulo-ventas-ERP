<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/lista de usuarios.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="js/Eliminar.js" type="text/javascript"></script>

</head>
<body>
  <header>
       <h1>Lista de usuarios</h1>
       <form action="../Controlador/Controlador.php" method="POST">
            <input type="hidden" name="action" value="IngresarAgregarUsuario">
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
                        <th>Cedula</th>     
                        <th>Primer nombre</th>
                        <th>Segundo nombre</th>
                        <th>Primer apellido</th>
                        <th>Segundo apellido</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th colspan="4">Acción</th> 
                    </tr>
                </thead>
           <tbody>
           <?php
             include '../Modelo/Consultas.php';
             $cons = new ConsultasBD();
             $resultado = $cons->verUsuarios();
             
             while ($registro=mysqli_fetch_array($resultado)) {?>
             
            <tr>
                  <td ><?php echo $registro['cedula'];?></td>
                  <td ><?php echo $registro['pri_nombre'];?></td>
                  <td ><?php echo $registro['seg_nombre'];?></td>
                  <td ><?php echo $registro['pri_apellido'];?></td>
                  <td ><?php echo $registro['seg_apellido'];?></td>
                  <td ><?php echo $registro['telefono'];?></td>
                  <td ><?php echo $registro['email'];?></td>
                  <form action="../Controlador/Controlador.php" method="post">
                  <?php
                    $tipos = $registro['tipo'];;
                    $resultadoS;
                    if($tipos==1){
                      $resultadoS = 'Administrador';
                      $resultadoF = 'Vendedor';
                    }else{
                      $resultadoS = 'Vendedor';
                      $resultadoF = 'Administrador';
                    }
                  ?>
                  <td ><select name="tipo" class="estado" >
          
                      <option class="activo" name="opcion1"> <?php echo $resultadoS  ?>  </option>
                      <option class="inactivo" name="opcion2"> <?php echo $resultadoF  ?>  </option>                
                     </select>
                
                      </td>

                      <td>
                        
                      <input type="hidden" value="<?php echo $registro['cedula'];?>"  name="codBuscar">
                      <input type="hidden" name="action" value="CambiarTipoUsuario">
                        <button type="submit" class="btn_estado"href="#"><i><img src="img/state.png"></i></button> 
                              </form>
                      </td>

                      <td>
                      <form action="consultar_usuario.php" method="post">
                      <input type="hidden" value="<?php echo $registro['cedula'];?>"  name="codBuscar">
                      <button type="submit" class="btn_visualizar"href="#"><i><img src="img/view.png"></i></button> 
                        </form>  
                    </td> 
                    <td>
                      <form action="actualizar_usuario.php" method="post">
                      <input type="hidden" value="<?php echo $registro['cedula'];?>"  name="codBuscar">
                      <button type="submit" class="btn_editar"href="#"><i><img src="img/edit.png"></i></button>
                      </form>
                    </td>

                    <td>
                    <form action="../Controlador/Controlador.php" method="post">
                    <input type="hidden" value="<?php echo $registro['cedula'];?>"  name="codBuscar">
                    <input type="hidden" name="action" value="eliminarUsuario">
                        <button type="submit" class="btn_eliminar" onclick="return Eliminar()" href=""><i><img src="img/delete.png"></i></button> 
                        </form>  
                    </td>  


                  <?php }?>
          
           </tbody>
        </table>
         
     </div>      
    </div>
    <div>
        
    </div>
  </main>
                  </body>