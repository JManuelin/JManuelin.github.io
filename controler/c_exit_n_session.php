<?php 

session_start();
if(isset($_GET['del_sess'])){
unset($_SESSION['ncomprobante']);

}
if(isset($_GET['val'])){
header("Location: ../view/v_comprobante_venta.php");
}else{
header("Location: ../view/v_comprobante.php");
 }
?>