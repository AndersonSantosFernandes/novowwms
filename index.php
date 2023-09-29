<?php

include_once("global.php");
include_once("models/Message.php");
// if (isset($_SESSION['user'])) {
//     header("location:initial.php");
// }

$messagen = new Message();
$exibeMensagem = $messagen->getMessage();
if (!empty($exibeMensagem['mensage'])) {
    $messagen->clearMessage();
}
?>
<link rel="stylesheet" href="css/style.css">

<!--Link bootstrap-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.css"
    integrity="sha512-drnvWxqfgcU6sLzAJttJv7LKdjWn0nxWCSbEAtxJ/YYaZMyoNLovG7lPqZRdhgL1gAUfa+V7tbin8y+2llC1cw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--Link font awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<header>
    <h1 class="titulo">Controle de estoque</h1>
</header>
<html>

    <body>

    <?php if (!empty($exibeMensagem['mensage'])): ?>

<div class="<?php echo $exibeMensagem['type']; ?>">

    <?= $exibeMensagem['mensage'] ?>

</div>

<?php endif; ?>

        <div class="container">
            <div class=" login">
                <div class="in">
                    <h3 class="tituloLogin">Faça seu login</h3><br>
                    <form action="authenticate.php" method="post">
                        <div>
                            <label for="mail"> <i class="fas fa-envelope"></i> </label>
                            <input type="email" name="email" id="mail" placeholder="Digite se e-mail">
                        </div>
                        <div>
                            <label for="pass"> <i class="fas fa-key"></i> </label>
                            <input type="password" name="password" id="pass" placeholder="Digite sua senha">
                        </div>
                        <i class="fas fa-sign-in"></i>
                        <input type="submit" value="Entrar">
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>