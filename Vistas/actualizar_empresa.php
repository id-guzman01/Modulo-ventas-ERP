<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/empresa.css">
    <title>Actualizar Empresa</title>
</head>
    <body>
        <form class="exit" action="../Controlador/Controlador.php" method="POST">
                <input type="hidden" value="salirActualizarEmpresa" name="action">
                <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
        </form>

        <?php
            $codigo = $_GET['codBuscar'];
            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            $contenidoEmpresa = $cons->buscarEmpresa($codigo);
            $rowE = mysqli_fetch_array($contenidoEmpresa);
        ?>


        <div class="container-fluid ">
            <form action="../Controlador/Controlador.php" method="POST" enctype="multipart/form-data">
                <main>
                    <div class="container-fluid">
                        <h1>Actualizar Empresa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Actualizar Datos de la Empresa</li>
                        </ol>
                    </div>
                </main>
                <div class="form row" style="margin-left: 20px;">
                    <div class="form-group col-md-12">
                        <label>Datos empresariales</label>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="hidden" name="action" value="actualizarEmpresa">
                        <input type="hidden" name="idEmpresa" value="<?php echo $codigo; ?>">
                        <input type="text" class="form-control" id="Nombre_empresa" placeholder="Nombre" required name="nombre" value="<?php echo $rowE['Nombre']; ?>" >
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Nit" placeholder="Nit" name="nit" readonly="readonly" value="<?php echo $rowE['NIT']; ?>"> 
                    </div>
                    <div class="form-group col-md-5">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@email" required name="email" value="<?php echo $rowE['email']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="number" class="form-control" id="Telefono_empresa" placeholder="Telefono" required name="telefono" value="<?php echo $rowE['Telefono']; ?>">
                    </div>

                    <script
                    src="https://code.jquery.com/jquery-3.2.0.min.js"
                    integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I="
                    crossorigin="anonymous">
                    </script>
                    <script>
                    //Esta es la función que una vez se cargue el documento será gatillada.
                    $(function(){
                        $("#pais").val('<?php echo $rowE['pais']; ?>')
                    });
                        </script>   

                    <div class="form-group col-md-5">
                        <select class="form-control" id="pais" placeholder="País" required name="pais">
                            <option >Argentina</option>
                            <option >Brasil</option>
                            <option >Canadá</option>
                            <option>Chile</option>
                            <option >Colombia</option>
                            <option >Ecuador</option>
                            <option >El Salvador</option>
                            <option >Honduras</option>
                            <option >Paraguay</option>
                            <option >México</option>
                            <option >Panamá</option>
                            <option >Perú</option>
                        </select>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Ciudad_empresa" placeholder="Ciudad" required name="ciudad" value="<?php echo $rowE['Ciudad']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Dir_empresa" placeholder="Dirección" required name="direccion" value="<?php echo $rowE['Direccion']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                      <input type="file" class="file" name="imagen" id="file" accept="png" title="Solo archivos png de tipo png">
                      <div id="preview" class="styleImage"><img src="data:image/jpg;base64,<?php echo base64_encode($rowE['imagen']) ?>" alt="" width="150" height="150" style=" margin-top: 30px; margin-left: 40px;"></div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="reset" class="btn btn-warning">Limpiar</button>
            </form>
            <script src="js/main.js"></script>
        </div> 
    </body>       
</html>