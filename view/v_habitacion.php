<?php

 require_once('../inc/header_session.php');
require_once('../inc/pagexit.php');
 require_once('../model/m_habitacion.php');
 $m_habitacion = new m_habitacion();
 $rs=$m_habitacion->lista_tipo_habitacion();
 $rshabi = $m_habitacion->lista_habitaciones();
  ?>

<div style="padding:2%">
<div class="row">
  <div class="col-md-8 col-xs-3 col-xs-5">
 <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Nuevo Habitación</button>
  </div>
  <div class="col-md-4 col-xs-9 col-xs-7">
 </div>
</div>
<br>
<br>
<div class="row ">
  <div class="col-md-12 col-xs-12 col-xs-12 table-responsive">
  	<table class="table  table-bordered table-condensed" id="myTable">
      
      <thead style="border-top:2px solid black">
        <tr >
        <th>#</th>
        <th>N° Habitación</th>
        <th align="center">ubigeo</th>
        <th>Disponibilidad</th>
        <th>Estado</th>
        <th>Tipo Habitación</th>
        <th align="center">Precio S/.</th>
        <th  align="center" colspan="2">Accion</th>
      </tr>
      </thead>
      <tbody>
<?php 

foreach ($rshabi as $key ) {
  print('<form action="../update/up_habitacion.php" method="POST" >
        <td style="width:5%"><input type="text" value="'.$key['id_habitacion'].'" name="txtid" class="btn" style="width:100%"></td>
        <td>'.$key['numero_hab'].'</td>
        <td><input type="text" name="txtub" class="btn" value="'.$key['ubigeo_hab'].'"></td>
        <td>'.$key['disponibilidad_hab'].'</td>
        <td>'.$key['estado_hab'].'</td>
        <td>'.$key['tipohab'].'</td>
        <td><input type="text" name="txtPrecio" class="btn" value="'.$key['precio'].'"></td>
        <td align="center"class="" align="center" colspan="2">
        <a href="../del/eliminar_registro.php?delhab&id='.$key['id_habitacion'].'" style="color:#FFFFFF" class="btn color_rojo">Eliminar</a>
        <button class="btn color_verde">Modificar</button></td>
</tr></form>');

}
 ?>
 </tbody>
</table>

  </div>
</div>

</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registrar Nuevas Habitaciones</h4>
      </div>

      <div class="modal-body">
 <form action="../controler/c_habitacion.php" method="POST" enctype="multipart/form-data" onsubmit="return valregistrar();">
  	
		  <div class="form-group">
          <label for="txtNumHabi">Numero Habitación: </label>
          <input type="text" name="txtNumHabi" class="form-control" id="txtNumHabi" required="" maxlength="3" onkeypress="ValidaSoloNumeros()" placeholder="ingrese numero habitación">
      </div>
        <div class="form-group">
          <label for="txtUbigeo">Ubigeo: </label>
          <input type="text" name="txtUbigeo" maxlength="30" class="form-control" id="txtUbigeo"  onkeypress="txNombres()" required="" >
      </div>
     
        <div class="form-group">
          <label>Tipo Habitacion : </label>
          <select required style="width:100%" class="form-control" name="cboTipo" >
              <?php 
              print('<option value="">seleccionar</option>');
              foreach ($rs as $key) {
              echo '<option value="'.$key['id_tipo_habitacion'].'">'.$key['descripcion'].'</option>';
              }

               ?>
          </select>
      </div>
        <div class="form-group">
          <label for="txtPrecio">Precio S/.: </label>
          <input type="text" name="txtPrecio" maxlength="6" class="form-control" id="txtPrecio" onkeypress="return NumCheck(event, this);"  required="" >
      </div>
       <div>
             <label>Imagen:</label>
                   <input id="input-21" type="file" name="foto" accept="image/*" required="">
                   
        </div>

      <br>
		   			<button type="submit" class="btn color_verde">R e g i s t r a r</button>
</form>
      </div>


      <div class="modal-footer">
        <a href="#" onclick="limpiar();" class="btn color_rojo" data-dismiss="modal">C a n c e l a r</a>
      
       </div>
    </div>
  </div>
</div>

<script language="javascript"> 
  function NumCheck(e, field) {
    key = e.keyCode ? e.keyCode : e.which
    if (key == 8) return true
    if (key > 47 && key < 58) {
      if (field.value == "") return true
      regexp = /.[0-9]{5}$/
      return !(regexp.test(field.value))
    }
    if (key == 46) {
      if (field.value == "") return false
      regexp = /^[0-9]+$/
      return regexp.test(field.value)
    }
    return false
  }
</script>
 <script>
                   
                    $("#input-21").fileinput({
                      previewFileType: "image",
                      browseClass: "btn btn-success",
                      browseLabel: "Pick Image",
                      browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
                      removeClass: "btn btn-danger",
                      removeLabel: "Delete",
                      removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
                      uploadClass: "btn btn-info",
                      uploadLabel: "Upload",
                      uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',
                    });

</script>