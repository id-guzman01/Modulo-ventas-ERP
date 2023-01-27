<?php


    class ConsultasBD{

    function ingresar($user, $pwd){
    
        include('Conexion.php');

        $cons = new ConexionBD1();
        $con = $cons->conection();

        $consulta="SELECT usuario, clave FROM usuarios WHERE usuario = '$user' AND clave = '$pwd' ";
		$resultado=mysqli_query($con,$consulta);
        $estado;
        
        if(!empty($resultado) AND mysqli_num_rows($resultado) > 0){
            //echo '<script language="javascript">alert("Eres bienvenido cosita sabrosa"); window.location.href="index.php";</script>';
            
            $estado = true;
            }
        else{
            //echo '<script language="javascript">alert("No te wa dejar entrar pvto"); window.location.href="index.php";</script>';
            
            $estado =false;
        }
        return $estado;
    }

    function registrarCliente($pri_nom, $seg_nom,	$pri_ape, $seg_ape, $cedula, $pais, $ciudad, $direccion, $Telefono, $correo){

        include('Conexion.php');
        $cons = new ConexionBD1();
        $con = $cons->conection();

        $estado=true;
        $numal = mt_rand(0,999999);
        $consulta = "insert into clientes(idClientes, pri_nom, seg_nom,	pri_ape, seg_ape, cedula, pais, ciudad, direccion, Telefono, correo, estado) value ('$numal', '$pri_nom', '$seg_nom',	'$pri_ape', '$seg_ape', '$cedula', '$pais', '$ciudad', '$direccion', '$Telefono', '$correo', '$estado')";
        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }

        return $res;
    }


    function verClientes(){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
      $consulta = 'select * from clientes';
      $resultado = mysqli_query($con, $consulta);

        return $resultado;
    }

    function actualizarEstadoCliente($cedula, $estado){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

      $consulta = "UPDATE clientes SET estado='$estado' WHERE cedula='$cedula' ";
      
      $res;
        if(mysqli_query($con,$consulta)){
            $fin = true;
        }else{
            $fin = false;
        }

        return $fin;

    }

    function verificarEstadoCliente($cedula){

        include('Conexion.php');

        $cons = new ConexionBD1();
        $con = $cons->conection();

        $consulta = "select estado from clientes where cedula = '$cedula' ";
        $resultado = mysqli_query($con,$consulta);

        $row;
        $res;
        if($row = mysqli_fetch_array($resultado)){
            $res =  $row['estado'];
        }

            return $res;
    }

    function eliminarCliente($cedula){

        include('Conexion.php');

        $cons = new ConexionBD1();
        $con = $cons->conection();

        $consulta = "DELETE FROM clientes WHERE cedula = '$cedula' ";
        $resultado;

        if(mysqli_query($con,$consulta)){
            $resultado = true;
        }else{
            $resultado = false;
        }

        return $resultado;

    }

    function registrarUsuario($pri_nom, $seg_nom, $pri_ape, $seg_ape, $cedula, $tipo, $correo, $telefono, $usuario, $contra, $empresa){
        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();
        $numal = mt_rand(0,999999);
        $consulta = "INSERT INTO usuarios (idUsuarios, pri_nombre, seg_nombre, pri_apellido, seg_apellido, cedula, tipo, email, telefono, usuario, idEmpresa, clave) VALUE ('$numal', '$pri_nom', '$seg_nom', '$pri_ape', '$seg_ape', '$cedula', '$tipo', '$correo', '$telefono', '$usuario', '$empresa', '$contra') "; 

        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function verUsuarios(){
        include '../Modelo/Conexion.php';
      $conexion = new ConexionBD1();
      $con = $conexion->conection();
      $consulta = 'select * from usuarios';
      $resultado = mysqli_query($con, $consulta);

        return $resultado;
    }
    
    function verificarTipoUsuario($cedula){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "SELECT tipo FROM usuarios WHERE cedula='$cedula' ";
        $resultado = mysqli_query($con,$consulta);

        $row;
        $res;
        if($row = mysqli_fetch_array($resultado)){
            $res =  $row['tipo'];
        }

            return $res;
    }

    function actualizarTipoCliente($cedula, $tipo){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

        $consulta = "UPDATE usuarios SET tipo='$tipo' WHERE cedula='$cedula' ";
        $fin;
        if(mysqli_query($con,$consulta)){
            $fin = true;
        }else{
            $fin = false;
        }


        return $fin;
    }

    function eliminarUsuario($cedula){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "DELETE FROM usuarios WHERE cedula='$cedula' ";
        $fin;
        if(mysqli_query($con,$consulta)){
            $fin = true;
        }else{
            $fin = false;
        }
        return $fin;
    }

    function registrarProveedor($nombre, $telefono, $nit, $pais, $ciudad, $email, $direccion, $descripcion){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $numal = mt_rand(0,999999);
        $estado = 1;
        $consulta = "INSERT INTO proveedores (idProveedores, nombre, telefono, nit, pais, ciudad, email, direccion, estado, descripcion) values ('$numal', '$nombre', '$telefono', '$nit', '$pais', '$ciudad', '$email', '$direccion', '$estado', '$descripcion')";

        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $false;
        }

        return $res;
    }

    function verProveedores(){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "SELECT * FROM proveedores";
        $resultado = mysqli_query($con, $consulta);

        return $resultado;
    }

    function verificarEstadoProveedor($nit){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "SELECT estado FROM proveedores WHERE nit='$nit' ";
        $resultado = mysqli_query($con,$consulta);
        $row;
        $estadof;
        if($row = mysqli_fetch_array($resultado)){
            $estadof = $row['estado'];
        }

        return $estadof;
    }

    function actualizarEstadoProveedor($nit, $estado){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "UPDATE proveedores SET estado='$estado' WHERE nit='$nit' ";
        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function eliminarProveedor($nit){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "DELETE FROM proveedores WHERE nit='$nit' ";
        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function actualizarCliente($cedula,$prinom, $segnom, $priape, $segape, $pais, $ciudad, $direccion, $telefono, $correo ){

            include '../Modelo/Conexion.php';
            $conexion = new ConexionBD1();
            $con = $conexion->conection();

            $consulta = "UPDATE clientes SET pri_nom='$prinom', seg_nom='$segnom', pri_ape='$priape', seg_ape='$segape', pais='$pais', ciudad='$ciudad', direccion='$direccion', Telefono='$telefono', correo='$correo' WHERE cedula = '$cedula' ";
            $res;
            if(mysqli_query($con,$consulta)){
                $res = true;
            }else{
                $res = false;
            }
            return $res;
    }

    function actualizarUsuario($cedula, $prinom, $segnom, $priape, $segape, $email, $telefono){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "UPDATE usuarios SET pri_nombre='$prinom', seg_nombre='$segnom', pri_apellido='$priape', seg_apellido='$segape',  email='$email', telefono='$telefono' WHERE cedula='$cedula' ";

        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

   function actualizarDatosProveedores($nit, $nom_prov, $telefono, $pais, $ciudad, $correo, $direccion, $descripcion ){

    include '../Modelo/Conexion.php';
    $conexion = new ConexionBD1();
    $con = $conexion->conection();

    $consulta = "UPDATE proveedores SET nombre='$nom_prov',
    telefono='$telefono',
    pais='$pais',
    ciudad='$ciudad',
    email='$correo',
    direccion='$direccion',
    descripcion='$descripcion'
     WHERE nit='$nit' ";

    $res;
    if(mysqli_query($con,$consulta)){
        $res = true;
    }else{
        $res = false;
    }
    return $res;
   }

   function registrarProducto($cantidad, $nombre, $descripcion, $imagen, $pre_compra, $pre_venta, $nit){

        include '../Modelo/conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $numal = mt_rand(0,999999);
        $consulta = "INSERT INTO productos(idProductos, cantidad, nombre, descripcion, imagen, pre_compra, pre_venta, nit) VALUE ('$numal', '$cantidad', '$nombre', '$descripcion', '$imagen', '$pre_compra', '$pre_venta', '$nit')";
        
        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
   }

   function buscarNitProveedor($nombre){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

        $consulta = "select nit from proveedores where nombre='$nombre' ";
        $resultado = mysqli_query($con,$consulta);
        $row;
        $nitFinal;
        if($row = mysqli_fetch_array($resultado)){
            $nitFinal = $row['nit'];
        }
        
        return $nitFinal;
   }

   function verProductos(){

    include '../Modelo/Conexion.php';
    $conexion = new ConexionBD1();
    $con = $conexion->conection();

    $consulta = "select * from productos";
    $resultado = mysqli_query($con,$consulta);

    return $resultado;
   }

   function registrarMetodoDePago($nombre, $descripcion){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $numal = mt_rand(0,999999);
        $consulta = "INSERT INTO metodo_de_pago(idMetodo_de_pago, nom, descripcion) value ('$numal', '$nombre', '$descripcion')";

        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }

        return $res;
   }

   function registrarDescuento($nombre, $valor){

    include '../Modelo/Conexion.php';
    $conexion = new ConexionBD1();
    $con = $conexion->conection();

    $numal = mt_rand(0,999999);

    $consulta = "INSERT INTO descuento(idDescuento, nombre, valor) value ('$numal', '$nombre', '$valor')";

    $res;
    if(mysqli_query($con,$consulta)){
        $res = true;
    }else{
        $res = false;
    }
    return $res;

   }

   function registrarImpuesto($nombre, $porciento){
       include '../Modelo/Conexion.php';
       $conexion = new ConexionBD1();
       $con = $conexion->conection();

       $numal = mt_rand(0,999999);

       $consulta = "INSERT INTO impuesto(idImpuesto, nombre, porcentaje) value ('$numal', '$nombre', '$porciento')";

       $res;

       if(mysqli_query($con,$consulta)){
            $res = true;
       }else{
           $res = false;
       }
       return $res;
   }

   function buscarCliente($cedula){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "SELECT * FROM clientes WHERE cedula='$cedula'";
        $resultado = mysqli_query($con,$consulta);
        return $resultado;
   }

   function buscarUsuario($cedula){

    include '../Modelo/Conexion.php';
    $conexion = new ConexionBD1();
    $con = $conexion->conection();

    $consulta = "SELECT * FROM usuarios WHERE cedula='$cedula'";
    $resultado = mysqli_query($con,$consulta);
    return $resultado;
    }

    function buscarProveedor($nit){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();
    
        $consulta = "SELECT * FROM proveedores WHERE nit='$nit'";
        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function eliminarProducto($codigo){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();

        $con = $conexion->conection();
        $consulta = "DELETE FROM productos WHERE idProductos='$codigo'";
        $res;

        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = true;
        }
        return $res;
    }

    function verImpuestos(){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "SELECT * from impuesto";

        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function eliminarImpuesto($codigo){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "DELETE FROM impuesto WHERE idImpuesto='$codigo'";

        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function buscarImpuesto($codigo){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

        $consulta = "SELECT * FROM impuesto WHERE idImpuesto='$codigo' ";
        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function actualizarDatosDelImpuesto($codigo, $nombre, $porcentaje){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "UPDATE impuesto SET nombre='$nombre', porcentaje='$porcentaje' where idImpuesto='$codigo' ";
        $res;

        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function verMetodos(){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "SELECT * from metodo_de_pago";

        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function eliminarMetodo($codigo){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "DELETE FROM metodo_de_pago WHERE idMetodo_de_pago='$codigo'";

        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function buscarMetodo($codigo){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "SELECT * FROM metodo_de_pago WHERE idMEtodo_de_pago='$codigo' ";
        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function actualizarMetodo($codigo, $nombre, $descripcion){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "UPDATE metodo_de_pago SET nom='$nombre',descripcion='$descripcion' where idMetodo_de_pago='$codigo' ";
        $res;

        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function verDescuentos(){
        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "SELECT * from descuento";

        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function eliminarDescuento($codigo){
        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "DELETE FROM descuento WHERE idDescuento='$codigo'";

        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function buscarDescuento($codigo){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

        $consulta = "SELECT * FROM descuento WHERE idDescuento='$codigo' ";
        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function actualizarDescuento($codigo, $nombre, $porcentaje){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "UPDATE descuento SET nombre='$nombre',valor='$porcentaje' where idDescuento='$codigo' ";
        $res;

        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function buscarProducto($codigo){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

        $consulta = "SELECT * FROM productos WHERE idProductos='$codigo' ";
        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function listaProveedores(){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "SELECT * from proveedores";

        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function actualizarProductoSinImagen($codigo, $cantidad, $nombre, $descripcion, $precompra, $preventa, $nit){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "UPDATE productos SET 
        cantidad='$cantidad',
        nombre='$nombre',
        descripcion='$descripcion',
        pre_compra='$precompra',
        pre_venta='$preventa',
        nit='$nit'
         where idProductos='$codigo' ";
        $res;

        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function actualizarProductoConImagen($codigo, $cantidad, $nombre, $descripcion, $precompra, $preventa, $nit, $imagen){

        include '../Modelo/Conexion.php';
        $conexion = new ConexionBD1();
        $con = $conexion->conection();

        $consulta = "UPDATE productos SET 
        cantidad='$cantidad',
        nombre='$nombre',
        descripcion='$descripcion',
        imagen='$imagen',
        pre_compra='$precompra',
        pre_venta='$preventa',
        nit='$nit'
         where idProductos='$codigo' ";
        $res;

        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function buscarProveedorListaProductos($nit){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

        $consulta = "SELECT * FROM proveedores WHERE nit='$nit' ";
        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function buscarClienteF($codigo){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "SELECT * FROM clientes WHERE idClientes='$codigo'";
        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function buscarIDUsuario($us){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "SELECT * FROM usuarios WHERE usuario='$us'";
        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function buscarUsuarioTodo($codigo){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "SELECT * FROM usuarios WHERE idUsuarios='$codigo'";
        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function verMetodosDePago(){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "SELECT * from metodo_de_pago";

        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function verTodosLosImpuestos(){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "SELECT * from impuesto";

        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function verTodosLosDescuentos(){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "SELECT * from descuento";

        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function verTodoLosProductosVender(){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "SELECT * from productos";

        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }
    
    function registrarFactura($idFacturas, $fecha, $valor, $estado, $fecha_pago, $idClientes, $idUsuarios){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        if($estado=='Pagado'){
            $estadoF = 1;
        }else{
            $estadoF= 0;
        }
        $consulta = "INSERT INTO factura_ventas (idFacturas, fecha, valor, estado, fecha_pago, idClientes, idUsuarios) VALUE ('$idFacturas', '$fecha', '$valor', '$estadoF', '$fecha_pago', '$idClientes', '$idUsuarios') "; 
        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function registrarMetodoDePagoConFactura($codigoVenta, $codigoMetodo){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        
        $consulta = "INSERT INTO pagos_ventas (	idFactura_ventas, idMetodo_de_pago) VALUE ('$codigoVenta', '$codigoMetodo') "; 
        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function registrarProductosVendidos($codFactura, $codProducto, $cantidad){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "INSERT INTO movimiento_ventas (idProductos, idFactura_ventas, cantidad) VALUE ('$codProducto', '$codFactura', '$cantidad')";
        $res;

        if(mysqli_query($con,$consulta)){
            $res=true;
        }else{
            $res = false;
        }
        return $res;
    }

    function verProductosVendidos($codFactura){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "SELECT productos.idProductos,productos.nombre, productos.imagen, productos.descripcion, movimiento_ventas.cantidad, productos.pre_venta FROM productos, movimiento_ventas WHERE movimiento_ventas.idFactura_ventas = '$codFactura' and movimiento_ventas.idProductos = productos.idProductos";


        $resultado = mysqli_query($con,$consulta);
        return $resultado;
    }

    function actualizarStock($codigo, $cantidad){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "UPDATE productos SET cantidad='$cantidad' where idProductos='$codigo' ";
        $res;

        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function eliminarProductoVendido($idProductos, $idFactura){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "DELETE FROM movimiento_ventas WHERE movimiento_ventas.idProductos = '$idProductos' AND movimiento_ventas.idFactura_ventas = '$idFactura'";
        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function actualizarValorVenta($idFactura, $valor){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "UPDATE factura_ventas SET valor = '$valor' WHERE idFacturas='$idFactura' ";

        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function verFcturas(){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
      $consulta = 'select * from factura_ventas';
      $resultado = mysqli_query($con, $consulta);

        return $resultado;
    }

    function buscarPagoVentas($idFactura){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "select * from pagos_ventas where idFactura_ventas='$idFactura'";
        $resultado = mysqli_query($con, $consulta);

        return $resultado;
    }

    function verificarEstadoVenta($idFactura){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "SELECT estado FROM factura_ventas WHERE idFacturas='$idFactura' ";
        $resultado = mysqli_query($con,$consulta);
        $row;
        $estadof;
        if($row = mysqli_fetch_array($resultado)){
            $estadof = $row['estado'];
        }

        return $estadof;
    }

    function actualizarEstadoVenta($idFactura, $estado){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta = "UPDATE factura_ventas SET estado='$estado' WHERE idFacturas='$idFactura' ";
        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function registrarDescuentoConFactura($idFactura, $idDescuento){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta ="INSERT INTO descuento_factura(idFacturas, idDescuento) VALUE ('$idFactura', '$idDescuento')";
        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;
    }

    function registrarIvaConFactura($idFacturas, $idImpuesto){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        $consulta ="INSERT INTO impuesto_factura(idFacturas, idImpuesto) VALUE ('$idFacturas', '$idImpuesto')";
        $res;
        if(mysqli_query($con,$consulta)){
            $res = true;
        }else{
            $res = false;
        }
        return $res;

    }
    
    function eliminarPagosVentasF($idFactura){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

        $consulta = "DELETE FROM pagos_ventas WHERE idFactura_ventas = '$idFactura' ";
        $resultado;

        if(mysqli_query($con,$consulta)){
            $resultado = true;
        }else{
            $resultado = false;
        }

        return $resultado;

    }

    function eliminarMovimientoVentasF($idFactura){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

        $consulta = "DELETE FROM movimiento_ventas WHERE idFactura_ventas = '$idFactura' ";
        $resultado;

        if(mysqli_query($con,$consulta)){
            $resultado = true;
        }else{
            $resultado = false;
        }

        return $resultado;

    }

    function eliminarImpuestosFacturaF($idFactura){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

        $consulta = "DELETE FROM impuesto_factura WHERE idFacturas = '$idFactura' ";
        $resultado;

        if(mysqli_query($con,$consulta)){
            $resultado = true;
        }else{
            $resultado = false;
        }

        return $resultado;

    }

    function eliminarDescuentoFacturaF($idFactura){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

        $consulta = "DELETE FROM descuento_factura WHERE idFacturas = '$idFactura' ";
        $resultado;

        if(mysqli_query($con,$consulta)){
            $resultado = true;
        }else{
            $resultado = false;
        }

        return $resultado;

    }

    function eliminarFacturaVentasF($idFactura){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

        $consulta = "DELETE FROM factura_ventas WHERE idFacturas = '$idFactura' ";
        $resultado;

        if(mysqli_query($con,$consulta)){
            $resultado = true;
        }else{
            $resultado = false;
        }

        return $resultado;

    }

    function buscarFactura($codigo){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

        $consulta = "SELECT * FROM factura_ventas WHERE idFacturas='$codigo'";
        $resultado = mysqli_query($con,$consulta);
        return $resultado;
   }

   function buscarImpuestoFactura($codFactura){
        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);

        $consulta = "SELECT * FROM impuesto_factura WHERE idFacturas='$codFactura'";
        $resultado = mysqli_query($con,$consulta);
        $res;
        $aux;
        if($resultado){
                    ini_set( 'display_errors','Off' );
                    ini_set( 'error_reporting', E_ALL );
                    define( 'WP_DEBUG', false );
                    define( 'WP_DEBUG_DISPLAY', false );
                    $codigo = $_GET['codigo'];
            $aux = mysqli_fetch_array($resultado);
            $res = $aux['idImpuesto'];
        }else{
            $res = false;
        }
        return $res;
   }

   function buscarDescuentoFactura($codFactura){
    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";

    $con=new mysqli($servidor,$usuario,$contraseña,$db);

    $consulta = "SELECT * FROM descuento_factura WHERE idFacturas='$codFactura'";
    $resultado = mysqli_query($con,$consulta);
    $res;
    $aux;
    if($resultado){
                ini_set( 'display_errors','Off' );
                ini_set( 'error_reporting', E_ALL );
                define( 'WP_DEBUG', false );
                define( 'WP_DEBUG_DISPLAY', false );
                $codigo = $_GET['codigo'];
        $aux = mysqli_fetch_array($resultado);
        $res = $aux['idDescuento'];
    }else{
        $res = false;
    }
    return $res;
}

function VentasSinPagar(){
    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";

    $con=new mysqli($servidor,$usuario,$contraseña,$db);

    $consulta = "SELECT SUM(valor) as mtotal FROM factura_ventas WHERE estado= 0";
    $resultado = mysqli_query($con, $consulta);
    $res;
    if($row  = mysqli_fetch_array($resultado)){
        $res =  $row['mtotal'];
    }
    return $res;
}

function VentasPagadas(){
    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";

    $con=new mysqli($servidor,$usuario,$contraseña,$db);

    $consulta = "SELECT SUM(valor) as mtotal FROM factura_ventas WHERE estado= 1";
    $resultado = mysqli_query($con, $consulta);
    $res;
    if($row  = mysqli_fetch_array($resultado)){
        $res =  $row['mtotal'];
    }
    return $res;
}


function contrarClientesActivos(){

    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";

    $con=new mysqli($servidor,$usuario,$contraseña,$db);
    $consulta = "select * from clientes";
    $resultado = mysqli_query($con,$consulta);
    $contador = 0;

    while($row = mysqli_fetch_array($resultado)){
            if($row['estado']==1){
                $contador = $contador + 1;
            }
        
    }
    return $contador;
}

function contrarClientesInactivos(){

    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";

    $con=new mysqli($servidor,$usuario,$contraseña,$db);
    $consulta = "select * from clientes";
    $resultado = mysqli_query($con,$consulta);
    $contador = 0;

    while($row = mysqli_fetch_array($resultado)){
            if($row['estado']==0){
                $contador = $contador + 1;
            }
        
    }
    return $contador;
}


function totalMeses(){

    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";

    $con=new mysqli($servidor,$usuario,$contraseña,$db);
    $consulta = "SELECT SUM(valor) AS valor,
    MONTHNAME(fecha) AS mes FROM factura_ventas WHERE estado = 1
    GROUP BY Mes";
    $resultado = mysqli_query($con, $consulta);

    return $resultado;
}

function totalMesesSinPagar(){

    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";

    $con=new mysqli($servidor,$usuario,$contraseña,$db);
    $consulta = "SELECT SUM(valor) AS valor,
    MONTHNAME(fecha) AS mes FROM factura_ventas WHERE estado = 0
    GROUP BY Mes";
    $resultado = mysqli_query($con, $consulta);

    return $resultado;
}

function registrarEmpresa( $Nombre, $Direccion, $Ciudad, $Telefono, $NIT, $pais, $imagen, $email){


    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";
    
    $numal = mt_rand(0,999999);
    $con=new mysqli($servidor,$usuario,$contraseña,$db);
    $consulta = "INSERT INTO empresa(idEmpresa, Nombre, Direccion, Ciudad, Telefono, NIT, pais, imagen, email) VALUES ('$numal', '$Nombre', '$Direccion', '$Ciudad', '$Telefono', '$NIT', '$pais', '$imagen', '$email')";
    $res;
    if(mysqli_query($con, $consulta)){
        $res = true;
    }else{
        $res = false;
    }
    return $res;

}


function buscarEmpresa($codigo){

    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";
    

    $con=new mysqli($servidor,$usuario,$contraseña,$db);
    $consulta = "SELECT * FROM empresa WHERE idEmpresa='$codigo'";
    $resultado = mysqli_query($con,$consulta);

    return $resultado;
}





function actualizarEmpresaSinImagen($codigo, $Nombre, $Direccion, $Ciudad, $Telefono, $NIT, $pais, $email){

    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";
    
    $con=new mysqli($servidor,$usuario,$contraseña,$db);

    $consulta = "UPDATE empresa SET Nombre='$Nombre',
    Direccion='$Direccion',
    Ciudad='$Ciudad',
    Telefono='$Telefono',
    NIT='$NIT',
    pais='$pais',
    email='$email'
     where idEmpresa='$codigo' ";
    $res;

    if(mysqli_query($con,$consulta)){
        $res = true;
    }else{
        $res = false;
    }
    return $res;
}

function actualizarEmpresaConImagen($codigo, $Nombre, $Direccion, $Ciudad, $Telefono, $NIT, $pais, $imagen, $email){

    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";
    
    $con=new mysqli($servidor,$usuario,$contraseña,$db);
    $consulta = "UPDATE empresa SET
    Nombre='$Nombre',
    Direccion='$Direccion',
    Ciudad='$Ciudad',
    Telefono='$Telefono',
    NIT='$NIT',
    pais='$pais',
    imagen='$imagen',
    email='$email'
     where idEmpresa='$codigo' ";
    $res;

    if(mysqli_query($con,$consulta)){
        $res = true;
    }else{
        $res = false;
    }
    return $res;
}


function verEmpresas(){
    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";
    
    $con=new mysqli($servidor,$usuario,$contraseña,$db);
    $consulta = "SELECT * FROM empresa";
    $resultado = mysqli_query($con, $consulta);
    return $resultado;
}

function productosMasVendidos(){

    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";
    
    $con=new mysqli($servidor,$usuario,$contraseña,$db);
    $consulta = "SELECT idProductos, SUM(cantidad) AS Mas_vendido, idProductos AS codProducto
    FROM movimiento_ventas
    GROUP BY idProductos
    ORDER BY SUM(cantidad)";

    $resultado = mysqli_query($con, $consulta);
    return $resultado;
}

function actualizarUsuarioPropio($codigo, $prinom, $segnom, $priape, $segape, $email, $telefono){

    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";
    
    $con=new mysqli($servidor,$usuario,$contraseña,$db);
    $consulta = "UPDATE usuarios SET pri_nombre='$prinom', seg_nombre='$segnom', pri_apellido='$priape', seg_apellido='$segape', email='$email', telefono='$telefono' WHERE idUsuarios='$codigo' ";
    $res;
    if(mysqli_query($con, $consulta)){
        $res= true;

    }else{
        $res = false;
    }
    return $res;
}


function actualizarClave($codigo, $clave){

    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $db = "erpventas";
    
    $con=new mysqli($servidor,$usuario,$contraseña,$db);
    $consulta = "UPDATE usuarios SET clave='$clave' WHERE idUsuarios='$codigo' ";
    $res;
    if(mysqli_query($con, $consulta)){
        $res= true;

    }else{
        $res = false;
    }
    return $res;
}









}//ConsultasBD


    

?>