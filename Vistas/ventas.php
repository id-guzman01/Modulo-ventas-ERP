<?php

    session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/ventas.css">
    <title>Ventas ss</title>
</head>
<body>
    <header>
       <h1>Nueva Venta</h1>
    </header>

    <?php
        include '../Modelo/Consultas.php';
        $cons = new ConsultasBD();
    ?>

    <section id="container">
        <div class="tabla_venta">
        <table class="tbl_venta">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Cantidad</th>
                    <th class="textleft">Precio</th>
                    <th class="textleft">Precio total</th>
                    <th> Acción</th>
                </tr>
            </thead> 
            <tbody id="detalle_venta">
                <tr>
                    <td>1</td>
                    <td>Mouse USB</td>
                    <td class="textcenter">1</td>
                    <td class="file">1</td>
                    <td class="textright">100.00</td>
                    <td class="textright">100.00</td>
                    <td class="">
                        <a class="link_delete" href="#" onclick="event.preventDefault();
                        del_producto_detalle(1);"><img src="Imagenes/Delete.png" alt=""></a>
                </tr>  
                <tr>
                    <td>10</td>
                    <td>Teclado USB</td>
                    <td class="textcenter">1</td>
                    <td class="file">1</td>
                    <td class="textright">150.00</td>
                    <td class="textright">150.00</td>
                    <td class="">
                        <a class="link_delete" href="#" onclick="event.preventDefault();
                        del_product_detalle(1);"><img src="Imagenes/Delete.png" alt=""></a>
                    </td>
                </tr>

            </tbody>
        </table>
        
        <table class="tbl_venta">
            <tbody id="detalle_venta">
                <tr>
                   <td colspan="5" class="textright">Subtotal $.</td>
                   <td class="textright">1000.00</td> 
                </tr>
                <tr>
                   <td colspan="5" class="textright">IVA (12%)</td>
                   <td class="textright">500</td>
                </tr>
                <tr>
                   <td colspan="5" class="textright">Total $.</td>
                   <td class="textright">1500.00</td> 
                </tr>
            </tbody>
        </table>


        <table class="tbl_venta">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th width="100px">Código</th>
                        <th>Descripción</th>
                        <th>Existencias</th>
                        <th width="100px">Cantidad</th>
                        <th class="textleft">Precio</th>
                        <th> Acción</th>
                    </tr>
                </thead>
                <tbody id="detalle_venta">     
                
                <?php
                    $RTproductos = $cons->verTodoLosProductosVender();
                     
                    while($rowPV = mysqli_fetch_array($RTproductos)){
                ?>
                <tr>
                <td> <img src="data:image/jpg;base64,<?php echo base64_encode($rowPV['imagen']) ?>" alt="" width="85" height="85">  </td>
                <td> <?php echo $rowPV['idProductos']; ?></td>
                <td> <?php echo $rowPV['nombre']; ?></td>
                <td> <?php echo $rowPV['descripcion']; ?></td>
                <td> <?php echo $rowPV['cantidad']; ?></td>
                <td> <?php echo $rowPV['pre_venta']; ?></td>
                     
                     <td>

                        <form action="../Controlador/Controlador.php" method="POST">
                            <input type="hidden" value="AñadirProductoCompra" name="action">
                            <input type="hidden" value="idProductos" value="codBuscar">
                            <button type="submit" class="agregrar" value="agregrar" name="agregrar"><i class='bx bx-plus'></i></button>
                        </form>

                    </td>
                    
                    
                </tr>
                
                <?php  } ?>
            </tbody>
        </table>
    </div>
        <div class="datos_ventas">
        <div class="datos_cliente">
        <div class="action_cliente">
            <h4>Datos del cliente</h4>
        </div>
        <div>

        <form action="../Controlador/Controlador.php" method="post">
                <input type="hidden" name="action" value="ingresarAgregarClienteNuevo">
                <button type="submit" class="btn_eliminar" href=""><i class='bx bxs-user-plus'></i></button>
                </form>


        <form name="form_new_cliente_venta" id="form_new_cliente_venta" class="datos" action="../Controlador/Controlador.php" method="post">
                    
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
                                location.href='../Vistas/ventas.php?codigo=' + valor;

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
            <h4>Datos de ventas</h4>
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
                    <input type="text" name="fecha_venta" id="fec_venta" disabled="disabled" required value="<?php $fechaActual = date('d-m-Y'); echo $fechaActual; ?>">
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
                        <input type="submit" value="Facturar">

                    </div>
                </div>
            </div>
        </div>
        </form>
     </div>
 </div>
     </section>
</body>
</html>