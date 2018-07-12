<?php 

require_once('../model/m_rol.php');
require_once('../model/m_permiso.php');
 

$m_rol= new m_rol();
$m_permiso= new m_permiso();
if(isset($_POST['val'])){
$m_permiso->cambiar_estado($_POST['val']);
}
else{
	if(isset($_GET['asigcargo'])){
        
		  $rstrue= $m_rol->cambiar_estado('cargo',$_GET['idpers'],$_GET['idrol']);	
	}if(isset($_GET['asigrol'])){
        
	  	  $rstrue= $m_rol->cambiar_estado('rol',$_GET['idpers'],$_GET['idrol']);	
	}

print('<script type="text/javascript">javascript:history.back();</script>');

}