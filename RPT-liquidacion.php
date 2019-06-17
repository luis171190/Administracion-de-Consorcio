<?php

require_once('php/conn/connect.php');
//require_once('fpdf/fpdf.php');
require_once('fpdf/plantilla.php');

$idliquidacion=$_POST['idliquidacion28'];
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$id_consorcio=$_POST['id_consorcio'];
$desc=$_POST['desc'];
$descanio= $desc.' '.$anio;
$es_liq=$_POST['estado_l'];

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
$pdf->SetXY(30,35);
$pdf->SetFont('Arial','U',14);  
$pdf->Cell(150 ,10,''.$lineacons.'',0, 1 , 'C');
$pdf->SetXY(30,43);
$pdf->SetFont('Arial','',11);
$pdf->Cell(150 ,10,''.$lineacons2.'',0, 1 , 'C');
//
$pdf->SetXY(30,54);
//$pdf->Ln();
$pdf->SetFont('Arial','U',12);  
$pdf->Cell(150 ,10,'LIQUIDACION MENSUAL CORRESPONDIENTE A '.$descanio.'',0, 1 , 'C');

//DETALLE DE EGRESOS
$pdf->SetFont('Arial','I',10);
$pdf->Cell(185 ,10,'1) DETALLES DE EGRESOS',0, 1 , 'L');
$pdf->Ln(2);
//TABLA DE EGRESOS

$pdf->Cell(10 ,8,'Nro.',1, 0 , 'C');
$pdf->Cell(120 ,8,'Concepto',1, 0 , 'C');
$pdf->Cell(30 ,8,'Tipo',1, 0 , 'C');
$pdf->Cell(30 ,8,'Monto',1, 1 , 'C');
$pdf->SetFont('Arial','',10);
$consulta3= "SELECT * FROM egreso WHERE month (fecha_egreso)=$mes AND year (fecha_egreso)=$anio AND consorcio_idconsorcio=$id_consorcio ";
$resultado3=$connect->query($consulta3);
$monto_e=0;
        
 $c=1;
           $monto_a=0;
           $monto_b=0;
       while($fila3=mysqli_fetch_assoc($resultado3))
            
        {   
            
            $fila_monto=$fila3['monto_egreso'];
               // $monto_e=$fila_monto+$monto_e;
            $desc_egreso=$fila3['descripcion_egreso'];
            $monto_egreso=$fila3['monto_egreso'];
            $tipo_egreso=$fila3['tipo_egreso'];


                       if($tipo_egreso=='TIPO A')
                       {
                           $monto_a=$monto_a+$monto_egreso;
                       }
                       else
                       {
                           $monto_b=$monto_b+$monto_egreso;
                       }


            $pdf->Cell(10 ,8 ,''.$cont.'',1, 0 , 'C');
            $pdf->Cell(120 ,8,''.$desc_egreso.'',1, 0 , 'C');
            $pdf->Cell(30 ,8 ,''.$tipo_egreso.'',1, 0 , 'C');
            $pdf->Cell(30 ,8 ,'$ '.$monto_egreso.'',1, 1 , 'C'); 
            $cont = $cont + 1;
       }
 $monto_total=$monto_a+$monto_b;
//$pdf->Cell(270 ,10,'',1, 1, 'C');

$pdf->Cell(160 ,8,'TOTAL DE EGRESOS ORDINARIOS (A)',1, 0 , 'C');
$pdf->Cell(30 ,8,'$ '.$monto_a.'',1, 1 , 'C'); 
$pdf->Cell(160 ,8,'TOTAL DE EGRESOS EXTRAORDINARIOS (B)',1, 0 , 'C');
$pdf->Cell(30 ,8,'$ '.$monto_b.'',1, 1 , 'C'); 
$pdf->Cell(160 ,8,'TOTAL DE EGRESOS ',1, 0 , 'C');
$pdf->Cell(30 ,8,'$ '.$monto_total.'',1, 1 , 'C'); 

 //DETALLE DE INGRESOS
$pdf->Ln(2);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(185 ,10,'2) DETALLES DE INGRESOS',0, 1 , 'L');

//TABLA DE INGRESOS

$pdf->Cell(10 ,8,'Nro.',1, 0 , 'C');
$pdf->Cell(150 ,8,'Concepto',1, 0 , 'C');
$pdf->Cell(30 ,8,'Monto',1, 1 , 'C');
$pdf->SetFont('Arial','',10);
$consulta4= "SELECT * FROM ingreso WHERE month (fecha_ingreso)=$mes AND year (fecha_ingreso)=$anio AND consorcio_idconsorcio=$id_consorcio ";
$resultado4=$connect->query($consulta4);
$monto_i=0;
while($fila4=mysqli_fetch_assoc($resultado4))
{
        
    $c=1;
    $fila_monto1=$fila4['monto'];
    $monto_i=$fila_monto1+$monto_i;
    $desc_ingreso=$fila4['descripcion'];
    $monto_ingreso=$fila4['monto'];          
    $pdf->Cell(10 ,8 ,''.$c.'',1, 0 , 'C');
    $pdf->Cell(150 ,8,''.$desc_ingreso.'',1, 0 , 'C');
    $pdf->Cell(30 ,8 ,'$ '.$monto_ingreso.'',1, 1 , 'C'); 
            
    $c=$c+1;       
}
$pdf->Cell(160 ,8,'TOTAL DE INGRESOS ',1, 0 , 'C');
$pdf->Cell(30 ,8,'$ '.$monto_i.'',1, 1 , 'C'); 

//TOTAL EXP. ORDINARIAS 
$pdf->SetFont('Arial','',10);
$pdf->Ln(4);
$pdf->Cell(185 ,8,'TOTAL EGRESOS A (ORD) = TOTAL EGRESOS A (ORD) MES - TOTAL INGRESOS ',0, 1 , 'L');
$pdf->Cell(48 ,8,'TOTAL EGRESOS A (ORD) =',0, 0 , 'L');
$total_ord_act_cobrar = $monto_a- $monto_i;
$pdf->Cell(185 ,8,'$ '.$monto_a.' - $'.$monto_i.'',0, 1 , 'L');
$pdf->Cell(48 ,8,'TOTAL EGRESOS A (ORD) = $'.$total_ord_act_cobrar.'',0, 1 , 'L');

//LIQUIDACION UNIDAD
$pdf->Ln(4);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(185 ,10,'3) PRORRATEO POR UNIDADES ',0, 1 , 'L');
$pdf->Cell(20 ,8,'Piso',1, 0 , 'C');
$pdf->Cell(20 ,8,'Dpto.',1, 0 , 'C');
$pdf->Cell(30 ,8,'% Pago',1, 0 , 'C');
$pdf->Cell(40 ,8,'Exp. Ordinarias',1, 0 , 'C');
$pdf->Cell(40 ,8,'Exp. Extraordinarias',1, 0 , 'C');
$pdf->Cell(40 ,8,'Total',1, 1 , 'C');
$pdf->SetFont('Arial','',10);
//Consulta liquidacion_unidad
$consulta8="SELECT * FROM liquidacion_unidad  INNER JOIN unidad ON liquidacion_idliquidacion=$idliquidacion AND unidad_idunidad=idunidad ORDER BY departamento, piso ASC";
$resultado8=$connect->query($consulta8);

while($fila8=mysqli_fetch_assoc($resultado8))
{
     
    $idunidad=$fila8['idunidad'];
    $piso=$fila8['piso'];
    $dto=$fila8['departamento'] ;
    $unidad=$fila8['piso'].' -'.$fila8['departamento'] ;
    $subtotal=$fila8['subtotal_ord'];
    $subtotal_ext=$fila8['subtotal_ext'];
    $porc=$fila8['porcentaje_pago'];
    $t_expensas=$subtotal+$subtotal_ext;
    
    $pdf->Cell(20 ,8,''.$piso.'',1, 0 , 'C');
    $pdf->Cell(20 ,8,''.$dto.'',1, 0 , 'C');
    $pdf->Cell(30 ,8,''.$porc.'',1, 0 , 'C');
    $pdf->Cell(40 ,8,'$ '.$subtotal.'',1, 0 , 'C');
    $pdf->Cell(40 ,8,'$ '.$subtotal_ext.'',1, 0 , 'C');
    $pdf->Cell(40 ,8,'$ '.$t_expensas.'',1, 1 , 'C');
      
                   
        }

$pdf->Output();



?>







    