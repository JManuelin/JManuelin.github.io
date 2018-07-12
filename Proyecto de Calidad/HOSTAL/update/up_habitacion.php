<?php

require_once('../abs/controlador.php');
$abs = new controlador();
session_start();
$tabla="tb_habitacion";
$val="ubigeo_hab='".$_POST['txtub']."',precio='".$_POST['txtPrecio']."'";
$id="id_habitacion";
$idval=$_POST['txtid'];
$valog=$abs->update($tabla,$val,$id,$idval);
$mensaje="";
if($valog==true){
   $mensaje= '<div align="center"><h1 class="h1">Registro Modificado Exitosamente</h1></div><script>
			function redireccionar(){window.location="'.$_SESSION['miweb'].'/Hostal/view/v_habitacion.php";} 
			setTimeout ("redireccionar()", 500);

</script>'; 
}else{
    $mensaje= '<div align="center"><h1 class="h1">Error de Modificación</h1></div><script>
			function redireccionar(){window.location="'.$_SESSION['miweb'].'/Hostal/view/v_habitacion.php";} 
			setTimeout ("redireccionar()", 500);

</script>';
}
print ($mensaje);
?>