<?php

require_once('../model/cnxn.php');
require_once('../model/m_producto.php');

$producto = new m_producto();
$table="";
if(isset($_GET['p'])&&isset($_GET['txtdes'])){

	    $val = $_GET['p'] ;
        $mensaje="";

		if($val==="Categoria"){
			$table="tb_categoria_producto";
			$pag="c";
		 }
		else{	

		//if($val==="Marca"){
			$table="tb_marca_producto";
			$pag="m";
		  // }
		   //else{$table=null;}
	     }



		$log=$producto->registro_m_c($table,$_GET['txtdes']);
		if($log==true){
			$mensaje= '<div align="center"><h1 class="h1">Se a Registrado correctamente</h1></div><script>
			function redireccionar(){window.location="'.$_SESSION['miweb'].'/Hostal/view/v_producto.php?p='.$pag.'";} 
			setTimeout ("redireccionar()", 500);

			</script>';
           //header("Location: ../view/v_producto.php?x=".$table."&i");
		}
		else{
           $mensaje= '<div align="center"><h1 class="h1">Error al Registrar</h1></div><script>
			function redireccionar(){window.location="'.$_SESSION['miweb'].'/Hostal/view/v_producto.php?p='.$pag.'";} 
			setTimeout ("redireccionar()", 500);
			</script>';
		}	
        
}

  if(isset($_POST['txt'])){
    $producto->modificar_precio_stock($_POST['txt'],$_POST['txtprecio'],$_POST['txtStock'],$_POST['txtdesc']);
  }


 else{
  	if(isset($_POST['txtCodigo'])){

$url="img";

$archivo=$_FILES['foto']['tmp_name'];
$nomArch=$_FILES['foto']['name'];

move_uploaded_file($archivo, $url."/".$nomArch);

$url=$url."/".$nomArch;



$val=$producto->registro_producto($_POST['txtCodigo'],$_POST['txtPrecio'],$_POST['txtStock'],$_POST['txtDescripcion'],
                                  $_POST['cboMarca'],$url,$_POST['txtmin'],$_POST['txtmax']);


if($val==true){
$mensaje= '<div align="center"><h1 class="h1">Se a Registrado correctamente</h1></div><script>
			function redireccionar(){window.location="'.$_SESSION['miweb'].'/Hostal/view/v_productom.php";} 
			setTimeout ("redireccionar()", 500);
			</script>';
}
 

else{
           $mensaje= '<div align="center"><h1 class="h1">Error al Registrar</h1></div><script>
			function redireccionar(){window.location="'.$_SESSION['miweb'].'/Hostal/view/v_productom.php";} 
			setTimeout ("redireccionar()", 500);
			</script>';
		}
 }
}
print($mensaje);





