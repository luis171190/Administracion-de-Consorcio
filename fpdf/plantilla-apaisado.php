<?php

require_once('fpdf/fpdf.php');

class myPDFL extends FPDF
{
    function Header()
    {
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $dma=date("d/m/Y");
        $this->Image('img/logo.png', 15, 7, 30, 27);
        $this->SetFont('Times', '', 14);
        //$this->SetX(100);
        $this->Cell (0,5, 'ADMINISTRACION DE CONSORCIOS ONLINE', 0,0,'C');
        $this->Ln();
        //$this->SetX(100);
        $this->SetFont('Times', 'I', 12);
        $this->Cell (0,10, utf8_decode('Impresión de reportes'), 0,1,'C');
        $this->SetFont('Times', 'I', 10);
        $this->Cell (0,10, ''.$dma.'', 0,1,'C');
        
        $this->Ln();
        $this->SetXY(0, 30);
       // $this->Cell (300,0,'', 1,0,'C');
    }
    function Footer () 
        
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I',8 );
        $this->Cell(0,10, 'Page 1', 0, 0, 'C');
    
    }
}

?>