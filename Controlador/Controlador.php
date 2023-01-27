<?php
        session_start();


        if(isset($_POST['action'])  && $_POST['action']=='ingresar'){
            $usuario = "";
            $contra = "";
            
            $usuario = $_POST['Usuario'];
            $contra = $_POST['Contraseña'];
            
            include '../Modelo/Consultas.php';

            $cons = new ConsultasBD();

            
            $estado = $cons->ingresar($usuario, $contra);
            if($estado==true){
                echo "<script> alert('Bienvenid@'); window.location= '../Vistas/Principal.php' </script>";

                echo "<script> window.location='../vistas/Principal.php'; </script>";
                
                $resultado = $cons->buscarIDUsuario($usuario);
                $row = mysqli_fetch_array($resultado);
                $codigo =  $row['idUsuarios'];
                $empresa = $row['idEmpresa'];
                $tipo = $row['tipo'];
                
                $_SESSION['usuario']=$usuario;
                $_SESSION['codigo']=$codigo;
                $_SESSION['empresa'] = $empresa;
                $_SESSION['tipo'] = $tipo;
                
            }else{
                echo "<script> alert('Usuario o contraseña erronea, por favor, intente nuevamente.'); window.location= '../Vistas/login.html' </script>";

                echo "<script> window.location='../vistas/login.html'; </script>";
            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='RegistrarCliente'){
        
            include '../Modelo/Consultas.php';
            $us = new ConsultasBD();

            $pri_nom = $_POST['prinom'];
            $seg_nom = $_POST['segnom'];
            $pri_ape = $_POST['priape'];
            $seg_ape = $_POST['segape'];
            $cedula = $_POST['cedula'];
            $pais = $_POST['pais'];
            $ciudad = $_POST['ciudad'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['email'];

            
            $resultado;
            $resultado = $us->registrarCliente($pri_nom, $seg_nom,	$pri_ape, $seg_ape, $cedula, $pais, $ciudad, $direccion, $telefono, $correo);

            if(resultado==true){
                echo "<script> alert('Cliente registrado con exito.'); window.location= '../Vistas/clientes.html' </script>";

            }else{
                echo "<script> alert('Alguno de los datos ingresados es erroneo, intente nuevamente'); window.location= '../Vistas/clientes.html' </script>";

            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='IngresarAgregarCliente'){
            echo "<script> window.location='../Vistas/clientes.html'; </script>";
        }

        if(isset($_POST['action'])  && $_POST['action']=='CambiarEstado'){
            $estado = $_POST['estado'];
            $cedula = $_POST['codBuscar'];

            include '../Modelo/Consultas.php';
            $us = new ConsultasBD();

            $verificarEstado = $us->verificarEstadoCliente($cedula);
            $estado1;


            if($verificarEstado==1){
                $estado1 = 'Activo';
              }else{
                $estado1 = 'Inactivo';
              }
              
              if($estado1 == $estado){
                echo "<script> alert('Debe seleccionar un estado diferente al que ya se encuentra registrado'); window.location= '../Vistas/lista_clientes.php' </script>";
              }else{
                $numEnviar;
                if($estado=='Activo'){
                    $numEnviar = 1;
                }else{
                    $numEnviar = 0;
                }

                $res = $us->actualizarEstadoCliente($cedula, $numEnviar);
                if($res==true){
                    echo "<script> alert('Estado del cliente actualizado con éxito'); window.location= '../Vistas/lista_clientes.php' </script>";

                }else{
                    echo "<script> alert('Error al actualizar el estado del cliente'); window.location= '../Vistas/lista_clientes.php' </script>";

                }

              }

            


        }

        if(isset($_POST['action'])  && $_POST['action']=='eliminarCliente'){
            $cedula = $_POST['codBuscar'];

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            $eje = $cons->eliminarCliente($cedula);
            if($eje==true){
                echo "<script> alert('Cliente eliminado con éxito'); window.location= '../Vistas/lista_clientes.php' </script>";

            }else{
                echo "<script> alert('Error al eliminar el cliente'); window.location= '../Vistas/lista_clientes.php' </script>";

            }


        }

        if(isset($_POST['action'])  && $_POST['action']=='SalirRegistroCliente'){
            echo "<script> window.location='../vistas/lista_clientes.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='SalirRegistroUsuario'){
            echo "<script> window.location='../vistas/lista_usuarios.php'; </script>";
        }

        if(isset($_POST['action'])  && $_POST['action']=='IngresarAgregarUsuario'){
            echo "<script> window.location='../vistas/usuarios.php'; </script>";
        }

        if(isset($_POST['action'])  && $_POST['action']=='RegistrarUsuarios'){

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

            $pri_nom = $_POST['prinom'];
            $seg_nom = $_POST['segnom'];
            $pri_ape = $_POST['priape'];
            $seg_ape = $_POST['segape'];
            $cedula = $_POST['cedula'];
            $tipo = $_POST['tipo'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $usuario = $_POST['usuario'];
            $contra = $_POST['contra'];
            $confusuario = $_POST['confusuario'];
            $confcontra = $_POST['confcontra'];

            $empresa = $_POST['empresa'];

            if($empresa=='Seleccione una empresa'){
                echo "<script> alert('Error, debe seleccionar una empresa a la cual pertenezca el usuario, intente nuevamente'); window.location= '../Vistas/usuarios.html' </script>";

            }else{    

            
            if( $usuario == $confusuario   ){

                if($contra == $confcontra){
                        
                    $eje = $cons->registrarUsuario($pri_nom, $seg_nom, $pri_ape, $seg_ape, $cedula, $tipo, $correo, $telefono, $usuario, $contra, $empresa);
                    if($eje==true){
                        echo "<script> alert('Usuario registrado con éxito'); window.location= '../Vistas/usuarios.php' </script>";
                    }else{
                        echo "<script> alert('Error al registrar el usuario, intente nuevamente'); window.location= '../Vistas/usuarios.html' </script>";

                    }

                }else{
                    echo "<script> alert('Las contraseñas ingresadas no coinciden, intente nuevamente'); window.location= '../Vistas/usuarios.html' </script>";

                }

            }else{
                echo "<script> alert('Los usuarios ingresados no coinciden, intente nuevamente'); window.location= '../Vistas/usuarios.html' </script>";

            }


            }


        }

        
        if(isset($_POST['action'])  && $_POST['action']=='CambiarTipoUsuario'){
            $cedula = $_POST['codBuscar'];
            $tipo = $_POST['tipo'];

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            
            $TipoX = $cons->verificarTipoUsuario($cedula);
            $TipoY='';
            if($TipoX == 1){
                $TipoY = 'Administrador';
            }else{
                $TipoY = 'Vendedor';
            }
            echo $tipo;
            if($tipo==$TipoY){
                echo "<script> alert('Seleccione un tipo de usuario diferente al ya registrado'); window.location= '../Vistas/lista_usuarios.php' </script>";
            }else{
                $numEnviar;
                if($tipo=='Administrador'){
                    $numEnviar=1;
                }else{
                    $numEnviar=0;
                }
                echo $numEnviar;
                $eje = $cons->actualizarTipoCliente($cedula,$numEnviar);
                if($eje==true){
                    echo "<script> alert('Tipo de cliente actualizado con éxito'); window.location= '../Vistas/lista_usuarios.php' </script>";
                }else{
                    echo "<script> alert('Error al actualizar el tipo de cliente, intente nuevamente'); window.location= '../Vistas/lista_usuarios.php' </script>";

                }


            }
            
        }

        if(isset($_POST['action'])  && $_POST['action']=='eliminarUsuario'){
            $cedula = $_POST['codBuscar'];
            
            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

            $eje = $cons->eliminarUsuario($cedula);
            if($eje==true){
                echo "<script> alert('Usuario eliminado con éxito'); window.location= '../Vistas/lista_usuarios.php' </script>";
            }else{
                echo "<script> alert('Error al eliminar el usuario'); window.location= '../Vistas/lista_usuarios.php' </script>";
            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='RegistrarProovedores'){
            
            $nombre = $_POST['nomprov'];
            $nit = $_POST['nit'];
            $descripcion = $_POST['descripcion'];
            $pais = $_POST['pais'];
            $ciudad = $_POST['ciudad'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            
            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

            $eje = $cons->registrarProveedor($nombre, $telefono, $nit, $pais, $ciudad, $correo, $direccion, $descripcion);

            if($eje==true){
                echo "<script> alert('Provedor registrado con éxito'); window.location= '../Vistas/proveedores.html' </script>";
            }else{
                echo "<script> alert('Error al registrar el proveedor, intentelo nuevamente'); window.location= '../Vistas/proveedores.html' </script>";

            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='salirRegistrarProveedor'){
            echo "<script> window.location='../vistas/lista_proveedores.php'; </script>";


        }

        if(isset($_POST['action'])  && $_POST['action']=='ingresarAgregarProveedor'){
            echo "<script> window.location='../Vistas/proveedores.html'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='CambiarTipoProveedor'){
            $nit = $_POST['codBuscar'];
            $estado = $_POST['estado'];

            include '../Modelo/Consultas.php';

            $cons = new ConsultasBD();
            $estadoAC = $cons->verificarEstadoProveedor($nit);
            $estadoP;
            if($estadoAC==1){
                $estadoP = 'Activo';
            }else{
                $estadoP = 'Inactivo';
            }

            if($estado==$estadoP){
                echo "<script> alert('Debe seleccionar un estado diferente al que ya se encuentra registrado'); window.location= '../Vistas/lista_proveedores.php' </script>";
            }else{
                $estadoaux;
                if($estado=='Activo'){
                    $estadoaux = 1;
                }else{
                    $estadoaux = 0;
                }
                $eje = $cons->actualizarEstadoProveedor($nit, $estadoaux);

                if($eje){
                    echo "<script> alert('Estado del proveedor actualizado con éxito'); window.location= '../Vistas/lista_proveedores.php' </script>";
                }else{
                    echo "<script> alert('Error al actualizar el estado del proveedor, intente nuevamente'); window.location= '../Vistas/lista_proveedores.php' </script>";

                }
            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='eliminarProveedor'){
            $nit = $_POST['codBuscar'];
            
            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            $eje = $cons->eliminarProveedor($nit);
            if($eje){
                echo "<script> alert('Proveedor eliminado con éxito'); window.location= '../Vistas/lista_proveedores.php' </script>";

            }else{
                echo "<script> alert('Error al eliminar el proveedor, intente nuevamente'); window.location= '../Vistas/lista_proveedores.php' </script>";

            }
        }

        if(isset($_POST['action'])  && $_POST['action']=='SalirEditarCliente'){
            
            echo "<script> window.location='../vistas/lista_clientes.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='editarCliente'){
            $cedula = $_POST['cedula'];
            $pri_nom = $_POST['prinom'];
            $seg_nom = $_POST['segnom'];
            $pri_ape = $_POST['priape'];
            $seg_ape = $_POST['segape'];
            $pais =$_POST['pais'];
            $ciudad = $_POST['ciudad'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];

            
                include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

            $eje = $cons->actualizarCliente($cedula, $pri_nom, $seg_nom, $pri_ape, $seg_ape, $pais, $ciudad, $direccion, $telefono, $correo);
            if($eje){
                echo "<script> alert('Los datos del cliente han sido actualizados con éxito'); window.location= '../Vistas/lista_clientes.php' </script>";
            }else{
                echo "<script> alert('Error al atualizar los datos del cliente, intente nuevamente'); window.location= '../Vistas/actualizar_cliente.php' </script>";

            }
            

            

        }

        if(isset($_POST['action'])  && $_POST['action']=='salirEditarUsuario'){
            echo "<script> window.location='../vistas/lista_usuarios.php'; </script>";

        }

        
        if(isset($_POST['action'])  && $_POST['action']=='ActualizarUsuario'){
            
            $cedula = $_POST['cedula'];
            $pri_nom = $_POST['prinom'];
            $seg_nom = $_POST['segnom'];
            $pri_ape = $_POST['priape'];
            $seg_ape = $_POST['segape'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

            $eje = $cons->actualizarUsuario($cedula, $pri_nom, $seg_nom, $pri_ape, $seg_ape, $correo, $telefono);
            if($eje){
                echo "<script> alert('Los datos del usuario han sido actualizados con éxito'); window.location= '../Vistas/lista_usuarios.php' </script>";

            }else{
                echo "<script> alert('Eror al actualizar los datos el usuario, intente nuevamente'); window.location= '../Vistas/actualzar_usuario.php' </script>";

            }



        }

        if(isset($_POST['action'])  && $_POST['action']=='salirEditarProveedor'){
            echo "<script> window.location='../vistas/lista_proveedores.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='actualizarProveedorf'){
            
            $nom_prov = $_POST['nomprov'];
            $nit = $_POST['nit'];
            $descripcion = $_POST['descripcion'];
            $pais = $_POST['pais'];
            $ciudad = $_POST['ciudad'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            if($pais=='Seleccione país'){

            }else{

            
            if($rest){
                echo "<script> alert('Debe seleccionar un país'); window.location= '../Vistas/actualizar_proveedor.php' </script>";

            }else{
                $rest = $cons->actualizarDatosProveedores($nit, $nom_prov, $telefono, $pais, $ciudad, $correo, $direccion, $descripcion);
                echo "<script> alert('Los datos del proveedor han sido actualizados con éxito'); window.location= '../Vistas/lista_proveedores.php' </script>";

            }

            }
            

        }

        if(isset($_POST['action'])  && $_POST['action']=='salirRegistrarProducto'){
            echo "<script> window.location='../vistas/lista_productos.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='registrarProductos'){
            
            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precioc = $_POST['precioc'];
            $preciov = $_POST['preciov'];
            $stock = $_POST['stock'];
            $nombreProveedor = $_POST['nitp'];
            $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

            if($nombreProveedor=='Seleccione un proveedor'){
                echo "<script> alert('Debe seleccionar un proveedor'); window.location= '../Vistas/lista_proveedores.php' </script>";

            }else{

            $nitFinal = $cons->buscarNitProveedor($nombreProveedor);
            $eje = $cons->registrarProducto($stock, $nombre, $descripcion, $imagen, $precioc, $preciov, $nitFinal);
            if($eje==true){
                echo "<script> alert('El producto se registro con éxito'); window.location= '../Vistas/productos.php' </script>";
            }else{
                echo "<script> alert('Error al registrar el producto, intente nuevamente'); window.location= '../Vistas/productos.php' </script>";

            }

        }

            

        }

        if(isset($_POST['action'])  && $_POST['action']=='ingresarAgregarProducto'){
            echo "<script> window.location='../vistas/productos.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='SalirRegistrarMetodoDePago'){
            echo "<script> window.location='../vistas/lista_metpago.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='registrarMetodoDePago'){

            $nombre = $_POST['nombre_metodo'];
            $descripcion = $_POST['descripcion'];

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            
            $eje = $cons->registrarMetodoDePago($nombre, $descripcion);
            if($eje){
                echo "<script> alert('Método de pago registrado con éxito'); window.location= '../Vistas/metodos_de_pago.html' </script>";

            }else{
                echo "<script> alert('Error al registrar el método de pago, intente nuevamente'); window.location= '../Vistas/metodos_de_pago.html' </script>";

            }
        }

        if(isset($_POST['action'])  && $_POST['action']=='salirRegistrarDescuentos'){
            echo "<script> window.location='../vistas/lista_descuentos.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='registrarDescuento'){

            include '../Modelo/Consultas.php';
            $nombre = $_POST['nombre'];
            $valor = $_POST['valor'];

            $cons = new ConsultasBD();
            $eje = $cons->registrarDescuento($nombre,$valor);
            if($eje){
                echo "<script> alert('El descuento ha sido registrado con éxito'); window.location= '../Vistas/descuentos.html' </script>";
            }else{
                echo "<script> alert('Error al registrar el descuento, intente nuevamente'); window.location= '../Vistas/descuentos.html' </script>";

            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='salirRegistrarImpuestos'){
            echo "<script> window.location='../vistas/lista_impuestos.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='registrarImpuesto'){
            include '../Modelo/Consultas.php';
            $nombre = $_POST['nombre'];
            $porciento = $_POST['porciento'];

            $cons = new ConsultasBD();
            $eje = $cons->registrarImpuesto($nombre, $porciento);
            if($eje){
                echo "<script> alert('Impuesto registrado con éxito'); window.location= '../Vistas/impuestos.html' </script>";
            }else{
                echo "<script> alert('Error al registrar el impuesto, intente nuevamente'); window.location= '../Vistas/impuestos.html' </script>";

            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='eliminarProducto'){
            $codigo = $_POST['codBuscar'];
            
            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            $eje = $cons->eliminarProducto($codigo);

            if($eje){
                echo "<script> alert('El producto ha sido eliminado con éxito'); window.location= '../Vistas/lista_productos.php' </script>";
            }else{
                echo "<script> alert('Error al eliminar el producto, intente nuevamente'); window.location= '../Vistas/lista_productos.php' </script>";
                
            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='ingresarAgregarImpuesto'){
            echo "<script> window.location='../vistas/impuestos.html'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='eliminarImpuesto'){
            $codigo = $_POST['codBuscar'];

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

            $eje = $cons->eliminarImpuesto($codigo);
            if($eje){
                echo "<script> alert('Impuesto eliminado con éxito'); window.location= '../Vistas/lista_impuestos.php' </script>";
            }else{
                echo "<script> alert('Error al eliminar el impuesto, intente nuevamente'); window.location= '../Vistas/lista_impuestos.php' </script>";
            }

        }
        
        if(isset($_POST['action'])  && $_POST['action']=='ingresarActualizarImpuesto'){
            echo "<script> window.location='../vistas/lista_impuestos.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='actualizarDatosImpuestos'){
            $nombre = $_POST['nombre'];
            $porcentaje = $_POST['porcentaje'];
            $codigo = $_POST['codigo'];

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

            $eje = $cons->actualizarDatosDelImpuesto($codigo, $nombre, $porcentaje);
            if($eje){
                echo "<script> alert('Los datos el impuesto han sido actualizados con éxito'); window.location= '../Vistas/lista_impuestos.php' </script>";
                
            }else{
                echo "<script> alert('Error al actualizar los datos del impuesto, intente nuevamente'); window.location= '../Vistas/actualizar_impuesto.php' </script>";

            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='ingresarAñadirMetodo'){
            echo "<script> window.location='../vistas/metodos_de_pago.html'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='EliminarMetodo'){
            $codigo = $_POST['codBuscar'];
            echo $codigo;

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            $eje = $cons->eliminarMetodo($codigo);
            if($eje){
                echo "<script> alert('Metodo de pago eliminado con éxito'); window.location= '../Vistas/lista_metpago.php' </script>";

            }else{
                echo "<script> alert('Error al eliminar el metodo de pago, intente nuevamente'); window.location= '../Vistas/lista_metpago.php' </script>";

            }
            
        }


        if(isset($_POST['action'])  && $_POST['action']=='salirEditarMetodo'){
            echo "<script> window.location='../vistas/lista_metpago.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='editarMetodo'){
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            $eje = $cons->actualizarMetodo($codigo, $nombre, $descripcion);
            if($eje){
                echo "<script> alert('Datos del metodo de pago actualizados con éxito'); window.location= '../Vistas/lista_metpago.php' </script>";
            }else{
                echo "<script> alert('Error al actualizar el metodo de pago, intente nuevamente'); window.location= '../Vistas/actualizar_metpago.php' </script>";

            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='eliminarDescuento'){
            $codigo = $_POST['codBuscar'];
            echo $codigo;

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            $eje = $cons->eliminarDescuento($codigo);

            if($eje){
                echo "<script> alert('El descuento ha sido eliminado con éxito'); window.location= '../Vistas/lista_descuentos.php' </script>";
            }else{
                echo "<script> alert('Error al liminar el descuento, intente nuevamente'); window.location= '../Vistas/lista_descuentos.php' </script>";

            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='ingresarAñadirDescuento'){
            echo "<script> window.location='../vistas/descuentos.html'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='salirActualizarDescuento'){
            echo "<script> window.location='../vistas/lista_descuentos.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='actualizarDatosDescuento'){
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $porcentaje = $_POST['porcentaje'];

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            $eje = $cons->actualizarDescuento($codigo, $nombre, $porcentaje);
            if($eje){
                echo "<script> alert('Datos del decuento actualizados con éxito'); window.location= '../Vistas/lista_descuentos.php' </script>";

            }else{
                echo "<script> alert('Error al actualizar los datos del descuento, intente nuevamente'); window.location= '../Vistas/lista_descuentos.php' </script>";

            }
        }

        if(isset($_POST['action'])  && $_POST['action']=='salirActualizarProducto'){
            echo "<script> window.location='../vistas/lista_productos.php'; </script>";

        }

        

        if(isset($_POST['action'])  && $_POST['action']=='editarProductos'){
           
            
            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre']; echo $nombre;
            $descripcion = $_POST['descripcion'];
            $precompra = $_POST['precompra'];
            $preventa = $_POST['preventa'];
            $cantidad = $_POST['cantidad'];
            $nombreProveedor = $_POST['proveedor'];
            $nit = $cons->buscarNitProveedor($nombreProveedor);
            
                $nombreIMG = $_FILES['imagen']['tmp_name'];
            if($nombreIMG==''){
                $eje = $cons->actualizarProductoSinImagen($codigo, $cantidad, $nombre, $descripcion, $precompra, $preventa, $nit);
                if($eje){
                    echo "<script> alert('Los datos del producto han sido actualizados con éxito'); window.location= '../Vistas/lista_productos.php' </script>";
                }else{
                    echo "<script> alert('Error al actualizar los datos del producto, intente nuevamente'); window.location= '../Vistas/lista_productos.php' </script>";

                }
            }else{
                $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                $ejes = $cons->actualizarProductoConImagen($codigo, $cantidad, $nombre, $descripcion, $precompra, $preventa, $nit, $imagen);
                if($ejes){
                    echo "<script> alert('Los datos del producto han sido actualizados con éxito'); window.location= '../Vistas/lista_productos.php' </script>";
                }else{
                    echo "<script> alert('Error al actualizar los datos del producto, intente nuevamente'); window.location= '../Vistas/lista_productos.php' </script>";

                }
            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='salirVisualizarCliente'){
            echo "<script> window.location='../vistas/lista_clientes.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='salirVisualizarProveedor'){
            echo "<script> window.location='../vistas/lista_proveedores.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='salirConsultarProducto'){
            echo "<script> window.location='../vistas/lista_productos.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='salirVisualizarUsuario'){
            echo "<script> window.location='../vistas/lista_usuarios.php'; </script>";

        }


        if(isset($_POST['action'])  && $_POST['action']=='crearVentaV'){
            $numal = mt_rand(0,999999); 
            header("Location: ../Vistas/agregar_ventas.php?codventa=".$numal);

        }

        if(isset($_POST['action'])  && $_POST['action']=='registrarFacturas'){

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

            $nom_cliente = $_POST['nombre_Cliente'];
            $codigoventa = $_POST['codigo_venta'];

            if($nom_cliente=='Seleccione un Cliente'){
            echo "<script> alert('Error, debe incluir productos, no puede quedar vacia de productos la factura, intente nuevamente'); window.location= '../Vistas/ventass.php?codigoventa=' + '".$codfactura."' + '&fecha=' + '".$fecha."' + '&iva=' + '".$iva."' + '&descuento=' + '".$descuento."' ; </script>";                    

            }else{
                $vendedor = $_POST['vendedor'];
                if($vendedor=='Seleccione un Vendedor'){
                    echo "<script> alert('Debe seleccionar un vendedor, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";              
                }else{
                    $metodo = $_POST['Metodo'];
                    if($metodo=='Seleccionar metodo de pago'){
                        echo "<script> alert('Debe seleccionar un metodo de pago, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                   
                    }else{
                        $estado = $_POST['estado'];
                        if($estado=='Seleccione un estado'){
                            echo "<script> alert('Debe seleccionar un estado de venta, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                      
                        }else{
                            $iva = $_POST['iva'];
                            if($iva=='Seleccione Iva'){
                                $descuento = $_POST['descuento'];
                                if($descuento=='Seleccione un descuento'){
                                    //Calcular el costo total sin iva y sin descuento
                                    $fechaventa = $_POST['fecha'];
                                    
                                    $fechapagar = $_POST['fecha_pago'];
                                    echo $fechapagar;
                                    $valor = 0;
                                    $eje = $cons->registrarFactura($codigoventa, $fechaventa, $valor, $estado, $fechapagar, $nom_cliente, $vendedor);
                                    if($eje){
                                        $ejes = $cons->registrarMetodoDePagoConFactura($codigoventa, $metodo);
                                        if($ejes){
                                            $noaplicaIVa = 'No aplica';
                                            header("Location: ../Vistas/ventass.php?codigoventa=".$codigoventa."&fecha=".$fechaventa."&iva=".$noaplicaIVa."&descuento=".$noaplicaIVa);
                                        }else{
                                            echo "<script> alert('Error al realizar la venta, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                        
                                        }
                                    }else{
                                        echo "<script> alert('Error al realizar la venta, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                      

                                    }

                                }else{
                                    //Calcular el costo total sin iva pero con descuento
                                    $fechaventa = $_POST['fecha'];
                                    
                                    $fechapagar = $_POST['fecha_pago'];
                                    echo $fechapagar;
                                    $valor = 0;
                                    $eje = $cons->registrarFactura($codigoventa, $fechaventa, $valor, $estado, $fechapagar, $nom_cliente, $vendedor);
                                    if($eje){
                                        $ejes = $cons->registrarMetodoDePagoConFactura($codigoventa, $metodo);
                                        if($ejes){
                                            $ejec = $cons->registrarDescuentoConFactura($codigoventa, $descuento);
                                            if($ejec){
                                                $noaplicaIVa = 'No aplica';
                                                header("Location: ../Vistas/ventass.php?codigoventa=".$codigoventa."&fecha=".$fechaventa."&iva=".$noaplicaIVa."&descuento=".$descuento);
                                            }else{
                                                echo "<script> alert('Error al realizar la venta, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                        

                                            }

                                        }else{
                                            echo "<script> alert('Error al realizar la venta, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                        
                                        }
                                    }else{
                                        echo "<script> alert('Error al realizar la venta, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                      

                                    }



                                }
                            }else{
                                $descuento = $_POST['descuento'];
                                if($descuento=='Seleccione un descuento'){
                                    //Calcular el costo total con iva y sin descuento
                                    $fechaventa = $_POST['fecha'];
                                    
                                    $fechapagar = $_POST['fecha_pago'];
                                    echo $fechapagar;
                                    $valor = 0;
                                    $eje = $cons->registrarFactura($codigoventa, $fechaventa, $valor, $estado, $fechapagar, $nom_cliente, $vendedor);
                                    if($eje){
                                        $ejes = $cons->registrarMetodoDePagoConFactura($codigoventa, $metodo);
                                        if($ejes){
                                            $ejec = $cons->registrarIvaConFactura($codigoventa, $iva);
                                            if($ejec){
                                                $noaplicaIVa = 'No aplica';
                                                header("Location: ../Vistas/ventass.php?codigoventa=".$codigoventa."&fecha=".$fechaventa."&iva=".$iva."&descuento=".$noaplicaIVa);
                                            }else{
                                                echo "<script> alert('Error al realizar la venta, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                        
                                            }
                                            
                                        }else{
                                            echo "<script> alert('Error al realizar la venta, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                        
                                        }
                                    }else{
                                        echo "<script> alert('Error al realizar la venta, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                      

                                    }


                                }else{
                                    //Calcular el costo total con iva y con descuento
                                    $fechaventa = $_POST['fecha'];
                                    
                                    $fechapagar = $_POST['fecha_pago'];
                                    echo $fechapagar;
                                    $valor = 0;
                                    $eje = $cons->registrarFactura($codigoventa, $fechaventa, $valor, $estado, $fechapagar, $nom_cliente, $vendedor);
                                    if($eje){
                                        $ejes = $cons->registrarMetodoDePagoConFactura($codigoventa, $metodo);
                                        if($ejes){
                                            $ejec = $cons->registrarDescuentoConFactura($codigoventa, $descuento);
                                            $ejecut = $cons->registrarIvaConFactura($codigoventa, $iva);
                                            if($ejec){
                                                if($ejecut){
                                                    header("Location: ../Vistas/ventass.php?codigoventa=".$codigoventa."&fecha=".$fechaventa."&iva=".$iva."&descuento=".$descuento);

                                                }else{
                                                    echo "<script> alert('Error al realizar la venta, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                        

                                                }
                                            }else{
                                                echo "<script> alert('Error al realizar la venta, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                        

                                            }

                                        }else{
                                            echo "<script> alert('Error al realizar la venta, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                        
                                        }
                                    }else{
                                        echo "<script> alert('Error al realizar la venta, intente nuevamente'); window.location= '../Vistas/agregar_ventas.php?codventa=' + '".$codigoventa."'; </script>";                      

                                    }


                                }
                            }



                        }

                    }
                }
                
            }


        }


        if(isset($_POST['action'])  && $_POST['action']=='AñadirProductoCompra'){

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

            $codfactura = $_POST['codFactura'];

            $cantidadC = $_POST['cantidadC'];

            $fecha = $_POST['fecha'];
            $iva = $_POST['iva'];
            $descuento = $_POST['descuento'];
            $cantidadActual = $_POST['cantidadActual'];
            if($cantidadC==0){
                echo "<script> alert('Error, debe ingresar una cantidad de producto a comprar, intente nuevamente'); window.location= '../Vistas/ventass.php?codigoventa=' + '".$codfactura."' + '&fecha=' + '".$fecha."' + '&iva=' + '".$iva."' + '&descuento=' + '".$descuento."' ; </script>";                    
                
            }else{
                
            $codproducto = $_POST['codBuscar'];

                if($cantidadActual > $cantidadC){
                $rescantidad = 0;    
                $restacantidad = $cantidadActual - $cantidadC;
                if($rescantidad < 0){
                    echo "<script> alert('Erorr, La cantidad de producto es insuficiente, intente nuevamente'); window.location= '../Vistas/ventass.php?codigoventa=' + '".$codfactura."' + '&fecha=' + '".$fecha."' + '&iva=' + '".$iva."' + '&descuento=' + '".$descuento."' ; </script>";                    

                }else{
                $eje = $cons->registrarProductosVendidos($codfactura, $codproducto, $cantidadC);
                $ejes = $cons->actualizarStock($codproducto, $restacantidad);   
                if($ejes==true && $eje==true){
                    echo "<script> alert('Producto añadido con éxito'); window.location= '../Vistas/ventass.php?codigoventa=' + '".$codfactura."' + '&fecha=' + '".$fecha."' + '&iva=' + '".$iva."' + '&descuento=' + '".$descuento."' ; </script>";                    

                }else{
                    echo "<script> alert('Error al añadir el producto, intente nuevamente'); window.location= '../Vistas/ventass.php?codigoventa=' + '".$codfactura."' + '&fecha=' + '".$fecha."' + '&iva=' + '".$iva."' + '&descuento=' + '".$descuento."' ; </script>";                    

                }

                }


                }else{
                    echo "<script> alert('Erorr, La cantidad de producto es insuficiente, intente nuevamente'); window.location= '../Vistas/ventass.php?codigoventa=' + '".$codfactura."' + '&fecha=' + '".$fecha."' + '&iva=' + '".$iva."' + '&descuento=' + '".$descuento."' ; </script>";                    

                }



        }
    
    
    }

    if(isset($_POST['action'])  && $_POST['action']=='eliminarProductoVendido'){

        include '../Modelo/Consultas.php';
        $cons = new ConsultasBD();

        $fecha = $_POST['fecha'];
        $iva = $_POST['iva'];
        $descuento = $_POST['descuento'];
        $codfactura = $_POST['codFactura'];

        $codProducto = $_POST['codBuscar'];
        $codFactura = $_POST['codFactura'];
        $cantidadEliminar = $_POST['cantidadEliminar'];

        $resultadoBuscarProductoEliminar = $cons->buscarProducto($codProducto);
        $rowProducto = mysqli_fetch_array($resultadoBuscarProductoEliminar);
        $cantidadActual = $rowProducto['cantidad'];
        $cantidadNueva = $cantidadActual + $cantidadEliminar;
        $eje = $cons->actualizarStock($codProducto, $cantidadNueva);
        if($eje){
            $ejes = $cons->eliminarProductoVendido($codProducto, $codFactura);
            if($ejes){
                echo "<script> alert('Producto eliminado con éxito'); window.location= '../Vistas/ventass.php?codigoventa=' + '".$codfactura."' + '&fecha=' + '".$fecha."' + '&iva=' + '".$iva."' + '&descuento=' + '".$descuento."' ; </script>";                    

            }else{
                echo "<script> alert('Error al eliminar el producto, intente nuevamente'); window.location= '../Vistas/ventass.php?codigoventa=' + '".$codfactura."' + '&fecha=' + '".$fecha."' + '&iva=' + '".$iva."' + '&descuento=' + '".$descuento."' ; </script>";                    

            }

        }else{
            echo "<script> alert('Error al eliminar el producto, intente nuevamente'); window.location= '../Vistas/ventass.php?codigoventa=' + '".$codfactura."' + '&fecha=' + '".$fecha."' + '&iva=' + '".$iva."' + '&descuento=' + '".$descuento."' ; </script>";                    

        }


    }

    if(isset($_POST['action'])  && $_POST['action']=='FinalizarFactura'){

        include '../Modelo/Consultas.php';
        $cons = new ConsultasBD();

        $fecha = $_POST['fecha'];
        $iva = $_POST['iva'];
        $descuento = $_POST['descuento'];
        $codfactura = $_POST['codFactura'];

        $total = $_POST['TotalAPagar'];
        if($total==0){
            echo "<script> alert('Error, debe incluir productos, no puede quedar vacia de productos la factura, intente nuevamente'); window.location= '../Vistas/ventass.php?codigoventa=' + '".$codfactura."' + '&fecha=' + '".$fecha."' + '&iva=' + '".$iva."' + '&descuento=' + '".$descuento."' ; </script>";                    
        }else{
            $eje = $cons->actualizarValorVenta($codfactura, $total);
            if($eje){
                echo "<script> alert('Venta registrada con éxito'); window.location= '../Vistas/lista_ventas.php'; </script>";                    

            }else{
                echo "<script> alert('Error al realizar la venta, intente nuevamente'); window.location= '../Vistas/ventass.php?codigoventa=' + '".$codfactura."' + '&fecha=' + '".$fecha."' + '&iva=' + '".$iva."' + '&descuento=' + '".$descuento."' ; </script>";                    

            }

        }


        }

        if(isset($_POST['action'])  && $_POST['action']=='actualizarEstadoVenta'){

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();
            $estado = $_POST['estado'];
            $codfactura = $_POST['idFactura'];
            $estadoActual = $cons->verificarEstadoVenta($codfactura);
            $EstadoN;

            if($estado=='Pagado'){
                $EstadoN = 1;
            }else{
                $EstadoN = 0;
            }

            if($EstadoN==$estadoActual){
                echo "<script> alert('Error, debe seleccionar un estado diferente al actual, intente nuevamente'); window.location= '../Vistas/lista_ventas.php'; </script>";                    
            }else{
                if($estado=='Pagado'){
                    $nuevoEstado = 1;
                }else{
                    $nuevoEstado = 0;
                }

                $eje = $cons->actualizarEstadoVenta($codfactura, $nuevoEstado);
                if($eje){
                    echo "<script> alert('Estado actualizado con éxito'); window.location= '../Vistas/lista_ventas.php'; </script>";                    

                }else{
                    echo "<script> alert('Error al actualizar el estado de la venta, intente nuevamente'); window.location= '../Vistas/lista_ventas.php'; </script>";                    

                }

            }



        }

        if(isset($_POST['action'])  && $_POST['action']=='CancelarVentaFactura'){

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

            $fecha = $_POST['fecha'];
            $iva = $_POST['iva'];
            $descuento = $_POST['descuento'];

            $codfactura = $_POST['codFactura'];
            $eje = $cons->eliminarPagosVentasF($codfactura);
            $ejes = $cons->eliminarMovimientoVentasF($codfactura);
            $ejec = $cons->eliminarImpuestosFacturaF($codfactura);
            $ejecut = $cons->eliminarDescuentoFacturaF($codfactura);

            $ejecutar = $cons->eliminarFacturaVentasF($codfactura);
            if($ejecutar){
                echo "<script> alert('Se cancelo la venta con exito'); window.location= '../Vistas/lista_ventas.php'; </script>";                    
            }else{
                echo "<script> alert('Error al cancelar la venta, intente nuevamente'); window.location= '../Vistas/ventass.php?codigoventa=' + '".$codfactura."' + '&fecha=' + '".$fecha."' + '&iva=' + '".$iva."' + '&descuento=' + '".$descuento."' ; </script>";                    

            }
            
        }


        if(isset($_POST['action'])  && $_POST['action']=='SalirConsultarProducto'){
            echo "<script> window.location='../vistas/lista_ventas.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='GenerarPDFFactura'){

            include '../Vistas/interfaz_PDF.php';
            include '../Modelo/Consultas.php';

            $cons = new ConsultasBD();

            $nom_cliente = $_POST['nombre_Cliente'];
            $cedula_cliente = $_POST['cedula_Cliente'];
            $telefono_cliente = $_POST['telefono_cliente'];

            $referencia = $_POST['codFactura'];
            $fecha_venta = $_POST['Fecha_Venta'];
            $fecha_pagar = $_POST['Fecha_Pago'];
            $metodo_pago = $_POST['metodo_pago'];
            $estado_venta = $_POST['estado_venta'];
            $email = $_POST['email_cliente'];

            $nombre_vendedor = $_POST['nombre_vendedor'];
            $codigo_vendedor = $_POST['codigo_vendedor'];

            $nit_empresa = $_POST['nit_empresa'];
            $nombre_empresa = $_POST['nombre_empresa'];
            $direccion_empresa = $_POST['direccion_empresa'];
            $pais_empresa = $_POST['pais_empresa'];
            $ciudad_empresa = $_POST['ciudad_empresa'];
            $telefono_empresa = $_POST['telefono_empresa'];
            $email_empresa = $_POST['email_empresa'];
            $codEmpresa = $_POST['codEmpresa'];

            $contenidoEmpresa = $cons->buscarEmpresa($codEmpresa);
            $rowE = mysqli_fetch_array($contenidoEmpresa);


            $pdf = new PDF();
            
            $pdf->AliasNbPages();
            $pdf->AddPage();

            $pdf->crearTituloVentas();

            $pdf->SetTextColor(10,10,10);        
            $pdf->SetFont('Arial','',11);  
                $pdf->Cell(73,7,utf8_decode('Nombre: '  . $nombre_empresa  ),1,0,'L',true);
                $pdf->Cell(35,7,utf8_decode(''),1,0,'C',true);
                $pdf->Cell(72,7,utf8_decode('Referencia: ' . $referencia),1,1,'L',true);

                $pdf->Cell(73,7,utf8_decode('Nit: ' . $nit_empresa),1,0,'L',true);
                $pdf->Cell(35,7,utf8_decode(''),1,0,'C',true);
                $pdf->Cell(72,7,utf8_decode('Fecha de venta: ' . $fecha_venta),1,1,'L',true);

                $pdf->Cell(73,7,utf8_decode('País: ' . $pais_empresa),1,0,'L',true);
                $pdf->Cell(35,7,utf8_decode(''),1,0,'C',true);
                $pdf->Cell(72,7,utf8_decode('Fecha de pago: ' . $fecha_pagar),1,1,'L',true);

                $pdf->Cell(73,7,utf8_decode('Ciudad: ' . $ciudad_empresa),1,0,'L',true);
                $pdf->Cell(35,7,utf8_decode(''),1,0,'C',true);
                $pdf->Cell(72,7,utf8_decode('Metodo de pago: ' . $metodo_pago),1,1,'L',true);

                $pdf->Cell(73,7,utf8_decode('Dirección: ' . $direccion_empresa),1,0,'L',true);
                $pdf->Cell(35,7,utf8_decode(''),1,0,'C',true);
                $pdf->Cell(72,7,utf8_decode('Estado de la cuenta: ' . $estado_venta),1,1,'L',true);

                $pdf->Cell(73,7,utf8_decode('Teléfono: ' . $telefono_empresa),1,0,'L',true);
                $pdf->Cell(35,7,utf8_decode(''),1,0,'C',true);
                $pdf->Cell(72,7,utf8_decode(''),1,1,'L',true);

                $pdf->Cell(73,7,utf8_decode('Email: ' . $email_empresa),1,0,'L',true);
                $pdf->Cell(35,7,utf8_decode(''),1,0,'C',true);
                $pdf->Cell(72,7,utf8_decode(''),1,1,'L',true);


                     
            $pdf->Ln(6);

            $pdf->crearTitulosPrimarios();
            
                $pdf->SetFont('Arial','',11);  
                $pdf->Cell(73,7,utf8_decode('Cédula: ' . $cedula_cliente),1,0,'L',true);
                $pdf->Cell(35,7,utf8_decode(''),1,0,'C',true);
                $pdf->Cell(72,7,utf8_decode('Código: ' . $codigo_vendedor),1,1,'L',true);

                $pdf->Cell(73,7,utf8_decode('Nombre: ' . $nom_cliente),1,0,'L',true);
                $pdf->Cell(35,7,utf8_decode(''),1,0,'C',true);
                $pdf->Cell(72,7,utf8_decode('Nombre: ' . $nombre_vendedor),1,1,'L',true);

                $pdf->Cell(73,7,utf8_decode('Email: ' . $email),1,1,'L',true);
                $pdf->Cell(73,7,utf8_decode('Telefono: ' . $telefono_cliente),1,1,'L',true);



            $resultadoVentasHechas = $cons->verProductosVendidos($referencia);
            $pdf->Ln(6);
            $pdf->DarleColorFondo();
            
            $pdf->SetTextColor(10,10,10);
            $pdf->SetFont('Arial','',12);
            $total;
            $totalF=0;
            while($rowProductosVendidos = mysqli_fetch_array($resultadoVentasHechas)){
                $pdf->SetFont('Arial','',11); 
                $pdf->cell(20, 7, $rowProductosVendidos['idProductos'], 1, 0, 'C', 0);
                $pdf->cell(80, 7, $rowProductosVendidos['nombre'], 1, 0, 'C', 0);
                $pdf->cell(20, 7, $rowProductosVendidos['cantidad'], 1, 0, 'C', 0);
                $pdf->cell(30, 7, '$'.$rowProductosVendidos['pre_venta'], 1, 0, 'C', 0);
                $total = $rowProductosVendidos['cantidad'] * $rowProductosVendidos['pre_venta'];
                $pdf->cell(30, 7, '$'.$total, 1, 1, 'C', 0);
                
                $totalF = $totalF + $total;
            }

            $pdf->Ln(5);

            $pdf->Inicio();
            $pdf->Cell(100,9,utf8_decode(''),1,0,'C',true);

            $pdf->Final();
            $pdf->SetFont('Arial','',12); 
            $pdf->Cell(50,9,utf8_decode('Subtotal:'),1,0,'L',true);

            $pdf->Final();
            $pdf->SetFont('Arial','',11); 
            $pdf->Cell(30,9,utf8_decode($totalF),1,1,'L',true);



            $valor_iva = $_POST['valor_Iva'];
            $porcentaje_Iva = $_POST['porcentaje_Iva'];

            $pdf->Inicio();
            $pdf->Cell(100,9,utf8_decode(''),1,0,'C',true);

            $pdf->Final();
            $pdf->SetFont('Arial','',12); 
            $pdf->Cell(50,9,utf8_decode('Impuesto (' . $porcentaje_Iva . '%):'),1,0,'L',true);

            $pdf->Final();
            $pdf->SetFont('Arial','',11); 
            $pdf->Cell(30,9,utf8_decode($valor_iva),1,1,'L',true);




            $valor_D = $_POST['valor_D'];
            $porcentaje_D = $_POST['porcentaje_D'];

            $pdf->Inicio();
            $pdf->Cell(100,9,utf8_decode(''),1,0,'C',true);

            $pdf->Final();
            $pdf->SetFont('Arial','',12); 
            $pdf->Cell(50,9,utf8_decode('Descuento (' . $porcentaje_D . '%):'),1,0,'L',true);

            $pdf->Final();
            $pdf->SetFont('Arial','',11); 
            $pdf->Cell(30,9,utf8_decode($valor_D),1,1,'L',true);

        

            $totalCalculado = $_POST['total_calculado'];

            $pdf->Inicio();
            $pdf->Cell(100,9,utf8_decode(''),1,0,'C',true);

            $pdf->Final();
            $pdf->SetFont('Arial','',12); 
            $pdf->Cell(50,9,utf8_decode('Total a pagar'),1,0,'L',true);

            $pdf->Final();
            $pdf->SetFont('Arial','',11); 
            $pdf->Cell(30,9,utf8_decode($totalCalculado),1,1,'L',true);

            
            $pdf->Ln(10);
            $pdf->SetTextColor(10,10,10);
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(180,5,utf8_decode('Si tiene alguna duda en cuanto a esta factura, pongase en contacto con'),1,1,'C',true);

            $pdf->SetFont('Arial','B',11);
            $pdf->Cell(180,5,utf8_decode($email_empresa . ' , ' . $telefono_cliente),1,1,'C',true);
    

            $pdf->Output('I','factura.pdf');
        }

        if(isset($_POST['action'])  && $_POST['action']=='registrarEmpresaNueva'){

            include '../Modelo/Consultas.php';

            $cons = new ConsultasBD();
            
            $nom_empresa = $_POST['nombre'];
            $nit =  $_POST['nit'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $pais = $_POST['pais'];
            $ciudad = $_POST['ciudad'];
            $direccion = $_POST['direccion'];
            $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

            if($pais=='Seleccione un País'){
                echo "<script> alert('Error, debe seleccionar una pís, intente nuevamente'); window.location= '../Vistas/empresa.html' ; </script>";                    

            }else{


            $eje = $cons->registrarEmpresa($nom_empresa, $direccion, $ciudad, $telefono, $nit, $pais, $imagen, $email);
            if($eje){
                echo "<script> alert('Empresa registrada con éxito'); window.location= '../Vistas/empresa.html' ; </script>";                    

            }else{
                echo "<script> alert('Error al realizar el registro de la empresa, intente nuevamente'); window.location= '../Vistas/empresa.html' ; </script>";  
            }

        }


        }


        if(isset($_POST['action'])  && $_POST['action']=='ingresarRegistrarEmpresa'){
            echo "<script> window.location='../vistas/empresa.html'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='salirRegistrarEmpresa'){
            echo "<script> window.location='../vistas/lista_empresa.php'; </script>";

        }

        
        if(isset($_POST['action'])  && $_POST['action']=='salirActualizarEmpresa'){
            echo "<script> window.location='../vistas/lista_empresa.php'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='salirConsultarEmpresa'){
            echo "<script> window.location='../vistas/lista_empresa.php'; </script>";

        }
        
        
        if(isset($_POST['action'])  && $_POST['action']=='actualizarEmpresa'){

            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

            $nombreIMG = $_FILES['imagen']['tmp_name'];
            $nom_empresa = $_POST['nombre'];
            $nit = $_POST['nit'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $pais = $_POST['pais'];
            $ciudad = $_POST['ciudad'];
            $direccion = $_POST['direccion'];

            $idEmpresa = $_POST['idEmpresa'];

            if($nombreIMG==''){
                $eje = $cons->actualizarEmpresaSinImagen($idEmpresa, $nom_empresa, $direccion, $ciudad, $telefono, $nit, $pais, $email);
                if($eje){
                    echo "<script> alert('Empresa actualizada con éxito'); window.location= '../Vistas/lista_empresa.php' ; </script>";  

                }else{
                    echo "<script> alert('Error al actualizar la empresa, intente nuevamente'); window.location= '../Vistas/actualizar_empresa.php?codBuscar=' + '".$idEmpresa."'; </script>";  

                }
            }else{
                $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
                $ejes = $cons->actualizarEmpresaConImagen($idEmpresa, $nom_empresa, $direccion, $ciudad, $telefono, $nit, $pais, $imagen, $email);
                if($ejes){
                    echo "<script> alert('Empresa actualizada con éxito'); window.location= '../Vistas/lista_empresa.php' ; </script>";  

                }else{
                    echo "<script> alert('Error al actualizar la empresa, intente nuevamente'); window.location= '../Vistas/actualizar_empresa.php' ; </script>";  

                }
            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='ingresarAgregarEmpresa'){
            echo "<script> window.location='../vistas/empresa.html'; </script>";

        }

        if(isset($_POST['action'])  && $_POST['action']=='salirEditarUsuarioPropio'){
            echo "<script> window.location='../vistas/Principal.php'; </script>";

        }


        if(isset($_POST['action'])  && $_POST['action']=='actualizarUsuarioPropio'){
            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

            $codigo = $_POST['codigo'];
            $pri_nombre = $_POST['pri_nombre'];
            $seg_nombre = $_POST['seg_nombre'];
            $pri_apellido = $_POST['pri_apellido'];
            $seg_apellido = $_POST['seg_apellido'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];

            $eje = $cons->actualizarUsuarioPropio($codigo, $pri_nombre, $seg_nombre, $pri_apellido, $seg_apellido, $email, $telefono);
            if($eje){
                

                echo "<script> alert('usuario actualizado con éxito'); window.location= '../Vistas/actualizar_usuario_log.php'; </script>";

            }else{
                echo "<script> alert('Error al actualizar el usuario, intente nuevamente'); window.location= '../Vistas/actualizar_usuario_log.php' ; </script>";  

            }

        }

        if(isset($_POST['action'])  && $_POST['action']=='IngresarLogin'){
            header("Location: ../Vistas/login.html");

        }

        
        if(isset($_POST['action'])  && $_POST['action']=='CambiarContraseñaUsuario'){
            include '../Modelo/Consultas.php';
            $cons = new ConsultasBD();

            $contraActual = $_POST['cactual'];
            $contraNueva = $_POST['cnueva'];
            $confirmarContra = $_POST['cconfir'];
            $codigo = $_POST['codigo'];

            $contenidoUsuario = $cons->buscarUsuarioTodo($codigo);
            $row = mysqli_fetch_array($contenidoUsuario);

            if($row['clave']==$contraActual){
                if($row['clave']==$contraNueva){
                    echo "<script> alert('La contraseña nueva no puede ser igual a la anterior, intent enuevamente'); window.location= '../Vistas/cambiar_contraseña.php' ; </script>";  

                }else{
                    if($contraNueva==$confirmarContra){
                        $eje = $cons->actualizarClave($codigo, $contraNueva);
                        if($eje){
                            echo "<script> alert('Contraseña actualizada con exito, por favor, inicie sesión nuevamente para terminar la actualización'); window.location= '../Vistas/login.html' ; </script>";  

                        }else{
                            echo "<script> alert('Error al actualizar la contraseña, intente nuevamente'); window.location= '../Vistas/cambiar_contraseña.php' ; </script>";  

                        }
                    }else{
                        echo "<script> alert('Las contraseñas ingresadas no son iguales, intente nuevamente'); window.location= '../Vistas/cambiar_contraseña.php' ; </script>";  

                    }
                }
            }else{
                echo "<script> alert('La contraseña que ingreso actual es erronea, intente nuevamente'); window.location= '../Vistas/cambiar_contraseña.php' ; </script>";  

            }

        }

            
        if(isset($_POST['action'])  && $_POST['action']=='cerrarSesion'){
            session_unset();
            session_destroy();
            echo "<script> alert('Gracias por utilizar nuestra aplicación, esperamos volverte a ver, ¡Adiós!.'); window.location= '../Vistas/index.html' ; </script>";  

        }










    ?>
    

