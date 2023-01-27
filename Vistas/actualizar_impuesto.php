<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/impuestos.css">

    <title>Actualizar Impuesto</title>
</head>
    <body>
        <form class="exit" action="../Controlador/Controlador.php" method="post">
                <input type="hidden" name="action" value="ingresarActualizarImpuesto">
                <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
        </form> 
        <div class="container-fluid">
           
            <form action="../Controlador/Controlador.php" method="post">
            <?php
                            
                            include '../Modelo/Consultas.php';
                            $codigo = $_POST['codBuscar'];
                            $cons = new ConsultasBD();
                            $resultado = $cons->buscarImpuesto($codigo);
                            $row = mysqli_fetch_array($resultado);
                        ?>
                <main>
                    <div class="container col-md-6">
                        <h1>Actualizar Impuesto</h1>
                        <ol class="breadcrumb mb-3">
                            <li class="breadcrumb-item">Actualizar Datos de Impuesto</li>
                        </ol>
                    </div>
                </main>
                <div class="form col-md-6" >
                    <div class="form-group col-md-12">
                        <label>Datos Generales</label>
                    </div>

                    <input type="hidden" name="codigo" value="<?php echo $row['idImpuesto']; ?>">
                    <input type="hidden" name="action" value="actualizarDatosImpuestos">

               
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control"  placeholder="Nombre Impuesto" value="<?php echo $row['nombre']; ?>" required name="nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="number" class="form-control" id="porcentaje" placeholder="%" value="<?php echo $row['porcentaje']; ?>" required name="porcentaje">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
        </div>
    </body>
</html>