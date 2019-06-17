<?php

require_once('php/conn/connect.php');
require_once('fpdf/plantilla-apaisado.php');

$id_consorcio=$_GET['idconsorcio'];


//consulta consorcio
$consulta               = "SELECT * FROM consorcio WHERE idconsorcio = $id_consorcio";
$resultado1             = $connect->query($consulta);
$fila1                  = mysqli_fetch_assoc ($resultado1);
$raz_soc                = $fila1['razon_social']; 
$lineacons              = 'CONSORCIO: "'.$raz_soc.'" - CUIT: '.$fila1['cuit']; 
$lineacons2             = $fila1['calle']. ''. $fila1['nro_calle']. ' - '. $fila1['localidad']. ' - '.  $fila1['provincia'];
$cont                   = 1;
$pdf = new myPDFL();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
//DATOS CONSORCIO
$pdf->SetXY(75,35);
$pdf->SetFont('Arial','U',14);  
$pdf->Cell(150 ,10,''.$lineacons.'',0, 1 , 'C');
$pdf->SetXY(75,43);
$pdf->SetFont('Arial','',11);
$pdf->Cell(150 ,10,''.$lineacons2.'',0, 1 , 'C');
//
//
$pdf->Ln();
$pdf->SetXY(5,54);
$pdf->SetFont('Arial','U',11);  
$pdf->Cell(0 ,10,'LISTADO DE PROPIETARIOS',0, 1 , 'C');
$pdf->Ln();
//$pdf->Cell(10 ,8,'Nro.',1, 0 , 'C');
$pdf->SetFont('Arial','I',11);
$pdf->Cell(90 ,8,'Propietario',1, 0 , 'C');
//$pdf->Cell(30 ,8,'Dni',1, 0 , 'C');
$pdf->Cell(50 ,8,'Email',1, 0 , 'C');
$pdf->Cell(30 ,8,'Telef.',1, 0 , 'C');
$pdf->Cell(95 ,8,'Domicilio',1, 0 , 'C');
$pdf->Cell(15 ,8,'Unidad',1, 1 , 'C');
$pdf->SetFont('Arial','',9);
// consulta para obtener propietarios del consorcio
$consulta2 = "SELECT * FROM propietario WHERE consorcio_idconsorcio = $id_consorcio";
$resultado2 = $connect->query($consulta2);
while ($fila2 = mysqli_fetch_assoc($resultado2))
    {
        //obtener unidad de cada propietario
        $idpropietario  = $fila2 ['idpropietario'];
        $apynom         = $fila2 ['nombres']. ' '.$fila2 ['apellidos']; 
        $dni            = $fila2 ['dni'];
        $mail           = $fila2 ['mail'];
        $tele           = $fila2 ['telefono'];
        $domicilio      = $fila2 ['domicilio'];
        
            
        $consulta3 = "SELECT * FROM unidad_propietario  INNER JOIN unidad ON fk_id_unidad = idunidad AND fk_id_propietario = $idpropietario ORDER BY piso, departamento";
        $resultado3 = $connect->query($consulta3);
        while ($fila3 = mysqli_fetch_assoc($resultado3))
        {
            $unidad = $fila3 ['piso'].' '. $fila3 ['departamento'];  
            $pdf->Cell(90 ,8,''.$apynom.'',1, 0 , 'C');
            //$pdf->Cell(30 ,8,''.$dni.'',1, 0 , 'C');
            $pdf->Cell(50 ,8,''.$mail.'',1, 0 , 'C');
            $pdf->Cell(30 ,8,''.$tele.'',1, 0 , 'C');
            $pdf->Cell(95 ,8,''.$domicilio.'',1,0, 'C');
            $pdf->Cell(15 ,8,''.$unidad.'',1, 1 , 'C');
            
            
        }
        
    
    }

//
////DETALLE DE EGRESOS
//$pdf->SetFont('Arial','I',10);
//$pdf->Cell(185 ,10,'1) DETALLES DE EGRESOS',0, 1 , 'L');
//$pdf->Ln(2);
////TABLA DE EGRESOS


$pdf->Output();



?>


