<?php
include_once("templates/header.php");
include_once("queryes.php");
include_once("userLogado.php");
include_once("verify_login.php");

include_once("permitions.php");

$posicao = filter_input(INPUT_POST, "position");


$stmt = $conn->prepare("SELECT * FROM posicoes WHERE posicao = :posicao");
$stmt->bindParam(":posicao", $posicao);
$stmt->execute();
$return = $stmt->fetch(PDO::FETCH_ASSOC);

if ($permU == 1) {
    $edit = "";
    $edit1 = "";
    $msg = "";
} else {
    $edit = "style='display: none'";
    $edit1 = "readonly";
    $msg = "<h3> Edição bloqueada </h3>";
}

?>


<div class="container">
    <h1 class="titulo">Editar observação</h1>
    <div class="registration">

        <?= $msg ?>
        <form action="process.php" method="post">
            <input type="hidden" name="action" value="newPallet"> <!-- Ação na página process.php -->
            <input type="hidden" name="estado" value="Ocupado">
            <input type="hidden" name="direcao" value="editado">
            <input type="hidden" name="returnFulName" value="<?= $returnFulName ?>"><!--Nome completo do usuário-->
            <table>
                <tr>
                    <td>
                        <!--posição-->
                        Posição  <br>
                        <input class="puts" type="text" name="fullPosition" value="<?= $return['posicao'] ?>" readonly>
                        
                    </td>
                    <td>
                        <!--modelo-->
                        Modelo  <br>
                        <input class="puts" type="text" name="modelo" placeholder="Modelo"
                            value="<?= $return['modelo'] ?>" readonly>
                        
                    </td>
                    <td>
                        <!--status-->
                        Status  <br>
                        <input class="puts" type="text" name="status" id="" placeholder="Status "
                            value="<?= $return['status'] ?>" readonly>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                            <!--nota fiscal-->
                            Nota fiscal  <br>
                        <input class="puts" type="text" name="nota" id="nota" placeholder="Nota fiscal"
                            value="<?= $return['nota'] ?>" <?= $edit1 ?>>
                    
                    </td>
                    <td>
                            <!--Quantidade-->
                            Quantidade  <br>
                        <input class="puts" type="number" name="quantidade" id="" value="<?= $return['quantidade'] ?>" <?= $edit1 ?>>
                    </td>
                    <td>
                        <!--Modelo item-->
                        Item / Modelo <br>
                        <input class="puts" type="text" name="modeloItem" id="" value="<?= $return['itemModelo'] ?>" <?= $edit1 ?>   >
                    </td>
                </tr>
                <tr>
                    <td>
                        <!--Unidade de medida-->
                        Unidade de medida <br>
                        <input class="puts" type="text" name="medidaUnidade" id="" value="<?= $return['unudMedida'] ?>"<?= $edit1 ?>  >
                    </td>
                    <td>
                        <!--Contratante-->
                        Contratante  <br>
                        <input class="puts" type="text" name="contrat" id="" value="<?= $return['contratante'] ?>" <?= $edit1 ?> >
                    </td>
                    <td>
                        <!--Operaçã-->
                        Operação <br>
                        <input class="puts" type="text" name="operat" id="" value="<?= $return['operacao'] ?>" <?= $edit1 ?> >
                    </td>
                </tr>
                <tr>
                    <td>
                        <!--Origem-->
                        Origem <br>
                        <input class="puts" type="text" name="origem" id="" value="<?= $return['origem'] ?>" <?= $edit1 ?> >
                    </td>
                    <td>
                        <!--Destino-->
                        Destino <br>
                        <input class="puts" type="text" name="destino" id="" value="<?= $return['destino'] ?>" <?= $edit1 ?> >
                    </td>
                    <td>

                    </td>
                </tr>

            </table>

                 <!--comentário-->
                 Observação  <br>
            <textarea name="observacao" id="observacao" cols="30" rows="3"
                <?= $edit1 ?>><?= $return['observacao'] ?></textarea>
        


            <input class="btnModal" <?= $edit ?> type="submit" value="Salvar edição">
        </form>
        <button class="btnModal"><a href="buscarPalet.php">Cancelar</a></button>
    </div>

</div>















<?php include_once("templates/footer.php") ?>