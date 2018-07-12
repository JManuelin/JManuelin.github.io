<?php 

require_once('cnxn.php');
class m_alquiler 
{
	
	public function registrar_alquiler($fechaEntrada , $hraEntrada,$ff,$idpersona , $idempleado)
	{
		$sql = "insert into tb_alquiler values (null,now(),'$hraEntrada','$ff',null,'$idpersona','$idempleado')";
		
        if($idempleado==0){
       $sql = "insert into tb_alquiler values (null,'$fechaEntrada','$hraEntrada','$ff',null,'$idpersona',null)";
		}
	    $con= new cnxn();
		$cc= $con->abrirConextion();
		mysqli_query($cc,$sql);
		return mysqli_insert_id($cc) ;
        mysqli_close($cc);
	}

	public function registrar_detalle_alquiler($id_comp,$habitacion,$id_alquiler){
	    $con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "insert into tb_detalle_alquiler values(null,'$id_comp','$habitacion','$id_alquiler')";
		$log=false;
		if(mysqli_query($cc,$sql)==true){
			$log= true;
		}
		return $log;mysqli_close($cc);
	}
	

	public function validar_id($id_){
        $con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "select e.ID_PERSONA from tb_usuario u , tb_persona p , tb_empleado e
				where u.id_persona = p.id_persona and e.id_persona=p.id_persona and u.ID_PERSONA='$id_'";
		$val = mysqli_query($cc, $sql);
        return $val;mysqli_close($cc);
        
	}
	public function _id_persona($v1){
		$con= new cnxn();
		$cc= $con->abrirConextion();
		$sql = "select * from tb_persona where numero_documento='$v1'";		
   		$rs=  mysqli_query($cc, $sql);
        return $rs;mysqli_close($cc);
	}
}

 ?>