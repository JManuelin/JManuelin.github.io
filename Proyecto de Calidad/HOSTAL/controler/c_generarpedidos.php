<?php 
require_once('../model/m_pedido.php');
$m_pedido = new m_pedido();
session_start();

if($_SESSION['importepagar']>0){
$id_pedido=$m_pedido->registrar_pedido($_SESSION['id_persona']);
}

for($i=0;$i<count($_SESSION['idx_prd']);$i++){
   if($_SESSION['idx_prd'][$i]!=null&&$_SESSION['cantidad'][$i]>0){
      $m_pedido->registar_detalle_pedido($_SESSION['idx_prd'][$i],$id_pedido,$_SESSION['cantidad'][$i],$_SESSION['preciox'][$i],($_SESSION['cantidad'][$i]*$_SESSION['preciox'][$i]));
      
    

   }
}
      unset($_SESSION['idx_prd']);
      unset($_SESSION['marcax']);
      unset($_SESSION['preciox']);
      unset($_SESSION['img']);
      unset($_SESSION['cantidad']);
      unset($_SESSION['importepagar']);
      header("Location: ../view/v_micarrito.php");
 ?>