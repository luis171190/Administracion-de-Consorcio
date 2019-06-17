<?php

require_once('php/conn/connect.php');
require_once('fpdf/plantilla.php');

$id_consorcio= $_GET['idconsorcio'];
$id_periodo  = $_GET['idperiodo'];
$desc_per    = $_GET['desc_per'];
$mes         = $_GET['mes'];
$anio        = $_GET['anio'];

//consulta consorcio
$consulta               = "SELECT * FROM consorcio WHERE idconsorcio = $id_consorcio";
$resultado1             = $connect->query($consulta);
$fila1                  = mysqli_fetch_assoc ($resultado1);
$raz_soc                = $fila1['razon_social']; 
$lineacons              = 'CONSORCIO: "'.$raz_soc.'" - CUIT: '.$fila1['cuit']; 
$lineacons2             = $fila1['calle']. ''. $fila1['nro_calle']. ' - '. $fila1['localidad']. ' - '.  $fila1['provincia'];
$cont                   = 1;
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
$pdf->Cell(0 ,10,'LISTADO DE INGRESOS PERIODO '.$desc_per.'',0, 1 , 'C');
$pdf->Ln();
//$pdf->Cell(10 ,8,'Nro.',1, 0 , 'C');
$pdf->SetFont('Arial','I',10);
$pdf->Cell(25 ,8,'Fecha',1, 0 , 'C');
$pdf->Cell(115 ,8,'Descripcion',1, 0 , 'C');
$pdf->Cell(25 ,8,'Monto',1, 0 , 'C');
$pdf->Cell(20 ,8,'Liquidado',1, 1 , 'C');
$pdf->SetFont('Arial','',9);

//CONSULTA EGRESOS
$consulta2= "SELECT * FROM ingreso WHERE month (fecha_ingreso)=$mes AND year (fecha_ingreso)=$anio AND consorcio_idconsorcio=$id_consorcio  ORDER BY fecha_ingreso";
$resultado2=$connect->query($consulta2);


while ($fila2 = mysqli_fetch_assoc($resultado2))
    {

        $fecha          = $fila2 ['fecha_ingreso'];
        $monto          = $fila2 ['monto']; 
        $descripcion    = $fila2 ['descripcion'];
        $liq_idliq      = $fila2 ['liquidacion_idliquidacion'];
    
        if($liq_idliq > 0)
        {
            $es_liq = 'SI';
        }
        else
        {
            $es_liq = 'NO';
        }
          
            $pdf->Cell(25 ,8,''.$fecha.'',1, 0 , 'C');
            $pdf->Cell(115 ,8,''.$descripcion.'',1, 0 , 'C');
            $pdf->Cell(25 ,8,'$ '.$monto.'',1, 0 , 'C');
            $pdf->Cell(20 ,8,''.$es_liq.'',1, 1 , 'C');
            
        
     
    }

//
////DETALLE DE EGRESOS
//$pdf->SetFont('Arial','I',10);
//$pdf->Cell(185 ,10,'1) DETALLES DE EGRESOS',0, 1 , 'L');
//$pdf->Ln(2);
////TABLA DE EGRESOS


$pdf->Output();