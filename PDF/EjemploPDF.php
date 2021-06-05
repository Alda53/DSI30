<?php
    require('fpdf.php');
    include('../Instructions/GenerarQr.php');
    //Creamos PDF
    $datos="Hola Mundo";
    GenerarQrCode($datos,"../Images/Qr1.png");

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->SetXY(110,100);
    $pdf->Cell(50,20,$datos,1,1,'R');
    $pdf->SetXY(50,100);
    $pdf->Cell(50,20,'Pongan Santa Fe Klan',1,0);
    $pdf->Image('../Images/Qr1.png',40,40,20,0);
    
    //Salida
    $pdf->Output();
    //'D' fuerza descarga del PDF
    //'F' se descarga en la carpeta de trabajo 
    //'nombre.pdf' puedes nombrarlo
?>