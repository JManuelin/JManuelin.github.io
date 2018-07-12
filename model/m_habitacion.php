<?php
require_once('cnxn.php');

class m_habitacion{
    


	public function mantenimiento_habitacion($nhab,$hubigeo,$tipo,$precio,$img){
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql="";
	
		$sql = "insert into tb_habitacion values(null,'$nhab','$hubigeo','disponible','1','$tipo','$precio','$img','sin descripcion','1')";
	    $val=false;
	    if(mysqli_query($cc, $sql)==true){$val=true;};
		
		mysqli_close($cc);
		return $val;
       	}

       	public function lista_tipo_habitacion(){
       	$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql="select * from tb_tipo_habitacion where estado=1";
		$rs= mysqli_query($cc, $sql);
		return $rs;
		mysqli_close($cc);
	
       	}
        public function lista_habitaciones(){
       	$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql="select * from v_desc_hab";
		$rs= mysqli_query($cc, $sql);
		return $rs;	
		mysqli_close($cc);
       	}

       	public function lista_habitacion($pos){
       	$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql="select * from v_habitacion order by 2 limit $pos,4 ";
		if($pos==='all'){
        $sql="select * from v_habitacion where disponibilidad_hab='disponible'";
		}
		
		$rs= mysqli_query($cc, $sql);
		return $rs;
		mysqli_close($cc);
	
       	}
       	public function alquiloHabitacion($opc,$id){
       	$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql="update tb_habitacion set disponibilidad_hab='ocupado' where id_habitacion='$id'";
		if($opc==='lib'){
		$sql="update tb_habitacion set disponibilidad_hab='disponible' where id_habitacion='$id'";	
		}
		$rs= mysqli_query($cc, $sql);	
		mysqli_close($cc);		
       	}
       	public function contarhabitacion(){
       	$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql="select count(id_habitacion)total from tb_habitacion where estado_hab=1 and id_sede=1";
		$rs= mysqli_query($cc, $sql);
		return $rs;
		mysqli_close($cc);
       	}
       	public function eliminar($id){
       	$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql="update tb_habitacion set estado_hab='0' where id_habitacion='$id'";
		$rs= mysqli_query($cc, $sql);	
		mysqli_close($cc);
       	}
}