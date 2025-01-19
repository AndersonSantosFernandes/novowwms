<?php 

include_once("conexao.php"); 
include_once("global.php");

if(isset($_SESSION['palet'])){
$paletLog = $_SESSION['palet'];
}

// Query que retorna os paletes alocados
$stmtPalete = $conn->query("SELECT * FROM paletes pa INNER JOIN posicoes po WHERE pa.palete_id = po.palete_id");
$stmtPalete->execute();
$retornaPalete = $stmtPalete->fetchAll(PDO::FETCH_ASSOC);

// Query que retorna os paletes não alocados
$stmtPaleteDesalocado = $conn->query("SELECT * FROM paletes");
$stmtPaleteDesalocado->execute();
$retornaPaleteDesalocado = $stmtPaleteDesalocado->fetchAll(PDO::FETCH_ASSOC);


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


// Query que retorna ações de movimentações de insumos

$stmtInsumos = $conn->query("SELECT * FROM log_insumos");
$stmtInsumos->execute();
$retornaInsumos = $stmtInsumos->fetchAll(PDO::FETCH_ASSOC);


?>