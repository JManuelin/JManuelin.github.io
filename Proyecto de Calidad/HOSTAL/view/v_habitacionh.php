<?php 
require_once('../inc/header_session.php');

 require_once('../model/m_habitacion.php');
 $m_habitacion = new m_habitacion();
 $pos=0;
 if(isset($_GET['pos'])){
 	$pos=$_GET['pos'];
 }
 $rs=$m_habitacion->lista_habitacion($pos);

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>vista de habitaciones</title>
 </head>
 <body>
 <div class="row" style="padding:1% 2%">
 <?php 
if(isset($_GET['dis'])){
   $rs=$m_habitacion->lista_habitacion('all');
foreach ($rs as $key ) {
  if($key['disponibilidad_hab']==='disponible'){
echo '<div class="col-xs-12 col-sm-4 col-md-3">
      <div class="thumbnail" style=" height: auto;" >
      <img src="../controler/'.$key['img'].'" class="img-responsive" alt="Responsive image" style=" height: 200px;width:100%">
        <div class="caption">
            <h3>Habitación '.$key['descripcion'].'<b style="color:red;"> S/. '.$key['precio'].'</b></h3>
            <p>habitacion N°: '.$key['numero_hab'].'<br>Ubigeo:'.$key['ubigeo_hab'].'</p>';
            
              echo '
    <br>
     <a href="../controler/c_session_habitaciones.php?id_='.$key['id_habitacion'].'&nha='.$key['numero_hab'].'&tipo_hab='.$key['descripcion'].'&precio_hab='.$key['precio'].'" class="btn btn-primary" role="button">Alquilar</a> ';
    print('<a href="#" class="btn btn-default" role="button">Detalle</a>');
         
     echo '<p>
     
     </p>
      </div>
    </div>

</div>
 ';
}
   } 
}
else{
  
    foreach ($rs as $key ) {
        print('<div class="col-xs-12 col-sm-4 col-md-3 ">
              <div class="thumbnail" style=" height: auto;" >');
        print('<img src="../controler/'.$key['img'].'" class="img-responsive" alt="Responsive image" style=" height: 200px;width:100%">');
        print('<div class="col-xs-12 col-sm-12 col-md-12 ">');
        print('<h3>Hab. '.$key['descripcion'].'<b style="color:red;"> S/. '.$key['precio'].'</b></h3>');
        
        //print('<div class="col-xs-12 col-sm-12 col-md-12">');
        print('<p>habitacion N°: '.$key['numero_hab'].'<br>Ubigeo:'.$key['ubigeo_hab'].'</p>');
       // print('</div>');
        if($key['disponibilidad_hab']==='disponible'){
        //print('<div class="col-xs-12 col-sm-12 col-md-12">');
        print('<a href="../controler/c_session_habitaciones.php?id_='.$key['id_habitacion'].'&nha='.$key['numero_hab'].'&tipo_hab='.$key['descripcion'].'&precio_hab='.$key['precio'].'" class="btn btn-primary" role="button" style="width:100%">Alquilar</a>');
       // print('</div>');
        }else{
      //  print('<div class="col-xs-12 col-sm-12 col-md-12">');
        print('<a class="btn btn-danger" role="button" style="width:100%">'.$key['disponibilidad_hab'].'</a>');
       // print('</div>');
        }
        print('</div><br><br><br><br><br><br><br>');
        print('</div></div>');
    }
?>
<div class="col-xs-12 col-sm-12 col-md-12">

<nav>
  <ul class="pagination">
    <li>
      <a href="v_habitacionh.php?pos=<?php echo ($pos-1); ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="v_habitacionh.php?pos=1">1</a></li>
    <li><a href="v_habitacionh.php?pos=2">2</a></li>
    <li><a href="v_habitacionh.php?pos=3">3</a></li>
    <li><a href="v_habitacionh.php?pos=4">4</a></li>
    <li><a href="v_habitacionh.php?pos=5">5</a></li>
    <li>
      <a href="v_habitacionh.php?pos=<?php echo ($pos+1); ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>
</div>
<?php
}


?>

 </body>
 </html>