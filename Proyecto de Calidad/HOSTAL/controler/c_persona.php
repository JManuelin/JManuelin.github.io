<?php
require_once('class.phpmailer.php');
require_once('class.smtp.php');
require_once('../model/m_persona.php');
$m_persona= new m_persona();
session_start();
$mail = new PHPMailer();
$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		$mail->Username = "rock061193@gmail.com";
		$mail->Password = "edson0611930";
		$mail->From = "rock061193@gmail.com";
		$mail->FromName = "Hostal don Celso";


if(isset($_POST['txtNumero'])){

$cboTipoDoc=$_POST['cboTipoDoc'];
$txtNumero=$_POST['txtNumero'];
$txtApaterno=null;
$txtAMaterno=null;
$txtNombres=$_POST['txtNombres'];

if(isset($_POST['txtAMaterno'])){
$txtAMaterno=$_POST['txtAMaterno'];
$txtApaterno=$_POST['txtApaterno'];
}

$txtDireccion=$_POST['txtDireccion'];
$txtCelular=$_POST['txtCelular'];	
$txtTlf=$_POST['txtTlf'];	
$txtEmail=$_POST['txtEmail'];


$id_persona=$m_persona->registrar($cboTipoDoc, $txtNumero, $txtApaterno, $txtAMaterno, $txtNombres, 
 		              $txtDireccion, $txtCelular, $txtTlf, $txtEmail);

$id_user=$m_persona->rgistrar_usuario($txtNumero,$id_persona);
$mail->Subject = "Welcome to Hostal Don Celso";
$mail->AltBody = "";
$mail->MsgHTML("<h1>Welcome to Hostal Don Celso</h1><hr>
	            <br><h4>verificacion de registro:</h4> ".$_SESSION['miweb']."/HOSTAL/view/vista_verficicar.php?ver=".$txtNumero."&id_temp=".$id_user."
	            <br><h4>no fui yo:</h4>".$_SESSION['miweb']."/HOSTAL/view/vista_verficicar.php?del=".$txtNumero."&id_temp=".$id_user."

	           ");
//$mail->AddAttachment("adjunto.txt");
$mail->AddAddress($txtEmail, "Usuario Prueba");

if($id_user!=null){
	
		$mensaje= '<div align="center"><h1 class="h1">Se a Registrado correctamente</h1></div><script>
			function redireccionar(){window.location="'.$_SESSION['miweb'].'/Hostal/view/v_persona.php";} 
			setTimeout ("redireccionar()", 500);

</script>';
}
else{
	$mensaje= '<div align="center"><h1 class="h1">Error al Registrar</h1></div><script>
			function redireccionar(){window.location="'.$_SESSION['miweb'].'/Hostal/view/v_persona.php";} 
			setTimeout ("redireccionar()", 500);

</script>';
	}

	print($mensaje);
}
	

if(isset($_POST['txtemailrestore'])){
	session_start();
	$txtNumero;
	$id_user;

	if($_POST['txttext']===$_SESSION['mitext']){
		$rsp=$m_persona->listar_persona_poremail($_POST['txtemailrestore']);
		foreach ($rsp as $key ) {
			$txtNumero=$key['numero_documento'];
			$id_user=$key['ID_PERSONA'];
		}
		$mail->Subject = "Restablesca su clave HDC";
		$mail->AltBody = "";
		$mail->MsgHTML("<h1>Restablecer clave</h1><hr>
			            <br><h4>vpara la restaurar su clave de click en el enlace:</h4> 
			            ".$_SESSION['miweb']."/HOSTAL/view/vista_verficicar.php?ver=".$txtNumero."&id_temp=".$id_user."
			           ");
		$mail->AddAddress($_POST['txtemailrestore'], "Usuario Prueba");
	
		header("Location: ../pag/restaurar.php?r");
	}else{
		header("Location: ../pag/restaurar.php?e");
	}
}
$mail->IsHTML(true);
$mail->Send();