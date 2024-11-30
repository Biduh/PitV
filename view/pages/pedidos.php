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
    <title>Seus pedidos - Cafeteria Gourmet</title>
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
                        <a class="nav-link active" href="pedidos.php">Consultar pedidos</a>
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
    <!-- Button trigger modal -->




    <div class="container"  style="padding-bottom: 500px;">
        <h4 class="pt-5">Seus pedidos</h4>
        <h6 class="pb-3">Consulte aqui todos os seus pedidos</h6>
        <?php
            $idCliente = $_SESSION['id_cliente'];
            $sql = "SELECT pdd.id_pedido, pdd.pagamento, pdd.valor, pdd.data_pedido FROM pedido as pdd, pedido_produto as pp WHERE pdd.id_cliente = '$idCliente' AND pp.id_cliente = pdd.id_cliente GROUP BY id_pedido;";        
            $consultarPedidos = mysqli_query($conn, $sql);

           if($consultarPedidos == false){
            echo mysqli_error($conn);
           }else {
                if(mysqli_num_rows($consultarPedidos)==0){

                    ?>

                    <h5>Não há pedidos realizados.</h5>

                    <?php

                }else{
                    ?>
                        <form>
                        <table class="table table-striped align-middle" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th scope="col">Pedido</th>
                                <th scope="col">Pagamento</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Data</th>
                            </tr> 
                        </thead>
                        <tbody>

            
                
            <?php
            $contador = 0;
            $pedidos = 0;
          
                while($pedidos = mysqli_fetch_assoc($consultarPedidos)){
                    $contador++;
            ?>

                <tr>
                    <th scope="row">
                     <button onclick="carregarPedido<?php echo $contador;?>(<?php echo $pedidos['id_pedido'];?>)" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><?php  echo $pedidos['id_pedido'];?></button>
                    </th>
                    <td><?php echo $pedidos['pagamento'];?></td>
                    <td><?php echo 'R$ ' . number_format($pedidos['valor'],2,",",".");?></td>
                    <td><?php echo $pedidos['data_pedido'];?></td>
                </tr>
           
       
        </form>
        <script type="text/javascript">
         function carregarPedido<?php echo $contador;?>(n){
            $.post("../../config/carregar-pedido.php", {id_pedido:n}, function(x){$('.retorno').html(x); $('#exampleModalLabel').html("Pedido " + n)});
            }
        </script>

                    <?php
                    
                }

                ?>
 </tbody>
        </table>
                <?php
           }
        }


        ?>
        
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">
        
     </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span class="retorno"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

      </div>
    </div>
  </div>
</div>



    <footer class="container-fluid text-center bg-dark text-light">
        <div class="container">
        <h6 class="pt-3">Cafeteria Gourmet</h6>
        <p>O prazer gourmet à sua porta</p>
        <p class="card-text pb-3" style="font-size: 10px;">2023 <i class="bi bi-c-circle"></i> Desenvolvido por Francisco Álisson | Projeto para obtenção da nota do PIT 2</p>
        </div>
    </footer>
    <script type="text/javascript" src="../../assets/js/bootstrap.bundle.min.js"></script>
   
    </script>

</body>

</html>