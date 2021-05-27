<?php
date_default_timezone_set('America/Sao_Paulo');

switch ($_GET['t']) {
    case 'success':
        echo "<h2>Pagamento Autorizado</h2>";
        break;

    case 'failure':
        echo "<h2>Pagamento Falhou</h2>";
        break;

    case 'pending':
        echo "<h2>Pagamento Falhou</h2>";
        break;
    
    default:
        echo "<h2>Pagamento Falhou</h2>";
}

if (isset($_POST) && count($_POST) > 0) {
    file_put_contents('logs/' . date('His').'_post_' . $_POST['type']. '.txt', print_r($_POST, true));
}
if (isset($_GET) && count($_GET) > 0) {
    echo '<pre>';
    print_r($_GET);
    file_put_contents('logs/' . date('His').'_get_' . $_GET['t']. '.txt', print_r($_GET, true));
}
