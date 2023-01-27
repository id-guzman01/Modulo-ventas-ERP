<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/productos.css">

	<title>Registrar clientes</title>
</head>
    <body>
        <form action="../Controlador/Controlador.php" method="post">
            <input type="hidden" name="action" value="salirRegistrarProducto">
            <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
        </form> 
        <div class="container-fluid ">      
        <form action="../Controlador/Controlador.php" method="POST" enctype="multipart/form-data">
                    <main>
                        <div class="container-fluid">
                            <h1>Producto</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Nuevo Producto</li>
                            </ol>
                        </div>
                    </main>
                    <div class="form row" >
                        <div class="form-group col-md-12">
                            <label>Datos Producto</label>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" name="action" value="registrarProductos">
                            <input type="text" class="form-control" id="Nombre" class="Nombre" placeholder="Nombre producto" required name="nombre">
                        </div>
                        <div class="form-group col-md-6">
                            <textarea type="text" class="form-control" id="Descripcion" placeholder="Descripcion" rows="2" required name="descripcion"></textarea>
                        </div> 
                    </div>
                    <div class="form row">   
                        <div class="form-group col-md-3">
                            <label><input type="number" class="form-control" id="Preciocom" placeholder="Precio Compra" required name="precioc"></label> 
                        </div>
                        <div class="form-group col-md-3">
                            <input type="munber" class="form-control" id="Precioven" placeholder="Precio venta" required name="preciov">
                        </div>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" id="Stock"  placeholder="Stock" required name="stock"> 
                        </div>
                        <div class="form-group col-md-3">
                        <select class="form-control" name="nitp" class="estado" >
                            <option >Seleccione un proveedor</option>
                            <?php 
                            include '../Modelo/Consultas.php';
                            $cons = new ConsultasBD();
                            $resultado = $cons->verProveedores();
                            
                            while ($registro=mysqli_fetch_array($resultado)) {?>
                            ?>
          
                            <option class="activo" name="opcion1"> <?php echo $registro['nombre'];  ?>  </option> 
                            
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="file" name="imagen" id="file" accept=".jpg,.png,.jpeg" >
                        </div>
                        <div id="preview" class="styleImage"></div>  
                        </div>
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="reset" class="btn btn-warning">Limpiar</button>
                </div>
                
            </form>
            <script src="js/main.js"></script>
        </div>
    </body>
</html>