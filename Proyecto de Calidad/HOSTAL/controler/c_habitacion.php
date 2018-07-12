<?php
require_once('../model/cnxn.php');
require_once('../model/m_habitacion.php');
session_start();
$m_habitacion = new m_habitacion();

if(isset($_GET['nh'])){

$m_habitacion->alquiloHabitacion('lib',$_GET['nh']);
header("Location: ../view/v_liberar.php");

}

if(isset($_POST['txtNumHabi'])&&isset($_POST['txtUbigeo'])&&isset($_POST['cboTipo'])&&isset($_POST['txtPrecio'])){
$url="img";
$archivo=$_FILES['foto']['tmp_name'];
$nomArch=$_FILES['foto']['name'];
move_uploaded_file($archivo, $url."/".$nomArch);

$url=$url."/".$nomArch;

$log=$m_habitacion->mantenimiento_habitacion($_POST['txtNumHabi'],$_POST['txtUbigeo'],$_POST['cboTipo'],$_POST['txtPrecio'],$url);
if($log==true){
    $mensaje= '<div align="center"><h1 class="h1">Se a Registrado correctamente</h1></div><script>
			function redireccionar(){window.location="'.$_SESSION['miweb'].'/Hostal/view/v_habitacion.php";} 
			setTimeout ("redireccionar()", 500);

</script>';
}else{
    $mensaje= '<div align="center"><h1 class="h1">Error de Registro</h1></div><script>
			function redireccionar(){window.location="'.$_SESSION['miweb'].'/Hostal/view/v_habitacion.php";} 
			setTimeout ("redireccionar()", 500);

</script>';
}
print($mensaje);
//header("Location: ../view/v_habitacion.php");

}else{
	require_once('error.php');
}

