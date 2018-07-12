<?php 

session_start();
require_once('../model/m_comprobante.php');
$m_comprobante = new m_comprobante();
$_SESSION['ncomprobante']=0;
$_SESSION['ntipo']=$_GET['tipoc'];
$_SESSION['n_id_comprobante']=$_GET['n'];

		  if(isset($_GET['n'])){
		  	$rn=$m_comprobante->listar_n_comprobante($_GET['n']);
		  	foreach ($rn as $keyrn ) {
		  		$_SESSION['ncomprobante']=($keyrn['maximoval']+1);
		  	}

		  	$nnum=strlen($_SESSION['ncomprobante']);

		  	if($nnum==1){
		  		$_SESSION['ncomprobante']='000000'.$_SESSION['ncomprobante'];
		  	}
		  	if($nnum==2){
		  		$_SESSION['ncomprobante']='00000'.$_SESSION['ncomprobante'];
		  	}
		  	if($nnum==3){
		  		$_SESSION['ncomprobante']='0000'.$_SESSION['ncomprobante'];
		  	}
		  	if($nnum==4){
		  		$_SESSION['ncomprobante']='000'.$_SESSION['ncomprobante'];
		  	}
		  	if($nnum==5){
		  		$_SESSION['ncomprobante']='00'.$_SESSION['ncomprobante'];
		  	}
		  	if($nnum==6){
		  		$_SESSION['ncomprobante']='0'.$_SESSION['ncomprobante'];
		  	}
		  	if(isset($_GET['val'])){
		  		header("Location: ../view/v_comprobante_venta.php");
		  		
		  	}else{
		  		header("Location: ../view/v_comprobante.php");
		  	}
		  	
		  }
 ?>