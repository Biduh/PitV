<?php
include_once "conexao.php";

if(!isset($_SESSION["id_usuario"])){
    session_start();
}

$idEndereco = $_POST['id_end'];
$idCliente = $_SESSION['id_cliente'];

$sqlConsulta = "SELECT e.id_endereco FROM cliente as c, endereco as e WHERE c.id_cliente = $idCliente AND c.id_cliente = e.id_cliente;";
$resultadoConsulta = mysqli_query($conn, $sqlConsulta);

if(mysqli_num_rows($resultadoConsulta)==1){
    ?>
    <script type="text/javascript">
        alert("Você precisa de pelo menos um endereço cadastrado. Portano, não será possível excluí-lo.");
    </script>
    <?php
      exit();
    ?>
      <?php
}else{
    $sqlDelete = "DELETE FROM endereco WHERE id_cliente = $idCliente AND id_endereco = $idEndereco";
    $resultadoDelete = mysqli_query($conn, $sqlDelete);

    if($resultadoDelete==false){
        ?>

        <script type="text/javascript">
            alert("Erro ao conectar com banco de dados. Tente novamente mais tarde.");
        </script>

        <?php
    }else{
        ?>
        <script type="text/javascript">
        alert("Endereço excluído com sucesso.");
        </script>

    <?php
    echo '<meta HTTP-EQUIV="REFRESH" CONTENT="0,URL=enderecos.php"/>';
    }
    ?>

    <?php
        
}
    ?>