<?php 
require_once('../model/m_pedido.php');
$m_pedido = new m_pedido();

$rspedido= $m_pedido->listar_pedidos_atendidos();
print('<br><br><div class="row"><div class="col-xs-12 col-sm-12 col-md-12" ><h3 style="color: #FE2E64;padding:1% 0%;">Generar Comprobantes</h3></div>');
foreach ($rspedido as $key ) {
	$rspersona = $m_pedido->ver_solicitante($key['usuario']);
	foreach ($rspersona as $keyx ) {
		print('<div class="col-xs-6 col-sm-3 col-md-4">');
		print('<a href="../view/v_comprobante_venta.php?numdoc='.$keyx['numero_documento'].'&cliente='.$keyx['ID_PERSONA'].'"class="btn btn-danger" style="width:100%;padding:6%">'.$keyx['cliente'].'</a><br>');
		print('</div>');
	}

}
print('</div>');
 ?>