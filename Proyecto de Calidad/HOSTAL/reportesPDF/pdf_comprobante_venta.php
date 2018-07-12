<?php 
require_once '../fpdf.php';
require_once '../model/cnxn.php';
require_once '../model/m_comprobante.php';
require_once '../abs/controlador.php';

class pdf_comprobante_venta  extends FPDF{
   
}
$pdf= new pdf_comprobante_venta('P','mm','A4');
$m_comprobante = new m_comprobante();

$abs= new controlador();
session_start();
$select="concat(apellidopater_persona,'/',apellidomater_persona,'/', nombres_persona)dato";
$tabla="tb_persona p , tb_usuario u";
$condicion="u.id_persona=p.id_persona and id_usuario=".$_SESSION['idcliente'];

$rscliente =$abs->listarDetalle_especifico($select,$tabla,$condicion);


if(isset($_GET['pdf'])){
$rs=$m_comprobante->listar_detalle_venta($_GET['pdf']);

$pdf->SetMargins(20, 18);
$pdf->AliasNbPages();
$pdf->AddPage();

$tipocomprobante=null;
$numComprobante=0;
$fecha;
$subtotal;
$igv;
$total=0;
foreach ($rs as $key) {
$tipocomprobante=$key['descripcion'];
$fecha=$key['fecha'];
$total=$key['precio_total'];
$subtotal=$key['subtotal'];
$igv=$key['IGV_IVA'];
$numComprobante=$key['numero_comprobante'];
}
$pdf->SetTextColor(0x60,0x60,0x16);
$pdf->Image('../img/logo.png',180,10,25);

$pdf->SetFont("Arial","B",19);
$pdf->Cell(0,5,"Hostal Don Celso",0,1,'C');
$pdf->Cell(0,5,"*********************************",0,1,'C');
$pdf->SetTextColor(0x30,0x50,0x70);
$pdf->Cell(0,5,"",0,1,'C');
$pdf->Cell(0,5,"",0,1,'C');


$pdf->SetFont("Arial","B",13);
$pdf->Cell(0,5,"Comprobante de Pedidos",0,1,'L');
$pdf->Cell(0,5,"",0,1,'C');
$pdf->SetFont("Arial","",12);
$pdf->cell(0,2,"Cliente:".$rscliente,0,0,'L');
$pdf->Cell(0,5,"",0,1,'C');
$pdf->Cell(0,2,"Tipo Comprobante : ".$tipocomprobante,0,0,'L');
$pdf->Cell(0,5,"",0,1,'C');
$pdf->Cell(0,2,"Num :".$numComprobante,0,0,'L');


$pdf->Cell(0,5,"",0,1,'C');
$pdf->Cell(0,5,"",0,1,'C');


$pdf->SetFont("Arial","b",9);

$pdf->SetTextColor(0x00,0x00,0x00);

 $pdf->Cell(30,8, "Categoria",1,0,'C');
 $pdf->Cell(30,8, "Marca",1,0,'C');
 $pdf->Cell(40,8, "producto ",1,0,'C'); 
 $pdf->Cell(25,8, "cantidad ",1,0,'C');
 $pdf->Cell(25,8, "Precio ",1,0,'C');
 $pdf->Cell(25,8, " Importe",1,1,'C');

 $pdf->SetFont("Arial","",9);
foreach($rs as $keyx) {
 $pdf->Cell(30,8, $keyx['descripcion_categoria'],1,0,'C');
 $pdf->Cell(30,8, $keyx['descripcion_marca'],1,0,'C');
 $pdf->Cell(40,8, $keyx['descripcion_producto'] ,1,0,'C'); 
 $pdf->Cell(25,8, $keyx['cantidad'] ,1,0,'C');
 $pdf->Cell(25,8, $keyx['precio'] ,1,0,'C');
 $pdf->Cell(25,8,  $keyx['importe'],1,1,'C');
}

}
else
{
$pdf->SetFont("Arial","B",28);
$pdf->Cell(0,15,"Error de Comprobante !!!",0,1,'C');
}
$pdf->Cell(0,8,"",0,1,'C');
$pdf->Cell(0,8,"",0,1,'C');
$pdf->SetFont("Arial","B",18);
$pdf->Cell(0,15,"Total a pagar :" .$total,0,1,'R');

$pdf->Cell(0,18,"",0,1,'C');
$pdf->SetFont("Arial","I",10);
$pdf->Cell(0,15,"Hostal Don Celso les da las Gracias por su prefencia" ,0,1,'C');
$pdf->Cell(0,15,"Fecha de Impresion : " .date("Y")."/".date("M")."/".date("d"),0,1,'L');
$pdf->Output();



