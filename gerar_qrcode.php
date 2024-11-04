<?php
require_once 'vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

$id = 1; 

$machineData = "http://192.168.0.111/dashboard/tcc/tcc/validar_qrcode.php?id=" . $id ;

$machineDataJson = $machineData;

$options = new QROptions([
    'version' => 7,
    'outputType' => QRCode::OUTPUT_IMAGE_PNG,
    'imageBase64' => false,
    'imageTransparent' => false,
    'cachePath' => __DIR__.'/cache', 
]);

$code = (new QRCode($options))->render($machineDataJson);

header('Content-Type: image/png');
echo $code;

$timestamp = time();
$filename = ''.$timestamp.'.png'; 

file_put_contents($filename, $code);

echo 'Código QR exibido na tela e salvo como '.$filename;
?>