<?php
require_once('cnxn.php');
class m_permiso{
	public function generarNav($idrol,$categoria){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "select * from tb_permiso where id_rol=$idrol and estado_permiso='1' and categoria_permiso='$categoria' ";
		$query = mysqli_query($cc, $sql);
        return $query;
        mysqli_close($cc);
	}

	public function validar_paginas($idrol){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "select count(id_permiso)cont , categoria_permiso , id_rol, estado_permiso from tb_permiso where estado_permiso ='1' and id_Rol='$idrol' group by categoria_permiso,id_rol ";
		$query = mysqli_query($cc, $sql);
        return $query;
        mysqli_close($cc);
	}
	public function listar($var){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "select * from tb_permiso p , tb_rol r where r.id_rol=p.id_rol and estado_permiso='$var'";
		$query = mysqli_query($cc, $sql);
        return $query;
        mysqli_close($cc);
	}
	public function cambiar_estado($id){
		$cn= new cnxn();
		$cc= $cn->abrirConextion();
		$sql = "select estado_permiso from tb_permiso where id_permiso='$id'";
		$query = mysqli_query($cc, $sql);
		foreach ($query as $key ) {
			$rsq=$key['estado_permiso'];
		}
		$sql2 = "update tb_permiso set estado_permiso='1' where id_permiso='$id'";
		if($rsq==1){
        $sql2 = "update tb_permiso set estado_permiso='0' where id_permiso='$id'";
		}
        mysqli_query($cc, $sql2);        
        mysqli_close($cc);
	}
}