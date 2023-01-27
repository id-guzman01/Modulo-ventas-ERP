<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/proveedores.css">

    <title>Actualizar Proveedor</title>
</head>
<body>
<form action="../Controlador/Controlador.php" method="post">
    <input type="hidden" name="action" value="salirEditarProveedor">
    <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
</form>
<?php
                    $nit=$_POST['codBuscar'];
                    include '../Modelo/Consultas.php';
                    $cons = new ConsultasBD();
                    $resultado = $cons->buscarProveedor($nit);
                    $row = mysqli_fetch_array($resultado);
                ?>
<div class="container-fluid">
            <form action="../Controlador/Controlador.php" method="post">
                <main>
                    <div class="container-fluid">
                        <h1>Actualizar Proveedor</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Actualizar Datos Del Proveedor</li>
                        </ol>
                    </div>
                </main>
                
                <div class="form row" >
                    <div class="form-group col-md-12">
                        <label>Datos Generales</label>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="hidden" name="action" value="actualizarProveedorf">
                        <input type="text" class="form-control" id="Nombrepv" placeholder="Nombre Proveedor" required name="nomprov" value="<?php echo $row['nombre']; ?>" >
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Nit" placeholder="NIT/CIF" readonly="readonly"  value="<?php echo $row['nit']; ?>" name="nit">
                    </div>
                    <div class="form-group col-md-6">
                        <textarea type="text" class="form-control" id="Descripcionpv" placeholder="Descripcion" rows="5" required name="descripcion"><?php echo $row['descripcion']; ?></textarea>
                    </div>
                </div>
            
                <div class="form row">
                    <div class="form-group col-md-12">
                    <label>Datos de contacto</label>
                    </div>
                    <div class="form-group col-md-4">

                    <script
                        src="https://code.jquery.com/jquery-3.2.0.min.js"
                        integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I="
                        crossorigin="anonymous">
                        </script>
                        <script>
                        //Esta es la función que una vez se cargue el documento será gatillada.
                        $(function(){
                            $("#pais").val('<?php echo $row['pais']; ?>')
                        });
                            </script>



                        <select class="form-control" id="pais" placeholder="País" required name="pais">
                            <option>Argentina</option>
                            <option>Brasil</option>
                            <option>Canadá</option>
                            <option>Chile</option>
                            <option>Colombia</option>
                            <option>Ecuador</option>
                            <option>El Salvador</option>
                            <option>Honduras</option>
                            <option>Paraguay</option>
                            <option>México</option>
                            <option>Panamá</option>
                            <option>Perú</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Ciudad" placeholder="Ciudad" required name="ciudad" value="<?php echo $row['ciudad']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Direccion" placeholder="Dirección" required name="direccion" value="<?php echo $row['direccion']; ?>">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="number" class="form-control" id="Telefono" placeholder="Telefono" required name="telefono" value="<?php echo $row['telefono']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@email" required name="correo" value="<?php echo $row['email']; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="reset" class="btn btn-warning">Limpiar</button>
            </form>
        </div>
    </body>
</html>
