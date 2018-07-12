<?php 
require_once('../model/m_habitacion.php');
require_once('../model/m_producto.php');
require_once('../model/m_tipo_documento.php');
require_once('../model/m_persona.php');
$m_persona= new m_persona();
$m_habitacion= new m_habitacion();
$m_producto= new m_producto();
$m_tipo_documento= new m_tipo_documento();

if(isset($_GET['delhab'])){
$m_habitacion->eliminar($_GET['id']);
}
if(isset($_GET['delprod'])){
$m_producto->eliminar($_GET['id']);
}
if(isset($_GET['deltipo'])){
$m_tipo_documento->eliminar($_GET['id']);
}
if(isset($_GET['asig'])){
    $log = $m_persona->registrarEmpleado($_GET['id']);
    if($log==false){
    	echo '<div align="center"><h1 class="h1">Error al Registrar</h1></div>';
		
		print('<script>
			function redireccionar(){window.location="http://127.0.0.1/Hostal/view/v_man_permisos.php";} 
			setTimeout ("redireccionar()", 500);

			</script>');
    }
}

?>
<script type="text/javascript">
	javascript:history.back();
</script>