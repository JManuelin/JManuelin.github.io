<?php 

require_once('../model/m_comprobante.php');
require_once('../model/m_pedido.php');
$m_pedido = new m_pedido();
$m_comprobante = new m_comprobante();

session_start();

$id_tipocomprobante=$_POST['cbocomprobante'];
$numero_comprobante=$_POST['txtncomp'];
$sumTotal=$_SESSION['montoapagar'];

$idcomprobante=$m_comprobante->registrar_comprobante('venta producto',$numero_comprobante,$sumTotal,$id_tipocomprobante);
$rslistapedidos=$m_pedido->listar_pedidos_porclientes($_SESSION['idcliente']);

foreach ($rslistapedidos as $key ) {
$m_pedido->atender_pedido('vendido',$key['id_pedido']);
$m_pedido->registro_detalle_pedido($idcomprobante,$key['id_pedido']);

}
unset($_SESSION['ncomprobante']);

header('Location: ../reportesPDF/pdf_comprobante_venta.php?pdf='.$idcomprobante.'');
// <script type="text/javascript">
  //window.open("http://127.0.0.1/HOSTAL/reportesPDF/pdf_comprobante_venta.php?pdf=<?php echo $idcomprobante ?>");

 ?>


