<?php
//require_once('php/conn/connect.php');
require_once('fpdf/fpdf.php');
require_once('CifrasEnLetras.php');

class ComprobantePago 
{
    
        function GenerarComprobante ($connect)
        {
                        $periodo                = $_POST['periodo1'];
                        $idliquidacion_unidad   = $_POST['idliquidacion_unidad'];
                        $fecha_pago             = $_POST['fecha_pago'];
                        $monto_interes          = $_POST['intereses'];
                        $monto_total            = $_POST['monto_ci'];
                        $valor_a_buscar         = '.';
                        $montototal             = str_replace( $valor_a_buscar , ',' , $monto_total);
                        $tipo_pago              = $_POST['tipo_pago'];
                        $idconsorcio            = $_POST['idconsorcio'];
                        $idunidad               = $_POST['idunidad'];
                        $consulta               = "SELECT * FROM consorcio WHERE idconsorcio = $idconsorcio";
                        $resultado1             = $connect->query($consulta);
                        $fila1                  = mysqli_fetch_assoc ($resultado1);
                        $raz_soc                = $fila1['razon_social']; 
                        $lineacons              = 'CONSORCIO: "'.$raz_soc.'" - CUIT: '.$fila1['cuit']; 
                        $lineacons2             = $fila1['calle']. ''. $fila1['nro_calle']. ' - '. $fila1['localidad']. ' - '.  $fila1['provincia'];
                        $consulta2              = "SELECT * FROM  unidad_propietario INNER JOIN propietario INNER JOIN unidad  ON  fk_id_unidad = idunidad AND fk_id_propietario = idpropietario AND                                   fk_id_unidad = $idunidad ";
                        $resultado2             = $connect->query ($consulta2);
                        $fila2                  = mysqli_fetch_assoc($resultado2);
                        $propietario            = $fila2['nombres'].' '.$fila2['apellidos'];
                        $piso                   = $fila2['piso'];
                        $dpto                   = $fila2['departamento'];

                        $fecha                  = explode("-", $fecha_pago);
                        $consulta3              = "select idrecibo from recibo order by idrecibo desc limit 1";
                        $resultado3             = $connect->query($consulta3);
                        $fila3                  = mysqli_fetch_assoc($resultado3);
                        $nro_rec                =$fila3['idrecibo']+1;

                        $funct = new CifrasEnLetras();
                        $montoletra = utf8_decode($funct->convertirEurosEnLetras($montototal , 2));     
                        $pdf = new FPDF();
                        $pdf->AliasNbPages();
                        $pdf->AddPage('L', 'A4', 0);
                        //$pdf->AddPage('L');
                        $pdf->Image('../images/2.jpg', 50, 20, 200, 140);
                        //DATOS CONSORCIO
                        $pdf->SetXY(56,25);
                        $pdf->SetFont('Arial','I',15);  
                        $pdf->Cell(185 ,10,''.$lineacons.'',0, 1 , 'C');
                        $pdf->SetXY(56,35);
                        $pdf->SetFont('Arial','I',10);
                        $pdf->Cell(185 ,10,''.$lineacons2.'',0, 1 , 'C');
                        //TOTAL PAGO
                        $pdf->SetXY(200,50);
                        $pdf->SetFont('Arial','I',14);
                        $pdf->Cell(32 ,17,''.$monto_total.'',0, 1 , 'C');
                        //PROPIETARIO
                        $pdf->SetXY(90,62);
                        $pdf->SetFont('Arial','I',14);
                        $pdf->Cell(150 ,10,''.$propietario.'',0, 1 , 'C');
                        //MONTO LETRAS
                        $pdf->SetXY(93,71);
                        $pdf->SetFont('Arial','I',15);
                        $pdf->MultiCell(150 ,6,''.$montoletra.' pesos',0, 1 );

                        //CONCEPTO PAGO

                        $pdf->SetXY(93,84);
                        $pdf->SetFont('Arial','I',14);
                        $pdf->Cell(150 ,10,utf8_decode('Pago de expensas período '.$periodo.''),0, 1 , 'C');

                        //UNIDAD CONCEPTO PAGO
                        $pdf->SetXY(61,91);
                        $pdf->SetFont('Arial','',14);
                        $pdf->Cell(180 ,10,utf8_decode('Piso: '.$piso.' Dpto : '.$dpto.' en '.$tipo_pago.''),0, 1 , 'C');

                        //FECHA
                        $pdf->SetXY(160,128);
                        $pdf->SetFont('Arial','',14);
                        $pdf->Cell(10 ,10,utf8_decode(''.$fecha[2].''),0, 1 , 'C');
                        $pdf->SetXY(180,128);
                        $pdf->SetFont('Arial','',14);
                        $pdf->Cell(10 ,10,utf8_decode(''.$fecha[1].''),0, 1 , 'C');
                        $pdf->SetXY(220,128);
                        $pdf->SetFont('Arial','',14);
                        $pdf->Cell(10 ,10,utf8_decode(''.$fecha[0].''),0, 1 , 'C');

                        // ACLARACION
                        $pdf->SetXY(60,122); //128
                        $pdf->SetFont('Arial','I',12);
                        $pdf->MultiCell(70,10, utf8_decode('El pago del presente no implica la cancelación  de deudas anteriores'),1,'');
                        
                        //NRO PAGO
            
                        $pdf->SetXY(60,145);
                        $pdf->SetFont('Arial','B',14);
                        $pdf->Cell(50 ,10,'RECIBO NRO '.$nro_rec.'',0, 1 , 'L');

                        $pdf->Output();
                        
                        //OBTENER ID DE PAGO
                       $consulta5   = "SELECT idpago_liquidacion FROM pago_liquidacion WHERE liquidacion_unidad_idliquidacion_unidad = $idliquidacion_unidad";
                       $resultado5  = $connect->query($consulta5);
                       $fila5       = mysqli_fetch_assoc($resultado5);
                       $idpago      = $fila5['idpago_liquidacion'];
                       $consulta4   = "INSERT INTO recibo (fecha_recibo, fk_idpago) VALUES ('$fecha_pago', $idpago)";
                       $resultado4  = $connect->query($consulta4);

            }
    
 
   
    
}


?>
