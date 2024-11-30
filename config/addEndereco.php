<?php
include_once "protecao-sessao.php";

if(isset($_POST["bt_cad_end"])){
   
    $idCliente = $_SESSION['id_cliente'];
    $cep = preg_replace('/[^0-9]/','',$_POST['cep']);
    $rua = mb_strtoupper(trim($_POST['rua']), "utf-8");
    $numero = mb_strtoupper(trim($_POST['numero']), "utf-8");
    $bairro = mb_strtoupper(trim($_POST['bairro']), "utf-8");
    $cidade = mb_strtoupper(trim($_POST['cidade']), "utf-8");
    $uf = mb_strtoupper(trim($_POST['uf']), "utf-8");

    include_once "conexao.php";

    $sqlConsulta = "SELECT e.id_endereco FROM cliente as c, endereco as e WHERE c.id_cliente = $idCliente AND c.id_cliente = e.id_cliente;";
    $resultadoConsulta = mysqli_query($conn, $sqlConsulta);

    if(mysqli_num_rows($resultadoConsulta)==3){
        ?>
            <script type="text/javascript">
                alert("É permitido cadastrar no máximo três endereços.");
                window.location.href="../view/pages/cadastrar-endereco.php";
            </script>

        <?php
            exit();

    }else{

    $sqlEndereco = "INSERT INTO endereco (cep, rua, numero, bairro, cidade, uf, id_cliente) VALUES ('$cep','$rua', $numero, '$bairro', '$cidade', '$uf', $idCliente);";
    $inserirEndereco = mysqli_query($conn, $sqlEndereco);

    if($inserirEndereco == false){
        ?>
            <script type="text/javascript">
                alert("Erro ao conectar com o banco de dados. Por favor, tente novamente mais tarde.");
                window.location.href="../view/pages/cadastrar-endereco.php";
            </script>
        
        <?php
        
    }else{

        ?>
        <script type="text/javascript">
            alert('ENDERECO CADASTRADO COM SUCESSO!');
            window.location.href="../view/pages/enderecos.php";
        </script>
        <?php
        
        exit;

    }

    }
}
?>
