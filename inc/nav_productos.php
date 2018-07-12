<?php 

require_once("../model/m_producto.php");

$m_producto = new m_producto();
$r = $m_producto->listar_categoria();


 ?>

<div style="padding:1%;">
<div class="row">
  <div class="col-xs-5 col-sm-3 col-md-2">

  <?php 
  foreach ($r as $k ) {
   echo '<div class="list-group">
      <a href="#" class="list-group-item disabled">
       '.$k['descripcion_categoria'].'
      </a>';
        $rp = $m_producto->listar_productos("descripcion_categoria",$k['descripcion_categoria']);

        foreach ($rp as $key ) {
          if($key!=null){
              echo '<a href="vs_producto.php?sh='.$key['descripcion_marca'].'" class="list-group-item">'.$key['descripcion_marca'].'<span class="badge">'.$key['stock'].'</span> </a>';
       
            }else{
              echo "Sin registros";
            }
        }
  
     
    echo '</div>';
  }

   ?>

</div>
 



