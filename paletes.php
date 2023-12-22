<?php
include_once("conexao.php");
include_once("global.php");
include_once("querys.php");
include_once("verify_login.php");


$sessaoId = "";


if (isset($_SESSION['palet'])) {
    $sessaoId = $_SESSION['palet'];
} else {
    $_SESSION['palet'] = null;
}
include_once("templates/header.php");
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
            <input type="submit" value="Inserir">
        </form>
        <!-- Número de seriais inseridos no palet -->
        <?= $linhaSeriais ?> seriais inseridos
        <br>
        <hr>
        <table id="tbPalet">
            <!-- Título aparece quando houver ao menos um serial inserido -->
            <?php if ($linhaSeriais != 0): ?>
                <tr>
                    <th>SERIAL ID</th>
                    <th>PALETE ID</th>
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
                            <!-- Botão que remove o serial escolhido -->
                            <a href="procesPalet.php?actionGet=delete&serial_id=<?= $serial_id ?>"><button
                                    class="btnModal">Remover</button></a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach ?>
        </table>
        <hr>
        <br>
        <a href="inoutPalete.php"><button class="btnModal">Sair do palete</button></a>
    </div>
<?php else: ?>
    <?php $desliga = ''; ?>
<?php endif; ?>
<!-- ======================================== -->
<div class="container">
    <h1 class="titulo">Anderson</h1>
    <div class="registration">
        <form action="procesPalet.php" method="post">
            <input type="hidden" name="action" value="novoPalete">
            <input class="btnModal" <?= $desliga ?> type="submit" value="Novo Palete">
        </form>

        <hr>
        <table id="tbPalet">
            <tr>
                <th>PALETE ID</th>
                <th>INSERIR SERIAL</th>
                <th>DELETAR PALETE</th>
                <th>DATA</th>
            </tr>
            <?php foreach ($retornaPalete as $retPal): ?>
                <?php extract($retPal) ?>
                <tr>
                    <td>
                        <strong>
                            <?= $palete_id ?>
                        </strong>
                    </td>
                    <td>
                        <a href="inoutPalete.php?actionPalet=<?= $palete_id ?>"><button class="btnModal" <?= $desliga ?>>Palete</button></a>

                    </td>
                    <td>
                        <a href="procesPalet.php?actionGet=delPalete&serial_id=<?= $palete_id ?>"><button class="btnModal"
                                <?= $desliga ?>>Deletar Palete</button></a>
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