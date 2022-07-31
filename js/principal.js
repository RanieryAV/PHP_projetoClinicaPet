function deletarCliente(cod){

    if(confirm('Você tem certeza que deseja deletar este cliente?')){
        $.post("../include/deletarRegistros.php", 
        {
            idClienteDeletar:cod
        },
        function(valor){
            $("#mensagem").html(valor);
        }
        );
    }
}

function efetuarLogin(){
    emailDigitado = document.getElementById('exampleInputEmail')
    alert(emailDigitado)
    console.log(emailDigitado)
}

document.getElementById("botaoLogin").addEventListener("click", efetuarLogin());