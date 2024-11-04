
function mostrarAlerta(mensagem) {
    var alerta = document.getElementById("alerta");
    var mensagemErro = document.getElementById("mensagemErro");
    mensagemErro.innerHTML = mensagem;
    alerta.style.display = "block";
    setTimeout(function() {
        alerta.style.display = "none";
    }, 3000);
}

function fecharAlerta() {
    var alerta = document.getElementById("alerta");
    alerta.style.display = "none";
}
