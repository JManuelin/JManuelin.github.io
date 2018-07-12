
<div style="  background-color: #81BEF7;">
	
	<div class="row"style="padding:12%;">
  <div class="col-xs-12 col-sm-6 col-md-8">
  	<div class="row">
		  <div class="col-xs-12 col-sm-6 col-md-8">
            <div class="row">
			  <div class="col-xs-6 col-sm-6 col-md-4">
			    <a href="#" class="thumbnail">
			     <img src="./img/SAM_0334.jpg" class="img-responsive img-thumbnail" alt="Responsive image">
			    </a>
			  </div>
			   <div class="col-xs-6 col-sm-6 col-md-8">
					  	<h3>	Hostal don celso  </h3>
					  	<h5> C/ Luna, nº6 </h5>
						<h5>28004 Huaura (Lima) Perú</h5>
						<h5>Teléfono: 915313290</h5>
						<h5>Email: h_dons@host.es</h5>						
						<h5>Web: www.localhost.XD</h5>
				</div>
			 </div>
		  </div>
		 
	</div>

  </div>
  <div class="col-xs-12 col-sm-6 col-md-4 alert alert-info">
  	<?php
  	$finicial="";
  	$ffinal="";
  	session_start();
     if(isset($_SESSION['fi'])){
     	$finicial=$_SESSION['fi'];
  		$ffinal=$_SESSION['ff'];
     }
     echo '<div>
  		<h3>	Su Reservación  </h3>
		<h5> Llegada :<b>'.$finicial.' </b></h5>
		<h5> Salida  :<b>'.$ffinal.'</b></h5>
		<a href="./controler/c_control.php?exit" ><button class="btn btn-primary">limpiar</button></a>
 		 </div>';
  	?>
  </div>
</div>
</div>
