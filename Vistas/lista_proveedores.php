
<!DOCTYPE html>
<html xmlns:mso="urn:schemas-microsoft-com:office:office" xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/lista proveedores.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="js/Eliminar.js" type="text/javascript"></script>

<!--[if gte mso 9]><xml>
<mso:CustomDocumentProperties>
<mso:display_urn_x003a_schemas-microsoft-com_x003a_office_x003a_office_x0023_SharedWithUsers msdt:dt="string">Ing. de Sistemas 2021 fusagasuga Members</mso:display_urn_x003a_schemas-microsoft-com_x003a_office_x003a_office_x0023_SharedWithUsers>
<mso:SharedWithUsers msdt:dt="string">32;#Ing. de Sistemas 2021 fusagasuga Members</mso:SharedWithUsers>
</mso:CustomDocumentProperties>
</xml><![endif]-->
</head>
<body>
  <header>
       <h1>Lista de proveedores</h1>
       <form action="../Controlador/Controlador.php" method="POST">
            <input type="hidden" name="action" value="ingresarAgregarProveedor">
            <input type="submit" value="+" name="botonIngresar">
        </form>
  </header>
  <main>
   <div class="contenedor">
    <div class="col-sm-9">
          <table class="table-container">
             
                <thead>
                    <tr> 
                    <th>NIT/CIF</th>
                        <th>Nombre</th>     
                        <th>Pais</th>
                        <th>Ciudad</th>
                        <th>Direccion</th>
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
             $resultado = $cons->verProveedores();
             
             while ($registro=mysqli_fetch_array($resultado)) {?>

<tr>
             <td ><?php echo $registro['nit'];?></td>
            <td ><?php echo $registro['nombre'];?></td>
            <td ><?php echo $registro['pais'];?></td>
            <td ><?php echo $registro['ciudad'];?></td>  
            <td ><?php echo $registro['direccion'];?></td>
            <td ><?php echo $registro['telefono'];?></td>
            <td ><?php echo $registro['email'];?></td>
            <form  action="../Controlador/Controlador.php" method="post">
            <td>
              <?php
              $estado = $registro['estado'];
              $estadofijo;
              $estadootro;
              if($estado==1){
                $estadofijo = 'Activo';
                $estadootro = 'Inactivo';
              }else{
                $estadofijo = 'Inactivo';
                $estadootro = 'Activo';
              }
              ?>
              <select name="estado" class="estado" >
          
                <option class="activo" name="opcion1"> <?php echo $estadofijo  ?>  </option>
                <option class="inactivo" name="opcion2"> <?php echo $estadootro  ?>  </option>                
              </select>
             </td>
             <td>
                        
                <input type="hidden" value="<?php echo $registro['nit'];?>"  name="codBuscar">
                <input type="hidden" name="action" value="CambiarTipoProveedor">
                     <button type="submit" class="btn_estado"href="#"><i><img src="img/state.png"></i></button> 
                   </form>
              </td>
              <td>
              <form action="consultar_proveedor.php" method="post">
                  <input type="hidden" value="<?php echo $registro['nit'];?>"  name="codBuscar">
                      <button type="submit" class="btn_visualizar"href="#"><i><img src="img/view.png"></i></button>    
            </form>   
                </td> 
              <td>
              <form action="actualizar_proveedor.php" method="post">
                  <input type="hidden" value="<?php echo $registro['nit'];?>"  name="codBuscar">
                      <button type="submit" class="btn_editar"href="#"><i><img src="img/edit.png"></i></button>
            </form>
                </td>

              <td>
                <form action="../Controlador/Controlador.php" method="post">
                  <input type="hidden" value="<?php echo $registro['nit'];?>"  name="codBuscar">
                  <input type="hidden" name="action" value="eliminarProveedor">
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