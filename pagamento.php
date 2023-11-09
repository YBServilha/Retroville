<?php

require __DIR__.'/vendor/autoload.php';

use \App\Pix\Payload;

use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output; 

//INSTANCIA PRINCIPAL DO PAYLOAD PIX

$obPayload = (new Payload)->setPixKey('+5511998949584')
                          ->setDescription('Pagamento B')
                          ->setMerchantName("Brunno Silva Steagall")
                          ->setMerchantCity("SAO PAULO")
                          ->setAmount(82.00)
                          ->setTxid('WDEV1234');

//CODIGO DE PAGAMENTO PIX
$payloadQrCode = $obPayload->getPayload();

//QR CODE
$obQrCode = new QrCode($payloadQrCode);

//IMAGEM DO QRCODE
$image = (new Output\Png)->output($obQrCode,400);

?>

<h1>QR code PIX</h1>


<br>

<img src="data:image/png;base64, <?=base64_encode($image)?>">

<br><br>