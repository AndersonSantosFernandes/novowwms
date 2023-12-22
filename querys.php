<?php 

include_once("conexao.php");
include_once("global.php");

if(isset($_SESSION['palet'])){
$paletLog = $_SESSION['palet'];
}
// Query que retorna os paletes ativos
$stmtPalete = $conn->query("SELECT*FROM paletes");
$stmtPalete->execute();
$retornaPalete = $stmtPalete->fetchAll(PDO::FETCH_ASSOC);
// Query que retorna apena os seriais pertencentes ao palete ativo na sessão
$stmtSerial = $conn->prepare("SELECT*FROM seriais WHERE palete_id = :palete_id");
$stmtSerial->bindParam(":palete_id",$paletLog);
$stmtSerial->execute();
$retornaSerial = $stmtSerial->fetchAll(PDO::FETCH_ASSOC);
$linhaSeriais = $stmtSerial->rowCount();

// Query que retorna posições disponiveis
$stmtPosicao = $conn->query("SELECT * FROM posicoes");
$stmtPosicao->execute();
$retornaPosicao = $stmtPosicao->fetchAll(PDO::FETCH_ASSOC);

?>