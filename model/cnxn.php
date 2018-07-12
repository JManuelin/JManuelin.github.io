<?php 
/**
* 
*/
class cnxn 
{
	
   public function abrirConextion() {
        $host = "localhost";
        $user = "root";
        $database = "db_hostaldc";
        $password = "";
        $conexion=mysqli_connect($host, $user, $password, $database);
        return $conexion;        
       
    }
    /*public function abrirConextion() {
        $host = "mysql.hostinger.co";
        $user = "u320260301_hdc";
        $database = "u320260301_hdc";
        $password = "d0TNci4Svi";
        $conexion=mysqli_connect($host, $user, $password, $database);
        return $conexion;        
       
    }*/
}

?>