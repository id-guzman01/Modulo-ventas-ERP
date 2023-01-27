<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/usuarios.css">
    <title>Actualizar Usuario</title>
</head>
<body>
<div class="container-fluid ">
        <form action="../Controlador/Controlador.php" method="post">
            <input type="hidden" name="action" value="salirEditarUsuario">
            <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
        </form>
        <?php
                        $cedula=$_POST['codBuscar'];
                        include '../Modelo/Consultas.php';
                        $cons = new ConsultasBD();
                        $resultado = $cons->buscarUsuario($cedula);
                        $row = mysqli_fetch_array($resultado);
                    ?>
            <form action="../Controlador/Controlador.php" method="post">
                    <main>
                        <div class="container-fluid">
                            <h1>Actualizar Usuario</h1>
                            <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Actualizar Datos De Usuario</li>
                            </ol>
                        </div>
                    </main>
                <div class="form row" style="margin-left: 20px;">
                    <div class="form-group col-md-12">
                        <label>Datos Personales</label>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="hidden" name="action" value="ActualizarUsuario">
                        <input type="text" class="form-control" id="Nombre1" placeholder="Primer Nombre" required name="prinom" value="<?php echo $row['pri_nombre']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Nombre2" placeholder="Segundo Nombre" name="segnom" value="<?php echo $row['seg_nombre']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Apellido1" placeholder="Primer Apellido" required name="priape" value="<?php echo $row['pri_apellido']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Apellido2" placeholder="Segundo Apellido" required name="segape" value="<?php echo $row['seg_apellido']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Cedula" placeholder="Cédula" required readonly="readonly" value="<?php echo $row['cedula']; ?>" name="cedula">
                    </div>
                    <div class="form-group col-md-4">
                        
                    </div>    
                </div>
                <div class="form row" style="margin-left:20px;">
                    <div class="form-group col-md-12">
                    <label>Datos de contacto</label>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@email" required name="correo" value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="form-group col-md-4 ">
                        <input type="number" class="form-control" id="Telefono" placeholder="Telefono" required name="telefono" value="<?php echo $row['telefono']; ?>">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="reset" class="btn btn-warning">Limpiar</button>
            </form>
        </div>
    </body> 
</html>