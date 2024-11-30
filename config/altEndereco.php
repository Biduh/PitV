<?php
include_once "protecao-sessao.php";
include_once "conexao.php";

if(isset($_POST["bt_alt_end"])){
    $idEndereco = $_POST['id_e'];
    $cep = preg_replace('/[^0-9]/','',$_POST['cep']);
    $rua = mb_strtoupper(trim($_POST['rua']), "utf-8");
    $numero = mb_strtoupper(trim($_POST['numero']), "utf-8");
    $bairro = mb_strtoupper(trim($_POST['bairro']), "utf-8");
    $cidade = mb_strtoupper(trim($_POST['cidade']), "utf-8");
    $uf = mb_strtoupper(trim($_POST['uf']), "utf-8");

    $sqlAlterar = "UPDATE endereco SET cep = '$cep', rua = '$rua', numero = '$numero', bairro = '$bairro', cidade = '$cidade', uf = '$uf' WHERE id_endereco = $idEndereco;"; 
    $resultadoAlterar = mysqli_query($conn, $sqlAlterar);

    if($resultadoAlterar == false){
        ?>
            <script>
                alert("Erro de conexão com o banco de dados. Por favor, tente novamente mais tarde");
                window.location.href = "../view/pages/enderecos.php";
                
            </script>
        <?php
        exit();
    }else{
        ?>
            <script>
                alert("Endereço atualizado com sucesso!");
                window.location.href = "../view/pages/enderecos.php";
            </script>
        <?php
    }
    }else{
        header("Location: ../view/pages/enderecos.php");
        exit();
    }




?>