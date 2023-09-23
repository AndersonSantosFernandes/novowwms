<?php
include_once("templates/header.php");
include_once("queryes.php");
include_once("userLogado.php");
include_once("verify_login.php");
include_once("css/style.php");
include_once("permitions.php");

$posicao = filter_input(INPUT_POST, "position");


$stmt = $conn->prepare("SELECT * FROM posicoes WHERE posicao = :posicao");
$stmt->bindParam(":posicao", $posicao);
$stmt->execute();
$return = $stmt->fetch(PDO::FETCH_ASSOC);

if($permU == 1){
    $edit = "";
    $edit1 = "";
    $msg = "";
}else{
    $edit = "style='display: none'";
    $edit1 = "readonly"; 
    $msg = "<h3> Edição bloqueada </h3>";  
}

?>


<div class="container">
    <h1 class="titulo">Editar observação</h1>
    <div class="registration">

    <?=$msg?>
        <form action="process.php" method="post">
            <input type="hidden" name="action" value="newPallet">  <!-- Ação na página process.php -->
            <input type="hidden" name="estado" value="Ocupado">
            <input type="hidden" name="direcao" value="editado">
            <input type="hidden" name="returnFulName" value="<?=$returnFulName?>">  <!--Nome completo do usuário--> 
            <input class="puts" type="text" name="fullPosition"  value="<?= $return['posicao'] ?>" readonly>
            <input class="puts" type="text" name="modelo"  placeholder="Modelo" value="<?= $return['modelo'] ?>" readonly>
            <input class="puts" type="text" name="status" id="" placeholder="Status " value="<?= $return['status'] ?>" readonly>
            <input class="puts" type="text" name="nota" id="nota" placeholder="Nota fiscal" value="<?= $return['nota'] ?>" <?=$edit1?>>
            <textarea name="observacao" id="observacao" cols="30" rows="3" <?=$edit1?>><?= $return['observacao'] ?></textarea>


            <input class="btnModal" <?=$edit?> type="submit" value="Salvar edição">
        </form>
    </div>

</div>















<?php include_once("templates/footer.php") ?>