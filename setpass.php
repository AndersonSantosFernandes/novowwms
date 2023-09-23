<?php include_once("templates/header.php");

include_once("verify_login.php");
include_once("css/style.php");


?>

<div class="container">
    <h1>Alterar senha</h1>
    <div class="col-md-10  registration">
        <form class="form-cad" action="process.php" method="post">
            <input  type="hidden" name="action" value="update-pass">
            <input type="hidden" name="email" value="<?= $_SESSION["user"]?>">
            <div>
                <input class="puts" type="pssword" name="password" id="" placeholder="Digite uma senha" minlength="6" maxlength="12" required>
            </div>
            <div>
                <input class="puts" type="pssword" name="confirmPassword" id="" placeholder="Confirme a senha" minlength="6" maxlength="12" required>
            </div>

            <input class="putsBtn" type="submit" value="Alterar senha">
        </form>

    </div>

</div>

<?php include_once("templates/footer.php") ?>