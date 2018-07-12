<?php

 require_once('../inc/header_session.php');
require_once('../inc/pagexit.php');
 require_once('../model/m_tipo_documento.php');
 $m_tipo_documento =  new m_tipo_documento();
 $resultset = $m_tipo_documento->listar();
 ?>
<div style="padding:2%">
<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-8">
 <button class="btn btn-primary " data-toggle="modal" data-target="#myModal">Nuevo tipo documento</button>
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
</div>
<br>
<br>
<div class="row">
  <div class="col-md-12 col-xs-12 col-xs-12">
  	<table class="table  table-bordered" id="myTable">
        <thead>
        <tr class="color_celeste">
          <td>#</td>
          <td>Nombre documento</td>
          <td>Digitos Mim</td>
          <td>Digitos Max</td>
          <td class="btn-primary">Acción</td>
        </tr>
        </thead>

  <?php 
    foreach ($resultset as $key ) {
      print('<tr>');
      print('<td>'.$key['Id_tipodocumento'].'</td>');
      print('<td>'.$key['nombre_documento'].'</td>');
      print('<td>'.$key['longMin'].'</td>');
      print('<td>'.$key['longMax'].'</td>');
      print('<td> 

        <a href="../del/eliminar_registro.php?deltipo&id='.$key['Id_tipodocumento'].'" style="color:red">Eliminar</a>
        <a href="v_tipo_documento.php?man=up&id_='.$key['Id_tipodocumento'].' "  >Modificar</a>
        </td>');
      print('</tr>');
    }
   ?>
</table>
  </div>
</div>

</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registrar Nuevos Tipo Documento</h4>
      </div>

      <div class="modal-body">
 <form action="../controler/c_tipo_documento.php" method="POST" onsubmit="return validarRegistroTipoDoc();">
		 
		  <div class="form-group">
          <label for="txtDesc">Nombre Documento: </label>
          <input type="text" maxlength="30" name="txtDescripcion" class="form-control" id="txtDesc" required="" placeholder="descripción" onkeypress="txNombres()">
      </div>
      <div class="form-group">
          <label for="txt01">Digitos Minimos </label>
          <input type="text"  maxlength="2" name="txtMin" id="txt01" class="form-control" placeholder="digitos" required  onkeypress="ValidaSoloNumeros()">
      </div>
		 <div class="form-group">
          <label for="txt02">Digitos Maximos </label>
          <input type="text" maxlength="2"  name="txtMax"  id="txt02" class="form-control" placeholder="digitos" required  onkeypress="ValidaSoloNumeros()">
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