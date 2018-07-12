<?php
session_start();
$_SESSION['fi']=$_POST['finicial'];
$_SESSION['ff']=$_POST['ffinal'];

if(isset($_GET['exit'])){
	session_destroy();
}
header("Location: ../reserva.php?pag=2");

