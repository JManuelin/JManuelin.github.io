<?php 

require_once('../model/m_comprobante.php');
require_once('../model/m_alquiler.php');
require_once('../model/m_habitacion.php');

$m_comprobante = new m_comprobante();
$m_alquiler= new m_alquiler();
$m_habitacion= new m_habitacion();

session_start();

$id_empleado;
$id_persona;
$sumTotal=$_SESSION['sumTotal'];
$hra = date("H:i:s");


$rsx=$m_alquiler->validar_id($_SESSION['id_persona']);
foreach ($rsx as $keyVs) {
	if( $keyVs['ID_PERSONA']!=null){
      $id_empleado = $keyVs['ID_PERSONA'];
	}else{
		$id_empleado=0;
		//$id_persona=$_SESSION['id_persona'];
	}
}

if(isset($_POST['txtnDoc'])){
			$ndoc=$_POST['txtnDoc'];
			$nfi=$_POST['txtFechaI'];
            $_SESSION['info']='Fecha de Entrada: '.$nfi.' Fecha Salida: '.$_POST['txtFechaf'];
			$_m=$m_alquiler->_id_persona($ndoc);
			foreach ($_m as $key ) {
				$id_persona=$key['ID_PERSONA'];
                $_SESSION['persona']=$key['apellidopater_persona'].'/'.$key['apellidomater_persona'].'/'.$key['nombres_persona'];
			}
			if($sumTotal>0 && $_POST['txtncomp']!=null){
						$id_al=$m_alquiler->registrar_alquiler($nfi , $hra,$_POST['txtFechaf'], $id_persona , $id_empleado);
                        $id_comp=$m_comprobante->registrar_comprobante('por alquiler',$_POST['txtncomp'],$sumTotal,$_POST['cbocomprobante']);
                         $_SESSION['imprimir']=$_POST['txtncomp'];
					   for($i=0;$i<count($_SESSION['id_habitaciones']);$i++){									
					    $log= $m_alquiler->registrar_detalle_alquiler($id_comp,$_SESSION['id_habitaciones'][$i],$id_al);
					    $m_habitacion->alquiloHabitacion('',$_SESSION['id_habitaciones'][$i]);
					    if($log==true){
					    	$_SESSION['id_habitaciones'][$i]=0;
					    }						
						}
						$_SESSION['sumTotal']=0;
               
               
					}
		}




header("Location: c_exit_n_session.php?del_sess");
 ?>