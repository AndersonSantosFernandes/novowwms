function showModal(valor){
var modal=document.getElementById("deletar")
modal.innerHTML=
`
<div id="modal">
        <h3 id="titleModal">Deletar realmente?</h3>
        
        <p class="modalText">Será apagado o vídeo e os comentários relacionados a ele!</p>
        <div class="row">
            <div class="col-md-6">
            <form action="process.php" method="post">
            <input type="hidden" name="action" value="deleteMovie">
            <input type="hidden" name="id" value="${valor}">
            <input class="btnModal gr" type="submit" value="Deletar">
            </form>
            </div>
            <div class="col-md-6">
            <button class="btnModal rd" onclick="hideModal()">Cancelar</button>        
            </div>
        </div>
    </div>
`
    
}
function hideModal(){
    var modal=document.getElementById("deletar")
    modal.innerHTML=
    `
   
    `
}