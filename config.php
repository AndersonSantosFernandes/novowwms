<?php
include_once("templates/header.php");
include_once("conexao.php");
include_once("queryes.php");
require "verify_login.php";




?>
<div class="container">
    <h1>Configurações</h1>

    <div class="row registration">



        <form action="process.php" method="post">
            <input type="hidden" name="action" value="setColor">
            <input type="hidden" name="email" value="<?= $_SESSION["user"] ?>">
            <div>
                <p><label for="color">Cor padrão</label></p>
                <input type="color" name="color" id="color" value="<?= $lineColor["color"] ?>">
            </div>

            <hr>

            <div>
                <p><label for="fontColor">Cor da fonte principal</label></p>
                <input type="color" name="fontColor" id="fontColor" value="<?= $lineColor["fontColor"] ?>">
            </div>
            <hr>
            <div>
                <p><label for="colorRow">Cor da caixa prncipal</label></p>
                <input type="color" name="colorRow" id="colorRow" value="<?= $lineColor["colorRow"] ?>">
            </div>
            <hr>
            <div>
                <p><label for="colorBox">Cor da box de cada vídeo</label></p>
                <input type="color" name="colorBox" id="colorBox" value="<?= $lineColor["colorBox"] ?>">
            </div>
            <hr>
            <div>
                <p><label for="btnMain">Cor dos botões principais</label></p>
                <input type="color" name="btnMain" id="btnMain" value="<?= $lineColor["btnMain"] ?>">
            </div>
            <hr>
           
            <hr>
            <input class="putsBtn" type="submit" value="Mudar" class="puts">
        </form>




    </div>

</div>



<?php include_once("templates/footer.php") ?>