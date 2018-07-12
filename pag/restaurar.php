<?php
require_once('header.php');

session_start();
 $texto = "";
  $possible = "0123456789bcdfghjkmnpqrstvwxyz";
  $i = 0;
  while ($i < 7) {
    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
    $texto .= $char;
    $i++;
  }
$_SESSION['mitext']=$texto;
?>


<div style="padding:7% 2%;">
<div class="col-xs-12 col-sm-12 col-md-12" align="center">
 
  <div style="width:65%" class="colorlogin">
  <form class="form-horizontal" action="../controler/c_persona.php" method='POST' >
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label  colorlabel">Ingrese su E-mail</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputPassword3" placeholder="ingrese su correo electronico" name="txtemailrestore" required="">
    </div>
  </div>
<br><br>
<div class="form-group">
<label  class="col-sm-2 control-label  colorlabel"></label>
    <div class="col-sm-10 ">
      <p class="descf"><?php print($texto); ?></p>
    </div>
  </div>
<br><br>
   <div class="form-group">
    <label for="abc" class="col-sm-2 control-label  colorlabel">No soy un robot</label>
    <div class="col-sm-10">
      <input type="txte" class="form-control" id="abc" placeholder="digite el Captcha" name="txttext" required="">
    </div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10 col-xs-6">
    <button type="submit" class="btn btn-info btn-lg" style="width:100%" id="waitMe_ex">Enviar</button>
    </div>
  </div>
</form>

 </div>


</div> 
   
</div>
</body>
<style type="text/css">
  .descf{
                  padding:0%;
                  font-weight: bold;
                  font-style: italic;
                  text-shadow: 2px 2px 12px red, -6px -6px 12px blue ;
                  width:100%;
                  color:#000000;
                  font-variant: small-caps;
                  font-size: 3.5em;
                  line-height: 0.5em;
                  font-family: verdana,sans-serif;
                  -webkit-transform: rotate(-3deg); 
                  -moz-transform: rotate(-75deg);
                  letter-spacing: 1px; 
                  text-decoration: overline underline line-through;
  }
</style>