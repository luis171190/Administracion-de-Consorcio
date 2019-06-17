<?php

require_once('php/conn/connect.php');
require_once('fpdf/plantilla-apaisado.php');

$id_consorcio= $_GET['idconsorcio'];
$idunidad= $_GET['idunidad'];
$unidad1= $_GET['unidad'];

//consulta consorcio
$consulta               = "SELECT * FROM consorcio WHERE idconsorcio = $id_consorcio";
$resultado1             = $connect->query($consulta);
$fila1                  = mysqli_fetch_assoc ($resultado1);
$raz_soc                = $fila1['razon_social']; 
$lineacons              = 'CONSORCIO: "'.$raz_soc.'" - CUIT: '.$fila1['cuit']; 
$lineacons2             = $fila1['calle']. ''. $fila1['nro_calle']. ' - '. $fila1['localidad']. ' - '.  $fila1['provincia'];

$pdf = new myPDFL();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
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
$pdf->Cell(0 ,10,'ESTADO DE CUENTA UNIDAD  '.$unidad1.'',0, 1 , 'C');
$pdf->Ln();
//$pdf->Cell(10 ,8,'Nro.',1, 0 , 'C');
$pdf->SetFont('Arial','I',10);

//$pdf->Cell(15 ,8,'Piso',1, 0 , 'C');
//$pdf->Cell(15 ,8,'Depto.',1, 0 , 'C');
$pdf->SetX(20);
$pdf->Cell(45 ,8,'Detalle.',1, 0 , 'C');
$pdf->Cell(35 ,8,'Monto',1, 0 , 'C');
$pdf->Cell(35 ,8,'Monto c/i',1, 0 , 'C');
$pdf->Cell(35 ,8,utf8_decode('Pagó'),1, 0 , 'C');
$pdf->Cell(35 ,8,' F. Pago',1, 0 , 'C');
$pdf->Cell(35 ,8,'Monto Pagado',1, 0 , 'C');
$pdf->Cell(35 ,8, 'Forma Pago',1,1, 'C');
$pdf->SetFont('Arial','',9);

$consulta="SELECT * FROM pago_liquidacion INNER JOIN liquidacion_unidad INNER JOIN unidad ON liquidacion_unidad_idliquidacion_unidad=idliquidacion_unidad AND unidad_idunidad=idunidad AND idunidad=$idunidad";
$resultado=$connect->query($consulta);
while($fila=mysqli_fetch_assoc($resultado))
            
        {
          
            
            $idliquidacion_unidad=$fila['idliquidacion_unidad'];
            //echo $idliquidacion_unidad;
            $consulta2="SELECT * FROM liquidacion_unidad INNER JOIN liquidacion INNER JOIN periodo ON idliquidacion_unidad=$idliquidacion_unidad AND liquidacion_idliquidacion= idliquidacion AND periodo_idperiodo=idperiodo";
            $resultado2=$connect->query($consulta2);
            $fila2=mysqli_fetch_assoc($resultado2);
              if($fila2['estado_liq']=='pendiente')
            {
                
            }
            else
            {
            
            $periodo=$fila2['descripcion_periodo'].'-'.$fila2['anio'];
            $piso=$fila['piso'];
            $dpto=$fila['departamento'];
            $monto=$fila['monto_si'];
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $dma=date("Y/m/d");
            $fech_venc=$fila['fecha_venc'];
            $dias= (strtotime($dma)-strtotime($fech_venc))/86400;
            $pago=$fila['estado'];
            $fecha_pago=$fila['fecha_pago'];
            
	       if($pago==0)
           {
                    $pago_estado='NO';
                    $fecha_pago='-';
                    $monto_pago='-';
                    $forma_pago = '-';
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
             
           }
            else
            { // PAGADO
                $pago_estado='SI';
                $interes=0;
                $m_interes=$fila['monto_interes'];
                $t_interes=$monto+$m_interes;
                $forma_pago = $fila['tipo_pago'];
                $monto_pago=$fila['monto_total'];
                //$monto_interes=$fila['monto_interes'];
                
            }
            
                    //$pdf->Cell(15 ,8,''.$piso.'',1, 0 , 'C');
                    //$pdf->Cell(15 ,8,''.$dpto.'',1, 0 , 'C');
                    $pdf->SetX(20);
                    $pdf->Cell(45 ,8,''.$periodo.'',1, 0 , 'C');
                    $pdf->Cell(35 ,8,'$ '.$monto.'',1, 0 , 'C');
                    $pdf->Cell(35 ,8,'$ '.$t_interes.'',1, 0 , 'C');
                    $pdf->Cell(35 ,8,''.$pago_estado.'',1, 0 , 'C');
                    $pdf->Cell(35 ,8,''.$fecha_pago.'',1, 0 , 'C');
                    $pdf->Cell(35 ,8,'$ '.$monto_pago.'',1, 0 , 'C');
                    $pdf->Cell(35 ,8,''.$forma_pago.'',1, 1 , 'C');

        }
        }
  
$pdf->Output();
?>