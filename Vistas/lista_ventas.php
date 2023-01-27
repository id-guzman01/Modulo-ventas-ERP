<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/lista de ventas.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <header>
       <h1>Lista de Ventas</h1>
       <form action="../Controlador/Controlador.php" method="post">
       <input type="hidden" name="action" value="crearVentaV">
             <button id="btn-abrir-popup" class="btn-abrir-popup"><i class='bx bx-plus' ></i></button>
        </form>
  </header>

  <main>
    <?php
    include '../Modelo/Consultas.php';
    $cons = new ConsultasBD();

    ?>


   <div class="contenedor">
   <div>
   </div>
    <div class="col-sm-9">
          <table class="table-container">
             
                <thead>
                    <tr> 
                        <th>Codigo Venta</th>
                        <th>Cliente</th>  
                        <th>Emisión</th>
                        <th>Vencimiento</th>
                         <th>Total</th>
                         <th>Forma de Pago</th>
                        <th>Estado</th>
                        <th colspan="2">Acción</th> 
                    </tr>
                </thead>
           <tbody>
               
           <?php
            $resultadoventas = $cons->verFcturas();
            
            while($row = mysqli_fetch_array($resultadoventas)){
            ?>


                <tr>
                    <td><?php echo $row['idFacturas']; ?></td>
                    <?php
                        $idClientes = $row['idClientes'];
                        $rest = $cons->buscarClienteF($idClientes);
                        $rowis = mysqli_fetch_array($rest);
                    ?>
                    <td><?php echo $rowis['pri_nom']; ?> <?php echo $rowis['seg_nom']; ?> <?php echo $rowis['pri_ape']; ?> <?php echo $rowis['seg_ape']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                    <td><?php echo $row['fecha_pago']; ?></td>
                    <td><?php echo $row['valor']; ?></td>
                    <?php
                    $idfactura= $row['idFacturas'];
                    $resultadoMetodos = $cons->buscarPagoVentas($idfactura);
                    $rowsm = '';
                    $rowsm = mysqli_fetch_array($resultadoMetodos);

                    $idMetodo = $rowsm['idMetodo_de_pago'];
                    $resultadobpv = $cons->buscarMetodo($idMetodo);
                    $rowfinal = mysqli_fetch_array($resultadobpv);

                    ?>
                    <td><?php echo $rowfinal['nom']; ?></td>

                    <?php
                       $estado = $row['estado'];
                       if($estado==1){
                        $estadoF = 'Pagado';
                        $estadoS = 'Sin pagar';
                       }else{
                        $estadoF = 'Sin pagar';
                        $estadoS = 'Pagado'; 
                       }
                    ?>
                    <form action="../Controlador/Controlador.php" method="post">
                    <td><select name="estado" class="estado">
                          <option class="pagado"><?php echo $estadoF; ?></option>
                          <option class="sin_pagar"><?php echo $estadoS; ?></option>
                      </select>
                      <td>
                        
                        <input type="hidden" value="actualizarEstadoVenta" name="action">  
                        <input type="hidden" value="<?php echo $row['idFacturas']; ?>" name="idFactura">
                        <button type="submit" class="btn_estado"href="#"><i><img src="img/state.png"></i></button>
                        </form>   
                    </td>
                    </td> 
                       <td>
                        <form action="consultar_venta.php" method="post">
                        <input type="hidden" value="ConsultarFacturas" name="action">
                        <input type="hidden" value="<?php echo $row['idFacturas']; ?>" name="idFactura">
                        <button type="submit" class="btn_visualizar"href="#"><i><img src="img/print.png"></i></button>
                        </form> 
                    </td>        
               </tr>
               <?php  } ?>          
           </tbody>
        </table>  
     </div>      
    </div>
    <div>  
  </div>
  </main>


    <!--- Aquí inicia el popup -->


  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    <div class="overlay" id="overlay">
      <div class="popup" id="popup">
        <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class='bx bx-x'></i></a>
          <div class="datos_ventas">
            <div class="datos_cliente">
              <div class="action_cliente">
                  <h4>Datos del cliente</h4>
              </div>
              <div>

              <form action="../Controlador/Controlador.php" method="post">
                  <button type="submit" id="agregarCliente" href=""><i class='bx bxs-user-plus'></i></button>
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
              </form>
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
                          <input type="submit" id="btn_guardar"value="Continuar">
                       </div>
                  </div>    
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
  <script src="js/e_ventas.js"></script>
</body>
</html>