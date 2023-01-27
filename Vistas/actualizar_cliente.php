<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/clientes.css">

	<title>Actualizar clientes</title>
</head>
<body>
<div class="container-fluid ">
        <form action="../Controlador/Controlador.php" method="POST">
            <input type="hidden" name="action" value="SalirEditarCliente">
            <button class="btn btn-danger float-right" type="submit" name="salir">x</button>
        </form>
        <?php
                $cedula = $_POST['codBuscar'];
                include '../Modelo/Consultas.php';
                $cons = new ConsultasBD();
                $resultado = $cons->buscarCliente($cedula);
                $row = mysqli_fetch_array($resultado);
                ?>
        <form action="../Controlador/Controlador.php" method="POST">
            <main>
                <div class="container-fluid">
                    <h1>Actualizar Cliente</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Actualizar datos del cliente</li>
                    </ol>
                </div>
            </main>
            <div class="form row" >

                <div class="form-group col-md-12">
                    <label>Datos Personales</label>
                </div>
               
                <div class="form-group col-md-6">
                <input type="hidden" name="action" value="editarCliente">

                

                <input type="hidden" name="codBuscarAUX" value=" <?php $cedula = $_POST['codBuscar']; echo $cedula; ?> ">
                <input type="text" class="form-control" id="Nombre1" placeholder="Primer Nombre" value="<?php echo $row['pri_nom']; ?>" required name="prinom">
                 </div>
                 <div class="form-group col">
                    <input type="text" class="form-control" id="Nombre2" placeholder="Segundo Nombre" value="<?php echo $row['seg_nom']; ?>" required name="segnom">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="Apellido1" placeholder="Primer Apellido" value="<?php echo $row['pri_ape']; ?>" required name="priape">
                    </div>
                    <div class="form-group col">
                        <input type="text" class="form-control" id="Apellido2" placeholder="Segundo Apellido" value="<?php echo $row['seg_ape']; ?>" required name="segape">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" id="Cedula" placeholder="Cédula" value=" <?php  echo $cedula; ?>  " readonly="readonly" name="cedula" value="<?php $cedula = $_POST['codBuscar']; echo $cedula; ?>">
                    </div>
                    
            </div>
          
            <div class="form row">
                <div class="form-group col-md-12">
                <label>Datos de contacto</label>
                </div>
                <div class="form-group col-md-6">

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

                <select class="form-control form-control-lg" id="pais" placeholder="País" required name="pais" onchange="ShowSelected();">
                        <option value="Argentina">Argentina</option>
                        <option Value="Brasil">Brasil</option>
                        <option value="Canadá">Canadá</option>
                        <option value="Chile">Chile</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="El salvador">El Salvador</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="México">México</option>
                        <option value="Panamá">Panamá</option>
                        <option Value="Perú">Perú</option>
                      </select>
                
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="Ciudad" placeholder="Ciudad" required name="ciudad" value="<?php echo $row['ciudad']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="Direccion" placeholder="Dirección" required name="direccion" value="<?php echo $row['direccion']; ?>"> 
                </div>
                 <div class="form-group col">
                <input type="number" class="form-control" id="Telefono" placeholder="Telefono" required name ="telefono" value="<?php echo $row['Telefono']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@email" required name="correo" value="<?php echo $row['correo']; ?>" >
                </div>
            </div>
          <button type="submit" class="btn btn-success ">Actualizar</button>
        </form>
</body>
</html>