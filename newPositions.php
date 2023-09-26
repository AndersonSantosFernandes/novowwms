<?php
// use FontLib\Table\Table;

include_once("templates/header.php");
include_once("queryes.php");
include_once("verify_login.php");
include_once("css/style.php");
include_once("permitions.php");
?>

<div class="container">
    <h1 class="titulo">Cadastrar Posições</h1>
    <div class="registration">

    <?php if ($permC == 1): ?>

        <form action="process.php" method="post">
            <input type="hidden" name="action" value="novaPosicao">
            <div class="row">
                <div class="col-md-7">
                    <label for="rua">Rua</label>
                    <input class="puts" type="text" name="rua" id="rua" placeholder="Rua" maxlength="3" required>
                   <br>
                    <label  for="posicao">Posição</label>
                    <input class="puts" type="text" name="posicao" id="posicao" placeholder="Posição" maxlength="3" required>
                    <!-- <input type="text" name="altura" id="altura" placeholder="Altura" maxlength="3" required> -->
                  
                </div>
                <div class="col-md-5">

                <label for="altura">Altura</label>
                    <select class="puts" name="altura" id="altura">
                    <option value="">Selecione altura</option>    
                    <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                    </select>

                    <label for="profundidade">Profundidade</label>
                    <select class="puts" name="profundidade" id="profundidade">

                        <option value="A">A</option>
                        <option value="B">B</option>
                    </select>
                </div>
            </div>
            <input class='putsBtn' type="submit" value="Salvar posição">
        </form>
   
<?php else: ?>
    
    <h1>Você não pode criar posições no estoque</h1>

<?php endif; ?>

      

        <hr>
        <i class="fa-solid fa-file-excel"><a class="linkCsv" href="csv.php?estado=ocupado">  CSV posicoes ocupadas</a></i>
        <i class="fa-solid fa-file-excel"><a class="linkCsv" href="csv.php?estado=livre">  CSV posicoes livres</a></i>
        
        <i class="fa-solid fa-file-excel"><a class="linkCsv" href="csv.php?estado=todas">  CSV todas posicoes</a></i>
        
        <table>
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Estado</th>
                    <th>Data Mov</th>
                    <th>Usuário</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($returnPosicoes as $posicoes) {
                extract($posicoes);

              
                echo "
                
                <tr>
                    <td>" . $posicao . "</td>
                    <td>" . $estado . "</td>
                    <td>" . invertDate($dataModificacao) . "</td>
                    <td>" . $usuario . "</td>
                </tr>
                
                "; 
            }

            ?>
</tbody>
        </table>
       
    </div>
</div>
<?php include_once("templates/footer.php") ?>