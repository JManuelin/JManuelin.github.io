 <?php 

 if(isset($_POST['q'])){
  require_once('../model/m_tipo_documento.php');
$m_tipo_documento= new m_tipo_documento();
$rs=$m_tipo_documento->listar_id($_POST['q']);
foreach ($rs as $key ) {
  print(' <div class="form-group">
          <label for="txtDesc">Numero Documento: *</label>
          <input type="text" maxlength="'.$key['longMax'].'" minlength="'.$key['longMin'].'"  name="txtNumero" class="form-control" id="txtDesc" required="" placeholder="ingrese numero documento" onkeypress="ValidaSoloNumeros()">
      </div>');
}



if($_POST['q']!=3){
  print('
     

    <div class="form-group">
          <label for="txtAp">Apellido Paterno: *</label>
          <input type="text" name="txtApaterno" class="form-control" minlength="2" maxlength="25"  id="txtAp"  required="" onkeypress="txNombres()">
      </div>');
  print('
      
        <div class="form-group">
          <label for="txtApm">Apellido Materno: *</label>
          <input type="text" name="txtAMaterno" class="form-control"  minlength="2" maxlength="25" id="txtApm" required="" onkeypress="txNombres()">
      </div>
');
}

}

else{

   require_once('../model/m_producto.php');
   $m_producto = new m_producto();
    $rsmarca= $m_producto->listar_marca_categoria($_POST['val']); 
   ?>
 <div class="form-group">
                <label for="exampleInputPassword1">Marca: </label>
                <select class="form-control" id="exampleInputPassword1" name="cboMarca" required="">
                   
                   <option>seleccione</option>

                   <?php
    
                    
                  foreach ($rsmarca as $key) {
                    echo "<option value='".$key['id_detalle']."'>".$key['descripcion_marca']."</option>";
                  }
    
                   ?>
                </select>
              </div>
   <?php
}



