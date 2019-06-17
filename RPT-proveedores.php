
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
$pdf->Cell(0 ,10,'LISTADO DE PROVEEDORES DEL CONSORCIO',0, 1 , 'C');
$pdf->Ln();
//$pdf->Cell(10 ,8,'Nro.',1, 0 , 'C');
$pdf->SetFont('Arial','I',10);

//$pdf->Cell(15 ,8,'Piso',1, 0 , 'C');
//$pdf->Cell(15 ,8,'Depto.',1, 0 , 'C');
$pdf->SetX(20);
$pdf->Cell(60 ,8,utf8_decode('Razón Social'),1, 0 , 'C');
$pdf->Cell(35 ,8,'CUIT',1, 0 , 'C');
$pdf->Cell(35 ,8,utf8_decode('Teléfono'),1, 0 , 'C');
$pdf->Cell(60 ,8,utf8_decode('Domicilio'),1, 0 , 'C');
$pdf->Cell(35 ,8,'Email',1, 0 , 'C');
$pdf->Cell(20 ,8,'Fecha Alta',1, 1 , 'C');

$pdf->SetFont('Arial','',9);
//
$consulta_t="SELECT * FROM proveedor WHERE consorcio_idconsorcio=$id_consorcio";
$resultado_t=$connect->query($consulta_t);

          
 while($fila_t=mysqli_fetch_assoc($resultado_t))
            
        {
            $idproveedor=$fila_t['idproveedor'];
            $raz_soc_p=$fila_t['razon_soc_prov'];
            $cuit=$fila_t['cuit'];
            $tel=$fila_t['tel_prov'];
            $domicilio=$fila_t['domicilio_prov'];
            $email=$fila_t['email_prov'];
            $falta=$fila_t['fecha_alta'];
       
            $pdf->SetX(20);
            $pdf->Cell(60 ,8,''.$raz_soc_p.'',1, 0 , 'C');
            $pdf->Cell(35 ,8,''.$cuit.'',1, 0 , 'C');
            $pdf->Cell(35 ,8,''.$tel.'',1, 0 , 'C');
            $pdf->Cell(60 ,8,''.$domicilio.'',1, 0 , 'C');
            $pdf->Cell(35 ,8,''.$email.'',1, 0 , 'C');
            $pdf->Cell(20 ,8,''.$falta.'',1, 1 , 'C');
                    
            }
  
$pdf->Output();
?>