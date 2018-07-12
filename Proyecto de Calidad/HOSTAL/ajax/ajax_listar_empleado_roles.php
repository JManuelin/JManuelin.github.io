<?php 
require_once('../model/m_persona.php');
require_once('../model/m_rol.php');
require_once('../abs/controlador.php');
 $abs = new controlador();

$m_persona = new m_persona();
$m_rol = new m_rol();

$obj=$m_persona->listar_empleado('v_empleado_rol');
$objrol=$m_rol->listar_roles();

 ?>
<div class="table-responsive">
<table id="myTable" class="table" >  
        <thead>  
          <tr class="color_verde">  
              
            <th>N| Doc</th>  
            <th>Apellidos</th>  
            <th>Nombres</th>  
            <th>Dirección</th>  
            <th>Email</th>  
            <th>Rol</th>  
            <th>Asigne Nuevo Rol</th>  
          </tr>  
        </thead>  
        <tbody>  
        <?php 
  
foreach ($obj as $key) {
   print('<tr>  
             
            <td>'.$key['numero_documento'].'</td>  
            <td>'.$key['apellidos'].'</td>  
            <td>'.$key['nombres_persona'].'</td>  
            <td>'.$key['direccion_persona'].'</td>  
            <td>'.$key['email_persona'].'</td>  
            <td>'.$key['descx'].'</td>  
            <td><select class="form-control" onchange="location = this.options[this.selectedIndex].value;">
            <option required value="">Seleccione</option>');
foreach ($objrol as $rol ) {
   
    
     $cant = $abs->devolver_cantidad('id_rol','tb_usuario','id_rol='.$rol['id_rol'].' and estado_usuario=1');
    if($cant>=3 && $rol['id_rol']==1){
        
    }else{
       print('<option value="../controler/c_permiso.php?asigrol&idpers='.$key['ID_PERSONA'].'&idrol='.$rol['id_rol'].'">'.$rol['descripcion_rol'].'</option>');  
    }
           
}
   print('</select></td></tr>');
}
         ?>
    </tbody>  
      </table> 
      </div>

<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>