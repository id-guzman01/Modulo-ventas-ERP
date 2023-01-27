<?php
    
    class ConexionBD1{


    function conection(){

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $db = "erpventas";

        $con=new mysqli($servidor,$usuario,$contraseña,$db);
        if($con->connect_errno){
        echo "El sitio web está experimentado problemas";
        }

        return $con;
    }

}
    

?>