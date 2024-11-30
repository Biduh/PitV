const cep = document.getElementById('cep');
const rua = document.getElementById('rua');
const numero = document.getElementById('numero');
const bairro = document.getElementById('bairro');
const cidade = document.getElementById('cidade');
const uf = document.getElementById('uf');
cep.addEventListener('blur', () => {
    let vCep = cep.value.replace(/\-/g, "");
    
    if(vCep.length !==8 ){
        return;
    }

    fetch(`https://viacep.com.br/ws/${vCep}/json/`)
        .then(resposta => resposta.json())
        .then(json => {
            if(json.logradouro!==undefined && json.bairro !==undefined && json.localidade !==undefined){
                rua.value = json.logradouro;
                bairro.value = json.bairro;
                cidade.value = json.localidade;
                uf.value = json.uf;
                numero.focus(); 
            }
            
        });
});
