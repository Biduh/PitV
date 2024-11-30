<?php
include_once "protecao-sessao.php";
include_once "conexao.php";

if(isset($_POST["bt-alt-perfil"])){
    $idCliente = $_SESSION['id_cliente'];
    $nome =mb_strtoupper(trim($_POST['nome']), "utf-8");
    $aniversario = trim($_POST['aniversario']);
    $email = mb_strtoupper(trim($_POST['email']), "utf-8");
    $cpf = trim(preg_replace('/[^0-9]/','',$_POST['cpf']));
    $tel1 =  preg_replace('/[^0-9]/','',$_POST['tel1']);
    $tel2 = preg_replace('/[^0-9]/','',$_POST['tel2']);
   
    $sqlAlterarCliente = "UPDATE cliente SET nome = '$nome', data_nasc = '$aniversario', cpf = '$cpf', tel_1 = '$tel1', tel_2 = '$tel2' WHERE id_cliente = $idCliente;"; 
    $resultadoAlterarCliente = mysqli_query($conn, $sqlAlterarCliente);

    $sqlAlterarUsuario = "UPDATE usuario SET email = '$email' WHERE id_cliente=$idCliente;";
    $resultadoAlterarUsuario = mysqli_query($conn, $sqlAlterarUsuario);



    if($resultadoAlterarCliente == false || $resultadoAlterarUsuario == false){
        ?>
            <script>
                alert("Erro de conexão com o banco de dados. Por favor, tente novamente mais tarde");
                window.location.href = "../view/pages/alterar-perfil.php";
                
            </script>
        <?php
        exit();
    }else{
        ?>
            <script>
                alert("Perfil atualizado com sucesso!");
                window.location.href = "../view/pages/alterar-perfil.php";
            </script>
        <?php
    }
    }else{
        header("Location: ../view/pages/alterar-perfil.php");
        exit();
    }




?>