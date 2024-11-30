<?php
include_once "conexao.php";

if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST["bt_alt_senha"])){
    $pass = md5($_POST['senha']);
    $id_usuario = $_SESSION["id_usuario"];
    $alterarSenha = "UPDATE usuario SET senha = '$pass' WHERE id_usuario = '$id_usuario'";
    $alterarCodNull = "UPDATE usuario SET cod_conf = null WHERE id_usuario = '$id_usuario'";
    $resultAlterarSenha = mysqli_query($conn, $alterarSenha);
    $resultAlterarCodNull = mysqli_query($conn, $alterarCodNull);

    if($resultAlterarSenha==false && $resultAlterarCodNull==false){
        ?>
          <script type="text/javascript">
                alert('ERRO DE CONEXÃO COM O BANCO DE DADOS. TENTE NOVAMENTE MAIS TARDE.');
                window.location.href="../public_html/index.php";
                
            </script><?php
            session_destroy();
            exit;
    } else{?>
            <script type="text/javascript">
                alert('SENHA ALTERADA COM SUCESSO!');
                window.location.href="../public_html/index.php";
            </script><?php
            session_destroy();
            exit;

    }
} else{
    session_destroy();
    header("Location: ../public_html/index.php");
    exit(); 
}


?>
