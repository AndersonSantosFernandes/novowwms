<?php
include_once("templates/header.php");
include_once("conexao.php");
include_once("queryes.php");
include_once("verify_login.php");
include_once("css/style.php");
include_once("permitions.php");


?>

<div class="container">
    <h1 class="titulo">Cadastrar novo usuário</h1>
    <div class="col-md-10 registration">

        <?php if ($perm == 1): ?>

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
                <hr>

                <h3 class="tite">Permissões <a href="user_manage.php">Gerenciar permissões</a> </h3>

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
                        <label for="update" title="Dá permissão para alterar informaçõs nas posições">Atualizar Posição</label>
                        <input type="checkbox" name="update" id="update">
                    </div>

                    <div class="col-md-2 permition-check">
                        <label for="delete">Desalocar Pallet</label>
                        <input type="checkbox" name="delete" id="delete">
                    </div>

                </div>
                <hr>
                <input class="putsBtn" type="submit" value="Cadastrar">

            <?php else: ?>

                <h1 class="titulo">Só admnistrador pode cadastrar novo usuário</h1>

            <?php endif; ?>




        </form>

    </div>


</div>

<?php include_once("templates/footer.php") ?>