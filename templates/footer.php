<script>

// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('#modelo').select2();
    $('#fullPosition').select2();
    $('#tipo').select2();
    $('#status').select2();
});

//===Inicio=============Trcho de código que derruba a sessão após ficar certo tempo inativo
num = 600

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

    alert(time + " minutos de inatividade. \n Sessão encerrada.")
    
    shows.innerHTML = 
`
<meta http-equiv="refresh" content="0; logout.php">
`
clearInterval(timeEnd)
}
// else{

// tmp.innerHTML = 
// `
// Tempo ${cont}
// `
// }
}
var timeEnd = setInterval(contador,1000)
//========Fim==================derruba sessão=========================
</script>
</body>
</html>