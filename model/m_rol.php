<?php 
 require_once('cnxn.php');
 class m_rol 
 {
 	
 	
 	function listar_roles(){
    $con= new cnxn();
    $cc=$con->abrirConextion();
    $sql="select * from tb_rol where estado=1";
    $rs=mysqli_query($cc,$sql);
    return $rs;
    mysqli_close($cc);
 	}

 	function listar_cargos(){
    $con= new cnxn();
    $cc=$con->abrirConextion();
    $sql="select * from tb_cargo where estado=1";
    $rs=mysqli_query($cc,$sql);
    return $rs;
    mysqli_close($cc);
 	}

 	function cambiar_estado($ope,$id_pers,$id_rol){
 		$con= new cnxn();
	    $cc=$con->abrirConextion();
	    $sql="update tb_usuario set id_rol='$id_rol' where ID_PERSONA='$id_pers'";
	    if($ope==='cargo'){
	    	$sql="update tb_empleado set id_cargo='$id_rol' where ID_PERSONA='$id_pers'";
	    }
	    $val=false;
	    if(mysqli_query($cc,$sql)==true){$val=true;}
	    return $val;
	    mysqli_close($cc);
 	}
 	
 }


 ?>