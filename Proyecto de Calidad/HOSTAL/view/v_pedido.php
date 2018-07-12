<?php 
require_once('../inc/header_session.php');
require_once('../inc/pagexit.php');
require_once('../model/m_pedido.php');
$m_pedido =  new m_pedido();
$rspedidos = $m_pedido->listar_pedidos();
$c=1;
 ?>
 <div class="row" style="padding:2%" align="center">
 	<div class="col-xs-12 col-sm-4 col-md-3"> 
 	    
 	    <h3>Lista de Pedidos</h3>
 	    <button class="btn btn-default" id="open" style="width:100%">Ver Entregados</button><br>
 	    <?php 

 		foreach ($rspedidos as $key ) {
           
 		   print('<input   id="buscaAjax'.$c.'"  type="hidden" name="val" value="'.$key['id_pedido'].'" > ');                       
           print('<a href="#"  id="buscador'.$c.'" class="btn btn-success" style="width:100%;padding:4%">'.$key['fecha'].'</a>');
           $c++;

   } 

 		 ?>
 	</div>
 	<div class="col-xs-12 col-sm-8 col-md-9" id="carga_contenido">
 	<h1 class="h1"> Detalle de Pedidos</h1>
 	</div>
 	</div>
 </div>
 <script type="text/javascript">
   
  
    <?php 
for($i=1;$i<=$c;$i++){
	print('  var x'.$i.';
    x'.$i.' = $(document);
    x'.$i.'.ready(inicio'.$i.');');

	print('  function inicio'.$i.'()
    {
        var x'.$i.';
        x'.$i.' = $("#buscador'.$i.'");
        x'.$i.'.click(enviar'.$i.');
        
    }
    function enviar'.$i.'()
    {  
        var v = $("#buscaAjax'.$i.'").attr("value");
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "../ajax/ajax_detalle_pedido.php",
            data: "val=" + v,
            beforeSend: inicioEnvio,
            success: llegada,
            timeout: 4000,
            error: problemas
        });
        return false;
    }');
}
 
    
    ?>
    function inicioEnvio()
    {
        var x = $("#carga_contenido");
        x.html('Cargando...');
    }
    function llegada(datos)
    {
        $("#carga_contenido").html(datos);
    }
    function problemas()
    {
        $("#carga_contenido").text('Problemas en el servidor.');
    }
</script>
<script type="text/javascript">
   
var x;
    x = $(document);
    x.ready(run);

 function run()
    {
        var x;
        x = $("#open");
        x.click(ver);
        
    }
    function ver()
    {  
        var v = $("#open").attr("value");
        $.ajax({
            async: true,
            type: "POST",
            dataType: "html",
            contentType: "application/x-www-form-urlencoded",
            url: "../ajax/ajax_listar_atendidos.php",
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
        var x = $("#carga_contenido");
        x.html('Cargando...');
    }
    function llegada(datos)
    {
        $("#carga_contenido").html(datos);
    }
    function problemas()
    {
        $("#carga_contenido").text('Problemas en el servidor.');
    }
</script>