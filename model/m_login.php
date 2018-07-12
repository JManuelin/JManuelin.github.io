<?php  
require_once('../model/cnxn.php');
class m_login{
	
	public function v_login($ide,$clave){
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$idex=$cc->real_escape_string($ide);
		$sql = "SELECT * from v_login where usuario='$idex' and clave_usuario=sha1('$clave') ";
		$query = mysqli_query($cc, $sql);
        return $query;
        mysqli_close($cc);
	}
}
?>