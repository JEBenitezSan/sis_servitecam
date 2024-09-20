<?php
 class Conexion{
     public static function Conectar(){
        // define('servidor','localhost');
        // define('nombre_bd','bd_servitecam');
        // define('usuario','root');
        // define('password','');  
        define('servidor','localhost');
        define('nombre_bd','u118258995_bd_servitecam');
        define('usuario','u118258995_user_serviteca');
        define('password','qAz64C9r:M');      
         $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
         
         try{
            $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password, $opciones);             
            return $conexion; 
         }catch (Exception $e){
             die("El error de Conexión es :".$e->getMessage());
         }         
     }
     
 }
?>