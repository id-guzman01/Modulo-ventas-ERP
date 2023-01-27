<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/menu_principal.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

    <title>Pagina Principal</title>
  </head>
  <body>
     <input type="checkbox" id="check">
    <!--header y boton de menu desplegable-->

    <?php
      include '../Modelo/Consultas.php';
      $cons = new ConsultasBD();
      $codigo_Usuario = $_SESSION['codigo'];
      $contenidoUsuario = $cons->buscarUsuarioTodo($codigo_Usuario);
      $row = mysqli_fetch_array($contenidoUsuario);
      $tipo = $_SESSION['tipo'];
    ?>

    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>Modulo ERP<span> VENTAS</span></h3>
      </div>
      <nav>
        <ul>
          
        <li><label for=""><?php echo $row['pri_nombre']; ?> <?php echo $row['seg_nombre']; ?> <?php echo $row['pri_apellido']; ?> <?php echo $row['seg_apellido']; ?></label></li>
          <li>
          <a href="#"><i class="bx bxs-user-circle" style="font-size: 32px; padding-top: 20px;"></i></a>
            <ul>
              <li><a href="consultar_usuario_log.php"><i class="bx bxs-user-detail"></i>&nbsp;Preferencias</a></li>
              <li><form action="../Controlador/Controlador.php" method="post">
                  <input type="hidden" value="cerrarSesion" name="action">
                <button type="submit" href="#"><i class="bx bx-exit"></i>&nbsp;Cerrar sesión</button>
                    </form></li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
    <!--final del header-->
    <!--inicio de menu de navegacion en moviles-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="#" target="ventana"
        <?php
         if($tipo==0){
          echo 'style="display:none"';
         } 
      ?>
        
        ><i class="bx bx-category"></i><span>Dashboard</span></a>
      <label>GESTIÓN</label>
      <hr>
      
      <a href="lista_usuarios.php" target="ventana"
      <?php
         if($tipo==0){
          echo 'style="display:none"';
         } 
      ?>
      ><i class="bx bx-user"></i><span>Usuarios</span></a>
      <a href="lista_clientes.php" target="ventana"><i class="bx bx-user"></i><span>Clientes</span></a>
      <a href="lista_empresa.php" target="ventana"
      
      <?php
         if($tipo==0){
          echo 'style="display:none"';
         } 
      ?>
      ><i class="bx bx-user"></i><span>Empresa</span></a>
       <label>VENTAS</label>
       <hr>
      <a href="lista_proveedores.php" target="ventana"
      
      <?php
         if($tipo==0){
          echo 'style="display:none"';
         } 
      ?>

      ><i class="bx bx-buildings"></i><span>Proveedores</span></a>
      <a href="lista_productos.php" target="ventana"><i class="bx bx-box"></i><span>Productos</span></a>
      <a href="lista_ventas.php" target="ventana"><i class="bx bx-dollar-circle"></i><span>Ventas</span></a>
      <label>FINANCIERO</label>
      <hr>
      <a href="lista_metpago.php" target="ventana"
      <?php
         if($tipo==0){
          echo 'style="display:none"';
         } 
      ?>
      ><i class="bx bx-credit-card"
      <?php
         if($tipo==0){
          echo 'style="display:none"';
         } 
      ?>
      ></i></i><span>Metodos de pago</span></a>
      <a href="lista_impuestos.php" target="ventana"
      <?php
         if($tipo==0){
          echo 'style="display:none"';
         } 
      ?>
      ><i class="bx bx-purchase-tag"></i><span>Impuestos</span></a>
      <a href="lista_descuentos.php" target="ventana"><i class="bx bxs-discount"></i><span>Descuentos</span></a> 
      </div>
    </div>
      <!--final de menu de navegacion en moviles-->
    <!--sidebar inicio-->
    <div class="sidebar" style="">
      <a href="dashboard.php" target="ventana"
      <?php
         if($tipo==0){
          echo 'style="display:none"';
         } 
      ?>
      ><i class="bx bx-category"></i><span>Dashboard</span></a>
      <label>GESTIÓN</label>
      <hr>
      <a href="lista_usuarios.php" target="ventana"
      <?php
         if($tipo==0){
          echo 'style="display:none"';
         } 
      ?>
      ><i class="bx bx-user"></i><span>Usuarios</span></a>
      <a href="lista_clientes.php" target="ventana"><i class="bx bx-user"></i><span>Clientes</span></a>
      <a href="lista_empresa.php" target="ventana"
      <?php
         if($tipo==0){
          echo 'style="display:none"';
         } 
      ?>
      ><i class="bx bx-user"></i><span>Empresa</span></a>
       <label>VENTAS</label>
       <hr>
      <a href="lista_proveedores.php" target="ventana"
      
      <?php
         if($tipo==0){
          echo 'style="display:none"';
         } 
      ?>
      ><i class="bx bx-buildings"></i><span>Proveedores</span></a>
      <a href="lista_productos.php" target="ventana"><i class="bx bx-box"></i><span>Productos</span></a>
      <a href="lista_ventas.php" target="ventana"><i class="bx bx-dollar-circle"></i><span>Ventas</span></a>
      <label>FINANCIERO</label>
      <hr>
      <a href="lista_metpago.php" target="ventana"
      <?php
         if($tipo==0){
          echo 'style="display:none"';
         } 
      ?>
      ><i class="bx bx-credit-card"></i></i><span>Metodos de pago</span></a>
      <a href="lista_impuestos.php" target="ventana"
      
      <?php
         if($tipo==0){
          echo 'style="display:none"';
         } 
      ?>
      ><i class="bx bx-purchase-tag"></i><span>Impuestos</span></a>
      <a href="lista_descuentos.php" target="ventana"><i class="bx bxs-discount"></i><span>Descuentos</span></a>
      </div>
    <!--sidebar final-->
    <div class="content">
      <div class="card">
        <iframe src="" name="ventana" style="width: 101%; height: 640px; border: none;"></iframe>
      </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
    </script>
  </body>
</html>