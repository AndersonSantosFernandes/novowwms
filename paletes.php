<?php
include_once("templates/header.php");
include_once("conexao.php");
include_once("global.php");
include_once("querys.php");
include_once("verify_login.php");
include_once("permitions.php");

// valor que vi para process como post e volta por get para manter o modelo
//do select quando estiver inserindo serial
$voltaModelo = filter_input(INPUT_GET, "voltamodelo");
if (isset($voltaModelo)) {
    $voltando = $voltaModelo;
} else {
    $voltando = "";
}

$sessaoId = "";


if (isset($_SESSION['palet'])) {
    $sessaoId = $_SESSION['palet'];
} else {
    $_SESSION['palet'] = null;
}

// permissão para criar novo palete
if ($permC == 1) {
    $display = "block";
    $display1 = "none";
} else {
    $display = "none";
    $display1 = "block";
}

?>

<!-- Se estiver algum palete selecionado é criada uma sessao com  esse id  -->
<?php if ($_SESSION['palet']): ?>
    <!-- Acessando um palete outros botõe são desativados -->
    <?php $desliga = 'disabled = "disabled"'; ?>
    <div id="formPallete">
        <h2>Inserir seriais palete
            <!-- Número ID do palet -->
            <?= $sessaoId ?>
        </h2>
        <br>
        <form action="procesPalet.php" method="post">
            <input type="hidden" name="action" value="insereSerial">
            <!-- Input hiden que envia o id do pallete para a process -->
            <input type="hidden" name="paleteId" value="<?= $sessaoId ?>">
            <input type="text" name="serial" id="serial" autofocus>
            <label for="modelo">Modelo</label><br>
            <select class="puts" name="modelo" id="modelo"
                title="Se o modelo não estiver aqui, vá para página cadastrar modelos e insira um novo">
                <option value="<?= $voltando ?>">
                    <?= $voltando ?>
                </option>
                <?php foreach ($returnModel as $retMod): ?>
                    <?php extract($retMod) ?>

                    <option value="<?= $modelo ?>">
                        <?= $modelo ?>
                    </option>

                <?php endforeach; ?>

            </select>
            <input class="btnModal" type="submit" value="Inserir">
        </form>
        <!--  -->

        <!--  -->
        <!-- Número de seriais inseridos no palet -->
        <h5>
            <?= $linhaSeriais ?> seriais inseridos
        </h5>

        <a href="inoutPalete.php"><button class="btnModal">Sair do palete</button></a>
        <hr>
        
        <table id="tbPalet">
            <!-- Título aparece quando houver ao menos um serial inserido -->
            <?php if ($linhaSeriais != 0): ?>
                <tr>
                    <th>SERIAL ID</th>
                    <th>PALETE ID</th>
                    <th>SERIAL</th>
                    <th>SERIAL</th>
                    <th>REMOVER</th>
                </tr>
            <?php endif; ?>
            <?php foreach ($retornaSerial as $retSer): ?>
                <?php extract($retSer) ?>
                <!-- Condição que imprime apenas seriais que pertencem ao palete -->
                <?php if ($palete_id == $_SESSION['palet']): ?>
                    <tr>
                        <td>
                            <?= $serial_id ?>
                        </td>
                        <td>
                            <?= $palete_id ?>
                        </td>
                        <td>
                            <?= $serial ?>
                        </td>
                        <td>
                            <?= $modelo ?>
                        </td>
                        <td style="text-align: center; width: 35px;">
                            <!-- Botão que remove o serial escolhido -->
                            <a href="procesPalet.php?actionGet=delete&serial_id=<?= $serial_id ?>"><button
                                    style="width:25px; font-weight: bold; color: red; border: none; border-radius: 6px;">X</button></a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach ?>
        </table>
        <hr>

        <a href="inoutPalete.php"><button class="btnModal">Sair do palete</button></a>
    </div>
<?php else: ?>
    <?php $desliga = ''; ?>
<?php endif; ?>
<!-- ======================================== -->
<div class="container">
    <h1 class="titulo">Criar palete</h1>
    <div class="registration">
        <form action="procesPalet.php" method="post">
            <input type="hidden" name="action" value="novoPalete">

            <div class="cria__palete">

                <input style="display:<?= $display ?>;" class="btnModal" <?= $desliga ?> type="submit" value="Novo Palete">
                <h3 style="display:<?= $display1 ?>;">Você não pode criar um novo palete</h3>

            </div>
        </form>

        
        <h3>Paletes não alocados</h3>
        <table id="tbPalets">
            <tr style="display:block;">
                <th width="100px">PALETE ID</th>
                <th width="150px">SERIAL</th>
                <th width="300px">DELETAR ALOCAR</th>
                <th width="150px">POSIÇÃO</th>
                <th width="150px">DATA</th>
            </tr>
            <?php foreach ($retornaPaleteDesalocado as $retPalDesalocado): ?>
                <?php extract($retPalDesalocado) ?>

                <?php
                $stmtFesalocado = $conn->prepare("SELECT * FROM posicoes WHERE palete_id = :palete_id");
                $stmtFesalocado->bindParam(":palete_id", $palete_id);
                $stmtFesalocado->execute();
                $linhasDesalocado = $stmtFesalocado->rowCount();

                if ($linhasDesalocado > 0) {
                    $desabilitaDesalocado = "none";

                } else {
                    $desabilitaDesalocado = "block";

                }
                ?>

                <tr style="display:<?= $desabilitaDesalocado ?>;">
                    <td width="100px">
                        <strong>
                            <?= $palete_id ?>
                        </strong>
                    </td>
                    <td width="150px">
                        <a href="inoutPalete.php?actionPalet=<?= $palete_id ?>"><button
                                class="btnModal">Inserir</button></a>

                    </td>

                    <td width="300px">
                        <a href="procesPalet.php?actionGet=delPalete&serial_id=<?= $palete_id ?>"><button
                                class="btnModal">Deletar Palete</button></a>

                        <a href="inserirPalet.php?paleteId=<?= $palete_id ?>"><button class="btnModal">Alocar
                                Palete</button></a>
                    </td>
                    <td width="150px">
                        <h5>Não alocado</h5>

                    </td>
                    <td width="150px">
                        <strong>
                            <?= invertDate($dataPalete) ?>
                        </strong>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>

        <hr>
        <h3>Paletes alocados</h3>
        <table id="tbPalet">
            <tr>
                <th>PALETE ID</th>
                <th>CONSULTAR PALETE</th>
               
                <th>POSIÇÃO</th>
                <th>DATA</th>
            </tr>
            <?php foreach ($retornaPalete as $retPal): ?>
                <?php extract($retPal) ?>

                <?php
                $stmt = $conn->prepare("SELECT * FROM posicoes WHERE palete_id = :palete_id");
                $stmt->bindParam(":palete_id", $palete_id);
                $stmt->execute();
                $linhas = $stmt->rowCount();

                if ($linhas > 0) {
                    $desabilita = "disabled";
                    $valorBtn = "Já alocado";
                } else {
                    $desabilita = "";
                    $valorBtn = "Alocar palete";
                }
                ?>

                <tr>
                    <td>
                        <strong>
                            <?= $palete_id ?>
                        </strong>
                    </td>
                    <td>
                        <a href="inoutPalete.php?actionPalet=<?= $palete_id ?>"><button  class="btnModal"
                                <?= $desliga ?>>Consultar</button></a>

                    </td>
                  
                    <td>
                        <?= $posicao ?>

                    </td>
                    <td>
                        <strong>
                            <?= invertDate($dataPalete) ?>
                        </strong>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>

<?php include_once("templates/footer.php") ?>