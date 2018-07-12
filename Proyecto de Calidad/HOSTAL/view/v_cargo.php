<?php

require_once('../inc/header_session.php');
require_once('../inc/pagexit.php');
require_once('../model/m_cargo.php');
$m_cargo = new m_cargo();
$resul= $m_cargo->listar_cargos();


 ?>

<div style="padding:2%">
<div class="row">
  <div class="col-md-8 col-xs-12 ">
 <button class="btn btn-primary " data-toggle="modal" data-target="#myModal">Registrar Nuevo Cargo</button>
 <hr>
  </div> 
<div class="col-xs-12 col-sm-6 col-md-4" align="center">
      <?php 
if(isset($_GET['u'])){
  print('<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Confirmación</strong> Registro Modificado Corectamente.
    </div>');
}
if(isset($_GET['i'])){
  print('<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Confirmación</strong> Registro Insertado Corectamente.
    </div>');
}

       ?>


  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
  	<table class="table  table-bordered" id="myTable">
    <thead>
    <tr class="color_celeste">
        <th>#</th>
        <th>Descripción</th>
        <th align="center">Acción</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    foreach ($resul as $key ) {
     print('<tr>');
     print('<td>'.$key['id_cargo'].'</td>');
     print('<td>'.$key['cargo'].'</td>');
     print('<td align="center">
      <a href="../update/cn_cargo.php?id='.$key['id_cargo'].'" style="color:red">Eliminar</a>
      <a href="../update/updel_cargo.php?acc=up&id='.$key['id_cargo'].'&desc='.$key['cargo'].'">Modificar</a></td>');
     print('</tr>');
    }

     ?>
     </tbody>
</table>
  </div>
  <div class="col-sm-2 col-md-5">
  </div>
</div>

</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registrar Nuevos Cargos</h4>
      </div>

      <div class="modal-body">
 <form action="../controler/c_cargo.php" method="POST" onsubmit="return valregistrar();">
		 
		  <div class="form-group">
			    <label for="txtDesc">descripción: </label>
			    <input type="text" name="txtDescripcion" class="form-control" maxlength="20" id="txtDesc" required="" placeholder="descripción" onkeypress="txNombres()">
		  </div>
		 
		   			<button type="submit" class="btn color_verde">R e g i s t r a r</button>
</form>
      </div>


      <div class="modal-footer">
       <a href="#" onclick="limpiar();" class="btn color_rojo" data-dismiss="modal">C a n c e l a r</a>
       </div>
    </div>
  </div>
</div>
