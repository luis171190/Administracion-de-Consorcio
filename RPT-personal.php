<?php

require_once('php/conn/connect.php');
require_once('fpdf/plantilla-apaisado.php');

$id_consorcio= $_GET['idconsorcio'];


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
$pdf->Cell(0 ,10,'LISTADO DE PERSONAL DEL CONSORCIO',0, 1 , 'C');
$pdf->Ln();
//$pdf->Cell(10 ,8,'Nro.',1, 0 , 'C');
$pdf->SetFont('Arial','I',10);

//$pdf->Cell(15 ,8,'Piso',1, 0 , 'C');
//$pdf->Cell(15 ,8,'Depto.',1, 0 , 'C');
$pdf->SetX(20);
$pdf->Cell(60 ,8,'Nombre y Apellido',1, 0 , 'C');
$pdf->Cell(60 ,8,'Domicilio',1, 0 , 'C');
$pdf->Cell(35 ,8,utf8_decode('Teléfono'),1, 0 , 'C');
$pdf->Cell(35 ,8,'DNI',1, 0 , 'C');
$pdf->Cell(35 ,8,'Puesto',1, 0 , 'C');
$pdf->Cell(20 ,8,'Fecha I.',1, 0 , 'C');
$pdf->Cell(20 ,8, 'Fecha F.',1,1, 'C');
$pdf->SetFont('Arial','',9);
//
 $consulta_t="SELECT * FROM personal WHERE consorcio_idconsorcio=$id_consorcio";
$resultado_t=$connect->query($consulta_t);

          
 while($fila_t=mysqli_fetch_assoc($resultado_t))
            
        {
            $idpersonal=$fila_t['idpersonal'];
            $apynom=$fila_t['nombre_per'].' '.$fila_t['apellido_per'];
            $dni=$fila_t['dni_per'];
            $tel=$fila_t['tel_per'];
       
            $domicilio=$fila_t['domicilio_per'];
            $puesto=$fila_t['desc_puesto'];
            $fi=$fila_t['fecha_inicio'];
            $ff=$fila_t['fecha_fin'];
            if($ff=='0000-00-00')
            {
                $ff='-';
            }
       
                    $pdf->SetX(20);
                    $pdf->Cell(60 ,8,''.$apynom.'',1, 0 , 'C');
                    $pdf->Cell(60 ,8,''.$domicilio.'',1, 0 , 'C');
                    $pdf->Cell(35 ,8,''.$tel.'',1, 0 , 'C');
                    $pdf->Cell(35 ,8,''.$dni.'',1, 0 , 'C');
                    $pdf->Cell(35 ,8,''.$puesto.'',1, 0 , 'C');
                    $pdf->Cell(20 ,8,''.$fi.'',1, 0 , 'C');
                    $pdf->Cell(20 ,8,''.$ff.'',1, 1 , 'C');    
            }
  
$pdf->Output();
?>