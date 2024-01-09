<?php
include_once("templates/header.php");
include_once("permitions.php");
include_once("verify_login.php");
?>

<div class="container">
    <h1>Embalagens</h1>
    <div class="registration">
        <h3>Retirada de caixas</h3>

        <form action="procesEmbalagens.php" method="post">
            <input type="hidden" name="action" value="subtrairCaixas">

            <label for="modelo">Modelo</label><br>
            <select class="puts" name="modelo" id="modelo"
                title="Se o modelo não estiver aqui, vá para página cadastrar modelos e insira um novo"
                aria-readonly="">
                <option readonly value="">Selecione</option>
                <?php foreach ($returnModel as $retMod): ?>
                    <?php extract($retMod) ?>
                    <!-- De toda a lista de produtos, retorna apenas os que começam com "Caixa" -->
                    <?php if (substr($modelo, 0, 5) == "Caixa"): ?>
                        <option value="<?= $modelo ?>">
                            <?= $modelo ?>
                        </option>

                    <?php endif; ?>

                <?php endforeach; ?>

            </select>
            <input class="puts" type="number" name="quantidadeAlterada" id="quantidadeAlterada" placeholder="Quantidade Saída">
            <input class="btnModal" type="submit" value="Executar">
            </form>
            <hr>
            <i class="fa-solid fa-file-excel"><a class="linkCsv" href="csv.php?estado=caixas"> CSV Caixas</a></i>
            <hr>
                        <table>
                            <thead>
                                <tr>
                                    <th>Modelo</th>
                                    <th>Qt. disponível</th>
                                </tr>
                            </thead>
                        <tbody>

                        
            <?php foreach ($returnModel as $retMod): ?>
                    <?php extract($retMod) ?>
                    <!-- De toda a lista de produtos, retorna apenas os que começam com "Caixa" -->
                    <?php if (substr($modelo, 0, 5) == "Caixa"): ?>
                        <tr>
                            <td><?= $modelo ?></td>
                            <td><?= $quantidade ?></td>
                        </tr>
                        
                        
                    <?php endif; ?>

                <?php endforeach; ?>
                </tbody>
                </table>
        <br>
        <h3>Repor caixas no estoque</h3>

        <?php if ($permU == 1): ?>
            <form action="procesEmbalagens.php" method="post">
            <input type="hidden" name="action" value="reporCaixas">

            <label for="modelo">Modelo</label><br>
            <select class="puts" name="modelo" id="modelo"
                title="Se o modelo não estiver aqui, vá para página cadastrar modelos e insira um novo"
                aria-readonly="">
                <option readonly value="">Selecione</option>
                <?php foreach ($returnModel as $retMod): ?>
                    <?php extract($retMod) ?>
                    <!-- De toda a lista de produtos, retorna apenas os que começam com "Caixa" -->
                    <?php if (substr($modelo, 0, 5) == "Caixa"): ?>
                        <option value="<?= $modelo ?>">
                            <?= $modelo ?>
                        </option>

                    <?php endif; ?>

                <?php endforeach; ?>

            </select>
            <input class="puts" type="number" name="quantidadeAlterada" id="quantidadeAlterada" placeholder="Quantidade Entrada">
            <input class="btnModal" type="submit" value="Executar">
            </form>
            <?php else: ?>
                      <h4>Precisando repor o estoque de caixas, pedir ao admnistrador 
                        ou soicitar permissão para tal.
                      </h4>
                        
                    <?php endif; ?>         


       

    </div>
</div>

<?php include_once("templates/footer.php") ?>