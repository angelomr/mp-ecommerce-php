<?php
// SDK do Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Adicione as credenciais
MercadoPago\SDK::setAccessToken($accessToken);
MercadoPago\SDK::setIntegratorId($integratorId);

$preference = new MercadoPago\Preference();

// - Enviar as informações do item que está sendo adquirido.
// Cria um item na preferência
$item = new MercadoPago\Item();
$item->id = 1234;
$item->title = $products[$_POST['id']]['name'];
$item->description = 'Celular de Tienda e-commerce';
$item->quantity = 1;
$item->unit_price = $products[$_POST['id']]['price'];
$item->$picture_url = $products[$_POST['id']]['image'];
$preference->items = array($item);

// - Enviar os detalhes do pagador.
$payer = new MercadoPago\Payer();
$payer->id = 725762927;
$payer->name = "Lalo";
$payer->surname = "Landa";
//$payer->first_name = "Lalo";
// $payer->last_name = "Landa";
$payer->email = "test_user_92801501@testuser.com";
$payer->date_created = "2021-05-01T" . date('H:i:s');
$payer->phone = array(
    "area_code" => "55",
    "number" => "98529-8743"
);
/*
$payer->identification = array(
    "type" => "CPF",
    "number" => "19119119100"
);
*/
$payer->address = array(
    "street_name" => "Insurgentes Sur",
    "street_number" => 1602,
    "zip_code" => "78134-190"
);

$preference->payer = $payer;

// - Enviar o URL onde as notificações de pagamento serão recebidas.
$preference->back_urls = array(
    "success" => "{$url}/webhook.php?t=success",
    "failure" => "{$url}/webhook.php?t=failure",
    "pending" => "{$url}/webhook.php?t=pending"
);
$preference->auto_return = "approved";

$preference->notification_url = "{$url}/webhook.php?t=hook";

// - Enviar o número do pedido (external_reference)
$preference->external_reference = 'angelo@wsbrasil.com';

// - Limitar a quantidade de parcelas conforme solicitado.
// - Não oferecer o meio de pagamento solicitado.
$preference->payment_methods = array(
    "excluded_payment_methods" => array(
        array("id" => "amex")
    ),
    "installments" => 6
);

$preference->statement_descriptor = "WEBSTUDIO";

$preference->save();

// echo '<pre>';
// print_r($preference);
