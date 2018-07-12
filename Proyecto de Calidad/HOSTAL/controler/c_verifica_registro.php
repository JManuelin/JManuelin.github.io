<?php 
require_once('../model/m_persona.php');
$m_persona= new m_persona();
session_start();
if(isset($_SESSION['verificdoc'])&&isset($_SESSION['verificidreg'])){
		if(isset($_POST['txtclave1'])){
					$m_persona->cambiarClave($_POST['txtclave1'],$_SESSION['verificdoc'],$_SESSION['verificidreg']);	
					$val=$m_persona->cambios_personas('verificar',$_SESSION['verificdoc'],$_SESSION['verificidreg']);
					if($val==true){
						print('<h2>Los Cambios fueron correctos de click en el enlace para seguir</h2>');
					print('<a href="../pag/login.php">S e g u i r</a>');
				}
					
			}else{
			$m_persona->cambios_personas('delete',$_SESSION['verificdoc'],$_SESSION['verificidreg']);
			}
				
		}
		else{
			print('<h1>Error !!! </h1>');
		}


 ?>