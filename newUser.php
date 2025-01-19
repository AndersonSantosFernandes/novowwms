<?php
include_once("templates/header.php");
include_once("conexao.php");
include_once("queryes.php");
// include_once("verify_login.php");
include_once("permitions.php");

$minutoss = $tempo / 60;

?>

<div class="container">
    <h1 class="titulo">Administração geral</h1>
    <div class="col-md-10 registration">

        <?php if ($perm == 1): ?>

            <h3>Cadastrar novo usuário</h3>
            <!-- formulário para cadastrar novo usuário -->
            <form class="form-cad" action="process.php" method="post">

                <input type="hidden" name="action" value="create">
                <div>
                    <input class="puts" type="text" name="name" id="" placeholder="Digite um nome">
                </div>
                <div>
                    <input class="puts" type="text" name="lastName" id="" placeholder="Digite um sobrenome">
                </div>
                <div>
                    <input class="puts" type="email" name="email" id="" placeholder="Digite um email">
                </div>
                <div>
                    <input class="puts" type="pssword" name="password" id="" placeholder="Digite uma senha">
                </div>
                <div>
                    <input class="puts" type="pssword" name="confirmPassword" id="" placeholder="Confirme a senha">
                </div>
                <br>
                <!-- Checkbox para alterar permissões -->
                <h4>Concessão de permissões</h4>
                <div class="row">

                    <div class="col-md-2 offset-1 permition-check">
                        <label for="admin">Adm?</label>
                        <br>
                        <input type="checkbox" name="admin" id="admin">
                    </div>

                    <div class="col-md-2 permition-check">
                        <label for="create">Criar Posição</label>
                        <br>
                        <input type="checkbox" name="create" id="create">
                    </div>

                    <div class="col-md-2 permition-check">
                        <label for="read">Alocar Pallet</label>
                        <br>
                        <input type="checkbox" name="read" id="read">
                    </div>

                    <div class="col-md-2 permition-check">
                        <label for="update" title="Dá permissão para alterar informaçõs nas posições">Atualizar
                            Posição</label>
                            <br>
                        <input type="checkbox" name="update" id="update">
                    </div>

                    <div class="col-md-2 permition-check">
                        <label for="delete">Desalocar Pallet</label>
                        <br>
                        <input type="checkbox" name="delete" id="delete">
                    </div>

                </div>
                <br>
                <input class="putsBtn" type="submit" value="Cadastrar">
            </form>
            <hr>
            <h3 class="tite">Permissões <br> <a href="user_manage.php">Gerenciar permissões</a> </h3>

            <hr>
            <h3 class="tite">Tempo de sessão </h3>
                <form action="process.php" method="post">

                <input type="hidden" name="action" value="mudaTempoSessao">

                
                <select class="puts" name="minSessao" id="minSessao">
                <option value="300"><?= $minutoss ?></option> 
                <option value="300">05</option>
                    <option value="600">10</option>
                    <option value="900">15</option>
                    <option value="1200">20</option>
                    <option value="1500">25</option>
                    <option value="60">01</option>
                </select>
                <input class="btnModal" type="submit" value="Mudar">
                </form>
                <h5>A sessão está configurada para expirar após <?= $minutoss ?> minutos de inatividade</h5>
                <hr>
            <h3>Cadastrar informações para alocamento</h3>
            <br>
            <!--Cadastrar novo item modelo-->
            <h5>Novo Item Modelo</h5>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="salvarInformacao">
                <!--Direciona para a query que grava a informação-->
                <input type="hidden" name="informacaoTipo" value="itemModelo">
                <!--Envia o tipo da informacao-->
                <input class="puts" type="text" name="information" id="">
                <!--Envia o nome da informação-->
                <input class='btnModal' type="submit" value="Salvar">
                <button class="btnModal"><a href="modelos.php?editAction=alocamento&tipo=itemModelo">Editar</a></button>
            </form>

            <hr>

            <h5>Nova Unidade de Medida</h5>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="salvarInformacao">
                <!--Direciona para a query que grava a informação-->
                <input type="hidden" name="informacaoTipo" value="unidade">
                <!--Envia o tipo da informacao-->
                <input class="puts" type="text" name="information" id="">
                <!--Envia o nome da informação-->
                <input class='btnModal' type="submit" value="Salvar">
                <button class="btnModal"><a href="modelos.php?editAction=alocamento&tipo=unidade">Editar</a></button>
            </form>

            <hr>

            <h5>Novo Contratante</h5>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="salvarInformacao">
                <!--Direciona para a query que grava a informação-->
                <input type="hidden" name="informacaoTipo" value="contratante">
                <!--Envia o tipo da informacao-->
                <input class="puts" type="text" name="information" id="">
                <!--Envia o nome da informação-->
                <input class='btnModal' type="submit" value="Salvar">
                <button class="btnModal"><a href="modelos.php?editAction=alocamento&tipo=contratante">Editar</a></button>
            </form>
            <hr>

            <h5>Nova Operação</h5>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="salvarInformacao">
                <!--Direciona para a query que grava a informação-->
                <input type="hidden" name="informacaoTipo" value="operacao">
                <!--Envia o tipo da informacao-->
                <input class="puts" type="text" name="information" id="">
                <!--Envia o nome da informação-->
                <input class='btnModal' type="submit" value="Salvar">
                <button class="btnModal"><a href="modelos.php?editAction=alocamento&tipo=operacao">Editar</a></button>
            </form>
            <hr>

            <h5>Novos Origem / Destino</h5>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="salvarInformacao">
                <!--Direciona para a query que grava a informação-->
                <input type="hidden" name="informacaoTipo" value="origem">
                <!--Envia o tipo da informacao-->
                <input class="puts" type="text" name="information" id="">
                <!--Envia o nome da informação-->
                <input class='btnModal' type="submit" value="Salvar">
                <button class="btnModal"><a href="modelos.php?editAction=alocamento&tipo=origem">Editar</a></button>
            </form>
            <hr>

            <h5>Novo Status</h5>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="cadStatus">

                <input class="puts" type="text" name="status" id="">

                <input class="btnModal" type="submit" value="Salvar">
                <button class="btnModal"><a href="modelos.php?editAction=status">Editar </a></button>
            </form>

            <hr>

            <h5>Novo Modelo</h5>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="cadModelo">

                <input class="puts" type="text" name="nomeModelo" id="nomeModelo">
            <!--  -->
                <select class="puts" name="cadTipoMod" id="editAlocamento">
                        <?php foreach ($linhasInformacao as $information): ?>
                            <?php extract($information) ?>

                            <?php if ($tipo_informacao == "itemModelo"): ?>
                                <option value="<?= $informacao ?>"> <?= $informacao ?> </option>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </select>

                <input class="btnModal" type="submit" value="Salvar modelo">
                <button class="btnModal"><a href="modelos.php?editAction=modelo">Editar</a></button>
            </form>
            <hr>
            <h5>Bloquear posições</h5>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="bloquearPosicao">
                <input type="hidden" name="estado" value="Bloqueado">
                <select class="puts" name="id_modelo" id="modelo">
                    <option value="">Selecione</option>
                    <?php foreach ($returnPosicoes as $posicoes): ?>
                        <?php extract($posicoes); ?>
                        <!-- Trcho if faz retornar apenas posições livres -->
                        <?php if ($estado == "Livre"): ?>
                            <option value="<?= $posicao_id ?>"><?= $posicao ?> = <?= $estado ?></option>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </select>
                <input class="btnModal" type="submit" value="Bloquear">
            </form>

            <hr>
            <h5>Alterar para Pickin</h5>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="bloquearPosicao">
                <input type="hidden" name="estado" value="Picking">
                <select class="puts" name="id_modelo" id="fullPosition">
                    <option value="">Selecione</option>
                    <?php foreach ($returnPosicoes as $posicoes): ?>
                        <?php extract($posicoes); ?>
                        <!-- Trcho if faz retornar apenas posições livres -->
                        <?php if ($estado == "Livre"): ?>
                            <option value="<?= $posicao_id ?>"><?= $posicao ?> = <?= $estado ?></option>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </select>
                <input class="btnModal" type="submit" value="Picking">
            </form>

            <hr>
            <h5>Restaurar posições</h5>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="bloquearPosicao">
                <input type="hidden" name="estado" value="Livre">
                <select class="puts" name="id_modelo" id="tipo">
                    <option value="">Selecione</option>
                    <?php foreach ($returnPosicoes as $posicoes): ?>
                        <?php extract($posicoes); ?>
                        <!-- Trcho if faz retornar apenas posições bloqueadas e de picking-->
                        <?php if ($estado == "Bloqueado" || $estado == "Picking"): ?>
                            <option value="<?= $posicao_id ?>"><?= $posicao ?> = <?= $estado ?></option>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </select>
                <input class="btnModal" type="submit" value="Restaurar">
            </form>


            <hr>
            <h5>Criar posições</h5>
            <form action="process.php" method="post">
                <input type="hidden" name="action" value="novaPosicao">
                <div class="row">
                    <div class="col-md-2">
                        <label for="rua">Rua</label>
                        <br>
                        <select name="rua" id="rua">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="posicao">Psição</label>
                        <br>
                        <select name="posicao" id="posicao">
                        <?php 
                        function number($num) // Função acrescenta um zero a esquerda se o valor for menor que dez
                        {
                            if ($num < 10) {
                                return $num = "0" . $num;
                            } else {
                                return $num;
                            }
                        }
                        for ($i=1; $i < 99 ; $i++) { 
                            echo "<option value=" .number($i) . ">" . number($i) . "</option>";
                        }
                        ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="altura">Altura</label>
                        <br>
                        <select name="altura" id="altura">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="profundidade">Profundidade</label>
                        <br>
                        <select name="profundidade" id="profundidade">

                            <option value="A">A</option>
                            <option value="B">B</option>

                        </select>
                    </div>
                </div>
                            <input class="btnModal" type="submit" value="Salvar">
            </form>
            <hr>
            
        <?php else: ?>

            <h1 class="titulo">Somente para administrador</h1>

        <?php endif; ?>

    </div>

</div>

<?php include_once("templates/footer.php") ?>