<?php

    session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/agregar_ventas.css">
    <script src="js/confirm_v.js" type="text/javascript"></script>
    <title>Ventas</title>
</head>
<body>
    <header>
       <h1>Nueva Venta</h1>
       <form class="form_new_cliente" action="../Controlador/Controlador.php" method="post">
            <input type="hidden" name="action" value="ingresarAgregarClienteNuevo">
                <button type="submit" class="btn_agregar" href=""><i class='bx bxs-user-plus'></i></button>        
        </form>
    </header>
     <form>
            <button class="btn_exit" type="submit" name="salir">x</button>
        </form> 

    <?php
        include '../Modelo/Consultas.php';
        $cons = new ConsultasBD();
    ?>

    <section id="container">
       <form name="form_new_cliente_venta" id="form_new_cliente_venta" class="datos" action="../Controlador/Controlador.php" method="post">
        <div class="datos_cliente">
            <div class="action_cliente">
                <h4>Datos del cliente</h4>
            </div>
            
            <input type="hidden" name="action" value="registrarFacturas">
            <div class="wd100">
                
                <label>Nombre</label>

                    <select name="nombre_Cliente" onchange="enviar_valores(this.value);" required>
                        <option>Seleccione un Cliente</option>
                        <?php
                        $resultado = $cons->verClientes();
                        while($row = mysqli_fetch_array($resultado)){
                        ?>
                            <option value="<?php echo $row['idClientes']; ?>" <?php 

                                    ini_set( 'display_errors','Off' );
                                    ini_set( 'error_reporting', E_ALL );
                                    define( 'WP_DEBUG', false );
                                    define( 'WP_DEBUG_DISPLAY', false );

                                $codigo = $_GET['codigo'];
                                if($codigo == $row['idClientes']){
                                    echo 'selected';
                                }
                            
                            ?>> <?php echo $row['pri_nom'];?> <?php echo $row['seg_nom']; ?> <?php echo $row['pri_ape'] ?> <?php echo $row['seg_ape']; ?></option>
                        <?php }?>
                    </select>
            </div>
                        
                <script>
                                function enviar_valores(valor){
                                location.href='../Vistas/agregar_ventas.php?codigo=' + valor + '&codventa=' + <?php $cod = $_GET['codventa']; echo $cod; ?>;

                                }
                       </script>
            


            <div class="wd100">
                <label>Cedula</label>
                <input type="text" name="cedula_Cliente" id="tel_cliente" readonly="readonly" value="<?php 
                
                                
                    ini_set( 'display_errors','Off' );
                    ini_set( 'error_reporting', E_ALL );
                    define( 'WP_DEBUG', false );
                    define( 'WP_DEBUG_DISPLAY', false );
                    $codigo = $_GET['codigo'];

                    if($codigo=='Seleccione un Cliente'){
                        echo '';
                    }else{
                        $resultadoTelefonoCliente = $cons->buscarClienteF($codigo);
                        $contenidoResultado = mysqli_fetch_array($resultadoTelefonoCliente);
                        echo $contenidoResultado['cedula'];
                    }

                ?>">

            </div>

            <div class="wd100">
            <label>Telefono</label>
            <input type="text" name="telefono_Cliente" id="dir_cliente"  readonly="readonly" 
            value="<?php 
            echo $contenidoResultado['Telefono']; 
            ?>">
            </div>

            <div class="wd100">
            <label>Ciudad</label>
            <input type="text" name="Ciudad_Cliente" id="dir_cliente"  readonly="readonly" 
            value="<?php 
            echo $contenidoResultado['ciudad']; 
            ?>">

            </div>

            <div class="wd100">
            <label>Dirección</label>
            <input type="text" name="direccion_Cliente" id="dir_cliente"  readonly="readonly" 
            value="<?php 
            echo $contenidoResultado['direccion']; 
            ?>">

            </div>
    </div>
        <br>
        <div class="datos_ventas">
            <h4>Datos de ventas</h4>

            <div class="wd100">
            <label>Código Venta</label>
            <input type="text" name="codigo_venta" id="dir_cliente"  readonly="readonly" 
            value="<?php
            $cod = $_GET['codventa'];
            echo $cod;
            ?>">
            </div>

            <div class="datos">                
                <div class="wd100">
                    <?php
                    $codbuscarUsuario = $_SESSION['codigo']; 
                    $resultadoVendedor = $cons->buscarUsuarioTodo($codbuscarUsuario);
                    $restrow = mysqli_fetch_array($resultadoVendedor);
                    ?>
                    <label>Vendedor</label>
                    <select name="vendedor" required>
                        <option>Seleccione un Vendedor</option>
                        <option  value="<?php echo $_SESSION['codigo']; ?>" 
                        <?php

                        ?>><?php echo $restrow['pri_nombre']; ?> <?php echo $restrow['seg_nombre']; ?> <?php echo $restrow['pri_apellido']; ?> <?php echo $restrow['seg_apellido']; ?></option>
                        
                    </select>


                <div class="wd100">

                
                    <label for="Método de pago">Método de pago</label> 
                        <select name="Metodo" required>
                            <option>Seleccionar metodo de pago</option>
                            <?php 
                            $resultadoMetodo = $cons->verMetodosDePago();
                            while($rows = mysqli_fetch_array($resultadoMetodo)){
                            ?>
                            <option value="<?php echo $rows['idMetodo_de_pago']; ?>"><?php echo $rows['nom']; ?></option>
                            <?php  }?>
                        </select>
                </div>
                <div class="wd100">
                    <label>Fecha</label>
                    <input type="text" id="fec_venta" readonly="readonly" value="<?php date_default_timezone_set("America/Bogota");  $fechaActual = date("Y-m-d"); echo $fechaActual; ?>" name="fecha">
                </div>

                <div class="wd100">
                    <label>Fecha de pago</label>
                    <input type="date" name="fecha_pago" id="fec_venta" required >
                </div>

                 <div class="wd100">
                    <label for="Estado">Estado</label> 
                        <select name="estado" required>
                            <option>Seleccione un estado</option>
                            <option value="Pagada">Pagada</option>
                            <option value="Sin pagar">Sin pagar</option>
                        </select>
                </div>
                <div class="wd100">
                    <label>Iva</label>
                    <select name="iva" required>
                        <option>Seleccione Iva</option>
                        <?php
                        $resultadoIVA = $cons->verTodosLosImpuestos();
                        while($rowv = mysqli_fetch_array($resultadoIVA)){
                        ?>
                        <option value="<?php echo $rowv['idImpuesto']; ?>"><?php echo $rowv['nombre']; ?> <?php echo $rowv['porcentaje']; ?>%</option>
                        <?php  }?>
                    </select>
                </div>

                <div class="wd100">
                    <label>Descuento</label>
                    <select name="descuento" required>
                        <option>Seleccione un descuento</option>
                        <?php
                        $resultadoIVA = $cons->verTodosLosDescuentos();
                        while($rowv = mysqli_fetch_array($resultadoIVA)){
                        ?>
                        <option value="<?php echo $rowv['idDescuento']; ?>"><?php echo $rowv['nombre']; ?> <?php echo $rowv['valor']; ?>%</option>
                        <?php  }?>
                    </select>
                </div>

                <div class="wd100">
                    <label>Acciones</label>
                    <div id="acciones_ventas">
                        <input  type="reset" id="btn_anular_venta" value="Cancelar">
                        <input type="submit" id="btn_facturar" onclick="return confirmar()" value="Facturar">
                    </div>
                    </div>    
                </div>
            </div>          
        </form>   
     </section>
</body>
</html>