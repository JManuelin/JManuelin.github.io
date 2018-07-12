<?php 
require_once('../model/m_persona.php');
$m_persona = new m_persona();
$rspersona = $m_persona->busca_persona($_POST['val']);
$id=0;
$numerodoc="...";
$ApellidoParterno="...";
$ApellidoMarterno="...";
$Nombres="...";
$email="...";
$direccion="...";
$celular="...";
foreach ($rspersona as $key) {

$id=$key['ID_PERSONA'];
$numerodoc=$key['numero_documento'];
$ApellidoParterno=$key['apellidopater_persona'];
$ApellidoMarterno=$key['apellidomater_persona'];
$Nombres=$key['nombres_persona'];
$email=$key['email_persona'];
$direccion=$key['direccion_persona'];
$celular=$key['celular_persona'];	

}
print('<div class="row">');


	print('<div class="col-xs-12 col-sm-6 col-md-6">
		
			<form action="#" >
			  <div class="form-group">
			    <label for="nx1">Numero Documento</label>
			    <input type="text" value="'.$numerodoc.'"class="form-control" id="nx1" readonly="readonly">
			  </div>
			  <div class="form-group">
			    <label for="nx2">Apellido Paterno</label>
			    <input type="text" value="'.$ApellidoParterno.'"class="form-control" id="nx2" readonly="readonly">
			  </div> 
			  <div class="form-group">
			    <label for="nx3">Apellido Materno</label>
			    <input type="text" value="'.$ApellidoMarterno.'"class="form-control" id="nx3" readonly="readonly">
			  </div> 
			  <div class="form-group">
			    <label for="nx4">Nombres</label>
			    <input type="text" value="'.$Nombres.'"class="form-control" id="nx4" readonly="readonly">
			  </div> 
			
</div>');
		print('<div class="col-xs-12 col-sm-6 col-md-6">
		
			
			  <div class="form-group">
			    <label for="nx5">Email</label>
			    <input type="email"value="'.$email.'" class="form-control" id="nx5"readonly="readonly" >
			  </div>
			  <div class="form-group">
			    <label for="nx6">Direccion</label>
			    <input type="text" value="'.$direccion.'"class="form-control" id="nx6" readonly="readonly">
			  </div>
			   <div class="form-group">
			    <label for="nx7">Celular</label>
			    <input type="text" value="'.$celular.'"class="form-control" id="nx7" readonly="readonly">
			  </div> 
			  
			  	<div class="form-group">
			    <label for="nx7">Nota: -> </label>
			    <a href="../del/eliminar_registro.php?asig&id='.$id.'" class="btn color_verde" id="nx7" >Asignar a Empleados</a>
			  </div> 	   
			</form>
</div>');
	print('</div>');
 ?>