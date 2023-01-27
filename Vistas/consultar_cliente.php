<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/clientes.css">

	<title>Consultar clientes</title>
</head>
<body>
<div class="container-fluid ">
    <form action="../Controlador/Controlador.php" method="post">
        <input type="hidden" name="action" value="salirVisualizarCliente">
        <button class="btn btn-danger float-right " type="submit" name="ioas" >x</button>
    </form>

        <?php
            $cedula = $_POST['codBuscar'];
            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            $resultado = $cons->buscarCliente($cedula);
            $row = mysqli_fetch_array($resultado);
        ?>
    
        <form action="../Controlador/Controlador.php" method="post">
            <main>
                <div class="container-fluid">
                    
                    <h1>Consultar Cliente</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Cliente</li>
                    </ol>
                </div>
            </main>
            <div class="form row" style="margin-left:20px;">
                <div class="form-group col-md-12">
                    <label>Datos Personales</label>
                </div>
                <div class="form-group col-md-5">
                <input type="hidden" name="action" value="RegistrarCliente">
                <input type="text" class="form-control" id="Nombre1" placeholder="Primer Nombre" name="prinom" readonly value="<?php echo $row['pri_nom']; ?>">
                 </div>
                 <div class="form-group col-md-5">
                    <input type="text" class="form-control" id="Nombre2" placeholder="Segundo Nombre" name="segnom" readonly value="<?php echo $row['seg_nom']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Apellido1" placeholder="Primer Apellido" readonly name="priape" value="<?php echo $row['pri_ape']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Apellido2" placeholder="Segundo Apellido" readonly name="segape" value="<?php echo $row['seg_ape']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="number" class="form-control" id="Cedula" placeholder="Cédula" readonly name="cedula" value="<?php echo $row['cedula']; ?>"> 
                    </div>
                    
            </div>
          
            <div class="form row" style="margin-left:20px;">
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
                 <div class="form-group col-md-5">
                <input type="number" class="form-control" id="Telefono" placeholder="Telefono" readonly name="telefono" value="<?php echo $row['Telefono']; ?>">
                </div>
                <div class="form-group col-md-5">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@email" readonly name="email" value="<?php echo $row['correo']; ?>">
                </div>
            </div>
        </form>
</body>
</html>