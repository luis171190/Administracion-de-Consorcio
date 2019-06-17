<?php

require_once('php/conn/connect.php');
require_once('fpdf/plantilla.php');

$idanuncio = $_GET['idanuncio'];
$id_consorcio = $_GET['idconsorcio'];

//consulta consorcio
$consulta               = "SELECT * FROM consorcio WHERE idconsorcio = $id_consorcio";
$resultado1             = $connect->query($consulta);
$fila1                  = mysqli_fetch_assoc ($resultado1);
$raz_soc                = $fila1['razon_social']; 
$lineacons              = 'CONSORCIO: "'.$raz_soc.'" - CUIT: '.$fila1['cuit']; 
$lineacons2             = $fila1['calle']. ''. $fila1['nro_calle']. ' - '. $fila1['localidad']. ' - '.  $fila1['provincia'];
//recuperar anuncio
$consulta3 = "SELECT * FROM anuncio WHERE idanuncio = $idanuncio";
$resultado3= $connect->query($consulta3);
$fila3 = mysqli_fetch_assoc($resultado3);
$titulo = $fila3['titulo'];
$contenido = $fila3 ['contenido'];

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0);
//DATOS CONSORCIO
//$pdf->SetXY(75,35);
$pdf->SetFont('Arial','U',14);  
$pdf->Cell(0 ,10,''.$lineacons.'',0, 1 , 'C');
//$pdf->SetXY(75,43);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0 ,10,''.$lineacons2.'',0, 1 , 'C');
//
//
$pdf->Ln();
$pdf->SetXY(5,54);
$pdf->SetFont('Arial','U',11);  
$pdf->Cell(0 ,10,' '.$titulo.' ',0, 1 , 'C');
$pdf->Ln();
//$pdf->Cell(10 ,8,'Nro.',1, 0 , 'C');
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(0,10,''.$contenido.'',1,'C');


 



$pdf->Output();
?>