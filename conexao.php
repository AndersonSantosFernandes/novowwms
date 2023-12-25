<?php
// Conexão online
// $db_name = "id20919446_estoque";
// $db_host = "localhost";
// $db_user = "id20919446_administrador";
// $db_pass = "Estoque@1978";

$db_name = "wmsestoque";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";

//$conn = new PDO("mysql:host = $db_host, dbname = $db_name",$db_user, $db_pass);
$conn = new PDO("mysql:dbname=" . $db_name . "; host=" . $db_host, $db_user, $db_pass);

//Hbilitar erros PDO
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

//converter data padrão americano para brasileiro

function invertDate($date, $separates = "-", $join = "/")
{
   return implode($join, array_reverse(explode($separates, $date)));
}

?>