<?php

include_once("models/Message.php");

$mensagens = new Message();

// $lifetime = strtotime('+1 minutes', 0);
$lifetime = 10 * 60;
session_set_cookie_params($lifetime);
session_start();

$BASE_URL = "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["REQUEST_URI"]."?") . "/";

//Local de onde tirei esse trecho de código
/*https://wallacemaxters.com.br/blog/32/como-fazer-uma-sessao-php-expirar-apos-determinado-tempo#:~:text=No%20PHP%2C%20podemos%20usar%20a,que%20session_start()%20seja%20chamada.*/

?>
