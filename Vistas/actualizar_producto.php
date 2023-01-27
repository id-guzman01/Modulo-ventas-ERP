<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/productos.css">

	<title>Actualizar Producto</title>
</head>
    <body>
        <form action="../Controlador/Controlador.php" method="POST">
            <input type="hidden" name="action" value="salirActualizarProducto">
            <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
        </form> 
        <div class="container-fluid ">        
        <form action="../Controlador/Controlador.php" method="POST" enctype="multipart/form-data">
                <main>
                    <div class="container-fluid">
                        <h1>Actualizar Producto</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Actualizar Datos de Producto</li>
                        </ol>
                    </div>
                </main>
                <div class="form row" >
                    <input type="hidden" name="action" value="ActualizarProducto">
                    <div class="form-group col-md-12">
                        <label>Datos Producto</label>
                    </div>
                    <div class="form-group col-md-6">

                    <?php
                    include '../Modelo/Consultas.php';
                    $codigo = $_POST['codBuscar'];
                    $cons = new ConsultasBD();
                    $resultado = $cons->buscarProducto($codigo);
                    $roow = mysqli_fetch_array($resultado);
                    ?>
                    <input type="hidden" name="codigo" value="<?php echo $roow['idProductos']; ?>">
                    <input type="hidden" name="action" value="editarProductos">
                        <input type="text" class="form-control" id="Nombre" placeholder="Nombre producto" required  value="<?php echo $roow['nombre']; ?>" name="nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <textarea type="text" class="form-control" id="Descripcion" placeholder="Descripcion" rows="2" required name="descripcion"><?php echo $roow['descripcion']; ?></textarea>
                    </div> 
                </div>
                <div class="form row">   
                    <div class="form-group col-md-3">
                        <input type="number" class="form-control" id="Preciocom" placeholder="Precio Compra" value="<?php echo $roow['pre_compra']; ?>" required name="precompra">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="munber" class="form-control" id="Precioven" placeholder="Precio venta" required value="<?php echo $roow['pre_venta']; ?>" name="preventa">
                    </div>
                    <div class="form-group col-md-3">
                        <input type="number" class="form-control" id="Stock"  placeholder="Stock" required value="<?php echo $roow['cantidad']; ?>" name="cantidad"> 
                    </div>
                    <div class="form-group col-md-3">


                    <?php
                        $nit = $roow['nit'];
                        $todosLosResultados = $cons->buscarProveedorListaProductos($nit);
                        $roooow = mysqli_fetch_array($todosLosResultados);
                    ?>

                    <script
                    src="https://code.jquery.com/jquery-3.2.0.min.js"
                    integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I="
                    crossorigin="anonymous">
                    </script>
                    <script>
                    //Esta es la función que una vez se cargue el documento será gatillada.
                    $(function(){
                        $("#pais").val('<?php echo $roooow['nombre']; ?>')
                    });
                        </script>
                        
                    <select class="form-control" id="pais" placeholder="País" required name="proveedor">
                        <?php
                        
                        $resultado = $cons->listaProveedores();
                        while($row = mysqli_fetch_array($resultado)){
                        ?>
                        <option ><?php echo $row['nombre']; ?></option>

                         <?php }?>   
                      </select>

                    </div>
                    <div class="form-group col-md-3">
                            <input type="file" name="imagen" id="file" accept=".jpg,.png,.jpeg" >
                        </div>
                    
                    <div id="preview" class="styleImage"><img src="data:image/jpg;base64,<?php echo base64_encode($roow['imagen']) ?>" alt="" width="150" height="150"></div>
                    
                </div>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
        </form>
            <script src="js/main.js"></script>
        </div>
    </body>
</html>