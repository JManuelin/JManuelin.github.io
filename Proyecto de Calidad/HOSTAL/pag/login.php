<?php
require_once('header.php');
session_start();

?>

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

<div style="padding:7% 2%;">
<div class="col-xs-12 col-sm-12 col-md-12" align="center">
 
  <div style="width:65%" class="colorlogin">
  <form class="form-horizontal" action="../controler/c_login.php" method='POST' >
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label colorlabel ">Usuario</label>
    <div class="col-sm-10">
      <input type="text" onkeypress="ValidaSoloNumeros()" maxlength="20" class="form-control" id="inputEmail3" placeholder="Usuario" name="txt_email" required="">
    </div>
  </div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label  colorlabel">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="txt_clave" required="">
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10 col-xs-6">
    <button type="submit" class="btn btn-info btn-lg" style="width:100%" id="waitMe_ex">Entrar</button>
    </div>
  </div>
</form>
<a href="restaurar.php">olvide mi clave</a>
<?php if(isset($_SESSION['error'])){
  print('<h5 style="color:red;">'.$_SESSION['error'].'</h5>');
} 

  ?>


 </div>


</div> 
   
</div>
</body>
<script type="text/javascript">
  function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) {
     event.returnValue = false;
    
 }
else{
     
 }
  
    
}
</script>