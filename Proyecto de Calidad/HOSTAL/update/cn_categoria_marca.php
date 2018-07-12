<?php 

require_once('../model/m_producto.php');
$m_producto= new m_producto();
$m_producto->update_c_m($_POST['id'],$_POST['desc'],$_POST['txttable']);
if($_POST['txttable']==='tb_categoria_producto'){
	header('Location: ../view/v_producto.php?p=c&u');
}else{
	header('Location: ../view/v_producto.php?p=m&u');
}

 ?>
