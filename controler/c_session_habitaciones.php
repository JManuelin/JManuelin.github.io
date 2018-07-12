<?php 
session_start();
                        $_SESSION['numhab'][]='...';
						$_SESSION['id_habitaciones'][]='...';
						$_SESSION['tipo_Habitacion'][]='...';
						$_SESSION['precio_habitacion'][]='...';
if(isset($_GET['up'])){
	for($i=0;$i<count($_SESSION['id_habitaciones']);$i++){				
					$_SESSION['id_habitaciones'][$i]=0;
					$_SESSION['numhab'][$i]=0;
					$_SESSION['precio_habitacion'][$i]=0;
					$_SESSION['tipo_Habitacion'][$i]=null;				
			}
			header("Location: ../view/v_comprobante.php");		
}
else{  
         
    for($i=0;$i<count($_SESSION['id_habitaciones']);$i++){				
					if($_SESSION['numhab'][$i]===$_GET['nha']){
                        $val=1;
                        break;
                    }
       
			}
     if($val!=1){
                        $_SESSION['numhab'][]=$_GET['nha'];
						$_SESSION['id_habitaciones'][]=$_GET['id_'];
						$_SESSION['tipo_Habitacion'][]=$_GET['tipo_hab'];
						$_SESSION['precio_habitacion'][]=$_GET['precio_hab'];
            
        }
						
					
header('Location: ../view/v_habitacionh.php');
}

	
 ?>
