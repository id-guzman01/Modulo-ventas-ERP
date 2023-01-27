<?php
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/usuarios.css">

        <link rel="stylesheet" type="text/css" href="css/preferencias.css">
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Consultar usuarios</title>
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
                    <main>
                        <div class="container-fluid">
                            <h1>Usuario</h1>
                            <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Usuario</li>
                            </ol>
                        </div>
                    </main>
                <div class="form row" >
                    <div class="form-group col-md-12">
                        <label>Datos Personales</label>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="hidden" name="action" value="">
                        <input type="text" class="form-control" id="Nombre1" placeholder="Primer Nombre" readonly name="prinom" value="<?php echo $row['pri_nombre']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Nombre2" placeholder="Segundo Nombre" readonly name="segnom" value="<?php echo $row['seg_nombre']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Apellido1" placeholder="Primer Apellido" readonly name="priape" value="<?php echo $row['pri_apellido']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Apellido2" placeholder="Segundo Apellido" readonly name="segape" value="<?php echo $row['seg_apellido']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="number" class="form-control" id="Cedula" placeholder="Cédula" readonly name="cedula" value="<?php echo $row['cedula']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <?php
                            $tipo = $row['tipo'];
                            $resultado='';
                            if($tipo==0){
                                $resultado = 'Vendedor';
                            }else{
                                $resultado = 'Administrador';
                            }    
                        ?>
                        <input type="text" class="form-control" id="Cedula" placeholder="Cédula" readonly name="cedula" value="<?php echo $resultado; ?>">

                    </div>    
                </div>
                <div class="form row">
                    <div class="form-group col-md-12">
                    <label>Datos de contacto</label>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@email" readonly="readonly" name="correo" value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="form-group col-md-4 ">
                        <input type="number" class="form-control" id="Telefono" placeholder="Telefono" readonly name="telefono" value="<?php echo $row['telefono']; ?>">
                    </div>
                </div>
                </div>
            </form>
        </div>
    </body> 
</html>