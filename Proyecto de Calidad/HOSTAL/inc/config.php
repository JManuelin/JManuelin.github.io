<?php

require_once('../abs/controlador.php');
$abs= new controlador();
$rs=$abs->config();


foreach($rs as $conf){
 $_SESSION['miweb']=$conf['website'];
$_SESSION['igv']=$conf['igv'];   
}
