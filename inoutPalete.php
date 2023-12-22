<?php 

include_once("conexao.php");
include_once("global.php");

$entrarPalet = filter_input(INPUT_GET,"actionPalet");



if(isset($entrarPalet)){
$_SESSION['palet'] = $entrarPalet;
header("location:paletes.php");

}else{
    $_SESSION['palet'] = "";
    header("location:paletes.php");    
}
?>