 <?php

 require_once('../inc/header_session.php');
require_once('../inc/pagexit.php');
require_once('../model/m_producto.php');

 $m_producto = new m_producto();
$rsproducto = $m_producto->listar_m_c('v_productos');
$rscategoria = $m_producto->listar_m_c('tb_categoria_producto');
$rsmarca= $m_producto->listar_m_c('tb_marca_producto');
$ide="";

 ?>

<div style="padding:2%">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 Nuevo Producto
</button>
<br>
<br>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registrar Nuevos Productos</h4>
      </div>

      <div class="modal-body">
      <form method="POST" action="../controler/c_producto.php" enctype="multipart/form-data" onsubmit="return valregistrar();" >
              <div class="form-group">
                <label for="exampleInputEmail1">Codigo:</label>
                <input type="hidden" name="p" value="Producto">
                <input type="text" name="txtCodigo" maxlength="20" minlength="10" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Codigo">
              </div>
              <div>
             <label>Imagen:</label>
               <input  type="file" name="foto" accept="image/*" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Precio S/.: </label>
                <input type="text" name="txtPrecio" maxlength="6" onkeypress="return NumCheck(event, this);" class="form-control" id="exampleInputPassword1" required="" placeholder="S/ 0.00">
              </div>
              <div class="form-group">
                <label for="txtstockmin">Stock Min: </label>
                <input type="text" name="txtmin" maxlength="3" class="form-control" id="txtstockmin" onkeypress="ValidaSoloNumeros()" required="" placeholder="Stock minimo">
              </div>
              <div class="form-group">
                <label for="txtStockmax">Stock Max: </label>
                <input type="text" name="txtmax" maxlength="3" class="form-control" id="txtStockmax" onkeypress="ValidaSoloNumeros()" required="" placeholder="Stock maximo">
              </div>
             <div class="form-group">
                <label for="exampleInputPassword1">Stock: </label>
                <input type="text" name="txtStock" maxlength="3" class="form-control" id="exampleInputPassword1" onkeypress="ValidaSoloNumeros()" required="" placeholder="Stock">
              </div>
               <div class="form-group">
                <label for="exampleInputPassword1">Descripción: </label>
                <input type="text" name="txtDescripcion" maxlength="45" class="form-control" id="exampleInputPassword1" required="">
              </div>
              <div class="form-group">
                <label>Categoria: </label>
                <select class="form-control" name="cboCategoria" width="100%" onchange="load(this.value)">
             <option>seleccione</option>
             <?php
            foreach ($rscategoria as $key) {
              echo "<option value='".$key['id_categoria_producto']."'>".$key['descripcion_categoria']."</option>";
            }
             ?>
                </select>
              </div>
              <div id="myDiv">
                
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







<div class="row">
  <div class="col-sm-12 col-md-12 col-xs-12 table-responsive">
 
<table class="table" border="0">
<tr class="color_celeste" align="center">
<td >#</td>
<td>Codigo de referencia</td>
<td >Precio</td>
<td >Stock</td>
<td>Descripcion</td>
<td >Categoria</td>
<td >Marca </td>
<td class="btn-primary" colspan="2">Acción </td>


  </tr>
  <?php

foreach ($rsproducto as $key ) {
 
 echo ' <form method="POST" action="../controler/c_producto.php" onsubmit="return valModificar();">
 <tr>
<td><input class="btn" type="text" name="txt" value="'.$key['id_producto'].'" readonly="readonly"></td>
<td>'.$key['codigo_referencial'].'</td>
<td ><input class="btn" type="text" name="txtprecio"  onkeypress="return NumCheck(event, this);" value="'.$key['precio'].'"></td>
<td ><input class="btn" type="text" name="txtStock"  onkeypress="ValidaSoloNumeros()" maxlength="3" value="'.$key['stock'].'"></td>
<td><input class="btn" type="text" name="txtdesc" maxlength="45" value="'.$key['descripcion_producto'].'"></td>
<td >'.$key['descripcion_categoria'].'</td>
<td >'.$key['descripcion_marca'].'</td>
<td>
<a class="btn color_rojo" href="../del/eliminar_registro.php?delprod&id='.$key['id_producto'].'" >Eliminar</a>
</td>
<td><button class="btn btn-success" >Actualizar</button></td>
  </tr></form>';
}

  ?>
</table> 
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
xmlhttp.send("val="+str);
}

</script>



<style type="text/css">
.xcxc{width: 18%;}
</style>