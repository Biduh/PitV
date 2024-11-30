
import ehUmCPF from "./valida-cpf.js";
import ehMaiorDeIdade from "./valida-idade.js";
import senhasIguais from "./valida-senha.js";

const camposDoFormulario = document.querySelectorAll('[required]');

const formulario = document.querySelector('[data-formulario]');



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