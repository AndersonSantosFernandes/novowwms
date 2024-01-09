<?php
include_once("templates/header.php");
include_once("permitions.php");
include_once("queryes.php");

include_once("permitions.php");

?>

<div class="container">
    <h1 class="titulo">Gerenciar permissões</h1>

    <div class="col-md-10   registration">
        <form class="form-cad" action="user_process.php" method="post">
            <input type="hidden" name="action" value="exit-prod">
            <input type="hidden" name="user" value="<?= $user_name ?>">
           
            <div class="row">
            <?php if ($perm == 1): ?>
                <div class="col-md-12">                
                <table>
                 <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="hide">Sobrenome</th>
                        <th>E-mail</th>
                        <th class="hide">Admin?</th>
                        <th class="hide">Criar Posição</th>
                        <th class="hide">Alocar Palet</th>
                        <th class="hide">Atualizar Posição</th>
                        <th class="hide">Desalocar Palet</th>
                        <th>Altera perm.</th>
                    </tr>
                 </thead>  
                 <tbody>
                 <?php foreach ($useSelect as $useSel): ?>
                        <?php
                        if($useSel['admin'] == 1){
                            $classe = "green";
                        }else{
                            $classe = "red";
                        }

                        if($useSel['permitionC'] == 1){
                            $classeC = "green";
                        }else{
                            $classeC = "red";
                        }

                        if($useSel['permitionR'] == 1){
                            $classeR = "green";
                        }else{
                            $classeR = "red";
                        }

                        if($useSel['permitionU'] == 1){
                            $classeU = "green";
                        }else{
                            $classeU = "red";
                        }

                        if($useSel['permitionD'] == 1){
                            $classeD = "green";
                        }else{
                            $classeD = "red";
                        }
                        ?>                       
                       
                    <tr>
                        
                        <td><?= $useSel["name"] ?></td>
                        <td class="hide"><?= $useSel["lastName"] ?></td>
                        <td><?= $useSel["email"] ?></td>

                        <td class="<?= $classe ?> hide"><?= $useSel["admin"] ?></td>
                        <td class="<?= $classeC ?> hide" ><?= $useSel["permitionC"] ?></td>
                        <td class="<?= $classeR ?> hide" ><?= $useSel["permitionR"] ?></td> 
                        <td class="<?= $classeU ?> hide" ><?= $useSel["permitionU"] ?></td>
                        <td class="<?= $classeD ?> hide" ><?= $useSel["permitionD"] ?></td>
                        <td><a href='permitions_edit.php?email=<?= $useSel["email"] ?>&a=<?= $useSel["admin"] ?>&c=<?= $useSel["permitionC"] ?>&r=<?= $useSel["permitionR"] ?>&u=<?= $useSel["permitionU"] ?>&d=<?= $useSel["permitionD"] ?>'>Alterar</a></td>
                        
                    </tr>
                         
                           <?php endforeach; ?>

                           </tbody>
                </table>
                <br>
                <button class="btn btn-primary" > <a style="color:white; text-decoration: none;" href="newUser.php">Voltar</a> </button>
                </div>

                <?php else: ?>
                    <h1 class="titulo">Você não pode alterar permissões</h1>
                    <?php endif; ?>
            </div>

        </form>

    </div>

</div>

<?php include_once("templates/footer.php") ?>