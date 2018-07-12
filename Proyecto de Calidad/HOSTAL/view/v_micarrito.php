<?php 

require_once("../inc/header_session.php");
require_once('../inc/pagexit.php');
if(isset($_SESSION['idx_prd'])){
if(count($_SESSION['idx_prd'])<0){
	echo '<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  No tiene Productos en su Carrito
</div>';
}else{
?>
<div style="padding:0% 2%">
	<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 btn-info" style="padding:1%">
	<div class="col-xs-6 col-sm-4 col-md-2">
	<form action="../controler/c_generarpedidos.php" method="POST" onsubmit="return validate();">
  	<button class="btn btn-primary">Generar Pedidos</button>
  	</form>
	</div>
	<div class="col-xs-6 col-sm-8 col-md-10">
	<h4>Total a Pagar S/ <?php print($_SESSION['importepagar']); ?></h4>
	</div>
	
	</div>
    <br>
	<br>	
	<br>	
	<br>
	<div class="col-xs-12 col-sm-12 col-md-12">
	   
	   	<?php 
			for($i=0;$i<count($_SESSION['idx_prd']);$i++){
			if($_SESSION['cantidad'][$i]>0){
					print(' <div class="col-xs-6 col-sm-6 col-sm-2"><div class="thumbnail ">
	      <img src="../'.$_SESSION['img'][$i].'" class="img-thumbnail img-responsive" alt="Responsive image">
	      <div class="caption ">
	       
	        <div class="btn-group btn-group-justified" role="group" aria-label="calibri">
			         <div class="btn-group" role="group">
			   		 <button type="button" class="btn btn-success">S/.<b>'.$_SESSION['preciox'][$i].'</b></button>
			  	</div>
			  <div class="btn-group" role="group">
			    <a href="../controler/c_control_carrito.php?d='.$i.'" class="btn btn-danger">Eliminar</a>
			  </div>
			</div>
			<div class="btn-group btn-group-justified" role="group" aria-label="calibri">
			         <div class="btn-group" role="group">
			   		 <a href="../controler/c_control_carrito.php?s='.$i.'" class="btn btn-default"><b>+</b></a>
			  	</div>
			  	<div class="btn-group" role="group">
			   		 <input  class="btn form-control" value="'.$_SESSION['cantidad'][$i].'">
			  	</div>
			  <div class="btn-group" role="group">
			   <a href="../controler/c_control_carrito.php?r='.$i.'" class="btn btn-default"><b>-</b></a>
			  </div>
			</div>
		</div>
	  </div></div>');
			}
			}
	   	 ?>

	   
	</div>
	</div>	
</div>
 <?php } }
else{
	print('<h1 align="center">Carrito Vacio.</h1>');
}

 ?>
<script>
function validate() {
    var result = confirm("Realmente desea generar el pedido?");
    return result;
}
</script>