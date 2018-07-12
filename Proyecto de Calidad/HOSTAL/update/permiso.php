<?php
 require_once('../abs/controlador.php');
 $abs = new controlador();

$tabla="tb_empleado";
$val ="estado=0";
$id="id_empleado";

$idval=$_GET['id'];
$idvalpers=$_GET['idp'];

$mensaje="....";


$value=$abs->devolver_cantidad('id_cargo',$tabla,'id_cargo=1 and estado=1');
    
if($value<=3){
  
}  
$log=$abs->update($tabla,$val,$id,$idval);  
$log=$abs->update('tb_usuario','estado_usuario=0','id_usuario',$idvalpers);

if($log==true){
    $mensaje="Exito";
}else{
    $mensaje="Fracaso";
}

print($mensaje);

?>