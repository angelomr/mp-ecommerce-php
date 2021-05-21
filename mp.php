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
$preference->items = array($item);

// - Enviar os detalhes do pagador.
$payer = new MercadoPago\Payer();
$payer->id = 725762927;
$payer->name = "APRO";
$payer->first_name = "APRO Angelo";
$payer->lastname = "Rodrigues";
$payer->email = "test_user_92801501@testuser.com";
$payer->date_created = date("Y-m-d") . "T . " . date('H:i:s');
$payer->phone = array(
    "area_code" => "11",
    "number" => "96377-3186"
);

$payer->identification = array(
    "type" => "CPF",
    "number" => "19119119100"
);

$payer->address = array(
    "street_name" => "Manoel Salgado",
    "street_number" => 220,
    "zip_code" => "04191270"
);

$preference->payer = $payer;

// - Enviar o URL onde as notificações de pagamento serão recebidas.
$preference->back_urls = array(
    "success" => "{$url}/webhook.php?t=success",
    "failure" => "{$url}/webhook.php?t=failure",
    "pending" => "{$url}/webhook.php?t=pending"
);
$preference->auto_return = "approved";

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

$preference->save();
