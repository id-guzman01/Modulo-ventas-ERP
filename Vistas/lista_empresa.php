<?php

  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/lista empresa.css">
      <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
  <?php
   $idEmpresa =  $_SESSION['empresa'];
   include '../Modelo/Consultas.php';
   $cons = new ConsultasBD();
  ?>
      <header>
       <h1>Lista de empresas</h1>
       <form action="../Controlador/Controlador.php" method="POST">
            <input type="hidden" name="action" value="ingresarAgregarEmpresa">
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
                        <th>Imagen</th>
                        <th colspan="4">Acción</th> 
                    </tr>
                </thead>
          <tbody>

          <?php
                $contenidoEmpresa = $cons->buscarEmpresa($idEmpresa);
                $row = mysqli_fetch_array($contenidoEmpresa);
              ?>
                <tr>
                <td><?php echo $row['NIT']; ?></td>
                    <td><?php echo $row['Nombre']; ?></td>
                    <td><?php echo $row['pais']; ?></td>
                    <td><?php echo $row['Ciudad']; ?></td>
                    <td><?php echo $row['Direccion']; ?></td>
                    <td><?php echo $row['Telefono']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    
                    
                    
                    
                    <td> <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="" width="85" height="85">  </td>
            
              <td>
              <form action="consultar_empresa.php" method="post">
                  <input type="hidden" value="<?php echo $row['idEmpresa'];?>"  name="codBuscar">
                      <button type="submit" class="btn_visualizar"href="#"><i><img src="img/view.png"></i></button>    
            </form>   
                </td> 
              <td>
              <form action="actualizar_empresa.php" method="get">
                  <input type="hidden" value="<?php echo $row['idEmpresa'];?>"  name="codBuscar">
                      <button type="submit" class="btn_editar"href="#"><i><img src="img/edit.png"></i></button>
            </form>
                </td>

        

            </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
</html>


