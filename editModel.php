<?php
include_once("templates/header.php");
include_once("queryes.php");
include_once("verify_login.php");

include_once("permitions.php");

$id_modelo = filter_input(INPUT_GET, "id_modelo");
$action = filter_input(INPUT_POST, "action");
$editAlocamento = filter_input(INPUT_POST, "editAlocamento");

if ($id_modelo) {
    $stmt = $conn->prepare("SELECT * FROM modelos WHERE id_modelo = :id_modelo");
    $stmt->bindParam("id_modelo", $id_modelo);
    $stmt->execute();
    $returnModelo = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<div class="container">


    <div class="registration">
        <?php if (isset($id_modelo)): ?>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="setModelo">
                <input type="hidden" name="id_modelo" value="<?= $returnModelo['id_modelo'] ?>">
                <input class="puts" type="text" name="" id="" value="<?= $returnModelo['id_modelo'] ?>" disabled>
                <input class="puts" type="text" name="modelo" id="" value="<?= $returnModelo['modelo'] ?>">
                <input class="btnModal" type="submit" value="Salvar edição">
            </form>
        <?php endif; ?>
        <?php if ($action == "editAloc"): ?>

            <?php

            //Query que retorna informaçõe para alocamento de palet
            $stmtInformacoesAlocamento = $conn->prepare("SELECT * FROM listainformacoescadastrar WHERE informacao_id = :id");
            $stmtInformacoesAlocamento->bindParam(":id", $editAlocamento);
            $stmtInformacoesAlocamento->execute();
            $linhasInformacao = $stmtInformacoesAlocamento->fetch(PDO::FETCH_ASSOC);


            ?>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="editInfAloc">
                <input class="puts" type="number" name="id_modelo" id="" value="<?= $linhasInformacao['informacao_id'] ?>" readonly>
                <input class="puts" type="text" name="informacaoTipo" id="" value="<?= $linhasInformacao['tipo_informacao'] ?>" readonly>
                <input class="puts" type="text" name="information" id="" value="<?= $linhasInformacao['informacao'] ?>">
                <input class="btnModal" type="submit" value="Salvar">
            </form>
        <?php endif; ?>
    </div>
</div>


<?php include_once("templates/footer.php") ?>