<?php 


require_once('../inc/header_session.php');



 ?>
 <br>
 <br>

<div class="row">
  <div class="col-xs-1 col-sm-1 col-md-3"></div>
  <div class="col-xs-10 col-sm-10 col-md-6">
  	<form class="form-horizontal" method="POST" action="cn_cargo.php" onsubmit="return valModificar();">

  	   
  <div class="form-group">
    <label for="inputid" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
      <input type="text" name="id"value="<?php print($_GET['id']); ?>" class="form-control" id="inputid" placeholder="id_" readonly="readonly" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputcargo" class="col-sm-2 control-label">Cargo</label>
    <div class="col-sm-10">
      <input type="text" name="desc"value="<?php print($_GET['desc']); ?>" class="form-control" id="inputcargo" maxlength="20" placeholder="Descripción" onkeypress="txNombres()">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn color_verde" style="width:30%">Modificar</button>
       <a href="../view/v_cargo.php" type="submit" class="btn color_rojo" style="width:30%">Cancelar</a>
    </div>
    
  </div>
</form>
  </div>
  <div class="col-xs-1 col-sm-1 col-md-3"></div>
  
</div>

