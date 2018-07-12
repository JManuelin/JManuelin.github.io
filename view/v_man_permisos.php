<?php 
require_once('../inc/header_session.php');
require_once('../inc/pagexit.php');
 ?>

 <div style="padding:0% 1%">


	 <div class="row">
	 <div class="col-xs-12 col-sm-12 col-md-12">
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
        <input type="text" class="form-control"  onkeypress="ValidaSoloNumeros()"  onkeydown="ver()" name="val" id="txtND"  maxlength="15" placeholder="Ingrese N° Documento">
         </div>
        <button  class="btn btn-primary" id="buscarx">B u s c a r</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="javascript:verempleados();">ver cargos</a></li>
        <li><a href="javascript:verroles();">ver roles</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mis Paginas
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="javascript:paginas(1)">Paginas Activas</a></li>
            <li><a href="javascript:paginas(0)">Paginas Inactivas</a></li>
          
          </ul>
        </li>
      </ul>
   </div>
</div>
 
 	<div align="left" id="contenedor_home" style="padding:3%">
	
		    
	</div>


 </div>
 <script type="text/javascript">
   
var x;
    x = $(document);
    x.ready(run);

 function run()
    {
        var x;
        x = $("#buscarx");
        x.click(ver);
        
            }
    function ver()
    {  
        //var v = $("#txtND").attr("value");
        var v=document.getElementById("txtND").value;
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "../ajax/ajax_listar_personasid.php",
            data: "val=" + v,
            beforeSend: inicioEnvio,
            success: llegada,
            timeout: 4000,
            error: problemas
        });
        return false;
    }
     function paginas(num)
    {  
        //var v = $("#txtND").attr("value");
        var v=num;
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "../ajax/ajax_paginas.php",
            data: "val=" + v,
            beforeSend: inicioEnvio,
            success: llegada,
            timeout: 4000,
            error: problemas
        });
        return false;
    }

      function verempleados()
    {  
        var v=-1;
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "../ajax/ajax_listar_empleado.php",
            data: "val=" + v,
            beforeSend: inicioEnvio,
            success: llegada,
            timeout: 4000,
            error: problemas
        });
        return false;
    }     function verroles()
    {  
        var v=-1;
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "../ajax/ajax_listar_empleado_roles.php",
            data: "val=" + v,
            beforeSend: inicioEnvio,
            success: llegada,
            timeout: 4000,
            error: problemas
        });
        return false;
    }
 
    function inicioEnvio()
    {
        var x = $("#contenedor_home");
        x.html('Cargando...');
    }
    function llegada(datos)
    {
        $("#contenedor_home").html(datos);
    }
    function problemas()
    {
        $("#contenedor_home").text('Problemas en el servidor.');
    }
</script>

