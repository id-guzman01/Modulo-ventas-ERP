<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/productos.css">

	<title>Consultar clientes</title>
</head>
    <body>
        <form action="../Controlador/Controlador.php" method="POST">
            <input type="hidden" name="action" value="salirConsultarProducto">
            <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
        </form> 
        <div class="container-fluid ">        
        <form action="" method="POST">
                <main>
                    <div class="container-fluid">
                        <h1>Producto</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Consultar Producto</li>
                        </ol>
                    </div>
                </main>

                <?php
                $codigo = $_POST['codBuscar'];
                include '../Modelo/Consultas.php';
                $cons = new ConsultasBD();
                $resultado = $cons->buscarProducto($codigo);
                $row = mysqli_fetch_array($resultado);
                ?>

                <div class="form row" >
                    <div class="form-group col-md-12">
                        <label>Datos Producto</label>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="Nombre" placeholder="Nombre producto" readonly="readonly" value="<?php echo $row['nombre']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <textarea type="text" class="form-control" id="Descripcion" placeholder="Descripcion" rows="2" readonly="readonly"><?php echo $row['descripcion']; ?></textarea>
                    </div> 
                </div>
                <div class="form row">   
                    <div class="form-group col-md-3">
                        <input type="number" class="form-control" id="Preciocom" placeholder="Precio Compra" readonly="readonly" value="<?php echo $row['pre_compra']; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="munber" class="form-control" id="Precioven" placeholder="Precio venta" readonly="readonly" value="<?php echo $row['pre_venta']; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="number" class="form-control" id="Stock"  placeholder="Stock" readonly="readonly" value="<?php echo $row['cantidad']; ?>"> 
                    </div>
                    <div class="form-group col-md-3">

                    <?php
                    $nit = $row['nit'];
                    $result = $cons->buscarProveedorListaProductos($nit);
                    $roooow = mysqli_fetch_array($result);
                    ?>

                        <input type="text" class="form-control" id="Nitpro" placeholder="NIT/CIF proveedor" readonly="readonly" value="<?php echo $roooow['nombre']; ?>">
                    </div>
                    <div id="preview" class="styleImage"><img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']) ?>" alt="" width="150" height="150"></div>

                </div>
            </div>
        </form>
        <script src="js/main.js"></script>
    </div>
    </body>
</html>