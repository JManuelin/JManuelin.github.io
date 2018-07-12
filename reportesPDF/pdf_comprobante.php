<?php


/**
 * Description of lista_alumnoPDFgs
 *
 * @author EDS7
 */
require_once '../fpdf.php';
require_once '../model/cnxn.php';
require_once '../model/m_comprobante.php';
class pdf_comprobante  extends FPDF{
    //put your code here
}
session_start();
$numComprobante;
$tipoComprobante;
$ncomp;
$dato=$_SESSION['persona'];
                
$pdf= new pdf_comprobante('P','mm','A4');
$pdf->SetMargins(20, 18);
$pdf->AliasNbPages();
$pdf->AddPage();
if(isset($_SESSION['imprimir'])){

$numComprobante=$_SESSION['imprimir'];
$tipoComprobante=$_SESSION['ntipo'];


$pdf->SetTextColor(0x60,0x60,0x16);
$pdf->Image('../img/logo.png',180,10,25);

$pdf->SetFont("Arial","B",19);
$pdf->Cell(0,5,"Hostal Don Celso",0,1,'C');
$pdf->Cell(0,5,"*********************************",0,1,'C');
$pdf->SetTextColor(0x30,0x50,0x70);
$pdf->Cell(0,5,"",0,1,'C');
$pdf->Cell(0,5,"",0,1,'C');


$pdf->SetFont("Arial","B",13);
$pdf->Cell(0,5,"Comprobante de Alquiler",0,1,'L');
$pdf->Cell(0,5,"",0,1,'C');
$pdf->SetFont("Arial","",12);
$pdf->Cell(0,2,"Tipo Comprobante : ".$tipoComprobante,0,0,'L');
$pdf->Cell(0,5,"",0,1,'C');
    
$pdf->Cell(0,2,"".$_SESSION['info'],0,0,'L');
$pdf->Cell(0,5,"",0,1,'C');
$pdf->Cell(0,2,"Dato Cliente : ".$dato,0,0,'L');
$pdf->Cell(0,5,"",0,1,'C');
$pdf->Cell(0,2,"Num : $numComprobante",0,0,'L');


$pdf->Cell(0,5,"",0,1,'C');
$pdf->Cell(0,5,"",0,1,'C');

$m_comprobante=new m_comprobante();
$pdf->SetFont("Arial","b",9);

$pdf->SetTextColor(0x00,0x00,0x00);
$rs=$m_comprobante->listar_comprobante($numComprobante,$tipoComprobante);
 $pdf->Cell(40,8, "Num Habitacion",1,0,'C');
 $pdf->Cell(40,8, "Tipo Habitacion",1,0,'C');
 $pdf->Cell(35,8, "Cantidad ",1,0,'C');
 $pdf->Cell(35,8, "Precio ",1,0,'C');
 $pdf->Cell(35,8, " Importe",1,1,'C');

 $pdf->SetFont("Arial","",9);
  $suma=0;
foreach ($rs as $value) {
     $suma=($suma+$value['precio_total']);
    $pdf->Cell(40,5,$value['numero_hab'],1,0,'C');
    $pdf->Cell(40,5,$value['habitacion'],1,0,'C');  
    $pdf->Cell(35,5, "1",1,0,'C');  
    $pdf->Cell(35,5,$value['precio_total'],1,0,'C');
    $pdf->Cell(35,5,$value['precio_total'],1,1,'C');
 
}
}else
{
$pdf->SetFont("Arial","B",28);
$pdf->Cell(0,15,"Error de Comprobante !!!",0,1,'C');
}
$pdf->Cell(0,8,"",0,1,'C');
$pdf->Cell(0,8,"",0,1,'C');
$pdf->SetFont("Arial","B",18);
$pdf->Cell(0,15,"Total a pagar :" .$suma,0,1,'R');

$pdf->Cell(0,18,"",0,1,'C');
$pdf->SetFont("Arial","I",10);
$pdf->Cell(0,15,"Hostal Don Celso les da las Gracias por su prefencia" ,0,1,'C');
$pdf->Cell(0,15,"Fecha de Impresion : " .date("Y")."/".date("M")."/".date("d"),0,1,'L');
$pdf->Output();
unset($_SESSION['numhab']);
                unset($_SESSION['id_habitaciones']);
                unset($_SESSION['tipo_Habitacion']);
                unset($_SESSION['precio_habitacion']);
                unset($_SESSION['imprimir']);