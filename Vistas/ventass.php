
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/ventass.css">
    <script src="js/Eliminar.js" type="text/javascript"></script>
    <title>Ventas</title>
</head>
<body>


    <header>
       <h1>Nueva Venta</h1>
    </header>

    <?php
        include '../Modelo/Consultas.php';
        $cons = new ConsultasBD();
        $contadorV = 0;
    ?>

    <section id="container">
        <div class="tabla_venta">
        <table class="tbl_venta">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Cantidad</th>
                    <th class="textleft">Precio</th>
                    <th class="textleft">Precio total</th>
                    <th> Acción</th>
                </tr>
            </thead> 
            <tbody id="detalle_venta">

            <?php
                $contenido = $_GET['codigoventa'];
                $resultadoVendidos = $cons->verProductosVendidos($contenido);
                while($rowi = mysqli_fetch_array($resultadoVendidos)){
            ?>
            
                <tr>
                    
                    <td><?php echo $rowi['nombre']; ?></td>
                    <td><?php echo $rowi['descripcion']; ?></td>
                    <td> <img src="data:image/jpg;base64,<?php echo base64_encode($rowi['imagen']) ?>" alt="" width="85" height="85">  </td>
                    <td><?php echo $rowi['cantidad']; ?></td>
                    <td><?php echo $rowi['pre_venta']; ?></td>
                    <td><?php $total = $rowi['cantidad'] * $rowi['pre_venta']; echo $total; ?></td>

                    <td><?php
                    ini_set( 'display_errors','Off' );
                    ini_set( 'error_reporting', E_ALL );
                    define( 'WP_DEBUG', false );
                    define( 'WP_DEBUG_DISPLAY', false );
                         $contadorV= $contadorV + $total;
                    ?></td>

                    <td>
                    <form action="../Controlador/Controlador.php" method="post">
                    <input type="hidden" value="<?php echo $rowi['idProductos'];?>"  name="codBuscar">
                    <input type="hidden" name="codFactura" value="<?php $contenido = $_GET['codigoventa']; echo $contenido;?>">
                    <input type="hidden" name="cantidadEliminar" value="<?php echo $rowi['cantidad']; ?>">

                    <input type="hidden" name="fecha" value="<?php $fecha = $_GET['fecha']; echo $fecha;?>">
                    <input type="hidden" name="iva" value="<?php $iva = $_GET['iva']; echo $iva;?>">
                    <input type="hidden" name="descuento" value="<?php $descuento = $_GET['descuento']; echo $descuento; ?>">

                    <input type="hidden" name="action" value="eliminarProductoVendido">
                        <button type="submit" class="btn_eliminar" onclick="return Eliminar()" href=""><i><img src="img/delete.png"></i></button> 
                        </form>  
                    </td>  
                    
                </tr>  
            <?php
                }
            ?>

            </tbody>
        </table>
        
        <table class="tbl_venta">
            <tbody id="detalle_venta">
                <tr>
                   <td colspan="5" class="textright">Subtotal $.</td>
                   <td class="textright"> <?php echo $contadorV; ?></td> 
                </tr>
                <tr>
                <?php 

                $iva = $_GET['iva'];
                if($iva=='No aplica'){
                    $porcentaje = '-';
                    $subtotal = 'No aplica';
                }else{    
                $resultadoIVAs = $cons->buscarImpuesto($iva);
                $rowIVAs = mysqli_fetch_array($resultadoIVAs);
                    $porcentaje = $rowIVAs['porcentaje']/100;
                    $subtotal = $porcentaje * $contadorV;
                }
                ?>
                   <td colspan="5" class="textright">IVA (<?php echo $porcentaje; ?>%)</td>
                   <td class="textright"><?php echo $subtotal;?></td>
                </tr>

                <tr>
                <?php
                

                    $descuento = $_GET['descuento'];
                    if($descuento=='No aplica'){
                        $tituloD = '-';
                        $desc = 'No aplica';
                    }else{
                        $resultadoDescuento = $cons->buscarDescuento($descuento);
                        $rowDes = mysqli_fetch_array($resultadoDescuento);
                        $porcen = $rowDes['valor']/100;
                        $desc = $contadorV * $porcen;
                        $tituloD = $rowDes['valor'];
                    }
                ?>
                   <td colspan="5" class="textright">Descuento (<?php echo $tituloD; ?>%)</td>
                   <td class="textright"><?php echo $desc;?></td>
                </tr>

                <tr>

                <?php 


                $iva = $_GET['iva'];
                $descuento = $_GET['descuento'];
                
               
                if($iva=='No aplica' && $descuento=='No aplica'){
                    $TotalF = $contadorV;
                }else if($iva!='No aplica' && $descuento=='No aplica'){    
                    $TotalF = $contadorV + $subtotal;
                }else if($iva=='No aplica' && $descuento!='No aplica'){
                    $TotalF = $contadorV - $desc;
                }else if($iva!='No aplica' && $descuento!='No aplica'){
                     $TotalF = $contadorV + $subtotal - $desc;
                }
                ?>

                   <td colspan="5" class="textright">Total $.</td>
                   <td class="textright"><?php echo $TotalF; $aux=0; $aux = $TotalF; ?></td>
                   
                   <td>
                    <form action="../Controlador/Controlador.php?" method="post">
                        <input type="hidden" name="action" value="FinalizarFactura">
                        <input type="hidden" name="codFactura" value="<?php $contenido = $_GET['codigoventa']; echo $contenido;?>">
                        <input type="hidden" name="TotalAPagar" value="<?php echo $aux; ?>">

                    <input type="hidden" name="fecha" value="<?php $fecha = $_GET['fecha']; echo $fecha;?>">
                    <input type="hidden" name="iva" value="<?php $iva = $_GET['iva']; echo $iva;?>">
                    <input type="hidden" name="descuento" value="<?php $descuento = $_GET['descuento']; echo $descuento; ?>">

                        <button value="Finalizar">Finalizar</button>
                    </form>

                   </td>

                   <td>
                    <form action="../Controlador/Controlador.php" method="post">
                        <input type="hidden" name="action" value="CancelarVentaFactura">
                        <input type="hidden" name="codFactura" value="<?php $contenido = $_GET['codigoventa']; echo $contenido;?>">

                        <input type="hidden" name="fecha" value="<?php $fecha = $_GET['fecha']; echo $fecha;?>">
                        <input type="hidden" name="iva" value="<?php $iva = $_GET['iva']; echo $iva;?>">
                        <input type="hidden" name="descuento" value="<?php $descuento = $_GET['descuento']; echo $descuento; ?>">
                        <button value="Cancelar">Cancelar</button>
                    </form>

                   </td>
                   
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
                <form action="../Controlador/Controlador.php" method="POST">
                <td> <input type="number" name="cantidadC" placeholder="Cantidad a comprar" value="0" >   </td>
                     
                     <td>

                        
                            <input type="hidden" value="AñadirProductoCompra" name="action">
                            <input type="hidden" value="<?php $contenido = $_GET['codigoventa']; echo $contenido;?>" name="codFactura">
                            <input type="hidden" value="<?php echo $rowPV['idProductos']; ?>" name="codBuscar">
                            <input type="hidden" value="<?php echo $rowPV['cantidad']; ?>" name="cantidadActual">

                            <input type="hidden" name="fecha" value="<?php $fecha = $_GET['fecha']; echo $fecha;?>">
                            <input type="hidden" name="iva" value="<?php $iva = $_GET['iva']; echo $iva;?>">
                            <input type="hidden" name="descuento" value="<?php $descuento = $_GET['descuento']; echo $descuento; ?>">

                            <button type="submit" class="agregrar" value="agregrar" name="agregrar"><i class='bx bx-plus'></i></button>
                        </form>

                    </td>
                    
                    
                </tr>
                
                <?php  } ?>
            </tbody>
        </table>
    </div>

                        <!-- Aquí empieza el formulario -->

    <div class="datos_ventas">
        <div class="datos_cliente">
            <div class="action_cliente">
                <h4>Datos de factura</h4>
            </div>
            <div>


            <form name="form_new_cliente_venta" id="form_new_cliente_venta" class="datos" action="../Controlador/Controlador.php" method="post">
                        
                <input type="hidden" name="action" value="">
                <div class="wd100">
                    
                    <label>Codigo Factura</label>

                    <input type="text" name="codigo_venta" id="fec_venta"  value="<?php
                    $contenido = $_GET['codigoventa'];
                    echo $contenido;
                    ?>">
                            
                </div>
                
                <div class="wd100">

                    <label>Fecha</label>
                    <input type="text" name="fecha_venta" id="fec_venta" readonly="readonly" value="<?php
                    $fecha = $_GET['fecha'];
                    echo $fecha;
                    ?>">
                </div>

                <div class="wd100">

                    <label>Iva</label>
                    <input type="text" name="iva" id="fec_venta" readonly="readonly" value="<?php
                    $iva = $_GET['iva'];
                    echo $iva;
                    ?>">
                </div>

                <div class="wd100">

                    <label>Descuento</label>
                    <input type="text" name="descuento" id="fec_venta" readonly="readonly" value="<?php
                    $descuento = $_GET['descuento'];
                    echo $descuento;
                    ?>">
                </div>


            </div>
        </div>
    </div>
     </section>
</body>
</html>