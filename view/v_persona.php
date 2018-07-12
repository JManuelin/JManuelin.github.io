<?php

 require_once('../inc/header_session.php');
require_once('../inc/pagexit.php');
 require_once('../model/m_tipo_documento.php');
 require_once('../model/m_persona.php');
 $m_tipo_documento = new m_tipo_documento();
 $m_persona= new m_persona();
 $getposicion=10;
 if(isset($_GET['pagina'])){
  $getposicion=$_GET['pagina'];
  if($getposicion<0){
    $getposicion=10;
  }
  if($getposicion==="all"){
    $getposicion=0;
  }
 }

 
 $rspersona= $m_persona->listar_persona($getposicion);
 $rs=$m_tipo_documento->listar();

 ?>
<div style="padding:0%">
<div class="row" style="padding:2%;border-bottom: 2px solid #088A85;">
  <div class="col-xs-12 col-sm-6 col-md-8" >
  <form class="form-inline" >  
    <a class="btn btn-primary " data-toggle="modal" data-target="#myModal">Nuevo persona</a>
  <div class="input-group">
        <input type="text" class="form-control" name="filtar" id="filtrar" placeholder="filtrar datos" aria-describedby="basic-addon2">
          <span class="input-group-addon" id="basic-addon2" type="submit"> </span>
    </div>
 </form>
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
<nav>
  <ul class="pager">
    <li class="previous"><a href="v_persona.php?pagina=<?php echo ($getposicion-10); ?>"><span aria-hidden="true">&larr;</span> A n t e r i o r</a></li>
    <li class="previous"><a href="v_persona.php?pagina=all"><span aria-hidden="true"></span> T o d o s</a></li>
    <li class="previous"><a href="v_persona.php?pagina=<?php echo ($getposicion+10); ?>">S i g u i e n t e <span aria-hidden="true">&rarr;</span></a></li>
  </ul>
</nav>


<div class="row table-responsive" id="contenedor">
  <div class="col-md-12 col-xs-12 col-xs-12" id="persona">
  	<table class="table  table-bordered table-condensed">
  <tr class="color_celeste" align="center">
    <td>#</td>
    <td>Numero Documento</td>
    <td>Datos</td>    
    <td>Dirección</td>
    <td>Celular</td>
    <td>Tlf.</td>
    <td>Email</td>
  </tr> 
  <?php 
    foreach ($rspersona as $key) {
      print('<tr  align="center">
    <td>'.$key['ID_PERSONA'].'</td>
    <td align="right">'.$key['numero_documento'].'</td>
    <td align="left">'.$key['apellidopater_persona'].' '.$key['apellidomater_persona'].' '.$key['nombres_persona'].'</td>
    <td>'.$key['direccion_persona'].'</td>
    <td>'.$key['celular_persona'].'</td>
    <td>'.$key['telefono_persona'].'</td>
    <td>'.$key['email_persona'].'</td>
    
  </tr>');
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
        <h4 class="modal-title" id="myModalLabel">Registrar Persona</h4>
      </div>

      <div class="modal-body">
 <form action="../controler/c_persona.php" method="POST" name="miform" onsubmit="return valregistrar();">
  		 <label>Tipo Doc.</label>
       <select required class="form-control" name="cboTipoDoc" id="cont" onchange="load(this.value)">
       <option value="">Seleccione tipo documento</option>
       <?php
          foreach ($rs as $key ) {
           
               echo "<option value='".$key['Id_tipodocumento']."'>".$key['nombre_documento']."</option>";
         }
       ?>
          
       </select>
		<div class="form-group">
          <label for="txtNombres">Nombre: *</label>
          <input type="text" name="txtNombres" class="form-control" id="txtNombres" minlength="2"  maxlength="30" required="" onkeypress="txNombres()">
      </div>
       <div id="myDiv">
         

       </div>
      
        <div class="form-group">
          <label for="txtDireccion">Dirección: *</label>
          <input type="text" name="txtDireccion" class="form-control" maxlength="45" id="txtDireccion" required="" >
      </div>
        <div class="form-group">
          <label for="txtCelular">Celular: </label>
          <input type="text" name="txtCelular" minlength="9" maxlength="9" class="form-control" id="txtCelular"  onkeypress="ValidaSoloNumeros()">
      </div>
       <div class="form-group">
          <label for="txtTlf">Telefono: </label>
          <input type="text" name="txtTlf"  maxlength="10" minlength="7"class="form-control" id="txtTlf" onkeypress="ValidaSoloNumeros()" >
      </div>
       <div class="form-group">
          <label for="txtEmail">Email: *</label>
          <input type="email" name="txtEmail" maxlength="45"  class="form-control" id="txtEmail"  >
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



<script type="text/javascript">
  
function load(str)
{
var xmlhttp;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","proc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+str);
}

</script>