<?php

 require_once('../inc/header_session.php');

 require_once('../inc/nav_productos.php');
 $allMarca=" ' or  1= '1 ";
 if(isset($_GET['sh'])){
	$allMarca=$_GET['sh'];
 }

 $rpx = $m_producto->listar_productos("descripcion_marca",$allMarca);
 ?>

 
<div class="col-xs-7 col-sm-9 col-md-10 ">
<div class="row">    
<?php 
foreach ($rpx as $rpxR) {
	echo ' <div class="col-xs-12 col-sm-6 col-md-3">  
	  <div class="thumbnail">
	      <img src="../'.$rpxR ['img'].'" class="img-thumbnail img-responsive" alt="Responsive image">
	      <div class="caption">
	       
	        <div class="btn-group btn-group-justified" role="group" aria-label="calibri">
			  <div class="btn-group" role="group">
			    <a href="../controler/c_control_carrito.php?marca='.$allMarca.'&id_p='.$rpxR['id_producto'].'&precio='.$rpxR['precio'].'&img='.$rpxR['img'].'" class="btn btn-primary">Add</a>
			  </div>
			    <div class="btn-group" role="group">
			   		 <button type="button" class="btn btn-deault"> <b>Stock  '.$rpxR['stock'].'</b> </button>
			  	</div>
			  <div class="btn-group" role="group">
			    <button type="button" class="btn btn-success"><b>S/ '.$rpxR['precio'].'</b> </button>
			  </div>
			</div>
	      </div>
	  </div>
	</div>
	  ';
}
if(isset($_GET['p'])){
 	?>
 	<script type="text/javascript">alert("se AGREGO al carrito");</script>
 	<?php
 }

 ?>

  <div class="col-xs-12 col-sm-12 col-md-12">

<div class="btn-toolbar" role="toolbar" aria-label="...">
		  <div class="btn-group" role="group" aria-label="..."> <a href="#"> <button class="btn btn-warning"> INI</button> </a>  </div>
		  <div class="btn-group" role="group" aria-label="..."> <a href="#"> <button class="btn"> 1 </button> </a>  </div>
		  <div class="btn-group" role="group" aria-label="..."> <a href="#"> <button class="btn"> 1 </button> </a>  </div>
		  <div class="btn-group" role="group" aria-label="..."> <a href="#"> <button class="btn"> 1 </button> </a>  </div>
		  <div class="btn-group" role="group" aria-label="..."> <a href="#"> <button class="btn btn-warning"> FIN </button> </a>  </div>
		  
		
</div>
</div>

  </div>
  </div> 
</div>




</div>