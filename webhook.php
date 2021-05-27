<?php
require_once('config.php');
require __DIR__ .  '/vendor/autoload.php';
// Adicione as credenciais

switch ($_GET['t']) {
    case 'success':
        echo "<h2>Pagamento Autorizado</h2>";
        break;

    case 'failure':
        echo "<h2>Pagamento Falhou</h2>";
        break;

    case 'pending':
        echo "<h2>Pagamento Está Pendente</h2>";
        break;
    case 'hook':
        processReturn($accessToken);
        break;
    
    default:
        echo "<h2>Web Hook Recebido</h2>";
}

if (isset($_POST) && count($_POST) > 0) {
    file_put_contents('logs/' . date('His').'_post_' . $_POST['type']. '.txt', print_r($_POST, true));
}
if (isset($_GET) && count($_GET) > 0) {
    echo '<pre>';
    print_r($_GET);
    file_put_contents('logs/' . date('His').'_get_' . $_GET['t']. '.txt', print_r($_GET, true));
}

$json = file_get_contents('php://input');
if (isset($json) && $json!="") {
    file_put_contents('logs/' . date('His').'_json.txt', print_r($json, true));
}

function processReturn($accessToken)
{
    MercadoPago\SDK::setAccessToken($accessToken);
    
    switch ($_POST["type"]) {
        case "payment":
            $txt = MercadoPago\Payment::find_by_id($_POST["id"]);
            $log = date('His').'_return_payment.txt';
            break;
        case "plan":
            $txt = MercadoPago\Plan::find_by_id($_POST["id"]);
            $log = date('His').'_return_plan.txt';
            break;
        case "subscription":
            $txt = MercadoPago\Subscription::find_by_id($_POST["id"]);
            $log = date('His').'_return_subscription.txt';
            break;
        case "invoice":
            $txt = MercadoPago\Invoice::find_by_id($_POST["id"]);
            $log = date('His').'_return_invoice.txt';
            break;
    }

    file_put_contents('logs/' . $log, print_r($txt, true));
}
