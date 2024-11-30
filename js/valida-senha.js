export default function senhasIguais(campo) {
    if (!validaSenha()) {
        campo.setCustomValidity('As senhas não conferem');
    }
}

function validaSenha() {
    const senha = document.querySelector('input[name=senha]');
    const confirma = document.querySelector('input[name=conf_senha]');

    if(confirma.value === senha.value){
        return true;
    }
}