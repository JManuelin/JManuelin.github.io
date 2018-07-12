<?php 

require_once('../model/m_cargo.php');
$_cargo =  new  m_cargo();
if(isset($_POST['id'])){
	$_cargo->updelcargo('update',$_POST['desc'],$_POST['id']);

}
if(isset($_GET['id'])){
	$_cargo->updelcargo('eliminar','',$_GET['id']);


}
header('Location: ../view/v_cargo.php');
 ?>