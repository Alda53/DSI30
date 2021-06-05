<?php
include '../phpqrcode/qrlib.php';

function GenerarQrCode($data,$file){
    QRcode::png($data,$file);
}

// //El nombre del fichero que se genera (un PNG)
// $file='QrGenerados/QrCode.png';
// //La data que lleva
// $data ="EJEMPLO";

// //Generamos la imagen
?>