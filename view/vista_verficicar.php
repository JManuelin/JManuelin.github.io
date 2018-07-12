<?php 
session_start();

$_SESSION['verificidreg']=$_GET['id_temp'];
$_SESSION['verificdoc']=0;
 ?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<style type="text/css">
        body{
background-image: url(../img/wallapaperslogin.jpg);
  }
  .colorlogin{
    padding: 4%;
    background: -moz-linear-gradient(top,  rgba(0,0,0,0.65) 62%, rgba(0,0,0,0.65) 74%, rgba(0,0,0,0.65) 93%, rgba(0,0,0,0) 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(62%,rgba(0,0,0,0.65)), color-stop(74%,rgba(0,0,0,0.65)), color-stop(93%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0))); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  rgba(0,0,0,0.65) 62%,rgba(0,0,0,0.65) 74%,rgba(0,0,0,0.65) 93%,rgba(0,0,0,0) 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  rgba(0,0,0,0.65) 62%,rgba(0,0,0,0.65) 74%,rgba(0,0,0,0.65) 93%,rgba(0,0,0,0) 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  rgba(0,0,0,0.65) 62%,rgba(0,0,0,0.65) 74%,rgba(0,0,0,0.65) 93%,rgba(0,0,0,0) 100%); /* IE10+ */
    background: linear-gradient(to bottom,  rgba(0,0,0,0.65) 62%,rgba(0,0,0,0.65) 74%,rgba(0,0,0,0.65) 93%,rgba(0,0,0,0) 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 ); /* IE6-9 */
  
  }
  .colorlabel{
    color:#FFFFFF;
    font-size: 19px;
  }
</style>
<?php 
if(isset($_GET['ver'])){
	$_SESSION['verificdoc']=$_GET['ver'];
?>
<div style="width:100%;background-color:#FFFFFF;padding:3%;border-bottom: 4px solid;" align="center">
<h4  style="display: block;
color:#01DFA5;
border-bottom: 5px solid #01DFA5;
font-size: 2em;
margin-before: 0.67em;
margin-after: 0.67em;
margin-start: 0;
margin-end: 0;
font-weight: bold;">Cambie su Contraseña</h4>
</div>
<div style="padding:7% 2%;">
<div class="col-xs-12 col-sm-12 col-md-12" align="center">
 
  <div style="width:65%" class="colorlogin">
  <form class="form-horizontal" action="../controler/c_verifica_registro.php" method='POST' onsubmit="return validate();">
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label colorlabel ">Nueva contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputEmail3" placeholder="nueva clave" name="txtclave1" required="">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label  colorlabel">Confirma contraseña</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="confirmar clave" name="txtclave2" required="">
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10 col-xs-6">
      <button type="submit" class="btn btn-info btn-lg" style="width:100%" id="waitMe_ex">Entrar</button>
    </div>
  </div>
</form>
 </div>


</div> 
   
</div>
<?php
}
if(isset($_GET['del'])){
$_SESSION['verificdoc']=$_GET['del'];
print('<div style="padding:10%;"align="center" class="color">');
print('<a class="btn btn-info" href="../controler/c_verifica_registro.php?del" style="width:50%;padding:1%">Darme de Baja</a>');
print('</div>');

}
 ?>
 <script>
function validate() {
	
	var p1 = document.getElementById("inputEmail3").value;
    var p2 = document.getElementById("inputPassword3").value;

    if(p1==p2){
    	return true;
    }else{
    	alert("Las claves deben de ser iguales...");
    }
    
  return false;
}
</script>
<style type="text/css">
	.color{
		 background: -moz-linear-gradient(top,  rgba(0,0,0,0.65) 62%, rgba(0,0,0,0.65) 74%, rgba(0,0,0,0.65) 93%, rgba(0,0,0,0) 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(62%,rgba(0,0,0,0.65)), color-stop(74%,rgba(0,0,0,0.65)), color-stop(93%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0))); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  rgba(0,0,0,0.65) 62%,rgba(0,0,0,0.65) 74%,rgba(0,0,0,0.65) 93%,rgba(0,0,0,0) 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  rgba(0,0,0,0.65) 62%,rgba(0,0,0,0.65) 74%,rgba(0,0,0,0.65) 93%,rgba(0,0,0,0) 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  rgba(0,0,0,0.65) 62%,rgba(0,0,0,0.65) 74%,rgba(0,0,0,0.65) 93%,rgba(0,0,0,0) 100%); /* IE10+ */
    background: linear-gradient(to bottom,  rgba(0,0,0,0.65) 62%,rgba(0,0,0,0.65) 74%,rgba(0,0,0,0.65) 93%,rgba(0,0,0,0) 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 ); /* IE6-9 */

	}
</style>