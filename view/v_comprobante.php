
<div style="padding:0%">


	<?php 

$valTemp;
$sumTotal=0.00;

require_once('../inc/header_session.php');

require_once('../model/m_comprobante.php');
require_once('../model/m_alquiler.php');

$m_comprobante = new m_comprobante();
$m_alquiler= new m_alquiler();
$rs= $m_comprobante->listar_tiposComprobantes();



if(isset($_GET['temp'])){
	for($i=0;$i<count($_SESSION['id_habitaciones']);$i++){
		if($_SESSION['id_habitaciones'][$i]==$_GET['temp']){
			$_SESSION['id_habitaciones'][$i]=0;
			$_SESSION['precio_habitacion'][$i]=0;
			$_SESSION['tipo_Habitacion'][$i]=null;
		}
	}
}
?>
<script>
    $(function(){
        
        $('#datepicker').datepicker();
        $('#datepicker').datepicker({ minDate: '0' });
    }); 
  
     var dateList = new Array();
dateList.push("20091012"); //¿ESTO QUE ES ? (NO es un timestamp válido)
dateList.push("20091019");
dateList.push("20091026");
dateList.push("20091110");

$("#datepicker").datepicker({
  minDate: $.datepicker.parseDate('yymmdd', dateList[0]), //this makes the datepicker start at the first available
  beforeShowDay: function(dateToShow){
    return [($.inArray($.datepicker.formatDate('yymmdd', dateToShow),dateList) >= 0), ""];
  }

});
</script>

<form name="form_" action="../controler/c_registro_alquiler.php" method="POST" onsubmit="return validate();">

<div class="row">
  <div class="col-sm-6 col-md-8"></div>

  <div class="col-xs-12 col-sm-6 col-md-4">
   <div class="col-xs-6 col-sm-6 col-md-6">
   Numero de Comprobante: 
   </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
   <input type="text"  class="form-control"value="<?php 
       
    if(isset($_SESSION['ncomprobante'])){
      echo $_SESSION['ncomprobante'];
          }
        ?>" 
    name="txtncomp" readonly="readonly">

   </div>
   <div class="col-xs-6 col-sm-6 col-md-6">
   Fecha: 
   </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
   <input type="text" class="form-control" name="txtFechaI" value="<?php echo date("d-M-Y"); ?>" readonly="readonly">
   </div>
  </div>
  </div>
  <div class="row">
  <div class="col-xs-12 col-sm-6 col-md-4">
    <div class="col-xs-6 col-sm-6 col-md-6">
   Ingrese N° Doc cliente:
   </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
   <input type="text" maxlength="15" onkeypress="ValidaSoloNumeros()" class="form-control" name="txtnDoc" value="<?php echo $_SESSION['numerodocumento'];?>"  >
   </div>
   <div class="col-xs-6 col-sm-6 col-md-6">
   Fecha de Salida: 
   </div>
    <div class="col-xs-6 col-sm-6 col-md-6" >
    <input type="text" id="datepicker" name="txtFechaf" class="form-control">    
   </div>
   <div class="col-xs-6 col-sm-6 col-md-6">
   Tipo Comprobante: 
   </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
   <select style="width:100%" class="form-control"name="cbocomprobante" onchange="location = this.options[this.selectedIndex].value;">
    
    <?php 
  
        if(isset($_SESSION['ncomprobante'])){
                
          echo '<option value="'.$_SESSION['n_id_comprobante'].'">'.$_SESSION['ntipo'].'</option>';
          echo '<option value="../controler/c_exit_n_session.php?del_sess">Re-Seleccionar</option>';
          
  
          }else{
            echo"<option>Seleccione</option>";
              foreach ($rs as $keyRs) {           
            echo '<option value="../controler/c_comprobante_id.php?n='.$keyRs['id_tipo_comprobante'].'&tipoc='.$keyRs['descripcion'].'">'.$keyRs['descripcion'].'</option>';
                 }
          }
  
     ?>
   </select>
   </div>
  </div>
<div class="col-xs-12 col-sm-6 col-md-2">
    <button class="btn btn-primary" style="width:100%">Alquilar</button>
  </div>
  <div class="col-xs-12 col-md-6"></div>
</div>
</form>
<br>
<?php
if(!isset($_SESSION['id_habitaciones'])){
echo "<h4>Comprobante vacio</h4>";
}else{
	echo '<div style="border-radius:3px 3px 3px 3px;text-align:center;padding:2%">
<div class="row ">
  <div class="col-xs-12 col-sm-12 col-md-12 ">
  	<table class="table table-bordered">
      <thead >
      	<tr >
      		<td class="btn btn-danger">N° Habitacion</td>
      		<td class="btn btn-danger">Tipo</td>
      		<td class="btn btn-danger">Precio S/.</td>
      		<td class="btn btn-danger">Acción</td>
      	</tr>
      </thead>
      <tbody> ';
	for($i=0;$i<count($_SESSION['id_habitaciones']);$i++){
		if($_SESSION['id_habitaciones'][$i]==0 || $_SESSION['tipo_Habitacion'][$i]==null || $_SESSION['precio_habitacion'][$i]==0){

		}else{
			$valTemp=$_SESSION['id_habitaciones'][$i];
			$sumTotal=($sumTotal+$_SESSION['precio_habitacion'][$i]);
			$_SESSION['sumTotal']=$sumTotal;
		echo '<tr>';
		echo '<td align="center">'.$_SESSION['numhab'][$i].'</td>';
		echo '<td>'.$_SESSION['tipo_Habitacion'][$i].'</td>';
		echo '<td>'.$_SESSION['precio_habitacion'][$i].'</td>';
		echo '<td align="center"><a href="v_comprobante.php?temp='.$valTemp.'" class="btn btn-danger btn-xs" width="100%">E l i m i n a r</a></td>';
		echo '</tr>';
	}
     	}
	echo '</tbody>
	</table>
  </div>  
  </div>';
  ?>
 <div class="col-sm-6 col-md-8">
 <div class="col-xs-6 col-sm-6 col-md-6">
 	<h4>Total a Pagar : </h4>
 </div>
 <div class="col-xs-6 col-sm-6 col-md-6">
 	<h4><?php echo  $sumTotal; ?></h4>
 </div>
 </div>
  <div class="col-xs-12 col-sm-6 col-md-4" align="right">
  <form action="../controler/c_session_habitaciones.php?up=c" method="POST" onsubmit="return validate();">
  	<button class="btn btn-default" >Cancelar Alquiler</button>
  	
  </form>  
  <?php if(isset($_SESSION['imprimir'])){
  		echo '<a href="../reportesPDF/pdf_comprobante.php" class="btn btn-success" target="_blank">imprimir mi comprobante</a>';
  		} ?>
  </div>
</div>	
<?php 
}

 ?>
</div>
<script>
function validate() {
    var result = confirm("Realmente desea generar el Alquiler?");
    return result;
}
function validar(){ 
var myDate=new Date(); 

myDate.setFullYear( form1.getElementbyName('anio').value , form1.getElementbyName('mes').value , form1.getElementbyName('dia').value ); 
if (myDate.getDay() == 0){ 
alert("No puedes usar un domingo)"; 
} 
}
</script>

