<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/usuarios.css">
    <title>Registrar usuarios</title>
</head>
<body>
<div class="container-fluid ">
        <form action="../Controlador/Controlador.php" method="post">
            <input type="hidden" name="action" value="SalirRegistroUsuario">
            <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
        </form>

        <?php
            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

        ?>



            <form action="../Controlador/Controlador.php" method="post">
                    <main>
                        <div class="container-fluid">
                            <h1>Usuario</h1>
                            <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Nuevo Usuario</li>
                            </ol>
                        </div>
                    </main>
                <div class="form row" >
                    <div class="form-group col-md-12">
                        <label>Datos Personales</label>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="hidden" name="action" value="RegistrarUsuarios">
                        <input type="text" class="form-control" id="Nombre1" placeholder="Primer Nombre" required name="prinom">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Nombre2" placeholder="Segundo Nombre" name="segnom">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Apellido1" placeholder="Primer Apellido" required name="priape">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Apellido2" placeholder="Segundo Apellido" required name="segape">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="number" class="form-control" id="Cedula" placeholder="Cédula" required name="cedula">
                    </div>
                    <div class="form-group col-md-4">
                        <select class="form-control" id="tipo"  required name="tipo">
                            <option selected>Selecione tipo</option>
                            <option value="0">Vendedor</option>
                            <option value="1">Administrador</option>
                        </select>
                    </div>    
                </div>

                <div class="form row">
                    <div class="form-group col-md-12">
                    <label>Empresa a la cual se registrará el usuario</label>
                    </div>
                    <div class="form-group col-md-5">
                    <select class="form-control" id="pais" placeholder="País" required name="empresa">
                            <option>Seleccione una empresa</option>
                             <?php
                                $contenidoEmpresa = $cons->verEmpresas();
                                while($rowE = mysqli_fetch_array($contenidoEmpresa)){
                             ?>

                            <option value="<?php echo $rowE['idEmpresa']; ?>"><?php echo $rowE['Nombre']; ?></option>
                            <?php } ?>
                        </select>                    </div>
                </div>


                <div class="form row">
                    <div class="form-group col-md-12">
                    <label>Datos de contacto</label>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@email" required name="correo">
                    </div>
                    <div class="form-group col-md-4 ">
                        <input type="number" class="form-control" id="Telefono" placeholder="Telefono" required name="telefono">
                    </div>
                </div>
                <div class="form row">
                    <div class="form-group col-md-3">
                    <label>Usuario y Contraseña</label>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="usuario" placeholder="Usuario" required name="usuario">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="password" class="form-control" id="Contraseña" placeholder="Contraseña" required name="contra">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Confirmar Datos</label>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="usuario2" placeholder="Confirmar Usuario" required name="confusuario">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="password" class="form-control" id="Contraseña2" placeholder="Confirmar Contraseña" required name="confcontra">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Registrar</button>
                <button type="reset" class="btn btn-warning">Limpiar</button>
            </form>
        </div>
    </body> 
</html>