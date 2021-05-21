<?php
echo '<pre>';
print_r($_GET);
file_put_contents('logs/' . date('His').'_' . $_GET['t']. '.txt', print_r($_GET, true));
