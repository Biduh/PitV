<?php
    include_once "../../config/protecao-sessao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <title>Contato - Cafeteria Gourmet</title>
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
            <a class="navbar-brand" href="fazer-pedido.php">
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
                        <a class="nav-link active" href="contato.php">Contato</a>
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
    <div class="container-expand">
        <img src="../../assets/img/banner-fazer-pedido.png" class="img-fluid" alt="..." style="width:100%;">
    </div>
    <div class="container text-center">
        <h4 class="pt-4">Contato</h4>
        <h6 class="pb-3">Informações de contato</h6>
        <p style="font-size: 13px;">Aluno: Francisco Álisson Costa Lopes</p>
        <p style="font-size: 13px;">E-mail: francisco.lopes@cs.cruzeirodosul.edu.br</p>
        <p style="font-size: 13px;">RGM: 31703747</p>
      
    </div>
  
    <footer class="footer fixed-bottom text-center bg-dark text-light mt-4">
        <div class="container">
        <h6 class="pt-3">Cafeteria Gourmet</h6>
        <p>O prazer gourmet à sua porta</p>
        <p class="card-text pb-3" style="font-size: 10px;">2023 <i class="bi bi-c-circle"></i> Desenvolvido por Francisco Álisson | Projeto para obtenção da nota do PIT 2</p>
        </div>
    </footer>
    <script type="text/javascript" src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>