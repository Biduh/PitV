<?php
    include_once "../../config/conexao.php";
    include_once "../../config/protecao-sessao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <title>Seu carrinho - Cafeteria Gourmet</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
                        <a class="nav-link active" href="carrinho.php"><i class="bi bi-cart-fill fs-6" style=""></i></a>
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

    <div class="container" style="padding-top:38px;padding-bottom: 500px;">
        <h4 class="pt-5">Seu carrinho de compras</h4>
        <h6 class="pb-3">Itens do seu carrinho</h6>

        <h6 class="teste"></h6>
        <?php
            if(!isset($_SESSION['itens'])){
        ?>
            <h5>Sem produtos no carrinho.</h5>

         <?php
            }else{
                if(count($_SESSION['itens'])==0){
                    ?>
                    <h5>Sem produtos no carrinho.</h5>
                    <?php
                 }else{
         ?>

    <form action="finalizar-pedido.php" method="POST">
        <table class="table table-striped align-middle" style="font-size: 14px;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Café</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ação</th>
                </tr> 
            </thead>
            <tbody>

            <?php
                $totalCarrinho = 0;
                $contador = 0;
               foreach ($_SESSION['itens'] as $chave => $subchave) {

                $contador++;
            ?>
                    <tr>
                        <th scope="row"><?php echo $_SESSION['itens'][$chave]["id_produto"]; ?></th>
                        <td><?php echo $_SESSION['itens'][$chave]["nome"] . " - " . $_SESSION['itens'][$chave]["descricao"]; ?></td>
                        <td><?php echo $_SESSION['itens'][$chave]["quantidade"]; ?></td>
                        <td><?php echo "R$ " . number_format($_SESSION['itens'][$chave]["total"],2,",","."); ?></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm text-center" onclick="rmCarrinho<?php echo $contador;?>(<?php echo $_SESSION['itens'][$chave]['id_produto'];?>)"><i class="bi bi-x-lg"></i></button>

                        </td>

                        <?php 
                           $totalCarrinho += $_SESSION['itens'][$chave]["total"];
                                      
                        ?>
                        

                
               
              <?php
               }

               $_SESSION['totalCarrinho'] = $totalCarrinho;
               

            

               

               
              ?>

                </tr>
                
                <tr>
                <th>Total: </th>
                <td></td>
                <td></td>
                <th>
            <?php
                echo "R$ " . number_format($totalCarrinho,2,",",".");

                ?>
                
                </th>
                <td></td>
                </tr>
            </tbody>
        </table>
       
        <button type="submit" class="btn btn-success btn-sm text-center w-25" name="bt_fazer_pedido">Fazer pedido</button>
       
        </form>
        <?php
            }
        }
        ?>
    </div>



    <footer class="container-fluid text-center bg-dark text-light">
        <div class="container">
        <h6 class="pt-3">Cafeteria Gourmet</h6>
        <p>O prazer gourmet à sua porta</p>
        <p class="card-text pb-3" style="font-size: 10px;">2023 <i class="bi bi-c-circle"></i> Desenvolvido por Francisco Álisson | Projeto para obtenção da nota do PIT 2</p>
        </div>
    </footer>
    <script type="text/javascript" src="../../assets/js/bootstrap.bundle.min.js"></script>
    

     <?php
      $contador2=0;

      if(isset($_SESSION['itens'])){
        foreach ($_SESSION['itens'] as $chave => $subchave) {

            $contador2++;
    
            ?>
                    <script type="text/javascript">
                        function rmCarrinho<?php echo $contador2;?>(n){
                            $.post("../../config/rmCarrinho.php", {id_prd:n}, function(x){$('.teste').html(x)});
                            console.log(n)
                        }
                    </script>
    
    <?php
          }

      }
      
     ?>

                        

    
</body>

</html>