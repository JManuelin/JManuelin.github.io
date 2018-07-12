<?php 
require_once('../model/m_tipo_documento.php');

if (isset($_POST['txtDescripcion'])&&isset($_POST['txtMin'])&&isset($_POST['txtMax'])) {

	$m_tipo_documento= new m_tipo_documento();

	$log = $m_tipo_documento->registrar($_POST['txtDescripcion'], $_POST['txtMin'],$_POST['txtMax']);

	$mensaje="";
	if ($log==true) {
	$mensaje= '<div align="center"><h1 class="h1">Registro Exitoso</h1></div>
	<script>
			function redireccionar(){
				window.location="'.$_SESSION['miweb'].'/Hostal/view/v_tipo_documento.php";
			} 
			setTimeout ("redireccionar()", 500);

</script>';
	}
	else{
		$mensaje= '<div align="center"><h1 class="h1">Error al Registrar</h1></div>
		<script>
			function redireccionar(){
				window.location="'.$_SESSION['miweb'].'/Hostal/view/v_tipo_documento.php";
			} 
			setTimeout ("redireccionar()", 500);

</script>';
		
	}

	print($mensaje);
}
	

