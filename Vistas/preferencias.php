<?php

  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/preferencias.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <title>Preferencias</title>

</head>
<body>



  <?php
    include '../Modelo/Consultas.php';
    $cons = new ConsultasBD();
    $codigo_usuario = $_SESSION['codigo'];
    $contenidoUsuario = '';
    $contenidoUsuario = $cons->buscarUsuarioTodo($codigo_usuario);
    $row = mysqli_fetch_array($contenidoUsuario);
  ?>
  <section id="pantalla-dividida">
    <div class="izquierda">
      <span><img src="img/user1.png"></span>
      <label class="rol"><?php echo $row['pri_nombre']; ?> <?php echo $row['seg_nombre']; ?> <?php echo $row['pri_apellido']; ?> <?php echo $row['seg_apellido']; ?></label>
      <hr>
       <label></h1><i class='bx bx-wrench'></i><span>PREFERENCIAS</span></label>
      <hr>
      <a href="actualizar_usuario_log.php" target="ventana1"><i class="bx bx-user"></i><span>Editar Perfil</span></a>
      <a href="cambiar_contraseña.html" target="ventana1"><i class="bx bx-user"></i><span>Cambiar Contraseña</span></a>
      <a href="Principal.php"><i class="bx bx-user"></i><span>Salir</span></a>
    </div>

    <div class="derecha">
     
        <iframe src="consultar_usuario_log.php" name="ventana1" style="width: 120%; height: 640px; border: none;"></iframe>
   
    </div>
  </section>
</body>
</html>