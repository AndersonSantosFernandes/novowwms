<?php
include_once("templates/header.php");
include_once("queryes.php");
include_once("userLogado.php");
include_once("permitions.php");
include_once("models/Message.php");

$mensagens = new Message();
$getSerial = filter_input(INPUT_POST, "getSerial");

$stmt = $conn->prepare("SELECT po.posicao,pa.palete_id,se.serial FROM posicoes po INNER JOIN paletes pa INNER JOIN seriais se WHERE
po.palete_id = pa.palete_id AND pa.palete_id = se.palete_id AND se.serial = :getSerial");

$stmt->bindParam(":getSerial", $getSerial);
$stmt->execute();
$retorno = $stmt->fetch(PDO::FETCH_ASSOC);
$linha = $stmt->rowCount();

if($linha > 0){
    $display = "block";
}else{
    $display = "none";
    $mensagens->setMessage("Serial não encontrado em uma posição","fall");
  
}

?>

<div class="container">
    <h1 class="titulo">Inserir Pallet</h1>
    <div class="registration">
        <form action="" method="post">
            <label for="getSerial">Localizar serial</label>
            <input class="puts" type="text" name="getSerial" id="getSerial" autofocus>
            <input type="submit" value="Pesquisar" class="btnModal">
        </form>

        <div class="returnSerial" style="display: <?= $display ?>;">
            <label for="posicao">Posição</label>
            <input class="puts" type="text" name="" id="posicao" value="<?= $retorno['posicao'] ?>" readonly>
            <label for="pid">Palete ID</label>
            <input class="puts" type="text" name="" id="pid" value="<?= $retorno['palete_id'] ?>" readonly>
            <label for="serial">Serial</label>
            <input class="puts" type="text" name="" id="serial" value="<?= $retorno['serial'] ?>" readonly>
        </div>

    </div>

</div>

<?php include_once("templates/footer.php") ?>