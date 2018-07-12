<?php 

require_once('../model/m_pedido.php');
require_once('../model/m_producto.php');

$m_pedido = new m_pedido();
$m_producto = new m_producto();

if(isset($_GET['op'])){

$m_pedido->atender_pedido($_GET['op'],$_GET['id']);
$rspedidosx = $m_pedido->listar_pedidos_detalle($_GET['id']);

foreach ($rspedidosx as $keyx) {

  $m_producto->actulizar_stock('resta',$keyx['cantidad'],$keyx['id_producto']);
	
}

header("Location: ../view/v_pedido.php");
}

 ?>