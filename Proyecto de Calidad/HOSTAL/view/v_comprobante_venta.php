
<div style="padding:0% ">
	<?php 

$valTemp;
$sumTotal=0.00;

require_once('../inc/header_session.php');
//require_once('../inc/pagexit.php');
require_once('../model/m_comprobante.php');
require_once('../model/m_pedido.php');

$m_comprobante = new m_comprobante();
$m_pedido= new m_pedido();
$rs= $m_comprobante->listar_tiposComprobantes();

if(isset($_GET['numdoc'])){
	$_SESSION['idcliente']=$_GET['cliente'];
	$_SESSION['ncliente']=$_GET['numdoc'];
}
$_SESSION['montoapagar']=0.00;

$rspedidos=$m_pedido->listarpedidosentregados($_SESSION['idcliente']);

?>
<form name="form_" action="../controler/c_registro_ventaproducto.php" method="POST" onsubmit="return validate();">

<div class="row">
  <div class="col-sm-6 col-md-8"></div>

  <div class="col-xs-12 col-sm-6 col-md-4">
   <div class="col-xs-6 col-sm-6 col-md-6">
   Numero de Comprobante: 
   </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
   <input type="text" class="form-control"value="<?php 
		   
		if(isset($_SESSION['ncomprobante'])){
			echo $_SESSION['ncomprobante'];
		  	  }
		    ?>" 
    name="txtncomp" readonly="readonly">

   </div>
   <div class="col-xs-6 col-sm-6 col-md-6">
   Fecha: 
   </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
   <input type="text" class="form-control"value="<?php echo date("d-M-Y"); ?>" readonly="readonly">
   </div>
  </div>
 </div>
  <div class="row">

  <div class="col-xs-12 col-sm-6 col-md-4">
  	<div class="col-xs-6 col-sm-6 col-md-6">
   N° Doc:
   </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
   <input type="text" class="form-control" name="txtnDoc" value="<?php echo $_SESSION['ncliente'];?>"  readonly="">
   </div>

   <div class="col-xs-6 col-sm-6 col-md-6">
   Fecha de Salida: 
   </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
   <input type="text" class="form-control"name="txtFechaI" value=" <?php echo date("Y").'/'.date("m").'/'.date("d");?> " required="">
   </div>
   <div class="col-xs-6 col-sm-6 col-md-6">
   Tipo Comprobante: 
   </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
   <select style="width:100%" class="form-control"name="cbocomprobante" onchange="location = this.options[this.selectedIndex].value;">
   	
   	<?php 
  
   			if(isset($_SESSION['ncomprobante'])){
                
   				echo '<option value="'.$_SESSION['n_id_comprobante'].'">'.$_SESSION['ntipo'].'</option>';
   				echo '<option value="../controler/c_exit_n_session.php?val&del_sess">Re-Seleccionar</option>';
			  	
  
		  	  }else{
		  	  	echo"<option>Seleccione</option>";
		  	  		foreach ($rs as $keyRs) {		  	  	
		  	  	echo '<option value="../controler/c_comprobante_id.php?val&n='.$keyRs['id_tipo_comprobante'].'&tipoc='.$keyRs['descripcion'].'">'.$keyRs['descripcion'].'</option>';
                 }
		  	  }
  
   	 ?>
   </select>
   </div>
  </div>



  <div class="col-xs-12 col-sm-6 col-md-2">
  	<button class="btn btn-primary" style="width:100%">Confirmar</button>
  </div>
  <div class="col-xs-12 col-md-6"></div>
</div>
</form>


<br>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead >
			<td class="success">Fecha  --  Hora</td>
			<td class="success">Categoria</td>
			<td class="success">Marca</td>
			<td class="success">Descripción</td>
			<td class="success">Cantidad</td>
			<td class="success">Precio</td>
			<td class="success">Importe</td>
		</thead>
		<?php 
foreach ($rspedidos as $key ) {
	print('<tr>');
	print('<td>'.$key['fecha'].'</td>');
	print('<td>'.$key['descripcion_categoria'].'</td>');
	print('<td>'.$key['descripcion_marca'].'</td>');
	print('<td>'.$key['descripcion_producto'].'</td>');
	print('<td>'.$key['cantidad'].'</td>');
	print('<td>'.$key['precio'].'</td>');
	print('<td class="warning">'.$key['importe'].'</td>');
	print('</tr>');
$_SESSION['montoapagar']+=$key['importe'];
   }
		 ?>
	</table>
</div>

<div class="col-xs-6 col-sm-7 col-md-12">
<?php print('<h3>Total a Pagar: S/. '.$_SESSION['montoapagar'].'</h3>'); ?>
</div>
</div>	
</div>
<script>
function validate() {
    var result = confirm("SEGURO DE SEGUIR ?");
    return result;
}
</script>