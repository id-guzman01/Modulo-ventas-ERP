<?php

    class sesiones{

        public function __construct(){

            session_start();

        }

        public function setCurrentUser($usuario){
            $_SESSION['usuario']=$usuario;
        }

        public function setCurrentUserCodigo($codigo){
            $_SESSION['codigo']=$codigo;
        }

        public function sesionID(){
            $_SESSION['sesionid'] = session_id();
        }

        public function getCurrentUser(){
            return $_SESSION['usuario'];
        }

        public function closeSesion(){
            session_unset();
            session_destroy();
        }
    }



?>