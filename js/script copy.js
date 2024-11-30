
import ehUmCPF from "./valida-cpf.js";
import ehMaiorDeIdade from "./valida-idade.js";
import senhasIguais from "./valida-senha.js";

const camposDoFormulario = document.querySelectorAll('[required]');

console.log(camposDoFormularios);

const formulario = document.querySelector('[data-formulario]');

formulario.addEventListener("submit", (e) => {
    e.preventDefault();

    const listaRespostas = {
        "nome": e.target.elements["nome"].value,
        "aniversario": e.target.elements["aniversario"].value,
        "email": e.target.elements["email"].value,
        "cpf": e.target.elements["cpf"].value,
        "senha": e.target.elements["senha"].value,
        "conf_senha": e.target.elements["conf_senha"].value,
        "tel1": e.target.elements["tel1"].value,
        "tel2": e.target.elements["tel2"].value,
        "cep": e.target.elements["cep"].value,
        "rua": e.target.elements["rua"].value,
        "numero": e.target.elements["numero"].value,
        "bairro": e.target.elements["bairro"].value,
        "cidade": e.target.elements["cidade"].value,
        "uf": e.target.elements["uf"].value,
    }



    window.location.href = "../../config/cadastrar-cliente.php";
})

camposDoFormulario.forEach((campo) => {
    campo.addEventListener("blur", () => verificaCampo(campo));
    campo.addEventListener("invalid", evento => evento.preventDefault())
})


const tiposDeErro = [
    'valueMissing',
    'typeMismatch',
    'patternMismatch',
    'tooShort',
    'customError'
]

const mensagens = {
    nome: {
        valueMissing: "O campo de nome não pode estar vazio.",
        patternMismatch: "Por favor, preencha um nome válido.",
        tooShort: "Por favor, preencha um nome válido."
    },
    aniversario: {
        valueMissing: 'O campo de data de nascimento não pode estar vazio.',
        customError: 'Você deve ser maior que 18 anos para se cadastrar.'
    },


    email: {
        valueMissing: "O campo de e-mail não pode estar vazio.",
        typeMismatch: "Por favor, preencha um email válido.",
        tooShort: "O campo e-mail não tem caractéres suficientes."
    },
    cpf: {
        valueMissing: 'O campo de CPF não pode estar vazio.',
        patternMismatch: "Por favor, preencha um CPF válido.",
        customError: "O CPF digitado não existe.",
        tooShort: "O campo de CPF não tem caractéres suficientes."
    },

    senha: {
        valueMissing: 'O campo de senha não pode estar vazio.',
        tooShort: "O campo de senha não tem caractéres suficientes."
    },

    conf_senha: {
        valueMissing: 'O campo de confirmação de senha não pode estar vazio.',
        tooShort: "O campo de confirmação de senha não tem caractéres suficientes.",
        customError: "As senhas não conferem."
    },
    
   tel1: {
        valueMissing: 'O campo de telefone 1 não pode estar vazio.',
        tooShort: "O campo de telefone 1 não tem caractéres suficientes."

   },

   cep: {
    valueMissing: 'O campo de CEP não pode estar vazio.',
    tooShort: "O campo de CEP não tem caractéres suficientes."

    },

    rua: {
     valueMissing: 'O campo de Rua não pode estar vazio.',
     tooShort: "O campo de Rua não tem caractéres suficientes."
 
     },

    numero: {
        valueMissing: 'O campo de Numero não pode estar vazio.',
        tooShort: "O campo de Numero não tem caractéres suficientes."
    
    },
    bairro: {
        valueMissing: 'O campo de Bairro não pode estar vazio.',
        tooShort: "O campo de Bairro não tem caractéres suficientes."
    
    },
    cidade: {
        valueMissing: 'O campo de Cidade não pode estar vazio.',
        tooShort: "O campo de Cidade não tem caractéres suficientes."
    
    },

    uf: {
        valueMissing: 'O campo de Unidade Federativa não pode estar vazio.',
        tooShort: "O campo de Unidade Federativa não tem caractéres suficientes."
    
    }, 

    codigo: {
        valueMissing: "O campo de código de confirmação não pode estar vazio.",
        typeMismatch: "Por favor, preencha um código de confirmação válido.",
        tooShort: "O campo de código de confirmação não tem caractéres suficientes."
    
    }
}

function verificaCampo(campo) {
    let mensagem = "";
    campo.setCustomValidity('');
    if (campo.name == "cpf" && campo.value.length >= 11) {
        ehUmCPF(campo);
    }
    if (campo.name == "aniversario" && campo.value != "") {
        ehMaiorDeIdade(campo);
    }

    if (campo.name == "conf_senha") {
        senhasIguais(campo);
    }
    tiposDeErro.forEach(erro => {
        if (campo.validity[erro]) {
            mensagem = mensagens[campo.name][erro];
            console.log(mensagem);
        }
    })
    const mensagemErro = campo.parentNode.querySelector('.mensagem-erro');
    const validadorDeInput = campo.checkValidity();

    if (!validadorDeInput) {
        mensagemErro.textContent = mensagem;
    } else {
        mensagemErro.textContent = "";
    }
}