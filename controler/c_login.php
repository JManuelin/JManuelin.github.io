<?php  

require_once('../model/m_login.php');
$m_login = new m_login();
$stm = $m_login->v_login($_POST['txt_email'],$_POST['txt_clave']);
session_start();
$var;
foreach ($stm as $rs ) {
	    $var=$rs['usuario'];
        
		$_SESSION['id_persona']=$rs['id'];
		$_SESSION['xid']=$rs['usuario'];
		$_SESSION['datos']=$rs['apellidopater_persona'].' - ' .$rs['apellidomater_persona'] .' - '. $rs['nombres_persona'];
		$_SESSION['numerodocumento']=$rs['numero_documento'];
		$_SESSION['rol']=$rs['id_rol'];
		$_SESSION['cont_pedido']=0;
		//$_SESSION['id_habitaciones']=0;
       
	
}
if($var!=null)
	{
 header("Location: ../view/welcome.php");
	}else
	{
		$_SESSION['error']='Error de Acceso';
header("Location: ../pag/login.php");	

	}


?>