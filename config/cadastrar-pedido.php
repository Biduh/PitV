<?php
    include_once "protecao-sessao.php";
    include_once "conexao.php";

    if(!isset($_POST['bt_finalizar'])){
        header('Location: ../view/pages/carrinho.php');
        exit();
    }else{

        $idCliente = $_SESSION['id_cliente'];
        $valorPedido = $_SESSION['totalCarrinho'];
        $pagamento = $_POST['pagamento'];
        $data = date("Y-m-d H:i:s");

        $sqlCadPedido = "INSERT INTO pedido (id_cliente, valor, pagamento, data_pedido) VALUES ('$idCliente',$valorPedido,'$pagamento','$data')";

        $inserirPedido = mysqli_query($conn, $sqlCadPedido);

        if($inserirPedido==false){
            ?>
                <script>
                        alert("Erro de conexão com o banco. Tente novamente mais tarde.")
                        window.location.href = "../view/pages/carrinho.php'";
                </script>

                
            <?php
            exit();
        }else{
            $produtos = $_SESSION['itens'];
            foreach ($produtos as $chave => $subchave){
                $idProdutos =  $produtos[$chave]['id_produto'];
                $quantidades =  $produtos[$chave]['quantidade'];
                
                echo '<pre>';
                var_dump($idProdutos);
                echo '<pre>';
               $sqlProdutoPedido = "INSERT INTO pedido_produto (id_pedido, id_cliente, id_produto, quantidade) VALUES (LAST_INSERT_ID(), $idCliente, $idProdutos, $quantidades)";
                $inserirProdutoPedido = mysqli_query($conn, $sqlProdutoPedido);

                if($inserirProdutoPedido == false){
                    ?>
                        <script>
                            alert("Erro de conexão com o banco. Tente novamente mais tarde.")
                            window.location.href = "../view/pages/carrinho.php'";
                            
                        </script>
                    <?php
                    exit();
                } 
            }
            unset($_SESSION['itens']);
            ?>
                    <script>
                    alert("Pedido realizado com sucesso. Consulte-o no menu consultar pedidos.")
                    
                    window.location.href = "../view/pages/pedidos.php";
                </script>
                <?php
                
                

            
        }
    }
    


?>