<?php 


require_once('../inc/header_session.php');



 ?>
 <br>
 <br>

<div class="row">
  <div class="col-xs-1 col-sm-1 col-md-3"></div>
  <div class="col-xs-10 col-sm-10 col-md-6">
  	<form class="form-horizontal" method="POST" action="cn_categoria_marca.php" onsubmit="return valModificar();">

  	  <input type="hidden" name="txttable"value="<?php echo $_GET['tbl']; ?>" class="form-control" >
    
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Id</label>
    <div class="col-sm-10">
      <input type="text" readonly="readonly" name="id"value="<?php echo $_GET['id_']; ?>" class="form-control" id="inputEmail3" placeholder="id_" >
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Descripción</label>
    <div class="col-sm-10">
      <input type="text" name="desc"value="<?php echo $_GET['desc']; ?>" class="form-control" id="inputPassword3" placeholder="Descripción">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn color_verde" style="width:30%">Modificar</button>
       <a href="../view/v_producto.php?p=c" type="submit" class="btn color_rojo" style="width:30%">Cancelar</a>
    </div>
    
  </div>
</form>
  </div>
  <div class="col-xs-1 col-sm-1 col-md-3"></div>
  
</div>

 