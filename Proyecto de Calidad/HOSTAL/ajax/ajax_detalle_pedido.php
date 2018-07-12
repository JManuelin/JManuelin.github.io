<?php 
require_once('../model/m_pedido.php');
require_once('../model/m_persona.php');
$m_persona= new m_persona();
$m_pedido =  new m_pedido();
$rspedidosx = $m_pedido->listar_pedidos_detalle($_POST['val']);

$cliente;
$numeroDocumento;
$totalpago=0;
session_start();

print('<h4>Pedido N° '.$_POST['val'].'</h4>');

print('<div class="table-responsive"><table class="table table-bordered"><tr class="bg-primary"><td>Marca</td><td>Categoria</td><td>Producto</td><td>Precio</td><td>Cantidad</td><td>Importe</td>');
foreach ($rspedidosx as $keyx) {
	$cliente=$keyx['usuario'];
	$totalpago+=($keyx['precio']*$keyx['cantidad']);
	print('<tr >
         <td >'.$keyx['descripcion_marca'].'</td>
         <td>'.$keyx['descripcion_categoria'].'</td>
         <td>'.$keyx['descripcion_producto'].'</td>
         <td>'.$keyx['precio'].'</td>
         <td>'.$keyx['cantidad'].'</td>
         <td class="info">'.$keyx['importe'].'</td>
        
		</tr>');
}
print('</tr></table></div>');
$_SESSION['id_cliente']=$cliente;
$rspersona = $m_persona->busca_persona($_SESSION['id_cliente']);
foreach ($rspersona as $persona) {
$cliente= $persona['apellidopater_persona'].' '.$persona['apellidomater_persona'].', '.$persona['nombres_persona'];
}

 ?>
 <div class="row" style="padding:2%" align="center">
 	<div class="col-xs-7 col-sm-12 col-md-3">
 	<b><h4 class="h3">Cliente : <?php echo $cliente; ?></h4></b>
 	</div> 	
 	<div class="col-xs-5 col-sm-12 col-md-3">
 	<b><h4 class="h3" style="color:#8A0829">TOTAL A PAGAR :  <?php echo 'S/.'.$totalpago; ?></h4></b>
 	</div>
 	<div class="col-xs-12 col-sm-12 col-md-3">
 	<a href="../controler/c_pedidos.php?op=entregado&id=<?php echo $_POST['val'];  ?>" class="btn btn-info" style="width:100%"  onclick='(validate();)return false;' >Confirmar</a>
 	</div>
 	<div class="col-xs-12 col-sm-12 col-md-3">
 	<a href="../controler/c_pedidos.php?op=cancelado&id=<?php echo $_POST['val'];  ?>" class="btn btn-danger" style="width:100%"  onclick='(validate();)return false;' >Elimar</a>
 	</div>
 	</div>

 	<script>
function validate() {
    var result = confirm("Realmente desea generar el Alquiler?");
    return result;
}
</script>