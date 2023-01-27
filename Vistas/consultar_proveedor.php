<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/proveedores.css">

    <title>Consultar proveedores</title>
</head>
<body>
<form action="../Controlador/Controlador.php" method="POST">
    <input type="hidden" name="action" value="salirVisualizarProveedor">
    <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
</form>
<div class="container-fluid">
            <form action="../Controlador/Controlador.php" method="POST">
                <main>
                    <div class="container-fluid">
                        <h1>Consultar Proveedor</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Proveedor</li>
                        </ol>
                    </div>
                </main>

                <?php
                    $codigo = $_POST['codBuscar'];
                    include '../Modelo/Consultas.php';
                    $cons = new ConsultasBD();
                    $resultado = $cons->buscarProveedor($codigo);
                    $row = mysqli_fetch_array($resultado);
                ?>

                <div class="form row" >
                    <div class="form-group col-md-12">
                        <label>Datos Generales</label>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="hidden" name="action" value="RegistrarProovedores">
                        <input type="text" class="form-control" id="Nombrepv" placeholder="Nombre Proveedor" readonly name="nomprov" value="<?php echo $row['nombre']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Nit" placeholder="NIT/CIF" readonly name="nit" value="<?php echo $row['nit']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <textarea type="text" class="form-control" id="Descripcionpv" placeholder="Descripcion" rows="5" readonly="readonly" name="descripcion"><?php echo $row['descripcion']; ?></textarea>
                    </div>
                </div>
            
                <div class="form row">
                    <div class="form-group col-md-12">
                    <label>Datos de contacto</label>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="pais" placeholder="Pais" readonly name="pais" value="<?php echo $row['pais']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Ciudad" placeholder="Ciudad" readonly name="ciudad" value="<?php echo $row['ciudad']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Direccion" placeholder="Dirección" readonly name="direccion" value="<?php echo $row['direccion']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" id="Telefono" placeholder="Telefono" readonly name="telefono" value="<?php echo $row['telefono']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@email" readonly name="correo" value="<?php echo $row['email']; ?>">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
