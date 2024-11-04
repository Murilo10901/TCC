<?php

require_once 'vendor/autoload.php';

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

// Array de URLs
$urls = [
    'https://youtube.com/',
];

// Selecionar aleatoriamente um URL a cada recarga da página
$text = $urls[array_rand($urls)];

// Configurar as opções do código QR
$options = new QROptions([
    'version' => 7,
    'outputType' => QRCode::OUTPUT_IMAGE_PNG, // Corrigido o tipo de saída de imagem
    'imageBase64' => false, // Se deseja que a saída seja uma string base64
    'imageTransparent' => false, // Define a transparência da imagem (true ou false)
    'cachePath' => __DIR__.'/cache', // Diretório de cache para salvar imagens geradas
]);

// Instanciar a classe QRCode
$qr = new QRCode($options);

// Gere o código QR
$code = $qr->render($text);

// Exiba o código QR na tela
header('Content-Type: image/png');
echo $code;

// Nome do arquivo com um timestamp para torná-lo único
$timestamp = time();
$filename = 'java/qrcodes'.$timestamp.'.png'; // Adicionado um '_' após 'qrcode'

// Salvar o código QR como um arquivo PNG
file_put_contents($filename, $code);

echo 'Código QR exibido na tela e salvo como '.$filename;
