<?php
include_once("templates/header.php");
include_once("conexao.php");
include_once("queryes.php");
include_once("verify_login.php");
include_once("css/style.php");
include_once("permitions.php");


?>

<div class="container">
    <h1 class="titulo">Administração geral</h1>
    <div class="col-md-10 registration">

        <?php if ($perm == 1): ?>

            <h3>Cadastrar novo usuário</h3>

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

<h4>Concessão de permissões</h4>
                <div class="row">

                    <div class="col-md-2 offset-1 permition-check">
                        <label for="admin">Adm?</label>
                        <input type="checkbox" name="admin" id="admin">
                    </div>

                    <div class="col-md-2 permition-check">
                        <label for="create">Criar Posição</label>
                        <input type="checkbox" name="create" id="create">
                    </div>

                    <div class="col-md-2 permition-check">
                        <label for="read">Alocar Pallet</label>
                        <input type="checkbox" name="read" id="read">
                    </div>

                    <div class="col-md-2 permition-check">
                        <label for="update" title="Dá permissão para alterar informaçõs nas posições">Atualizar
                            Posição</label>
                        <input type="checkbox" name="update" id="update">
                    </div>

                    <div class="col-md-2 permition-check">
                        <label for="delete">Desalocar Pallet</label>
                        <input type="checkbox" name="delete" id="delete">
                    </div>

                </div>
                <br>
                <input class="putsBtn" type="submit" value="Cadastrar">
                </form>
                <hr>
                <h3 class="tite">Permissões <br> <a href="user_manage.php">Gerenciar permissões</a> </h3>
                <hr>


                <h3>Log de movimentação</h3>

                <p>Através do log de movimentação é possível obter o relatório com os nomes e ações que usuários fazem.</p>

                <a href="userLog.php">Log de ações no sisteme</a>
                <hr>
                <h3>Cadastrar informações para alocamento</h3>
                <br>

                <h5>Item Modelo</h5>
                <form action="process.php" method="post">
                    <input type="hidden" name="action" value="salvarInformacao"><!--Direciona para a query que grava a informação-->
                    <input type="hidden" name="informacaoTipo" value="itemModelo"><!--Envia o tipo da informacao-->                    
                    <input type="text" name="information" id=""> <!--Envia o nome da informação-->
                    <input type="submit" value="Salvar">
                </form>
                <hr>

                <h5>Unidade de medida</h5>
                <form action="process.php" method="post">
                    <input type="hidden" name="action" value="salvarInformacao"><!--Direciona para a query que grava a informação-->
                    <input type="hidden" name="informacaoTipo" value="unidade"><!--Envia o tipo da informacao-->                    
                    <input type="text" name="information" id=""> <!--Envia o nome da informação-->
                    <input type="submit" value="Salvar">
                </form>
                <hr>

                <h5>Contratante</h5>
                <form action="process.php" method="post">
                    <input type="hidden" name="action" value="salvarInformacao"><!--Direciona para a query que grava a informação-->
                    <input type="hidden" name="informacaoTipo" value="contratante"><!--Envia o tipo da informacao-->                    
                    <input type="text" name="information" id=""> <!--Envia o nome da informação-->
                    <input type="submit" value="Salvar">
                </form>
                <hr>

                <h5>Operação</h5>
                <form action="process.php" method="post">
                    <input type="hidden" name="action" value="salvarInformacao"><!--Direciona para a query que grava a informação-->
                    <input type="hidden" name="informacaoTipo" value="operacao"><!--Envia o tipo da informacao-->                    
                    <input type="text" name="information" id=""> <!--Envia o nome da informação-->
                    <input type="submit" value="Salvar">
                </form>
                <hr>

                <h5>Origem</h5>
                <form action="process.php" method="post">
                    <input type="hidden" name="action" value="salvarInformacao"><!--Direciona para a query que grava a informação-->
                    <input type="hidden" name="informacaoTipo" value="origem"><!--Envia o tipo da informacao-->                    
                    <input type="text" name="information" id=""> <!--Envia o nome da informação-->
                    <input type="submit" value="Salvar">
                </form>
                <hr>

                <h5>Destino</h5>
                <form action="process.php" method="post">
                    <input type="hidden" name="action" value="salvarInformacao"><!--Direciona para a query que grava a informação-->
                    <input type="hidden" name="informacaoTipo" value="destino"><!--Envia o tipo da informacao-->                    
                    <input type="text" name="information" id=""> <!--Envia o nome da informação-->
                    <input type="submit" value="Salvar">
                </form>
                <hr>

            <?php else: ?>

                <h1 class="titulo">Somente para administrador</h1>

            <?php endif; ?>




        

    </div>


</div>

<?php include_once("templates/footer.php") ?>