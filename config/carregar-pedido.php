<?php
include_once "conexao.php";



if(!isset($_SESSION["id_usuario"])){
    session_start();
}



$idPedido = $_POST['id_pedido'];
$idCliente = $_SESSION['id_cliente'];
$sql = "SELECT  pdt.nome, pdt.descricao, pp.quantidade, pdt.preco FROM pedido as pdd, pedido_produto as pp, produto as pdt WHERE pdd.id_cliente = $idCliente AND  pdd.id_pedido=$idPedido AND pdd.id_cliente = pp.id_cliente AND pdd.id_pedido = pp.id_pedido AND pdt.id_produto = pp.id_produto;";
$consultar = mysqli_query($conn, $sql);

?>
  <table>

<tr>
    <th>Produto</th>
    <th>Quantidade</th>
    <th>Preco</th>
</tr>
<?php

while($resultado = mysqli_fetch_assoc($consultar))
{
    ?>

      
            <tr>
                <td>

                    <?php
                        echo $resultado['nome'] . '-' . $resultado['descricao'];


                    ?>
                </td>
                <td style="text-align:center;">

                <?php
                        echo $resultado['quantidade'];
                        

                    ?>
                </td>
                <td>

                <?php
                    echo 'R$' . number_format($resultado['preco'],2,",",".");


            ?>
</td>
            </tr>

            
      

    <?php
}

$consultar = 0;

?>
 </table>




