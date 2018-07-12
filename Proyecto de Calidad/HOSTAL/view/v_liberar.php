
<?php 
require_once('../inc/header_session.php');
require_once('../inc/pagexit.php');
require_once('../model/m_habitacion.php');
$m_habitacion = new m_habitacion();
//$rs=$m_habitacion->contarhabitacion();
$rshab=$m_habitacion->lista_habitaciones();


$pos=1;
print('<div class="row" style="padding:2%">');
print('<div class="col-xs-12 col-sm-12 col-md-12">');
print('<button class="btn btn-success">DISPONIBLE</button>');
print('<button class="btn btn-warning">RESERVADO</button>');
print('<button class="btn btn-danger">OCUPADO</button>');
print('</div><hr>');
foreach ($rshab as $habx) {
	print('<div class="col-xs-6 col-sm-4 col-md-3">');
	if($habx['disponibilidad_hab']==='disponible'){
       print('<a href="#" class="btn btn-success "aria-label="Left Align" style="width:100%;padding:0%"><img src="../img/hotel.png"><p>'.$habx['disponibilidad_hab'].'<b><h4>'.$habx['numero_hab'].'</h3></b></p></a>');
	}
	if($habx['disponibilidad_hab']==='reservado'){
       print('<a href="../controler/c_habitacion.php?nh='.$habx['id_habitacion'].'" class="btn btn-warning "aria-label="Left Align" style="width:100%;padding:0%"><img src="../img/hotel.png"><p>'.$habx['disponibilidad_hab'].'<b><h4>'.$habx['numero_hab'].'</h4></b></p></a>');
	}
	if($habx['disponibilidad_hab']==='ocupado'){
		print('<a href="../controler/c_habitacion.php?nh='.$habx['id_habitacion'].'" class="btn btn-danger "aria-label="Left Align" style="width:100%;padding:0%"><img src="../img/hotel.png"><p>'.$habx['disponibilidad_hab'].'<b><h4>'.$habx['numero_hab'].'</h4></b></p></a>');
	}
		
	print('</div>');
}
print('</div>');
 ?>