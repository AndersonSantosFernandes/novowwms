<?php

include_once("conexao.php");
include_once("models/Message.php");

$mensagens = new Message();

$sairPalete = filter_input(INPUT_POST, "sairPalete");
$action = filter_input(INPUT_POST, "action");

$palete_id = filter_input(INPUT_POST, "paleteId");

$modelo = filter_input(INPUT_POST, "modelo");
$serial = filter_input(INPUT_POST, "serial");
$actionGet = filter_input(INPUT_GET, "actionGet");
$serial_id = filter_input(INPUT_GET, "serial_id");

$sairPalet = filter_input(INPUT_GET,"actionPalet");



if ($action == "novoPalete") {

    if(!$modelo){
        $mensagens->setMessage("Selecione um modelo","fall");
    }else{
        $stmt = $conn->prepare("INSERT INTO paletes (modelo ,dataPalete) VALUES(:modelo, CURRENT_DATE)");
        $stmt->bindParam(":modelo",$modelo);
        $stmt->execute();
    
    }

    
    header("location:paletes.php");


} elseif ($action == "insereSerial") {
    // Deve vir o id do palet e o serial por post
    if ($serial && $palete_id) {

        // Verifica se o serial ja está inserini palete ou em outro
        $stmtVerificaSerial = $conn->prepare("SELECT * FROM seriais WHERE  serial = :serial");
     
        $stmtVerificaSerial->bindParam(":serial", $serial);
        $stmtVerificaSerial->execute();
        $linhaVerifica = $stmtVerificaSerial->rowCount();

        // var_dump($linhaVerifica);
        //Se o serial já estiver neste ou em outro palet, a inserção não acontece
        if ($linhaVerifica > 0) {

            $mensagens->setMessage("O serial ".$serial  ." está inserido em outro palete","fall");
            header("location:paletes.php");

        } else {
            // O serial é inserido caso atenda a condição
            $stmt = $conn->prepare("INSERT INTO seriais (palete_id, serial) VALUES(:palete_id, :serial)");
            $stmt->bindParam(":palete_id", $palete_id);
            $stmt->bindParam(":serial", $serial);
            $stmt->execute();
            $mensagens->setMessage("Serial ".$serial  ." inserido com sucesso","win");
        }


    } else {

    }


    header("location:paletes.php");

}elseif ($actionGet == "delete") {
$stmt = $conn->prepare("DELETE FROM seriais WHERE serial_id = :serial_id");
$stmt->bindParam(":serial_id",$serial_id);
$stmt->execute();

header("location:paletes.php");
}elseif($actionGet == "delPalete"){
    //Antes de deletar o paler, primeiro são apagados os seriais
    $stmtDelSerial = $conn->prepare("DELETE FROM seriais WHERE palete_id = :palete_id");
    $stmtDelSerial->bindParam(":palete_id",$serial_id);
    $stmtDelSerial->execute();
    //Depois i palet é de fato apagado
    $stmt = $conn->prepare("DELETE FROM paletes WHERE palete_id = :palete_id");
    $stmt->bindParam(":palete_id",$serial_id);
    $stmt->execute();

header("location:paletes.php");

}




?>