<?php 
require_once('../model/m_persona.php');
require_once('../model/m_rol.php');
require_once('../abs/controlador.php');
 $abs = new controlador();

$m_persona = new m_persona();
$m_rol = new m_rol();

$obj=$m_persona->listar_empleado('v_empleados');
$objrol=$m_rol->listar_cargos();




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
            <th>cargo</th>  
            <th>Asigne Nuevo cargo</th>  
            <th>Dar de baja</th>
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
foreach ($objrol as $cargo ) {
    $cant = $abs->devolver_cantidad('id_cargo','tb_empleado','id_cargo='.$cargo['id_cargo'].' and estado=1');
    
    if($cant>=3 && $cargo['id_cargo']==1){
        
    }else{
       print('<option value="../controler/c_permiso.php?                               asigcargo&idpers='.$key['ID_PERSONA'].'&idrol='.$cargo['id_cargo'].'">'.$cargo['cargo'].'</option>'); 
    }
    
}
   print('</select></td>
   <td><a href="../update/permiso.php?idp='.$key['id_usuario'].'&id='.$key['id_empleado'].'" style="color:red"> Eliminar </a></td></tr>');
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