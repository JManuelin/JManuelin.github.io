<?php 
require_once('../model/m_cargo.php');
session_start();
if (isset($_POST['txtDescripcion'])) {
	$m_cargo= new m_cargo();
	$mensaje="";
	$log = $m_cargo->registrar($_POST['txtDescripcion']);
	if ($log==true) {
		$mensaje= '<div align="center"><h1 class="h1">Registro Exitoso</h1></div><script>
			function redireccionar(){window.location="'.$_SESSION['miweb'].'/Hostal/view/v_cargo.php";} 
			setTimeout ("redireccionar()", 500);

</script>';
	}else{
		
		
		$mensaje= '<div align="center"><h1 class="h1">Registro Exitoso</h1></div><script>
			function redireccionar(){window.location="'.$_SESSION['miweb'].'/Hostal/view/v_cargo.php";} 
			setTimeout ("redireccionar()", 500);

</script>';
	}

	print($mensaje);
	
}else{
	$mensaje= "require_once('error.php')";
}

 print($mensaje);