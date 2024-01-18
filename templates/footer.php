<script>

// In your Javascript (external .js resource or <script> tag)
// J query para buscas rápida no select
$(document).ready(function() {
    $('#modelo').select2();
    $('#fullPosition').select2();
    $('#tipo').select2();
    $('#status').select2();
    $('#modeloItem').select2();
    $('#medidaUnidade').select2();
    $('#contrat').select2();
    $('#operat').select2();
    $('#origem').select2();
    $('#destino').select2();
    $('#editAlocamento').select2()
});

//===Inicio=============Trcho de código que derruba a sessão após ficar certo tempo inativo
num = <?= $tempo?> //Trmpo que vem do BD


time = num/60

function resetTime(){
    cont = num
}

function contador()
{
    var tmp = document.getElementById("tmp")
var shows = document.getElementById("show")
cont = cont - 1

if(cont == 0){

    // alert(time + " minutos de inatividade. \n Sessão encerrada.")
    
    shows.innerHTML = 
`
<meta http-equiv="refresh" content="0; logout.php">
`
clearInterval(timeEnd)
}
else{

    if(cont < 20){
        shows.innerHTML = 
`
<h5>A sessão vai expirar em ${cont} segundos</h5>
`
    }

}
}
var timeEnd = setInterval(contador,1000)
//========Fim==================derruba sessão=========================

var caixa1 = document.getElementById("Caixa_01")
if(caixa1.value < 100){
alert("Estoque de caixa 01 está se esgotando")
}

var caixa2 = document.getElementById("Caixa_02")
if(caixa2.value < 100){
alert("Estoque de caixa 02 está se esgotando")
}

var caixa3 = document.getElementById("Caixa_03")
if(caixa3.value < 100){
alert("Estoque de caixa 03 está se esgotando")
}

var caixa15 = document.getElementById("Caixa_15")
if(caixa15.value < 100){
alert("Estoque de caixa 15 está se esgotando")
}

var caixa17 = document.getElementById("Caixa_17")
if(caixa17.value < 100){
alert("Estoque de caixa 17 está se esgotando")
}

var caixa18 = document.getElementById("Caixa_18")
if(caixa18.value < 100){
alert("Estoque de caixa 18 está se esgotando")
}

var caixa21 = document.getElementById("Caixa_21")
if(caixa21.value < 100){
alert("Estoque de caixa 21 está se esgotando")
}



</script>
</body>
</html>