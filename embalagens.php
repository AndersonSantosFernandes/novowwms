<?php
include_once("templates/header.php");
include_once("permitions.php");
include_once("verify_login.php");
include_once("userLogado.php");
include_once("querys.php");
?>

<div class="container">
    <h1>Insumos</h1>
    <div class="registration">
        <h3>Retirada de insumos</h3>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Log de entradas e saídas
        </button>

        <form action="procesEmbalagens.php" method="post">
            <input type="hidden" name="action" value="subtrairCaixas">
            <input type="hidden" name="operacao" value="retirada">
                <input type="hidden" name="usuario" value="<?= $returnFulName?>">

            <label for="modelo">Modelo</label><br>
            <select class="puts" name="modelo" id="modelo"
                title="Se o modelo não estiver aqui, vá para página cadastrar modelos e insira um novo"
                aria-readonly="">
                <option readonly value="">Selecione</option>
                <?php foreach ($returnModel as $retMod): ?>
                    <?php extract($retMod) ?>
                    <!-- De toda a lista de produtos, retorna apenas os que começam com "Caixa" -->
                    <?php if ($tipo == "INSUMOS"): ?>
                        <option value="<?= $modelo ?>">
                            <?= $modelo ?>
                        </option>

                    <?php endif; ?>

                <?php endforeach; ?>

            </select>
            <input class="puts" type="number" name="quantidadeAlterada" id="quantidadeAlterada"
                placeholder="Quantidade Saída">
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
                    <?php if ($tipo == "INSUMOS"): ?>
                        <tr>
                            <td>
                                <?= $modelo ?>

                            </td>
                            <td>
                                <input type="number" name="quantidade" id="<?= substr($modelo, 0, 5) . "_" . substr($modelo, 6, 2) ?>"
                                    value="<?= $quantidade ?>" readonly>
                                <!-- <input type="text" name="quantidade" id="quantidade" value="<?= substr($modelo, 0, 5) . "_" . substr($modelo, 6, 2) ?>"> -->
                            </td>
                        </tr>


                    <?php endif; ?>

                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <h3>Repor insumos no estoque</h3>

        <?php if ($permU == 1): ?>
            <form action="procesEmbalagens.php" method="post">
                <input type="hidden" name="action" value="reporCaixas">
                <input type="hidden" name="operacao" value="reposicao">
                <input type="hidden" name="usuario" value="<?= $returnFulName?>">

                <label for="modelo">Modelo</label><br>
                <select class="puts" name="modelo" id="modelo"
                    title="Se o modelo não estiver aqui, vá para página cadastrar modelos e insira um novo"
                    aria-readonly="">
                    <option readonly value="">Selecione</option>
                    <?php foreach ($returnModel as $retMod): ?>
                        <?php extract($retMod) ?>
                        <!-- De toda a lista de produtos, retorna apenas os que começam com "Caixa" -->
                       
                            <?php if ($tipo == "INSUMOS"): ?>
                     

                            <option value="<?= $modelo ?>">
                                <?= $modelo ?>
                            </option>

                        <?php endif; ?>

                    <?php endforeach; ?>

                </select>
                <input class="puts" type="number" name="quantidadeAlterada" id="quantidadeAlterada"
                    placeholder="Quantidade Entrada">
                <input class="btnModal" type="submit" value="Executar">
            </form>
        <?php else: ?>
            <h4>Precisando repor o estoque de caixas, pedir ao admnistrador
                ou soicitar permissão para tal.
            </h4>

        <?php endif; ?>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Saída de insumos</h1>
                <br><br>
                <i class="fa-solid fa-file-excel"><a class="linkCsv" href="csv.php?estado=logMovimentacao"> CSV Log de movimentação</a></i>
               
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="inModall">
                 <hr>    
                <table>                        
                        <thead>
                            <tr>
                                <th>Modelo</th>
                                <th>Ação</th>
                                <th>Quantidade</th>
                                <th>Usuário</th>
                                <th>Data</th>
                            </tr>
                        </thead>  
                        <tbody>                                         
                <?php foreach ($retornaInsumos as $insumos): ?>
                        <?php extract($insumos) ?>
                        <tr>
                            <td><?=$modelo?></td>
                            <td><?=$acao?></td>
                            <td><?=$quantidade?></td>
                            <td><?=$usuario?></td>
                            <td><?= invertDate($data)?></td>
                        </tr>

                    <?php endforeach; ?>
                    </tbody> 
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>
<script src="./scripts/script.js"></script>
<?php include_once("templates/footer.php") ?>