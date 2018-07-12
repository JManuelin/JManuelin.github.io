<?php
require_once('../abs/controlador.php');
$control= new controlador();
$tabla="tb_cm_producto";
$marca=$_POST['cbomarcar'];

if ( !empty($_POST["categoria"]) && is_array($_POST["categoria"]) ) { 
    
    foreach ( $_POST["categoria"] as $check ) { 
        
        $check=str_replace('=','',$check);
        $values="null,$check,$marca";
        /* verifica exitencia*/
        
        $condicion=" id_categoria_producto=$check and id_marca_producto=$marca ";
        $rs=$control->devolver_id($tabla,$condicion);
                 
            if($rs!=null ){
                
            }else{
                $log=$control->insert($tabla,$values); 
                
            }
           
     }    
}
$mensaje= '<div align="center"><h1 class="h1">Procesando...</h1></div><script>
			function redireccionar(){javascript:history.back();} 
			setTimeout ("redireccionar()", 500);</script>';
echo $mensaje;

?>