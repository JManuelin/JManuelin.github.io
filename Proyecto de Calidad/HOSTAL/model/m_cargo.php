<?php
	require_once('cnxn.php');

class m_cargo{ 

	function registrar($descripcion)
	{
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "insert into  tb_cargo values(null,'$descripcion',1);";
		$val = false;
        if (mysqli_query($cc, $sql)==true) {
        	$val=true;
        	
        }return $val;
        
        mysqli_close($cc);
	}
	function listar_cargos(){
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "select * from tb_cargo where estado=1";
		$val =mysqli_query($cc, $sql);
		return $val;
		mysqli_close($cc);
	}
		function updelcargo($operador,$desc,$id){
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "update tb_cargo set cargo='$desc' where id_cargo='$id'";
		if($operador==='eliminar'){
			$sql="update tb_cargo set estado='0' where id_cargo='$id'";
		}
		
		$val =mysqli_query($cc, $sql);
		mysqli_close($cc);
	}
}