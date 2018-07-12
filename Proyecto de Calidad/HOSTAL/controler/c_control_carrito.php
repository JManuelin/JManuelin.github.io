<?php 
session_start();
if(isset($_GET['id_p'])){
$_SESSION['idx_prd'][] = $_GET['id_p']; 
$_SESSION['marcax'][] = $_GET['marca']; 
$_SESSION['preciox'][] = $_GET['precio']; 
$_SESSION['img'][] = $_GET['img']; 
$_SESSION['cantidad'][] = 1;
$_SESSION['importepagar']+=$_GET['precio'];	
header('Location: ../view/vs_producto.php?sh='.$_GET['marca'].'&p=1');

}
if(isset($_GET['d'])){
  for($i=0;$i<count($_SESSION['idx_prd']);$i++){
  		$_SESSION['importepagar']=($_SESSION['importepagar']-($_SESSION['preciox'][$i]*$_SESSION['cantidad'][$i]));
        $_SESSION['cantidad'][$i]=0;
        $_SESSION['idx_prd'][$i] = null; 
		$_SESSION['marcax'][$i] = null; 
		$_SESSION['preciox'][$i] = null; 
		$_SESSION['img'][$i] = null; 

        header("Location: ../view/v_micarrito.php");    
}
}
if(isset($_GET['s'])){
  for($i=0;$i<count($_SESSION['idx_prd']);$i++){
  	if($_GET['s']==$i){
  		if($_SESSION['cantidad'][$i]>0){
  		$_SESSION['cantidad'][$i]=($_SESSION['cantidad'][$i]+1);
  		$_SESSION['importepagar']=($_SESSION['importepagar']+$_SESSION['preciox'][$i]);
        
		}
		header("Location: ../view/v_micarrito.php");
    }
}	
  		}  		 
  
if(isset($_GET['r'])){
for($i=0;$i<count($_SESSION['idx_prd']);$i++){
	if($_GET['r']==$i){
		if($_SESSION['cantidad'][$i]>0){
		$_SESSION['cantidad'][$i]=($_SESSION['cantidad'][$i]-1);
		$_SESSION['importepagar']=($_SESSION['importepagar']-$_SESSION['preciox'][$i]);
	
	}
		header("Location: ../view/v_micarrito.php");
}
}
}
		