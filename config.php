<?php
date_default_timezone_set('America/Sao_Paulo');

$url = "http://mercadopago.local";
$accessToken = "APP_USR-CHAVE-DE-TESTE-DO-MERCADOPAGO";
$integratorId = "dev_DE-TESTE-DO-MERCADOPAGO";

$products = [
    1 => [
        'name' => 'Samsung Galaxy S9',
        'price' => 15000,
        'image' => "{$url}/assets/samsung-galaxy-s9-xxl.jpg"
    ],
    2 => [
        'name' => 'LG G6',
        'price' => 10000,
        'image' => "{$url}/assets/l6g6.jpg"
    ],
    3 => [
        'name' => 'iPhone 8',
        'price' => 16000,
        'image' => "{$url}/assets/Screen Shot 2017-11-01 at 13.01.54.png"
    ],
    4 => [
        'name' => 'Motorola G5',
        'price' => 9000,
        'image' => "{$url}/assets/motorola-moto-g5-plus-1.jpg"
    ],
    5 => [
        'name' => 'Motorola G4',
        'price' => 8000,
        'image' => "{$url}/assets/motorola-moto-g4-3.jpg"
    ],
    6 => [
        'name' => 'Sony Xperia XZ2',
        'price' => 10000,
        'image' => "{$url}/assets/003.jpg"
    ],
];
