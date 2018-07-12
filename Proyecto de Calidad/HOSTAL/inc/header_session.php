   <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/datepicker.css">
   
 
   <script type="text/javascript" src="../js/jquery.js"></script>
   <script type="text/javascript" src="../js/jquery.min.js"></script>
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery-2.1.3.min.js"></script>
   <script src="../js/validaciones.js"></script>

<script src="../js/jsmin.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="../css/tbmin.css">
<script type="text/javascript" src="../js/tbmin.js"></script>

   <style type="text/css">
   .colorlogin{
    
    padding: 4%;
    background: -moz-linear-gradient(top,  rgba(0,0,0,0.65) 62%, rgba(0,0,0,0.65) 74%, rgba(0,0,0,0.65) 93%, rgba(0,0,0,0) 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(62%,rgba(0,0,0,0.65)), color-stop(74%,rgba(0,0,0,0.65)), color-stop(93%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0))); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  rgba(0,0,0,0.65) 62%,rgba(0,0,0,0.65) 74%,rgba(0,0,0,0.65) 93%,rgba(0,0,0,0) 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  rgba(0,0,0,0.65) 62%,rgba(0,0,0,0.65) 74%,rgba(0,0,0,0.65) 93%,rgba(0,0,0,0) 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  rgba(0,0,0,0.65) 62%,rgba(0,0,0,0.65) 74%,rgba(0,0,0,0.65) 93%,rgba(0,0,0,0) 100%); /* IE10+ */
    background: linear-gradient(to bottom,  rgba(0,0,0,0.65) 62%,rgba(0,0,0,0.65) 74%,rgba(0,0,0,0.65) 93%,rgba(0,0,0,0) 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 ); /* IE6-9 */

  }
  .colorx{
background: #ebf1f6; /* Old browsers */
background: -moz-linear-gradient(top,  #ebf1f6 0%, #abd3ee 50%, #89c3eb 51%, #d5ebfb 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ebf1f6), color-stop(50%,#abd3ee), color-stop(51%,#89c3eb), color-stop(100%,#d5ebfb)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #ebf1f6 0%,#abd3ee 50%,#89c3eb 51%,#d5ebfb 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #ebf1f6 0%,#abd3ee 50%,#89c3eb 51%,#d5ebfb 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #ebf1f6 0%,#abd3ee 50%,#89c3eb 51%,#d5ebfb 100%); /* IE10+ */
background: linear-gradient(to bottom,  #ebf1f6 0%,#abd3ee 50%,#89c3eb 51%,#d5ebfb 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ebf1f6', endColorstr='#d5ebfb',GradientType=0 ); /* IE6-9 */

}
    </style>
  


<?php
session_start();
require_once('../model/m_permiso.php');

$m_permiso = new m_permiso();
  

if(isset($_SESSION['xxtime'])){
    if($_SESSION['xxtime']<time()){
     session_destroy();
     unset($_SESSION['xid']);
    }
 }

  $_SESSION['xtime']=time();  //5
  $tiempodeespera=600;//2min
  $_SESSION['xxtime']=($tiempodeespera+$_SESSION['xtime']);//15

if(isset($_SESSION['xid'])){
  
  
?>

<body style="background-color: #FFFFFF;">



 <div class="navbar-wrapper" style="padding:0%;marging:0%" >
      <div class="" >

        <nav class="navbar navbar-inverse navbar-static-top" >
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">HDC</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <?php
                   $stm = $m_permiso->validar_paginas($_SESSION['rol']);
                   $_SESSION['NAVGROUP'][]="...";
                   $_SESSION['NAV'][]="...";
               
                   foreach ($stm as $key) {
                    
                    if($key['cont']>1){

                    print('<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"                               aria-expanded="false">'.$key['categoria_permiso'].' 
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">');
                               $sql=$m_permiso->generarNav($_SESSION['rol'],$key['categoria_permiso']);
                             foreach ($sql as $rs) {
                              echo ' <li ><a href="'.$rs['url_pagina'].'" >'.$rs['vista_permiso'].'</a></li>';
                               $_SESSION['NAVGROUP'][]= str_replace('../','/Hostal/',$rs['url_pagina']); 
                             }
                             print('
                            </ul>
                          </li>');
                    }
                  else{
                          $sql=$m_permiso->generarNav($_SESSION['rol'],$key['categoria_permiso']);
                          foreach ($sql as $rs) {
                              echo ' <li><a href="'.$rs['url_pagina'].'">'.$rs['vista_permiso'].'</a></li>';
                              $_SESSION['NAV'][]= str_replace('../','/Hostal/',$rs['url_pagina']); 
                          }
                  }
                                       
                  }

     
                  ?>
              </ul>
            </div>
          </div>
        </nav>
       
      </div>
    </div>
    
</body>

  
      <?php

    }
    else
    {
      header("Location: ../index.php");
    }
    ?>

    <script language="javaScript"> 

var message = ""; 

function clickIE(){ 
if (document.all){ 
(message); 
return false; 
} 
} 

function clickNS(e){ 
if (document.layers || (document.getElementById && !document.all)){ 
if (e.which == 2 || e.which == 3){ 
(message); 
return false; 
} 
} 
} 

if (document.layers){ 
document.captureEvents(Event.MOUSEDOWN); 
document.onmousedown = clickNS; 
} else { 
document.onmouseup = clickNS; 
document.oncontextmenu = clickIE; 
} 
document.oncontextmenu = new Function("return false"); 
</script> 
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>