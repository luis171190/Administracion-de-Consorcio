<?php

require_once('php/conn/connect.php');
require_once('fpdf/plantilla.php');

$id_consorcio = $_GET['idconsorcio'];
$idunidad     = $_GET['idunidad'];

//consulta consorcio
$consulta               = "SELECT * FROM consorcio WHERE idconsorcio = $id_consorcio";
$resultado1             = $connect->query($consulta);
$fila1                  = mysqli_fetch_assoc ($resultado1);
$raz_soc                = $fila1['razon_social']; 
$lineacons              = 'CONSORCIO: "'.$raz_soc.'" - CUIT: '.$fila1['cuit']; 
$lineacons2             = $fila1['calle']. ''. $fila1['nro_calle']. ' - '. $fila1['localidad']. ' - '.  $fila1['provincia'];

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
$pdf->Cell(0 ,10,'LISTADO DE MORA ',0, 1 , 'C');
$pdf->Ln();
//$pdf->Cell(10 ,8,'Nro.',1, 0 , 'C');
$pdf->SetFont('Arial','I',10);

$pdf->Cell(10 ,8,'',1, 0 , 'C');
$pdf->Cell(15 ,8,'Piso',1, 0 , 'C');
$pdf->Cell(15 ,8,'Depto.',1, 0 , 'C');
$pdf->Cell(45 ,8,'Detalle.',1, 0 , 'C');
$pdf->Cell(27 ,8,'Monto s/i',1, 0 , 'C');
$pdf->Cell(27 ,8,'Fecha Venc.',1, 0 , 'C');
$pdf->Cell(27 ,8,utf8_decode('Interés'),1, 0 , 'C');
$pdf->Cell(27 ,8,'Total',1, 1 , 'C');
$pdf->SetFont('Arial','',9);

$consulta_t="SELECT * FROM liquidacion INNER JOIN liquidacion_unidad INNER JOIN unidad INNER JOIN pago_liquidacion INNER JOIN periodo ON periodo_idperiodo=idperiodo AND idliquidacion=liquidacion_idliquidacion AND consorcio_idconsorcio=$id_consorcio  AND unidad_idunidad=idunidad AND idliquidacion_unidad= liquidacion_unidad_idliquidacion_unidad AND estado =0  AND unidad_idunidad=$idunidad ORDER BY idperiodo";
$resultado_t=$connect->query($consulta_t);
date_default_timezone_set("America/Argentina/Buenos_Aires");
$dma=date("Y/m/d");
$c=1;
    while($fila_t=mysqli_fetch_assoc($resultado_t))
            
        {
            if($fila_t['estado_liq']=='pendiente')
            {
                
            }
            else
            {
           $piso=$fila_t['piso'];
           $dpto=$fila_t['departamento'];
           $monto=$fila_t['monto_si'];
        $anio=$fila_t['anio'];
        $desc_per=$fila_t['descripcion_periodo'];
        $periodo2=$desc_per.'-'.$anio;
         //obtener fecha actual.
 
            //fecha de vencimiento
            $fech_venc=$fila_t['fecha_venc'];
           $dias= (strtotime($dma)-strtotime($fech_venc))/86400;
	     //  $dias = abs($dias); 
            $dias = floor($dias);	
            if($dias<0)
            {
                $interes=0;
            }
            else
            {
            $interes=0.03*$monto*$dias;
            }
            $t_interes=$monto+$interes;
            
                  $pdf->Cell(10 ,8,''.$c.'',1, 0 , 'C');
                    $pdf->Cell(15 ,8,''.$piso.'',1, 0 , 'C');
                    $pdf->Cell(15 ,8,''.$dpto.'',1, 0 , 'C');
                    $pdf->Cell(45 ,8,''.$periodo2.'',1, 0 , 'C');
                    $pdf->Cell(27 ,8,'$ '.$monto.'',1, 0 , 'C');
                    $pdf->Cell(27 ,8,''.$fech_venc.'',1, 0 , 'C');
                    $pdf->Cell(27 ,8,'$ '.$interes.'',1, 0 , 'C');
                    $pdf->Cell(27 ,8,'$ '.$t_interes.'',1, 1 , 'C');
           
        }
       
              $c=$c+1;      
                  
              //}
            }
 
     $c=$c+1;





$pdf->Output();
?>