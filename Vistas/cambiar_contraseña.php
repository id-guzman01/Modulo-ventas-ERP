<?php
    session_start();
?>

<!DOCTYPE html>
<html xmlns:mso="urn:schemas-microsoft-com:office:office" xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/usuarios.css">

        <link rel="stylesheet" type="text/css" href="css/preferencias.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Contraseña</title>

<!--[if gte mso 9]><xml>
<mso:CustomDocumentProperties>
<mso:display_urn_x003a_schemas-microsoft-com_x003a_office_x003a_office_x0023_SharedWithUsers msdt:dt="string">Trabajos Members</mso:display_urn_x003a_schemas-microsoft-com_x003a_office_x003a_office_x0023_SharedWithUsers>
<mso:SharedWithUsers msdt:dt="string">27;#Trabajos Members</mso:SharedWithUsers>
</mso:CustomDocumentProperties>
</xml><![endif]-->
</head>
<body>
<div class="container-fluid ">

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
      <a href="actualizar_usuario_log.php"><i class="bx bx-user"></i><span>Editar Perfil</span></a>
      <a href="cambiar_contraseña.php"><i class="bx bx-user"></i><span>Cambiar Contraseña</span></a>
      <a href="Principal.php"><i class="bx bx-user"></i><span>Salir</span></a>
    </div>


            <form action="../Controlador/Controlador.php" method="post">
            <input type="hidden" name="action" value="CambiarContraseñaUsuario">
                    <main>
                        <div class="container-fluid">
                            <h2>Cambiar Contraseña</h2>
                            <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Contraseña</li>
                            </ol>
                        </div>
                    </main>
                <div class="form row">
                    <div class="form-group col-md-4">
                        <input type="hidden" value="<?php echo $codigo_usuario; ?>" name="codigo">
                        <input type="password" class="form-control" id="usuario" placeholder="Contraseña actual" required="required" name="cactual">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="password" class="form-control" id="Contraseña" placeholder="Nueva Contraseña" required="required" name="cnueva">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="password" class="form-control" id="Contraseña" placeholder="Confirmar Contraseña" required="required" name="cconfir">
                    </div>
                </div>
                <button type="reset" class="btn btn-warning">Cancelar</button>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
        </div>
    </body> 
</html>