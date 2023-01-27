<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/descuentos.css">

    <title>Actualizar Descuento</title>
</head>
    <body>
        <form class="exit" action="../Controlador/Controlador.php" method="post">
                <input type="hidden" name="action" value="salirActualizarDescuento">
                <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
        </form> 
        <div class="container-fluid">
            <form action="../Controlador/Controlador.php" method="post">
                <main>
                    <div class="container  col-md-6">
                        <h1>Actualizar Descuento</h1>
                        <ol class="breadcrumb mb-3">
                            <li class="breadcrumb-item">Actualizar Datos de Descuento</li>
                        </ol>
                    </div>
                </main>
                <?php
                    $codigo = $_POST['codBuscar'];
                    include '../Modelo/Consultas.php';
                    $cons = new ConsultasBD();
                    $resultado = $cons->buscarDescuento($codigo);
                    $row = mysqli_fetch_array($resultado);
                ?>


                <input type="hidden" name="codigo" value="<?php echo $row['idDescuento']; ?>">
                <input type="hidden" name="action" value="actualizarDatosDescuento">
                <div class="form col-md-6" >
                    <div class="form-group col-md-12">
                        <label>Datos Generales</label>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control"  placeholder="Tipo Descuento" required name="nombre" value="<?php echo $row['nombre']; ?>" >
                    </div>
                    <div class="form-group col-md-5">
                        <input type="number" class="form-control" id="valordes" placeholder="%" required name="porcentaje" value="<?php echo $row['valor']; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
        </div>
    </body>
</html>