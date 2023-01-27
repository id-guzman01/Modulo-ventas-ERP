<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/consultar_venta.css">

    <title>Consultar Venta</title>
</head>
    <body>

    <?php

    include '../Modelo/Consultas.php';
    $cons = new ConsultasBD();
    $codVenta = $_POST['idFactura'];
    $contadorV = 0;
    ?>


        <form>
            <button class="btn_exit" type="submit" name="salir">x</button>
        </form> 
        <div class="container-fluid">
            <form action = "../Controlador/Controlador.php" method="post">
                    <main>
                        <div class="container-fluid2">
                            <h1>Ventas</h1>
                            <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Ventas</li>
                            </ol>
                        </div>
                    </main>
                <div class="form row">
                    <div class="form col-md-4">
                        <div class="form">
                            <b><label class="form">Datos Cliente</label></b>

                        <?php    
                          $contenidoFactura = $cons->buscarFactura($codVenta);  
                          $rowContenidoFactura = mysqli_fetch_array($contenidoFactura);

                          $codigoCliente = $rowContenidoFactura['idClientes'];
                          $contenidoCliente = $cons->buscarClienteF($codigoCliente);
                          $rowContenidoCliente = mysqli_fetch_array($contenidoCliente);
                        ?>
                        <input type="hidden" value="<?php echo $rowContenidoCliente['correo']; ?> " name="email_cliente">
                        </div>
                        <div class="form" >
                            <label class="leter">Nombre:</label>
                            <input type="text" class="form-control, campos" id="Nombre" readonly value="<?php echo $rowContenidoCliente['pri_nom'];  ?> <?php echo $rowContenidoCliente['seg_nom']; ?> <?php echo $rowContenidoCliente['pri_ape']; ?> <?php echo $rowContenidoCliente['seg_ape']; ?>" name="nombre_Cliente">
                        </div>
                        
                        <div class="form">
                            <label class="leter">Cedula:</label>
                            <input type="text" class="form-control, campos" id="Cedula" readonly value="<?php echo $rowContenidoCliente['cedula']; ?>" name="cedula_Cliente">
                        </div>
                        
                        <div class="form">
                            <label class="leter">Telefono:</label>
                            <input type="text" class="form-control, campos" id="telefono" readonly value="<?php echo $rowContenidoCliente['Telefono']; ?>" name="telefono_cliente">
                        </div>
                        
                        <div class="form">
                            <label class="leter">Ciudad:</label>
                            <input type="text" class="form-control, campos" id="ciudad" readonly value="<?php echo $rowContenidoCliente['ciudad']; ?>" name="ciudad_cliente">
                        </div>
                        
                        <div class="form">
                            <label class="leter">Direccción:</label>
                            <input type="text" class="form-control, campos" id="direccion" readonly value="<?php echo $rowContenidoCliente['direccion']; ?>" name="direccion_cliente">
                        </div>
                    </div>       
                
                    <div class="form col-md-4">
                        <div class="form-group">
                            <b><label>Datos vendedor</label></b>
                            <div class="form">

                            <?php
                            $codigoVendedor = $rowContenidoFactura['idUsuarios'];
                            $contenidoVendedor = $cons->buscarUsuarioTodo($codigoVendedor);
                            $rowContenidoUsuario = mysqli_fetch_array($contenidoVendedor);
                            ?>


                                <label class="leter">Nombre:</label>
                                <input type="text" class="form-control, campos" id="vendedor" readonly value="<?php echo $rowContenidoUsuario['pri_nombre']; ?> <?php echo $rowContenidoUsuario['seg_nombre']; ?> <?php echo $rowContenidoUsuario['pri_apellido']; ?> <?php echo $rowContenidoUsuario['seg_apellido']; ?>" name="nombre_vendedor">
                            </div>
                            <div class="form">
                                <label class="leter">Codigo:</label>
                                <input type="text" class="form-control, campos" id="direccion" readonly value="<?php echo $rowContenidoUsuario['idUsuarios']; ?>" name="codigo_vendedor">
                                
                                <?php 
                                $codigo_empresa= $rowContenidoUsuario['idEmpresa'];
                                $contenidoEmpresa = $cons->buscarEmpresa($codigo_empresa);
                                $rowContenidoEmpresa = mysqli_fetch_array($contenidoEmpresa); 

                                ?>

                                <input type="hidden" value="<?php echo $codigo_empresa; ?>" name="codEmpresa">
                                <input type="hidden" value="<?php echo $rowContenidoEmpresa['NIT']; ?>" name="nit_empresa">
                                <input type="hidden" value="<?php echo $rowContenidoEmpresa['Nombre']; ?>" name="nombre_empresa">
                                <input type="hidden" value="<?php echo $rowContenidoEmpresa['pais']; ?>" name="pais_empresa">
                                <input type="hidden" value="<?php echo $rowContenidoEmpresa['Telefono']; ?>" name="telefono_empresa">
                                <input type="hidden" value="<?php echo $rowContenidoEmpresa['Direccion']; ?>" name="direccion_empresa">
                                <input type="hidden" value="<?php echo $rowContenidoEmpresa['Ciudad']; ?>" name="ciudad_empresa">
                                <input type="hidden" value="<?php echo $rowContenidoEmpresa['email']; ?>" name="email_empresa">

                            </div>
                        </div>
                    </div>
                    <div class="form col-md-4">
                        <div class="form-group">
                        <b><label>Datos Factura</label></b>
                        <div class="form">
                            <label class="leter">Codigo Factura:</label>
                            <input type="text" class="form-control, campos" id="codigofac" value="<?php echo $codVenta; ?>" readonly name="codFactura">
                        </div>

                        <div class="form">
                            <label class="leter">Fecha de venta:</label>
                            <input type="text" class="form-control, campos" id="codigofac" value="<?php echo $rowContenidoFactura['fecha']; ?>" readonly name="Fecha_Venta">
                        </div>

                        <div class="form">
                            <label class="leter">Fecha de Pago:</label>
                            <input type="text" class="form-control, campos" id="codigofac" value="<?php echo $rowContenidoFactura['fecha_pago']; ?>" readonly name="Fecha_Pago">
                        </div>

                        <div class="form">
                            <label class="leter">Metodo de Pago:</label>

                            <?php
                            $contenidoPagoFactura = $cons->buscarPagoVentas($codVenta);
                            $rowContenidoPagoFactura = mysqli_fetch_array($contenidoPagoFactura);

                            $codMetodo = $rowContenidoPagoFactura['idMetodo_de_pago'];
                            $contenidoMetodo = $cons->buscarMetodo($codMetodo);
                            $rowContenidoMetodo = mysqli_fetch_array($contenidoMetodo);
                            ?>


                            <input type="text" class="form-control, campos" id="metpago" readonly value="<?php echo $rowContenidoMetodo['nom']; ?>" name="metodo_pago">
                        </div>
                        <div class="form">
                            <label class="leter">Estado:</label>

                            <?php
                                $estado = $rowContenidoFactura['estado'];
                                
                                if($estado==0){
                                    $estadoF = 'Sin pagar';
                                }else{
                                    $estadoF = 'Pagado';
                                }
                            ?>

                            <input type="text" class="form-control, campos" id="estadofac" readonly value="<?php echo $estadoF; ?>" name="estado_venta">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="form col">
                    <hr class="separador">
                </div>
                
                <div class="form col">
                    
                        <table class="tbl_venta">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th class="textright">Precio</th>
                                    <th class="textright">Precio total</th>
                                </tr>
                            </thead>
                            <tbody id="detalle_venta">

                            <?php
                                $resultadoProdVendidos = $cons->verProductosVendidos($codVenta);
                                while($rowProductos = mysqli_fetch_array($resultadoProdVendidos)){
                            ?>


                                <tr>
                                    <td><?php echo $rowProductos['idProductos']; ?></td>
                                    <td> <img src="data:image/jpg;base64,<?php echo base64_encode($rowProductos['imagen']) ?>" alt="" width="85" height="85">  </td>
                                    <td class="textcenter"><?php echo $rowProductos['nombre']; ?></td>
                                    <td class="file"><?php echo $rowProductos['descripcion']; ?></td>
                                    <td class="textright"><?php echo $rowProductos['cantidad']; ?></td>
                                    <td class="textright"><?php echo $rowProductos['pre_venta']; ?></td>
                                    <td class="textright"><?php $total = $rowProductos['pre_venta'] * $rowProductos['cantidad']; $contadorV = $contadorV + $total; echo $total; ?></td>
                                </tr>
                            
                            <?php
                                }
                            ?>
                                
                            </tbody>
                        </table>
                        <table class="tbl_total">
                            <tbody id="detalle_venta">
                                <tr>
                                    <td colspan="5" class="textright">Subtotal $.</td>
                                    <td class="textright"><?php echo $contadorV; ?></td>
                                </tr>
                                <tr>
                                    <?php
                                        $contenidoIvaFactura = $cons->buscarImpuestoFactura($codVenta);
                                        
                                        if($contenidoIvaFactura==false){
                                            $porcentaje = '-';
                                            $valor = 'No aplica';
                                        }else{
                                            $codImpuesto = $contenidoIvaFactura;
                                            $contenidoImpuesto = $cons->buscarImpuesto($codImpuesto);
                                            $rowContenidoImpuesto = mysqli_fetch_array($contenidoImpuesto);
                                            $porcentaje = $rowContenidoImpuesto['porcentaje'];
                                            $calcularPorcentaje = $porcentaje/100;
                                            $valor = $contadorV * $calcularPorcentaje;
                                        }
                                    ?>

                                    <td colspan="5" class="textright">IVA (<?php echo $porcentaje; ?>%)</td>
                                    <td class="textright"><?php echo $valor; ?></td>

                                     <input type="hidden" value="<?php echo $porcentaje; ?>" name="porcentaje_Iva">
                                     <input type="hidden" value="<?php echo $valor; ?>" name="valor_Iva">   

                                </tr>
                                <tr>

                                     <?php
                                        $contenidoDescuentoFactura = $cons->buscarDescuentoFactura($codVenta);
                                        
                                        if($contenidoDescuentoFactura==false){
                                            $porcentaje = '-';
                                            $valorD = 'No aplica';
                                        }else{
                                            $codDescuento = $contenidoDescuentoFactura;
                                            $contenidoDescuento = $cons->buscarDescuento($codDescuento);
                                            $rowContenidoDescuento = mysqli_fetch_array($contenidoDescuento);
                                            $porcentaje = $rowContenidoDescuento['valor'];
                                            $calcularPorcentajeD = $porcentaje/100;
                                            $valorD = $contadorV * $calcularPorcentajeD;
                                        }

                                     ?>


                                    <td colspan="5" class="textright">Descuento (<?php echo $porcentaje; ?>%).</td>
                                    <td class="textright"><?php echo $valorD; ?></td>

                                    <input type="hidden" value="<?php echo $porcentaje; ?>" name="porcentaje_D">
                                    <input type="hidden" value="<?php echo $valorD; ?>" name="valor_D">
                                </tr>
                                <tr>

                                        <?php    

                                                $TotalFinal = 0;
                                            if($contenidoIvaFactura==false && $contenidoDescuentoFactura==false){
                                                $TotalFinal = $contadorV;
                                            }else if($contenidoIvaFactura!=false && $contenidoDescuentoFactura==false){
                                                $TotalFinal = $contadorV + $valor;
                                            }else if($contenidoIvaFactura==false && $contenidoDescuentoFactura!=false){
                                                $TotalFinal = $contadorV - $valorD;
                                            }else if($contenidoIvaFactura!=false && $contenidoDescuentoFactura!=false){
                                                $TotalFinal = $contadorV + $valor - $valorD;
                                            }


                                        ?>

                                    <td colspan="5" class="textright">Total $.</td>
                                    <td class="textright"><?php echo $TotalFinal; ?></td>
                                    <input type="hidden" value="<?php echo $TotalFinal; ?>" name="total_calculado">
                                </tr>
                            </tbody>
                        </table>
                </div>
                <input type="hidden" name="action" value="GenerarPDFFactura">
                <button type="submit" class="btn btn-dark float-right">Descargar</button>
                </form>

                <form action="../Controlador/Controlador.php" method="post">
                <input type="hidden" value="SalirConsultarProducto" name="action">
                <button type="submit" class="btn btn-info float-right">Regresar</button>
                </form>
            </div>
        
        <script src="js/main.js"></script>
    </div>
    </body>
</html>