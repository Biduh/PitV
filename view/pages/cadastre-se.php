<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <title>Realizar cadastro - Cafeteria Gourmet</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap-icons.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/estilo.css" media="screen" />
    <link href="https://fonts.cdnfonts.com/css/inknut-antiqua" rel="stylesheet">
</head>

<body style="">
    <nav class="navbar navbar-expand-md bg-black navbar-dark">
        <div class="container">
            <!--<a class="navbar-brand" href="#">Navbar</a>-->
            <a class="navbar-brand" href="../../public_html/index.php">
                <h1 class="m-0"><img src="../../assets/img/logo.png" class="d-block" alt="Logo da Cafeteria Gourmet"></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="me-auto"></div>




            </div>
        </div>
    </nav>

    
    <div class="container" style="padding-top: 80px; padding-bottom: 400px;">
      

            <h4 class="text-center">Cadastre-se</h4>
            <h6 class="pb-3 text-center">Preencha o formulário abaixo para se cadastrar</h6>

            <form class="mx-auto" data-formulario method="POST" action="../../config/cadastrar-cliente.php">
                <div class="row g-2 pb-1">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Nome completo" aria-label="Nome"  name="nome" id="nome" minlength="8" required>
                        <span class="mensagem-erro"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="date" class="form-control" placeholder="Data de nascimento" aria-label="Aniversario" name="aniversario" id="aniversario" required>
                        <span class="mensagem-erro"></span>
                    </div>
                </div>

                <div class="row g-2 pb-1">
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" placeholder="E-mail" aria-label="E-mail" name="email"  id="email" autocomplete="off" minlength="5" required>
                        <span class="mensagem-erro"></span>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="CPF" aria-label="CPF" name="cpf" id="cpf" minlength="11" autocomplete="off" maxlength="14" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}" required>
                        <span class="mensagem-erro"></span>
                    </div>
                </div>

                <div class="row g-2 pb-1">
                <div class="form-group col-md-6">
                        <input type="password" class="form-control" placeholder="Senha" aria-label="Senha" name="senha" id="senha" minlength="8" required>
                        <span class="mensagem-erro"></span>
                    </div>
                <div class="form-group col-md-6">
                        <input type="password" class="form-control" placeholder="Confirmar senha" aria-label="Confirmar Senha" name="conf_senha" id="conf_senha" minlength="8" required>
                        <span class="mensagem-erro"></span>
                    </div>
                </div>

                <div class="row g-2 pb-1">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Telefone 1" aria-label="Telefone 1" name="tel1" autocomplete="off"  id="tel1" minlength="10" maxlength="11" required>
                        <span class="mensagem-erro"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Telefone 2" aria-label="Telefone 2" name="tel2" autocomplete="off"  minlength="10" maxlength="11" id="tel2">
                        <span class="mensagem-erro"></span>
                    </div>
                </div>

                <div class="row g-2 pb-1">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="CEP" aria-label="CEP" name="cep" id="cep" minlength="8" maxlength="9" pattern= "\d{5}-?\d{3}" required>
                        <span class="mensagem-erro"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Rua" aria-label="Rua" name="rua" id="rua" minlength="5" required>
                        <span class="mensagem-erro"></span>
                    </div>
                </div>

                <div class="row g-2 pb-1">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Número" aria-label="Número" name="numero" autocomplete="off"  id="numero" minlength="1" maxlength="6" required>
                        <span class="mensagem-erro"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Bairro" aria-label="Bairro" name="bairro" id="bairro" minlength="5" required>
                        <span class="mensagem-erro"></span>
                    </div>
                </div>

                <div class="row g-2 pb-1">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Cidade" aria-label="Cidade" name="cidade" id="cidade" minlength="5" required>
                        <span class="mensagem-erro"></span>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="UF" aria-label="uf" name="uf" id="uf" minlength="2" maxlength="2" required>
                        <span class="mensagem-erro"></span>
                    </div>
                </div>
                <div class="row g-2 pb-1 text-center">
                    <span class="mensagem-erro"></span>
                </div>
        
                <div class="text-center">
                    <button type="submit" class="btn btn-success text-center w-25">Cadastrar</button>
                </div>
               
            </form>
        
    </div>



    <footer class="container-fluid text-center bg-dark text-light" >
        <div class="container">
            <h6 class="pt-3">Cafeteria Gourmet</h6>
        <p>O prazer gourmet à sua porta</p>
        <p class="card-text pb-3" style="font-size: 10px;">2023 <i class="bi bi-c-circle"></i> Desenvolvido por Francisco Álisson | Projeto para obtenção da nota do PIT 2</p>
        </div>
        
    </footer>
    <script src="../../assets/js/script.js" type="module"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script type="text/javascript" src="../../assets/js/mascaras.js"></script>
    <script type="text/javascript" src="../../assets/js/endereco.js"></script>

    
</body>

</html>