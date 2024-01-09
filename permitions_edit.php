<?php
include_once("templates/header.php");
include_once("conexao.php");
include_once("permitions.php");

include_once("permitions.php");

if ($_GET['a'] == 1) {
    $admin = "checked";

} else {
    $admin = "";
}
if ($_GET['c'] == 1) {
    $create = "checked";

} else {
    $create = "";
}
if ($_GET['r'] == 1) {
    $read = "checked";

} else {
    $read = "";
}
if ($_GET['u'] == 1) {
    $update = "checked";

} else {
    $update = "";
}
if ($_GET['d'] == 1) {
    $delete = "checked";
 
} else {
    $delete = "";
}
$email = $_GET['email'];

?>

<div class="container">
    <h1 class="titulo">Alterar permissões</h1>
    <div class="col-md-10  registration">

        <?php if ($perm == 1): ?>

            <form class="form-cad" action="process.php" method="post">

                <input type="hidden" name="action" value="update-permitions">

                <div>
                    <input class="puts" type="email" name="email" id="" readonly value="<?= $email ?>" style="text-align: center;">
                </div>

                <hr>

                <h3 class="tite">Permissões</h3>

                <div class="row checkbx">

                    <div class="permition-check">
                        <label for="admin">Adm?</label>
                        <input type="checkbox" name="admin" id="admin" <?= $admin ?>>
                    </div>

                    <div class="permition-check">
                        <label for="create">Criar posição</label>
                        <input type="checkbox" name="create" id="create" <?= $create ?>>
                    </div>

                    <div class="permition-check">
                        <label for="read">Alocar Pallet</label>
                        <input type="checkbox" name="read" id="read" <?= $read ?>>
                    </div>

                    <div class="permition-check">
                        <label for="update">Atualizar posição</label>
                        <input type="checkbox" name="update" id="update" <?= $update ?>>
                    </div>

                    <div class="permition-check">
                        <label for="delete">Desalocar pallet</label>
                        <input type="checkbox" name="delete" id="delete" <?= $delete ?>>

                    </div>

                </div>
                <hr>
                <input class="btn btn-primary" type="submit" value="Alterar">
                <!-- <a class="putsBtn" href="process.php?action2=delUser&userEmail=<?=$email?>">Deletar usuário</a> -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Deletar usuário
</button>
<button class="btn btn-primary" > <a style="color:white; text-decoration: none;" href="newUser.php">Voltar</a> </button>
                <?php else: ?>

                <h1>Só admnistrador pode cadastrar novo usuário</h1>

            <?php endif; ?>


        </form>

    </div>


</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">DELETAR USUÁRIO</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            Tem certeza que quer deletar o usuário <?=$email?>?
            <br>
            A ação é irreversível.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">
        <a style="color:black; text-decoration: none;"  href="process.php?action2=delUser&userEmail=<?=$email?>">Deletar usuário</a>        
    </button>
      </div>
    </div>
  </div>
</div>
<?php include_once("templates/footer.php") ?>