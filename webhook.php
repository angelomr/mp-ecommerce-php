<?php
date_default_timezone_set('America/Sao_Paulo');
if (isset($_POST)) {
    file_put_contents('logs/' . date('His').'_post_' . $_POST['type']. '.txt', print_r($_POST, true));
}
if (isset($_GET)) {
    echo '<pre>';
    print_r($_GET);
    file_put_contents('logs/' . date('His').'_get_' . $_GET['t']. '.txt', print_r($_GET, true));
}
