<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/metodos.css">

    <title>Actualizar Metodos de Pago</title>
</head>
    <body>
        <form class="exit" action="../Controlador/Controlador.php" method="post">
                <input type="hidden" name="action" value="salirEditarMetodo">
                <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
        </form> 
        <div class="container-fluid ">
            <form action="../Controlador/Controlador.php" method="post">
                <main>
                    <div class="container col-md-6">
                        <h1>Metodos de pago</h1>
                        <ol class="breadcrumb mb-3">
                            <li class="breadcrumb-item active">Actualizar Metodo de Pago</li>
                        </ol>
                    </div>
    
                </main>

                 <?php
                 $codigo = $_POST['codBuscar'];
                 include '../Modelo/Consultas.php';
                 $cons = new ConsultasBD();
                 $resultado = $cons->buscarMetodo($codigo);
                 $row = mysqli_fetch_array($resultado);
                 ?>

                <div class="form col-md-6" >
                    <div class="form-group col-md-5">
                        <label>Datos Generales</label>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="hidden" name="codigo" value="<?php echo $row['idMetodo_de_pago']; ?>">
                        <input type="hidden" name="action" value="editarMetodo">
                        <input type="text" class="form-control"  placeholder="Nombre Metodo" required name="nombre" value="<?php echo $row['nom']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <textarea type="text" class="form-control" id="Descripcion" placeholder="Descripcion" rows="3" required name="descripcion"><?php echo $row['descripcion']; ?></textarea>
                    </div>     
                </div>
                <button type="submit" class="btn btn-success">actualizar</button>
            </form>
        </div>
    </body>
</html>