<?php
	require_once('cnxn.php');

class m_tipo_documento{ 
	
	function registrar($descripcion,$min , $max)
	{
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "insert into  tb_tipo_documento values(null,'$descripcion',1,$max,$min);";
		$val = false;
        if (mysqli_query($cc, $sql)==true) {
        	$val=true;
        	
        }
        mysqli_close($cc);
        	return $val;
        
        
	}
	function listar(){
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "select * from tb_tipo_documento where estado_documento=1";
		$val = mysqli_query($cc, $sql);
		return $val;
		mysqli_close($cc);
	}
	function eliminar($id){
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "update tb_tipo_documento set estado_documento=0 where Id_tipodocumento='$id'";
		$val = mysqli_query($cc, $sql);
		mysqli_close($cc);
		
	}
	function listar_id($id_){
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "select * from tb_tipo_documento where estado_documento=1 and Id_tipodocumento='$id_'";
		$val = mysqli_query($cc, $sql);
		return $val;
		mysqli_close($cc);
	}
}