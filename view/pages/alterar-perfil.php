<?php
    include_once "../../config/protecao-sessao.php";
    include_once "../../config/conexao.php";

    

    if(isset($_SESSION['id_cliente'])){
        $idCliente = $_SESSION['id_cliente'];
        $sqlConsulta = "SELECT c.nome, c.data_nasc, u.email, c.cpf, c.tel_1, c.tel_2 FROM usuario as u, cliente as c WHERE c.id_cliente = $idCliente AND u.id_cliente = c.id_cliente;";
        $resultadoConsulta = mysqli_query($conn, $sqlConsulta);
        $clientes = array();
        while($cliente = mysqli_fetch_assoc($resultadoConsulta)){
            $clientes = $cliente;
        }
        
    }else{
        header("Location:../../public_html/index.php");
        exit();
    }  
    
?>


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
                        <a class="nav-link active" href="alterar-perfil.php"><i class="bi bi-person-circle fs-6" style=""></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../config/sair.php">Sair</a>
                    </li>

                </ul>





            </div>
        </div>
    </nav>

    
    <div class="container" style="padding-top: 38px; padding-bottom: 500px;">
      
            <h1 class="text-center">
                <i class="bi bi-person-circle" style="font-size:100px;"></i>
            </h1>

            <h4 class="text-center">Atualize seu perfil</h4>
            <h6 class="pb-3 text-center">Preencha o formulário abaixo para alterar seus dados de perfil.</h6>

            <form class="mx-auto" data-formulario method="POST" action="../../config/altPerfil.php">
                <div class="row g-2 pb-1">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Nome completo" aria-label="Nome"  name="nome" id="nome" value="<?php echo $clientes['nome'];?>" minlength="15" required>
                        <span class="mensagem-erro"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="date" class="form-control" placeholder="Data de nascimento" aria-label="Aniversario" name="aniversario" id="aniversario" value="<?php echo $clientes['data_nasc'];?>" required>
                        <span class="mensagem-erro"></span>
                    </div>
                </div>

                <div class="row g-2 pb-1">
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" placeholder="E-mail" aria-label="E-mail" name="email"  id="email" value="<?php echo $clientes['email'];?>" minlength="5" required>
                        <span class="mensagem-erro"></span>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="CPF" aria-label="CPF" name="cpf" id="cpf" minlength="11" maxlength="14" value="<?php echo $clientes['cpf'];?>" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}" required>
                        <span class="mensagem-erro"></span>
                    </div>
                </div>


                <div class="row g-2 pb-1">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Telefone 1" aria-label="Telefone 1" name="tel1" id="tel1" minlength="10" value="<?php echo $clientes['tel_1'];?>" maxlength="11" required>
                        <span class="mensagem-erro"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" placeholder="Telefone 2" aria-label="Telefone 2" name="tel2" value="<?php echo $clientes['tel_2'];?>" minlength="10" maxlength="11" id="tel2">
                        <span class="mensagem-erro"></span>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success text-center w-25" name="bt-alt-perfil">Atualizar perfil</button>
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