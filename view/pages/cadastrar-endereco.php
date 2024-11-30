<?php
    include_once "../../config/protecao-sessao.php";
    include_once "../../config/conexao.php";
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <title>Cadastrar endereço - Cafeteria Gourmet</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css" media="screen" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap-icons.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../../assets/css/estilo.css" media="screen" />
    <link href="https://fonts.cdnfonts.com/css/inknut-antiqua" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-black navbar-dark">
        <div class="container">
            <!--<a class="navbar-brand" href="#">Navbar</a>-->
            <a class="navbar-brand" href="#">
                <h1 class="m-0"><img src="../../assets/img/logo.png" class="d-block" alt="Logo da Cafeteria Gourmet"></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="me-auto"></div>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="fazer-pedido.php">Fazer pedido</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pedidos.php">Consultar pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="enderecos.php">Meus endereços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contato.php">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carrinho.php"><i class="bi bi-cart-fill fs-6" style=""></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alterar-perfil.php"><i class="bi bi-person-circle fs-6" style=""></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../config/sair.php">Sair</a>
                    </li>

                </ul>


            </div>
        </div>
    </nav>
    
    <div class="container" style="padding-bottom: 500px;" >
      

        <h4 class="pt-5">Cadastre um novo endereço</h4>
        <h6 class="pb-3">Preencha os campos abaixo para cadastrar um novo endereço</h6>

            <form class="mx-auto" data-formulario method="POST" action="../../config/addEndereco.php">              
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
                        <input type="text" class="form-control" placeholder="Número" aria-label="Número" name="numero" id="numero" minlength="1" maxlength="6" required>
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
                    <button type="submit" class="btn btn-success text-center w-25" name="bt_cad_end" >Cadastrar endereço</button>
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
    
    <script type="text/javascript" src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/script.js" type="module"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script type="text/javascript" src="../../assets/js/mascaras.js"></script>
    <script type="text/javascript" src="../../assets/js/endereco.js"></script>

    
</body>

</html>