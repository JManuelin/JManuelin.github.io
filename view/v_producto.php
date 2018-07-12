<?php 

require_once('../inc/header_session.php');
require_once('../inc/pagexit.php');
require_once('../model/m_producto.php');

$m_producto = new m_producto();
$rscategoria = $m_producto->listar_m_c('tb_categoria_producto');
$rsmarca= $m_producto->listar_m_c('tb_marca_producto');


$val ="Producto";
if(isset($_GET['p'])){
	$val=$_GET['p'];
}

if($val==='c')	$val="Categoria";
if($val==='m')  $val="Marca";


 $table="tb_producto";
if($val==="Categoria")$table="tb_categoria_producto";
if($val==="Marca")$table="tb_marca_producto";

require_once('../model/m_producto.php');
$id="";
$descripcion="";
$producto = new m_producto();
if(isset($_GET['x'])){
  $table=$_GET['x'];
}

if($table==='tb_categoria_producto')
{
$id="id_categoria_producto";
$descripcion="descripcion_categoria";
$val="Categoria";
}else
{
  $id="id_marca_producto";
$descripcion="descripcion_marca";
$val="Marca";

};
$rs= $producto->listar_m_c($table);


?>


<div style="padding:0% 3%">
<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-8 ">
  
<form class="form-inline"  action="../controler/c_producto.php" method="GET" onsubmit="return valregistrar();">
  <div class="form-group">
    <label for="exampleInputName2"><?php echo $val ;?></label>
    <input type="hidden" name="p" value="<?php echo $val; ?>">
    <?php if($val==='Categoria'){
      ?>
      <input type="text"  class="form-control" id="exampleInputName2" placeholder="ingrese <?php echo $val ;?>" name="txtdes" required="" maxlength="15" onkeypress="txNombres()">
 
   <?php   }else{ ?>
        <input type="text"  class="form-control" id="exampleInputName2" placeholder="ingrese <?php echo $val ;?>" name="txtdes" required="" maxlength="15" onkeypress="txtmarca()">

      <?php  } ?>
    </div>
   <button type="submit" class="btn btn-primary" >Grabar</button>
</form>
      
</div>



<div class="col-xs-12 col-sm-6 col-md-4" align="center">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" >
 Asignar Marcas a Categoria
</button>
      <?php 
if(isset($_GET['u'])){
  print('<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Confirmación</strong> Registro Modificado Corectamente.
    </div>');
} ?>


  </div>
    </div>

<br>

  <div class="row">

  <div class="col-sm-12 col-md-12  col-xs-12 ">
  <table class="table table-bordered " id="myTable">
  <thead>
   <tr class="color_celeste">
    <th>#</th>
    <th>Descripcion</th>
    <th>Acción</th>
  </tr> 
  </thead>
  <tbody>
  <?php
foreach ($rs as $key) {
  echo '<tr>
 <td>'.$key[$id].'</td>
 <td>'.$key[$descripcion].'</td>
  <td><a href="../update/up_categoria_marca.php?id_='.$key[$id].'&desc='.$key[$descripcion].'&tbl='.$table.'">Modificar</a>
  </td>
  </tr>';
}?>

  
</tbody>
</table>
  
</div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Asignar Marcas a Categoria </h4>
      </div>

      <div class="modal-body">
 <form action="../controler/c_asignar_marca_cat.php" method="POST" >
     
      <div class="form-group">
          <label for="txtDesc">Select Marca: </label>
          <select name="cbomarcar" id="xmarca" required class="form-control">
              <option value="">Seleccione Marca</option>
              <?php 
               foreach($rsmarca as $keyMarca){
                   print('<option value="'.$keyMarca['id_marca_producto'].'">'.$keyMarca['descripcion_marca'].'</option>');
               }
              
              ?>
          </select>
      </div>
      <table class="table">
         <tr>
             <td>Descripción</td>
             <td>Asignar</td>
         </tr>
          <?php
          foreach($rscategoria as $keycat){
          echo '<tr>
              <td>'.$keycat['descripcion_categoria'].'</td>
              <td><input type="checkbox" name="categoria[]" value="='.$keycat['id_categoria_producto'].'"></td>
          </tr>';
          }
          ?>
      </table>
     
            <button type="submit" class="btn color_verde">R e g i s t r a r</button>
</form>
      </div>


      <div class="modal-footer">
        <a href="#" onclick="limpiar();" class="btn color_rojo" data-dismiss="modal">C a n c e l a r</a>
      
        </div>
    </div>
  </div>
</div>
