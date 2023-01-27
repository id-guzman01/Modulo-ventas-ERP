<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/empresa.css">
    <title>Consultar Empresa</title>
</head>
    <body>
        <form class="exit" action="../Controlador/Controlador.php" method="POST">
                <input type="hidden" value="salirConsultarEmpresa" name="action">
                <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
        </form>
        
        <?php
            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            $empresa = $_POST['codBuscar'];
            $contenidoEmpresa = $cons->buscarEmpresa($empresa);
            $rowE = mysqli_fetch_array($contenidoEmpresa);

        ?>

        <div class="container-fluid ">
            <form>
                <main>
                    <div class="container-fluid">
                        <h1>Empresa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Datos de la Empresa</li>
                        </ol>
                    </div>
                </main>
                <div class="form row" style="margin-left: 20px;">
                    <div class="form-group col-md-12">
                        <label>Datos empresariales</label>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Nombre_empresa" placeholder="Nombre" readonly="readonly" name="nombre" value="<?php echo $rowE['Nombre']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Nit" placeholder="Nit" readonly="readonly" name="nit" value="<?php echo $rowE['NIT']; ?>"></div>
                    <div class="form-group col-md-5">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@email" readonly="readonly" name="email" value="<?php echo $rowE['email']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="number" class="form-control" id="Telefono_empresa" placeholder="Telefono" readonly="readonly" name="telefono" value="<?php echo $rowE['Telefono']; ?>">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="text" class="form-control" id="Ciudad_empresa" placeholder="País" readonly="readonly" name="ciudad" value="<?php echo $rowE['pais']; ?>">
                    </div>
                    </div>
                    <div class="form-group col-md-5" style="margin-left:20px;">
                        <input type="text" class="form-control" id="Ciudad_empresa" placeholder="Ciudad" readonly="readonly" name="ciudad" value="<?php echo $rowE['Ciudad']; ?>">
                    </div>
                    <div class="form-group col-md-5" style="margin-left:20px;">
                        <input type="text" class="form-control" id="Dir_empresa" placeholder="Dirección" readonly="readonly" name="direccion" value="<?php echo $rowE['Direccion']; ?>">
                    </div>
                    <div class="form-group col-md-5" style="margin-left:80px;">
                      <div id="preview" class="styleImage"> <img src="data:image/jpg;base64,<?php echo base64_encode($rowE['imagen']) ?>" alt="" width="150" height="150">  </div>
                    </div>
                </div>
            </form>
            <script src="js/main.js"></script>
        </div> 
    </body>       
</html>