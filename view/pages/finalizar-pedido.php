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
    <title>Finalizar pedido - Cafeteria Gourmet</title>
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

    <div class="container text-center">
        <h4 class="pt-5">Finalize seu pedido</h4>
        <h6 class="pb-3">Finalize sua compra</h6>

        <form class="mx-auto" method="POST" action="../../config/cadastrar-pedido.php">
            <div><span style="font-size:14px;">Pedido</span></div>
    
            <?php

            if(isset($_POST["bt_fazer_pedido"])){
                foreach ($_SESSION['itens'] as $chave => $subchave) 
                {
            ?>
                <div>
                <span>
                    <?php
                    echo $_SESSION['itens'][$chave]["quantidade"]; 
                    ?>
                    unidade(s) de 
                    <?php
                    echo $_SESSION['itens'][$chave]["nome"];
                    ?>
                    - 
                    <?php
                    echo $_SESSION['itens'][$chave]["descricao"];
                    ?>
                    -
                    <?php
                    echo "R$ " . $_SESSION['itens'][$chave]["precoUnit"]
                    ?>
                    /
                    unid.
                </div> 
                
                <?php
                }
            } else{
                header("Location: carrinho.php");
                exit();
            }
                ?>

            <div class="mt-3"><span style="font-size:14px;">Endereço</span></div>
            <div><span>Selecione um endereço de entrega</span></div>

            <?php
                 if(isset($_POST["bt_fazer_pedido"])){
                    $idCliente =  $_SESSION["id_cliente"];                     
                    $sqlEndereco = "SELECT * FROM endereco WHERE id_cliente='$idCliente'";
                    $consultaEndereco = mysqli_query($conn, $sqlEndereco);

                    while($enderecos = mysqli_fetch_array($consultaEndereco)){
                        ?>
                        <div class="mt-1"><input type="radio" name="endereco" required value="<?php $enderecos['id_endereco'];?>"/>
                        <span>
                            <?php
                                echo $enderecos["rua"];
                            ?>,Nº 
                            <?php
                                echo $enderecos["numero"];
                            ?>, 
                            <?php
                                echo $enderecos["bairro"];
                            ?> - 
                            <?php
                                echo $enderecos["cidade"];
                            ?>/<?php
                                echo $enderecos["uf"];
                            ?>
                        
                        </span>
                    </div>
                        <?php
                    }


            ?>
            <?php

                 }else{
                    header("Location: carrinho.php");
                    exit();
                 }
            ?>

            <div class="mt-3"><span style="font-size:14px;">Método de pagamento</span></div>
            <div class="mt-1"><input type="radio" name="pagamento" value="cartao" required/><span>Cartão de crédito/débito</span></div>
            <div class="mt-1"><input type="radio" name="pagamento" value="pix"/><span>PIX</span></div>

            <div class="my-3 text-center">
                <span style="font-size:18px;">
                    <?php
                        echo "R$ " . number_format($_SESSION['totalCarrinho'],2,",",".");
                    ?>
                
                </span></div>

            <div class="text-center"><button type="submit" class="btn btn-success btn-sm text-center w-25" name="bt_finalizar">Finalizar pedido</button></div>
        </form>




        </div>
       

    </div>



    <footer class="footer fixed-bottom text-center bg-dark text-light mt-4">
        <div class="container">
        <h6 class="pt-3">Cafeteria Gourmet</h6>
        <p>O prazer gourmet à sua porta</p>
        <p class="card-text pb-3" style="font-size: 10px;">2023 <i class="bi bi-c-circle"></i> Desenvolvido por Klinsmamn Rodrigues de oliveira | Projeto para obtenção da nota do PIT 2</p>
        </div>
    </footer>
    <script type="text/javascript" src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
