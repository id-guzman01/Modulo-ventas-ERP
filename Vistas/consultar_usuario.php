<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/usuarios.css">
    <title>Consultar usuarios</title>
</head>
<body>
<div class="container-fluid ">
        <form action="../Controlador/Controlador.php" method="post">
            <input type="hidden" name="action" value="salirVisualizarUsuario">
            <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
        </form>
            <form action="../Controlador/Controlador.php" method="post">
                    <main>
                        <div class="container-fluid">
                            <h1>Consultar Usuario</h1>
                            <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Usuario</li>
                            </ol>
                        </div>
                    </main>
                <div class="form row" >

                <?php
                $codigo = $_POST['codBuscar'];
                include '../Modelo/Consultas.php';
                $cons = new ConsultasBD();
                $resultado = $cons->buscarUsuario($codigo);
                $row = mysqli_fetch_array($resultado);
                ?>



                    <div class="form-group col-md-12">
                        <label>Datos Personales</label>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="hidden" name="action" value="RegistrarUsuarios">
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
                    <div class="form-group col-md-5">

                            <?php
                                $tipo = $row['tipo'];
                                $tipoF;
                                if($tipo==1){
                                    $tipoF = 'Administrador';
                                }else{
                                    $tipoF = 'Vendedor';
                                }
                            ?>

                        <input type="text" class="form-control" id="tipo" placeholder="Tipo de usuario" readonly name="tipo" value="<?php echo $tipoF; ?>">
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
                <div class="form row">
                    
                    
                </div>
            </form>
        </div>
    </body> 
</html>