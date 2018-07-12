<?php 
require_once('../model/m_permiso.php');
$m_permiso= new m_permiso();
$var=$_POST['val'];
if($var==0 || $var==1){
	$rs=$m_permiso->listar($var);
	print('<div class="table-responsive"><table id="myTable" class="table table-bordered">
           <thead><tr class="color_verde">
           <th>Nombre Pagina</th>
           <th>Categoria Pagina</th>
           <th>URL</th>
           <th>Estado</th>
           <th>Asignado a</th>           
           <th>Cambiar de Estado</th>           
           </tr></thead>
           <tbody>');
  
 foreach ($rs as $key ) {
 	$estado="Inactivo";
 	if($key['estado_permiso']==1){
 		$estado="Activo";
 	}
 	print('<tr >
           <th>'.$key['vista_permiso'].'</th>
           <th>'.$key['categoria_permiso'].'</th>
           <th>'.$key['url_pagina'].'</th>
           <th>'.$estado.'</th>
           <th>'.$key['descripcion_rol'].'</th>           
           <th><a href="javascript:cambiarestado('.$key['id_permiso'].')">Cambiar Estado</a></th>           
           </tr>');
 }

          print('</tbody>
		   </table>
		   </div>');
}


 ?>
 <script type="text/javascript">
 function cambiarestado(num)
    {  
        //var v = $("#txtND").attr("value");
        var v=num;
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "../controler/c_permiso.php",
            data: "val=" + v,
            beforeSend: inicioEnvio,
            success: llegada,
            timeout: 4000,
            error: problemas
        });
        return false;
    }
    
 </script>